<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Device;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\LangdingDevicesTable $LangdingDevices
 * @property \App\Model\Table\DevicesTable $Devices
 * @property \App\Model\Table\LogAuthsTable $LogAuths
 * @property \App\Model\Table\AuthsTable $Auths
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 * @property \App\Model\Table\AdgroupsTable $Adgroups
 * @property \App\Model\Table\FileAttachmentsTable $FileAttachments
 *
 * @method \App\Model\Entity\Device[] paginate($object = null, array $settings = [])
 *
 *  * @property  \App\Controller\Component\UploadImageComponent $UploadImage
 * * @property \App\Model\Table\PartnersTable $Partners
 */
class DevicesController extends AppController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }

    public function initialize()
    {
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadModel('Adgroup');
        $this->loadModel('LogAuths');
        $this->loadComponent('UploadImage');
        $this->loadModel('DeviceGroups');

        // Load Files model
        $this->loadModel('FileAttachments');
        $this->loadModel('Logs');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                    ->select(['Users.id', 'Users.username'])
                        ->where(['Users.delete_flag !=' => 1])
                        ->hydrate(false);
                },
                'Partners' => function($q) {
                    return $q
                        ->select([
                            'Partners.id','Partners.name','Partners.device_id'
                        ])
                        ;
                }],
                'conditions' => [
                    'Devices.delete_flag !=' => DELETED
                ]
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                        ->where([
                            'Devices.delete_flag !=' => 1,
                        ]);
                },
                'Partners' => function($q) {
                return $q
                    ->select([
                        'Partners.id','Partners.device_id',
                    ])
                    ;
                }],
                'conditions' => [
                    'Devices.user_id ' => $login['id'],
                    'Devices.delete_flag !=' => DELETED
                ]
            ])->toArray();
        }
        $result = Hash::combine($devices, '{n}.id', '{n}.adgroup_id');
        $Adgroups = array();
        if (!empty($result)) {
            $Adgroups = $this->Adgroups->find()->where(['id IN' => array_unique($result)])->combine('id', 'name')->toArray();
        }
        $this->set(compact('Adgroups','devices'));
    }


    /**
     *
     */
    public function loadDeviceNoLangdingpage()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                        ->where(['Devices.delete_flag !=' => 1]);
                }],
                'conditions' => array(
                    'Devices.status ' => NO_LANDING
                )
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                        ->where([
                            'Devices.delete_flag !=' => 1,
                        ]);
                }],
                'conditions' => [
                    'Devices.user_id ' => $login['id'],
                    'Devices.status ' => NO_LANDING
                ],
            ])->toArray();
        }
        $this->set(compact('devices'));
        $this->render('/Devices/index');
    }

    /**
     *
     */
    public function loadDeviceHasLangdingpage()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                        ->where(['Devices.delete_flag !=' => 1]);
                }],
                'conditions' => array(
                    'Devices.status ' => HAS_LANDING
                )
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all', [
                'contain' => ['Users' => function ($q) {
                    return $q
                        ->where([
                            'Devices.delete_flag !=' => 1,
                        ]);
                }],
                'conditions' => [
                    'Devices.user_id ' => $login['id'],
                    'Devices.status ' => HAS_LANDING
                ],
            ])->toArray();
        }
        $this->set(compact('devices'));
        $this->render('/Devices/index');
    }

    /**
     * View method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('device', $device);
        $this->set('_serialize', ['device']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->loadModel('Users');
        $users = $this->Users->find('all')
            ->where(['Users.delete_flag !=' => DELETED])
            ->select(['id', 'username'])
            ->order(['Users.id' => 'DESC'])
            ->combine('id', 'username')
            ->toArray();
        $device = $this->Devices->newEntity();
        if ($this->request->is('post')) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            $device->delete_flag = UN_DELETED;
            if (empty($device->errors())) {
                if ($this->Devices->save($device)) {
                    $conn->commit();
                    $this->Flash->success(__('The device has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The device could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'add']);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'add']);
            }
        }
        $this->set(compact('users', 'device'));
        //return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Devices id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->Devices->exists(['id' => $id])) {
            return $this->redirect(array('controller' => 'Devices', 'action' => 'index'));
        }
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);
        $this->getAllData();
        if ($this->request->getData()) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            if (empty($device->errors())) {
                if ($this->Devices->save($device)) {
                    $conn->commit();
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The device could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'edit' . '/' . \UrlUtil::_encodeUrl($id)]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit' . '/' . \UrlUtil::_encodeUrl($id)]);
            }
        }
        $this->set(compact('device'));
        $this->set('_serialize', ['device']);
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->request->allowMethod(['post', 'delete']);
        if ($this->request->getData()) {
            $device = $this->Devices->get($this->request->getData('id'));
            $device->delete_flag = true;
            $device->langdingpage_id = '';
            if ($this->Devices->save($device)) {
                $conn->commit();
                die(json_encode(true));
            } else {
                $conn->rollback();
                die(json_encode(false));
            }
        }
    }

    /**
     * load method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function load()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $device = $this->Devices->find('all')
                ->where(['Devices.id' => $this->request->getData('id'),
                    'Devices.delete_flag !=' => DELETED])
                ->select(['Devices.id',
                    'name',
                    'apt_key',
                    'created',
                    'pass_apt_key',
                ])
                ->first()
                ->toArray();
            if ($device) {
                die(json_encode($device));
            }
        }

    }

    /**
     * isNameEditlExist method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameEditlExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('backup_name') != $this->request->getData('name')) {
                $query = $this->Devices->find('all', array(
                        'recursive' => -1,
                        'conditions' => array(
                            'name' => $this->request->getData('name'),
                            'delete_flag !=' => DELETED
                        ))
                );
                $number = $query->count();
                if (!$number) {
                    die(json_encode(true));
                } else {
                    die(json_encode(false));
                }
            } else {
                die(json_encode(true));
            }
        }
    }

    /**
     * isNameExistAdd method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameExistAdd()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->Devices->find('all', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'name' => $this->request->getData('name'),
                        'delete_flag !=' => DELETED
                    ))
            );
            $number = $query->count();
            if (!$number) {
                die(json_encode(true));
            } else {
                die(json_encode(false));
            }
        }
    }

    /**
     * setNewAdvertise method
     *
     * @param null $id
     * @return \Cake\Http\Response|void
     */
    public function setNewAdvertise($id = null)
    {
        $this->getAllData();
    }

    public function detailDevice($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $this->getAllData();
        if (!$this->Devices->exists(['id' => $id])) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);
        $this->set(compact('device'));
    }

    /**
     * setQc method
     *
     * @param null $device_id
     * @param null $user_id
     * @return \Cake\Http\Response|void
     * @internal param null $id
     */
    public function setQc($device_id = null, $user_id = null)
    {
        $device_id = \UrlUtil::_decodeUrl($device_id);
        $user_id = \UrlUtil::_decodeUrl($user_id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->loadModel('LangdingDevices');
        if (!$this->Users->exists(['id' => $user_id])) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        if (!$this->Devices->exists(['id' => $device_id])) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        $device = $this->Devices->get($device_id, [
            'contain' => []
        ]);
        if ($this->request->is('post')) {
            if (!empty($this->request->data['file']['name'])) {
                // upload the file to the server
                $file = array(
                    'file' => $this->request->data['file']
                );
                $fileOK = $this->UploadImage->uploadFiles('upload/files', $file);
                unset($this->request->data['file']);
                unset($this->request->data['device_id']);
                if(array_key_exists('urls', $fileOK)) {
                    $device->path = $fileOK['urls'][0];
                    $device->image_backgroup = $file['file']['name'];
                }
                $device = $this->Devices->patchEntity($device, $this->request->data);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                }
            } else {
                unset($this->request->data['file']);
                $device = $this->Devices->patchEntity($device, $this->request->data);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                }
            }
        }
        $files = $this->Devices->find('all', ['order' => ['Devices.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
        $apt = $this->radompassWord();
        $this->set(compact('device', 'device_id', 'user_id', 'apt'));
    }

    /**
     * @param null $device_id
     * @param null $auth_id
     * @return \Cake\Http\Response|null
     */
    public function viewQc($device_id = null, $auth_id = null)
    {
        $auth_id = \UrlUtil::_decodeUrl($auth_id);
        if (isset($device_id)) {
            $device_id = \UrlUtil::_decodeUrl($device_id);
            if (!$this->Devices->exists(['Devices.id' => $device_id])) {
                return $this->redirect(['action' => 'index']);
            }
            $infor_devices = $this->Devices->get($device_id);
            if (!empty($infor_devices)) {
                $device_group = $this->DeviceGroups->find()
                    ->where(['adgroup_id' => $infor_devices->adgroup_id, 'delete_flag !=' => DELETED])
                    ->first();
                if ($auth_id) {
                    $auths = $this->LogAuths->find()->where(['id' => $auth_id])->select('auth')->first()->toArray();
                    $infor_devices->auth_target = $auths['auth'];
                }
                if (!empty($device_group)) {
                    $infor_devices->langdingpage_id = $device_group->langdingpage_id;
                    $infor_devices->path = $device_group->path;
                    $infor_devices->tile_name = $device_group->tile_name;
                    $infor_devices->apt_device_number = $device_group->number_pass;
                    $infor_devices->message = $device_group->message;
                    $infor_devices->slogan = $device_group->slogan;
                }
            }
            $this->set(compact('infor_devices'));
        } else {
            return $this->redirect(['action' => 'index']);
        }
    }


    /**
     * Add info users
     * @table logs
     *
     * @return json
     *
     */
    public function addLog()
    {
        $this->autoRender= false;
        if ($this->request->getData()) {
            $log = $this->Logs->newEntity();
            if ($this->request->data) {
                $log = $this->Logs->patchEntity($log, $this->request->data);
                if (empty($log->errors())) {
                    if ($this->Logs->save($log)) {
                        die(json_encode(true));
                    } else {
                        die(json_encode(false));
                    }
                }
            }
        }
    }


    /**
     * Add method
     *
     * @param null $apt_key
     * @param null $flag_id
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addNewDevice($apt_key = null, $flag_id = null)
    {
        if (isset($flag_id) && $flag_id == Device::TB_MIRKOTIC) {
            $this->autoRender = false;
            $conn = ConnectionManager::get('default');
            $conn->begin();
            $this->loadModel('Partners');
            $this->autoRender= false;
            $apt_key_check = $this->Devices->find()->where(
                [
                    'apt_key' => $apt_key,
                    'delete_flag !=' => DELETED
                ])
                ->select()
                ->hydrate(true)
                ->first();
            $chk = false;
            if (!empty($apt_key_check)) {
                // data test
                $this->request->data['mac'] = 'f0:4d:a2:8e:1b:37';
                $partner = $this->Partners->find()->where(
                    array(
                        'device_id' => $apt_key_check->id,
                        'client_mac' => isset($this->request->data['mac']) ? $this->request->data['mac']:'',
                    ))
                    ->first();
                $query = $this->Partners->find('all', [])->count();
                if (empty($partner)) {
                    $save_new_pa = array(
                        'device_id' => $apt_key_check->id,
                        'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']: '',
                        'num_clients_connect' => 1,
                        'name' => PARTNER.($query + 1),
                    );
                    $new_partner = $this->Partners->newEntity();
                    $new_partner = $this->Partners->patchEntity($new_partner, $save_new_pa);
                    if (empty($new_partner->errors())) {
                        if (!$this->Partners->save($new_partner)) {
                            $chk = true;
                        }
                    }
                } else {
                    $data_update = array(
                        'num_clients_connect' => $partner['num_clients_connect'] + 1,
                    );
                    $partner = $this->Partners->patchEntity($partner, $data_update);
                    if (empty($partner->errors())){
                        if (!$this->Partners->save($partner)) {
                            $chk = true;
                        }
                    }
                }
                $device = $this->Devices->patchEntity($apt_key_check, $this->request->data);
                $device->type = Device::TB_MIRKOTIC;
                if (empty($device->errors())) {
                    if (!$this->Devices->save($device)) {
                        $chk = true;
                    }
                }
                if (!$chk) {
                    $conn->commit();
                    $this->redirect([
                        'plugin' => null,
                        'controller' => 'Devices',
                        'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id)
                    ]);
                } else {
                    $conn->rollback();
                }
            } else {
                $query = $this->Users->find('all', [])->count();
                $users = $this->Users->newEntity();
                $data_user = [
                    'username' => USER.($query + 1),
                    'email' => USER.($query + 1).'@wifimedia.com',
                    'password' => '123456',
                    'delete_flag' => UN_DELETED,
                    'role' => User::ROLE_TOW
                ];
                $this->request->data['gateway_mac'] = $apt_key;
                $this->request->data['apt_key'] = $apt_key;
                $this->request->data['reg'] = 'xxx';
                $this->request->data['client_mac'] = 'f0:4d:a2:8e:1b:37';
                $this->request->data['ip'] = '192.168.0.1';
                $this->request->data['username'] = 'hoan_nv';
                $this->request->data['link_login'] = 'http://crm.wifimedia.vn/';
                $this->request->data['link_orig'] = 'https://www.facebook.com/';
                $this->request->data['error'] = 'no_error';
                $this->request->data['chap_id'] = '12';
                $this->request->data['chap_challenge'] = 'hoan_nv';
                $this->request->data['link_login_only'] = 'http://crm.wifimedia.vn/';
                $this->request->data['link_orig_esc'] = 'http://crm.wifimedia.vn/';
                $this->request->data['mac_esc'] = 'f0:4d:a2:8e:1b:37';
                $this->request->data['type'] = $flag_id;
                $device = $this->Devices->newEntity();
                $device = $this->Devices->patchEntity($device, $this->request->data);
                $device->delete_flag = UN_DELETED;
                $device->status = UN_DELETED;
                $device->name = DEVICE.($query + 1);
                $users = $this->Users->patchEntity($users, $data_user);
                $query = $this->Partners->find('all', [])->count();
                $data_new_par = array(
                    'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:'',
                    'link_login_only' => isset($this->request->data['link_login_only']) ? $this->request->data['link_login_only']:'',
                    'num_clients_connect' => 1,
                    'name' => PARTNER.($query + 1),
                );
                $partner = $this->Partners->newEntity();
                $partner = $this->Partners->patchEntity($partner, $data_new_par);
                if (empty($users->errors())) {
                    $result = $this->Users->save($users);
                    if ($result) {
                        $device->user_id = $result->id;
                        if (empty($device->errors())) {
                            $data_device = $this->Devices->save($device);
                            if ($data_device) {
                                $partner->device_id = $data_device->id;
                                if (empty($partner->errors())) {
                                    if ($this->Partners->save($partner)) {
                                        $conn->commit();
                                        $this->redirect([
                                            'plugin' => null,
                                            'controller' => 'Devices',
                                            'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($data_device->id)
                                        ]);
                                    }
                                }
                            } else {
                                $conn->rollback();
                            }
                        } else {
                            $conn->rollback();
                        }
                    } else {
                        $conn->rollback();
                    }
                }
            }
        } else {
            $this->autoRender = false;
            $conn = ConnectionManager::get('default');
            $conn->begin();
            $this->loadModel('Partners');
            if ($apt_key != '') {
                $this->autoRender= false;
                $apt_key_check = $this->Devices->find()->where(
                    [
                        'apt_key' => $apt_key,
                        'delete_flag !=' => DELETED
                    ])
                    ->select()
                    ->hydrate(true)
                    ->first();
                $chk = false;
                if (!empty($apt_key_check)) {
                    $partner = $this->Partners->find()->where(
                        array(
                            'device_id' => $apt_key_check->id,
                            'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:''
                        ))
                        ->first();
                    $query = $this->Partners->find('all', [])->count();
                    if (empty($partner)) {
                        $save_new_pa = array(
                            'device_id' => $apt_key_check->id,
                            'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']: '',
                            'auth_target' => isset($this->request->data['auth_target']) ? $this->request->data['auth_target']:'',
                            'num_clients_connect' => 1,
                            'name' => PARTNER.($query + 1),
                            'apt_device_pass' => $this->radompassWord()
                        );
                        $new_partner = $this->Partners->newEntity();
                        $new_partner = $this->Partners->patchEntity($new_partner, $save_new_pa);
                        if (empty($new_partner->errors())) {
                            if (!$this->Partners->save($new_partner)) {
                                $chk = true;
                            }
                        }
                    } else {
                        $data_update = array(
                            'num_clients_connect' => $partner['num_clients_connect'] + 1,
                            'auth_target' => isset($this->request->data['auth_target']) ? $this->request->data['auth_target']:'',
                            'apt_device_pass' => $this->radompassWord()
                        );
                        $partner = $this->Partners->patchEntity($partner, $data_update);
                        if (empty($partner->errors())){
                            if (!$this->Partners->save($partner)) {
                                $chk = true;
                            }
                        }
                    }
                    $data_auth = array(
                        'auth' =>  isset($this->request->data['auth_target']) ? $this->request->data['auth_target']:'',
                        'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']: ''
                    );
                    $auths = $this->LogAuths->newEntity();
                    $auths = $this->LogAuths->patchEntity($auths, $data_auth);
                    if (empty($auths->errors())) {
                        if (!$this->LogAuths->save($auths)) {
                            $chk = true;
                        }
                    }
                    $device = $this->Devices->patchEntity($apt_key_check, $this->request->data);
                    if (empty($device->errors())) {
                        if (!$this->Devices->save($device)) {
                            $chk = true;
                        }
                    }
                    if (!$chk) {
                        $conn->commit();
                        $result = $this->LogAuths->find('all',['fields'=>'id'])->last();
                        $record_log_auth_id = $result->id;
                        $this->redirect([
                            'plugin' => null,
                            'controller' => 'Devices',
                            'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id) . '/' . \UrlUtil::_encodeUrl($record_log_auth_id)
                        ]);
                    } else {
                        $conn->rollback();
                    }
                } else {
                    $query = $this->Users->find('all', [])->count();
                    $users = $this->Users->newEntity();
                    $data_user = [
                        'username' => USER.($query + 1),
                        'email' => USER.($query + 1).'@wifimedia.com',
                        'password' => '123456',
                        'delete_flag' => UN_DELETED,
                        'role' => User::ROLE_TOW
                    ];
                    $device = $this->Devices->newEntity();
                    $device = $this->Devices->patchEntity($device, $this->request->data);
                    $device->delete_flag = UN_DELETED;
                    $device->status = UN_DELETED;
                    $device->name = DEVICE.($query + 1);
                    $device->apt_device_number = $this->radompassWord();
                    $device->apt_key = isset($this->request->data['gateway_mac']) ? $this->request->data['gateway_mac'] : $apt_key;
                    $users = $this->Users->patchEntity($users, $data_user);
                    $query = $this->Partners->find('all', [])->count();
                    $data_new_par = array(
                        'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:'',
                        'auth_target' => isset($this->request->data['auth_target']) ? $this->request->data['auth_target']:'',
                        'num_clients_connect' => 1,
                        'name' => PARTNER.($query + 1),
                        'apt_device_pass' => $this->radompassWord()
                    );
                    $partner = $this->Partners->newEntity();
                    $partner = $this->Partners->patchEntity($partner, $data_new_par);
                    if (empty($users->errors())) {
                        $result = $this->Users->save($users);
                        if ($result) {
                            $device->user_id = $result->id;
                            if (empty($device->errors())) {
                                $data_device = $this->Devices->save($device);
                                if ($data_device) {
                                    $partner->device_id = $data_device->id;
                                    if (empty($partner->errors())) {
                                        if ($this->Partners->save($partner)) {
                                            $conn->commit();
                                            $this->redirect([
                                                'plugin' => null,
                                                'controller' => 'Devices',
                                                'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($data_device->id)
                                            ]);
                                        }
                                    }
                                } else {
                                    $conn->rollback();
                                }
                            } else {
                                $conn->rollback();
                            }
                        } else {
                            $conn->rollback();
                        }
                    }
                }
            } else {
                $conn->rollback();
            }
        }

    }

    public function setQcMirkotic($device_id = null, $user_id = null)
    {
        $device_id = \UrlUtil::_decodeUrl($device_id);
        $user_id = \UrlUtil::_decodeUrl($user_id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->loadModel('LangdingDevices');
        if (!$this->Users->exists(['id' => $user_id])) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        if (!$this->Devices->exists(['id' => $device_id])) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        $device = $this->Devices->get($device_id, [
            'contain' => []
        ]);
        if ($this->request->is('post')) {
            if (!empty($this->request->data['file'])) {
                // upload the file to the server
                $new_arr = array();
                $list_file = $this->request->getData('file');
                foreach ($list_file as $k => $vl) {
                    $new_arr[]['file'] = $vl;

                }
                $fileOK = array();
                foreach ($new_arr as $k => $vl) {
                    $fileOK[$k] = $this->UploadImage->uploadFiles('upload/files', $vl);
                }
                $result = Hash::extract($fileOK, '{n}.urls');
                $path = call_user_func_array('array_merge', $result);
                $image_up_load = Hash::extract($list_file, '{n}.name');
                unset($this->request->data['file']);
                unset($this->request->data['device_id']);
                $device->path = implode(',', $path);
                $device->image_backgroup = implode(',', $image_up_load);
                $device = $this->Devices->patchEntity($device, $this->request->data);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                }
            } else {
                unset($this->request->data['file']);
                $device = $this->Devices->patchEntity($device, $this->request->data);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $user_id]);
                }
            }
        }
        $files = $this->Devices->find('all', ['order' => ['Devices.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
        $apt = $this->radompassWord();
        $this->set(compact('device', 'device_id', 'user_id', 'apt'));
    }
}
