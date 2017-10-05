<?php

namespace Api\Controller;

use App\Controller\AppController;
use App\Model\Entity\Device;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\LangdingDevicesTable $LangdingDevices
 * @property \App\Model\Table\DevicesTable $Devices
 *
 * @method \App\Model\Entity\Device[] paginate($object = null, array $settings = [])
 */
class DevicesController extends AppController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
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
            $devices = $this->Devices->find('all',[
                'contain'  => [
                    'Users' => function ($q) {
                        return $q
                        ->where(['Devices.delete_flag !=' => 1 ]);
                    }
                ]
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all',[
                'contain'  => [
                    'Users' => function ($q) {
                        return $q
                            ->where([
                                'Devices.delete_flag !=' => 1,
                            ]);
                    }
                ],
                'conditions' => [
                    'Devices.user_id ' => $login['id'],
                ],
            ])->toArray();
        }
        $this->set(compact('devices'));


    }


    /**
     *
     *
     */
    public function loadDeviceNoLangdingpage()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $devices = $this->Devices->find('all',[
                'contain'  => ['Users' => function ($q) {
                    return $q
                        ->where(['Devices.delete_flag !=' => 1 ]);
                }],
                'conditions' => array(
                    'Devices.status ' => NO_LANDING
                )
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all',[
                'contain'  => ['Users' => function ($q) {
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
     *
     */
    public function loadDeviceHasLangdingpage()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $devices = $this->Devices->find('all',[
                'contain'  => ['Users' => function ($q) {
                    return $q
                        ->where(['Devices.delete_flag !=' => 1 ]);
                }],
                'conditions' => array(
                    'Devices.status ' => HAS_LANDING
                )
            ])->toArray();
        } else {
            $devices = $this->Devices->find('all',[
                'contain'  => ['Users' => function ($q) {
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
     * @param null $apt_key
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($apt_key = null)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($apt_key != '') {
            $this->autoRender= false;
            $apt_key_check = $this->Devices->find()->where(['apt_key' => $apt_key])
                ->select()
                ->hydrate(true)
                ->first();
            if (!empty($apt_key_check)) {
                $device = $this->Devices->patchEntity($apt_key_check, $this->request->data);
                if (empty($device->errors())) {
                    if ($this->Devices->save($device)) {
                        $conn->commit();
                        $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . $device->id]);
                    } else {
                        $conn->rollback();
                    }
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
                if (empty($users->errors())) {
                    $result = $this->Users->save($users);
                    if ($result) {
                        $device->user_id = $result->id;
                        if (empty($device->errors())) {
                            $data_device = $this->Devices->save($device);
                            if ($data_device) {
                                $conn->commit();
                                $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . $data_device->id]);
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
                    return $this->redirect(['action' => 'edit'.'/'.$id]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The device could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit'.'/'.$id]);
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
        $device = $this->Devices->get($id,[
            'contain' =>[]
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
        if (!$this->Users->exists($user_id)) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        if (!$this->Devices->exists($device_id)) {
            $this->redirect(['Controller' => 'Devices', 'action' => 'index']);
        }
        $device = $this->Devices->get($device_id, [
            'contain' => []
        ]);
        if ($this->request->getData()) {
            $data_update = array(
                'user_id' => $user_id,
                'status' => HAS_LANDING,
                'langdingpage_id' => $this->request->getData('langdingpage_id')
            );
            $device = $this->Devices->patchEntity($device, $data_update);
            if (empty($device->errors())) {
                if ($this->Devices->save($device)) {
                    $conn->commit();
                    $this->redirect(['action' => 'loadDeviceHasLangdingpage']);
                } else {
                    $conn->rollback();
                    $this->redirect(['Controller' => 'Devices', 'action' => 'setQc'.'/'.$device_id.'/'.$user_id]);
                }
            } else {
                $conn->rollback();
                $this->redirect(['Controller' => 'Devices', 'action' => 'setQc'.'/'.$device_id.'/'.$user_id]);
            }
        }
        $this->set(compact('device', 'device_id', 'user_id'));
    }


    /**
     * addDevices method
     * when remote devices
     * @param null $apt_key
     *
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addDevices($apt_key = null)
    {
        $this->autoRender = false;

    }

    public function radom()
    {
        $length = 7;
        $strRandom = "";
        $sum = 0;
        $chars = "0123456789";
        $size = strlen($chars);
        //xử lý lấy chuỗi có 7 kí tự trước, và tính tổng 7 kí tự này
        for ($j = 0; $j < $length; $j++) {
            $rdcheck = $chars[rand(0, $size - 1)];
            $strRandom .= $rdcheck;
            $sum += $rdcheck;
        }
        // xử lý kí chọn số cuối cùng để đúng quy luat
        pr($sum);
        $number_add = substr($sum, -1, 1);
        if($number_add == 0){
            $strRandom = $strRandom.$number_add;
        }else{
            $number_add = 10 - substr($sum, -1, 1);
            $strRandom = $strRandom.$number_add;
        }
        //return $strRandom la số cần tìm
        $this->set('strRandom', $strRandom);
    }
}
