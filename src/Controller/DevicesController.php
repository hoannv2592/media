<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\LangdingDevicesTable $LangdingDevices
 * @property \App\Model\Table\DevicesTable $Devices
 * @property \App\Model\Table\LogsTable $Logs
 * @property \App\Model\Table\FileAttachmentsTable $FileAttachments
 *
 * @method \App\Model\Entity\Device[] paginate($object = null, array $settings = [])
 *
 *  * @property  \App\Controller\Component\UploadImageComponent $UploadImage
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
        $this->loadComponent('UploadImage');

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
                        ->where(['Devices.delete_flag !=' => 1]);
                }],
//                'conditions' => array(
//                    'Devices.status ' => NO_LANDING
//                )
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
//                    'Devices.status ' => NO_LANDING
                ],
            ])->toArray();
        }
        $this->set(compact('devices'));


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
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->Devices->exists($id)) {
            $this->redirect(array('controller' => 'Devices', 'action' => 'index'));
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
                    return $this->redirect(['action' => 'edit' . '/' . $id]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit' . '/' . $id]);
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
        $this->getAllData();
        if (!$this->Devices->exists($id)) {
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
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->loadModel('LangdingDevices');
        $uploadData = '';
        if (!$this->Users->exists($user_id)) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        if (!$this->Devices->exists($device_id)) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        $device = $this->Devices->get($device_id, [
            'contain' => []
        ]);
        if ($this->request->is('post')) {
            $data_update = array(
                'device_id' => $device_id,
                'user_id' => $user_id,
                'status' => HAS_LANDING,
                'langdingpage_id' => $this->request->getData('langdingpage_id')
            );
            $device = $this->Devices->patchEntity($device, $data_update);
            $this->set('uploadData', $uploadData);
            $this->set(compact('device', 'data_update'));
            $this->render('/Devices/image_upload');
        }

        $files = $this->Devices->find('all', ['order' => ['Devices.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
            $this->set('filesRowNum',$filesRowNum);
        $this->set(compact('device', 'device_id', 'user_id'));
    }


    /**
     *
     * imageUploadQC method
     * display upload backgroup and title
     *
     * @author Hoannv
     */
    public function imageUploadQC()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'get']);
        if ($this->request->data) {
            $device = $this->Devices->get($this->request->getData('device_id'));
            if (!empty($this->request->data['file']['name'])) {
                // upload the file to the server
                $file = array(
                  'file' => $this->request->data['file']
                );
                $fileOK = $this->UploadImage->uploadFiles('upload/files', $file);
                $data_update = array(
                    'user_id' => $this->request->getData('user_id'),
                    'status' => HAS_LANDING,
                    'langdingpage_id' => $this->request->getData('langdingpage_id'),
                    'tile_name' => $this->request->getData('tile_name'),
                );
                $uploadData = $this->FileAttachments->newEntity();
                if(array_key_exists('urls', $fileOK)) {
                    // save the url in the form data
                    $uploadData->path = $fileOK['urls'][0];
                    $data_update['path'] = $fileOK['urls'][0];
                    $data_update['image_backgroup'] = $file['file']['name'];
                }
                $device = $this->Devices->patchEntity($device, $data_update);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $data_update['user_id']]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $data_update['user_id']]);
                }
            } else {
                $tile_name = array(
                    'tile_name' => $this->request->data['tile_name']
                );
                $device = $this->Devices->patchEntity($device, $tile_name);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $data_update['user_id']]);
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc' . '/' . $this->request->getData('device_id') . '/' . $data_update['user_id']]);
                }
            }
        }
    }

    /**
     * @param null $device_id
     * @internal param null $user_id
     * @internal param null $langdingpage_id
     */
    public function viewQc($device_id = null)
    {
        $infor_devices = $this->Devices->get($device_id);
        $this->set(compact('infor_devices'));
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
            if ($this->request->is('post')) {
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
}
