<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Adgroups Controller
 *
 * @property \App\Model\Table\AdgroupsTable $Adgroups
 * @property \App\Model\Table\DevicesTable $Devices
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 * @property \App\Model\Table\AdgroupChangeHistoriesTable $AdgroupChangeHistories
 * @property \App\Model\Table\AdgroupChangeHistory $AdgroupChangeHistory
 * @property  \App\Controller\Component\UploadImageComponent $UploadImage
 *
 * @method \App\Model\Entity\Adgroup[] paginate($object = null, array $settings = [])
 */
class AdgroupsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadComponent('UploadImage');

        // Load Files model
        $this->loadModel('Logs');
        $this->loadModel('DeviceGroups');
        $this->loadModel('FileAttachments');
        $this->loadModel('AdgroupChangeHistories');
    }

    public function beforeRender(Event $event)
    {
        $this->loadModel('Users');
        $this->loadModel('Devices');
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->Auth->user();
        if ($users['role'] == User::ROLE_ONE) {
            $adgroups = $this->Adgroups->find('all',[
                'contain'  => [
                    'Users' => function ($q) {
                        return $q
                            ->select([
                                'Users.id','Users.username'
                            ]);
                    }
                ],
                'conditions' => [
                    'Adgroups.delete_flag !=' => DELETED,
                ]
            ])->order(['Adgroups.id' => 'DESC'])
                ->toArray();
        } else {
            $adgroups = $this->Adgroups->find('all',[
                'contain'  => [
                    'Users' => function ($q) {
                        return $q
                            ->select([
                                'Users.id','Users.username'
                            ]);
                    }
                ],
                'conditions' => [
                    'Adgroups.delete_flag !=' => DELETED,
                    'Adgroups.user_id_group' => $users['id']
                ]
            ])->order(['Adgroups.id' => 'DESC'])
                ->toArray();
        }
        $flag = false;
        if (!empty($adgroups)) {
            $device_id = array();
            foreach ($adgroups as $k => $adgroup) {
                $device_id[] = $adgroup->device_id;
            }
            $show = array();
            foreach ($device_id as $k => $vl) {
                $show[] = json_decode($vl);
            }
            $merged = call_user_func_array('array_merge', $show);
            $devices = $this->Devices->find('all') ->where(['id NOT IN' => $merged])->combine('id','name')->toArray();
            if (empty($devices)) {
                $flag = true;
            }
        }
        $this->getAllData();
        $this->set(compact('adgroups', 'flag'));
        $this->set('_serialize', ['adgroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Adgroup id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adgroup = $this->Adgroups->get($id, [
            'contain' => []
        ]);

        $this->set('adgroup', $adgroup);
        $this->set('_serialize', ['adgroup']);
    }

    /**
     * Add method group
     * @author hoannv
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->getAllData();
        $user = $this->Auth->user();
        $groups = $this->Adgroups->find()
            ->select(['id', 'device_id'])
            ->where(['delete_flag !=' => DELETED])
            ->hydrate(false)
            ->combine('id', 'device_id')->toList();
        if (!empty($groups)) {
            $device_id = array();
            foreach ($groups as $k => $vl) {
                $device_id[] = json_decode($vl);
            }
            $merged = call_user_func_array('array_merge', $device_id);
            if ($user['role'] == User::ROLE_ONE) {
                $conditions = array(
                    'id NOT IN' => $merged,
                    'Devices.delete_flag !=' => DELETED,
                );
            } else {
                $conditions = array(
                    'id NOT IN' => $merged,
                    'delete_flag !=' => DELETED,
                    'user_id' => $user['id']
                );
            }
            $devices = $this->Devices->find('all')
                ->where($conditions)
                ->combine('id','name')->toArray();
        } else {
            if ($user['role'] == User::ROLE_ONE) {
                $conditions = array(
                    'Devices.delete_flag !=' => DELETED,
                );
            } else {
                $conditions = array(
                    'Devices.delete_flag !=' => DELETED,
                    'user_id' => $user['id']
                );
            }
            $devices = $this->Devices->find()
                ->where($conditions)
                ->select(['Devices.id', 'Devices.name'])
                ->order(['Devices.id'=> 'DESC'])
                ->combine('id', 'name')->toArray();
        }
        $adgroup = $this->Adgroups->newEntity();
        if ($this->request->is('post')) {
            $packages = array_values($this->request->data['packages']);
            $this->request->data['packages'] = json_encode($packages);
            $listNameDevice = ($this->getNameDevice($this->request->getData()['device_id']));
            $devices = $this->Devices->find()
                ->where(['id IN' => $this->request->getData()['device_id']])->select(['id'])
                ->hydrate(false)->toList();
            // Common Usage:
            $result_id_devices = Hash::extract($devices, '{n}.id');
            $data_service = array();

            if (!empty($this->request->data['logo_image']['error'] != 4)) {
                $list_file['file'] = $this->request->getData('logo_image');
                $fileOK = $this->UploadImage->uploadFiles('upload/files', $list_file);
                $path = $fileOK['urls'][0];
                $image_up_load = $list_file['file']['name'];
                if ($path != '') {
                    $this->request->data['path_logo'] = $path;
                }
                if ($image_up_load != '') {
                    $this->request->data['image_logo'] = $image_up_load;
                }
                unset($this->request->data['logo_image']);
            } else {
                unset($this->request->data['logo_image']);
            }
            if (!empty($this->request->data['file'][0]['error'] != 4)) {
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
            } else {
                $path = '';
                $image_up_load = '';
            }
            if ($path != '') {
                $data_service['path'] = implode(',', $path);
            }
            if ($image_up_load != '') {
                $data_service['image_backgroup'] = implode(',', $image_up_load);
            }
            $data_service['tile_name'] = $this->request->getData()['tile_name'];
            $data_service['landing_group_id'] = $this->request->getData()['langdingpage_id'];
            $data_service['apt_device_number'] = $this->request->getData()['apt_device_number'];
            //$this->publishall($result_id_devices, $data_service);
            $data_group_devices = array(
                'device_id' => json_encode(array_values($this->request->getData()['device_id'])),
                'langdingpage_id' => $this->request->getData()['langdingpage_id'],
                'back_ground' => isset($data_service['image_backgroup']) ? $data_service['image_backgroup']:'',
                'number_pass' => $this->request->getData()['apt_device_number'],
                'tile_name' => $this->request->getData()['tile_name'],
                'device_name' => ($listNameDevice),
                'path' => isset($data_service['path']) ? $data_service['path'] : '',
                'address' => $this->request->getData()['address'],
                'user_id_group' => isset($this->request->getData()['user_id_group']) ? $this->request->getData()['user_id_group']:'',
                'path_logo' => isset($this->request->data['path_logo']) ? $this->request->data['path_logo']:'',
                'hidden_connect' => isset($this->request->data['hidden_connect']) ? $this->request->data['hidden_connect']:'',
                'title_connect' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'image_logo' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'tile_congratulations_return' => isset($this->request->data['tile_congratulations_return']) ? $this->request->data['tile_congratulations_return']:'',
                'packages' => isset($this->request->data['packages']) ? $this->request->data['packages']:'',
            );

            $device_group = $this->DeviceGroups->newEntity();
            $device_group= $this->DeviceGroups->patchEntity($device_group, $data_group_devices );
            $data_group = array(
                'name' => $this->request->getData()['name'],
                'device_id' => json_encode(array_values($this->request->getData()['device_id'])),
                'device_name' => ($listNameDevice),
                'description' => $this->request->getData()['description'],
                'langdingpage_id' => $this->request->getData()['langdingpage_id'],
                'path' => isset($data_service['path']) ? $data_service['path'] : '',
                'image_backgroup' => isset($data_service['image_backgroup']) ? $data_service['image_backgroup']:'',
                'tile_name' => $this->request->getData()['tile_name'],
                'apt_device_number' => $this->request->getData()['apt_device_number'],
                'address' => $this->request->getData()['address'],
                'user_id_group' => isset($this->request->getData()['user_id_group']) ? $this->request->getData()['user_id_group']:'',
                'path_logo' => isset($this->request->data['path_logo']) ? $this->request->data['path_logo']:'',
                'hidden_connect' => isset($this->request->data['hidden_connect']) ? $this->request->data['hidden_connect']:'',
                'title_connect' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'image_logo' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'tile_congratulations_return' => isset($this->request->data['tile_congratulations_return']) ? $this->request->data['tile_congratulations_return']:'',
                'packages' => isset($this->request->data['packages']) ? $this->request->data['packages']:'',
            );
            $adgroup = $this->Adgroups->patchEntity($adgroup, $data_group);
            $adgroup->delete_flag = UN_DELETED;
            if (empty($adgroup->errors())) {
                $save_ad = $this->Adgroups->save($adgroup);
                if ($save_ad) {
                    $group_id = $save_ad->id;
                    //todo update data devices add to group
                    $device_adgroup = array(
                        'adgroup_id' => $group_id,
//                        'user_id' => $data_group['user_id_group']
                    );
                    $this->publishall($result_id_devices, $device_adgroup);
                    $device_group->adgroup_id = $group_id;
                    if (empty($device_group->errors())) {
                        if ($this->DeviceGroups->save($device_group)) {
                            $conn->commit();
                            $this->redirect(['action' => 'index']);
                        } else {
                            $conn->rollback();
                            $this->redirect(['action' => 'add']);
                        }
                    }
                } else {
                    $conn->rollback();
                    $this->redirect(['action' => 'add']);
                }
            } else {
                $conn->rollback();
                $this->redirect(['action' => 'add']);
            }
        }
        $apt_device_number = $this->radompassWord();
        $this->set(compact('adgroup', 'apt_device_number', 'devices'));
        $this->set('_serialize', ['adgroup']);
    }

    /**
     * getNameUser method
     *
     * @param array $arr
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function getNameDevice(&$arr = array())
    {
        if (!empty($arr)) {
            $arr = $this->Devices->find()
            ->where(['id' => $arr],['id' => 'integer[]'])
            ->combine('id','name')
            ->toArray();
        }
        return json_encode(($arr));
    }
    /**
     * Edit method
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->getData()) {
            $adgroups = $this->Adgroups->get($this->request->getData('id'), [
                'contain' => []
            ]);
            $adgroups = $this->Adgroups->patchEntity($adgroups, $this->request->getData());
            if (empty($adgroups->errors())) {
                if ($this->Adgroups->save($adgroups)) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
            return $this->redirect(['action' => 'index']);
        }
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
            $adgroups = $this->Adgroups->get($this->request->getData('id'));
            $device_group = $this->DeviceGroups->find()
                ->where(['adgroup_id' => $this->request->getData('id'), 'device_id' => $adgroups->device_id, 'delete_flag !=' => DELETED])
                ->select('id')
                ->first()
                ->toArray()
            ;
            $this->removeAdgroupIdDevice(json_decode($adgroups->device_id));
            $result_change[] = array(
                'fields' => 'delete_flag',
                'from' => 'chưa xóa',
                'to' => 'đã xóa'
            );
            $change_log = array(
                'adgroup_id' => $adgroups->id,
                'contents' => json_encode($result_change, true)
            );
            $group = $this->DeviceGroups->get($device_group['id']);
            $group->delete_flag = true;
            $adgroups->delete_flag = true;
            $AdgroupChangeHistoriesTable = $this->AdgroupChangeHistories->newEntity();
            $AdgroupChangeHistoriesTable = $this->AdgroupChangeHistories->patchEntity($AdgroupChangeHistoriesTable, $change_log);
            $chk = true;
            if($this->Adgroups->save($adgroups)){
                if (!$this->AdgroupChangeHistories->save($AdgroupChangeHistoriesTable)) {
                    $chk = false;
                }
                if (!$this->DeviceGroups->save($group)) {
                    $chk = false;
                }

                if ($chk) {
                    $conn->commit();
                    die(json_encode(true));
                } else {
                    $conn->rollback();
                    die(json_encode(false));
                }

            } else {
                $conn->rollback();
                die(json_encode(false));
            }
        }
    }

    /**
     * load method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function load()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->Adgroups->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'id' => $this->request->getData('id'),
                    'delete_flag !=' => DELETED
                ))
            );
            $row = $query->first()->toArray();
            if ($row) {
                $dataExist = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description']
                );
                die(json_encode($dataExist));
            }
        }
    }

    /**
     * isNameExist method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function isNameExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('backup_name') != $this->request->getData('name')) {
                $query = $this->Adgroups->find('all', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'name' => $this->request->getData('name'),
                        'delete_flag !=' => DELETED
                    )));


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
            $query = $this->Adgroups->find('all', array(
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
     * update for group ...
     * @author hoannv
     *
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function detailGroup($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->Adgroups->exists(['id' => $id])) {
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Auth->user();
        $this->getAllData();
        $adgroup = $this->Adgroups->get($id);
        $groups = $this->Adgroups->find()
            ->select(['id', 'device_id'])
            ->where(['delete_flag !=' => DELETED])
            ->hydrate(false)
            ->combine('id', 'device_id')->toList();
        if (!empty($groups)) {
            $list_device_id = array();
            foreach ($groups as $group) {
                if ($adgroup->device_id != $group) {
                    $list_device_id[] = ($group);
                }
            }

            $device_id = array();
            foreach ($list_device_id as $k => $vl) {
                $device_id[] = json_decode($vl);
            }
            $device_list_id = json_decode($adgroup['device_id']);
            if (!empty($device_id)) {
                $merged = call_user_func_array('array_merge', $device_id);
                if ($user['role'] == User::ROLE_ONE) {
                    $conditions = array(
                        'id NOT IN' => $merged,
                        'delete_flag !=' => DELETED,
                    );
                } else {
                    $conditions = array(
//                        'id NOT IN' => $merged,
                        'delete_flag !=' => DELETED,
                        'id IN' => $device_list_id
                    );
                }
                $devices = $this->Devices->find('all')
                    ->where($conditions)
                    ->combine('id','name')->toArray()
                ;
            } else {
                if ($user['role'] == User::ROLE_ONE) {
                    $conditions = array(
                        'Devices.delete_flag !=' => DELETED,
                    );
                } else {
                    $conditions = array(
                        'Devices.delete_flag !=' => DELETED,
                        'id IN' => $device_list_id
                    );
                }
                $devices = $this->Devices->find()
                    ->where($conditions)
                    ->select(['Devices.id', 'Devices.name'])
                    ->order(['Devices.id'=> 'DESC'])
                    ->combine('id', 'name')
                    ->toArray()
                ;
            }
        } else {
            if ($user['role'] == User::ROLE_ONE) {
                $conditions = array(
                    'Devices.delete_flag !=' => DELETED,
                );
            } else {
                $conditions = array(
                    'Devices.delete_flag !=' => DELETED,
                    'user_id' => $user['id']
                );
            }
            $devices = $this->Devices->find()
                ->where($conditions)
                ->select(['Devices.id', 'Devices.name'])
                ->order(['Devices.id'=> 'DESC'])
                ->combine('id', 'name')->toArray()
            ;
        }
        $device_group_id = $this->DeviceGroups->find()
            ->where(['adgroup_id' => $id, 'device_id' => $adgroup->device_id, 'delete_flag !=' => DELETED])
            ->select(['id'])->first()->toArray();
        $before_device = json_decode($adgroup->device_id);
        if ($this->request->is('post')) {
            $packages = array_values($this->request->data['packages']);
            $this->request->data['packages'] = json_encode($packages);
            $listUserid = $this->getNameDevice($this->request->getData()['device_id']);
            $data_group = array(
                'device_name' => $listUserid,
                'device_id' => json_encode($this->request->getData()['device_id']),
                'name' => $this->request->getData()['name'],
                'tile_name' => $this->request->getData()['tile_name'],
                'description' => $this->request->getData()['description'],
                'langdingpage_id' => $this->request->getData()['langdingpage_id'],
                'apt_device_number' => $this->request->getData()['apt_device_number'],
                'address' => $this->request->getData()['address'],
                'hidden_connect' => isset($this->request->data['hidden_connect']) ? $this->request->data['hidden_connect']:'',
                'title_campaign' => isset($this->request->data['title_campaign']) ? $this->request->data['title_campaign']:'',
                'title_connect' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'tile_congratulations_return' => isset($this->request->data['tile_congratulations_return']) ? $this->request->data['tile_congratulations_return']:'',
                'packages' => isset($this->request->data['packages']) ? $this->request->data['packages']:'',
            );

            if (!empty($this->request->data['logo_image']['error'] != 4)) {
                $list_file['file'] = $this->request->getData('logo_image');
                $fileOK = $this->UploadImage->uploadFiles('upload/files', $list_file);
                $path = $fileOK['urls'][0];
                $image_up_load = $list_file['file']['name'];
                if ($path != '') {
                    $this->request->data['path_logo'] = $path;
                }
                if ($image_up_load != '') {
                    $this->request->data['image_logo'] = $image_up_load;
                }
                unset($this->request->data['logo_image']);
            } else {
                unset($this->request->data['logo_image']);
            }
            $data_group['path_logo'] = isset($this->request->data['path_logo']) ? $this->request->data['path_logo']:'';
            $data_group['image_logo'] = isset($this->request->data['image_logo']) ? $this->request->data['image_logo']:'';
            if (!empty($this->request->data['file'][0]['error'] != 4)) {
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
                if ($path != '') {
                    $data_group['path'] = implode(',', $path);
                }
                if ($image_up_load != '') {
                    $data_group['image_backgroup'] = implode(',', $image_up_load);
                }
                unset($this->request->data['file']);
            } else {
                unset($this->request->data['file']);
            }
            // Common Usage:
            $device_group = array(
                'id' => $device_group_id['id'],
                'adgroup_id' => $id,
                'device_id' => json_encode($this->request->getData()['device_id']),
                'langdingpage_id' => $this->request->getData()['langdingpage_id'],
                'back_ground' => isset($data_group['image_backgroup']) ? $data_group['image_backgroup'] : $adgroup->image_backgroup ,
                'path' => isset($data_group['path']) ? $data_group['path']: $adgroup->path ,
                'number_pass' => $this->request->getData()['apt_device_number'],
                'tile_name' => $this->request->getData()['tile_name'],
                'device_name' => $listUserid,
                'address' => $this->request->getData()['address'],
                'hidden_connect' => isset($this->request->data['hidden_connect']) ? $this->request->data['hidden_connect']:'',
                'title_connect' => isset($this->request->data['title_connect']) ? $this->request->data['title_connect']:'',
                'path_logo' => isset($this->request->data['path_logo']) ? $this->request->data['path_logo']:'',
                'image_logo' => isset($this->request->data['image_logo']) ? $this->request->data['image_logo']:'',
                'title_campaign' => isset($this->request->data['title_campaign']) ? $this->request->data['title_campaign']:'',
                'tile_congratulations_return' => isset($this->request->data['tile_congratulations_return']) ? $this->request->data['tile_congratulations_return']:'',
                'packages' => isset($this->request->data['packages']) ? $this->request->data['packages']:'',
            );
            if ($user['role'] == User::ROLE_ONE) {
                $data_group['user_id_group'] = isset($this->request->getData()['user_id_group']) ? $this->request->getData()['user_id_group']:'';
                $device_group['user_id_group'] = isset($this->request->getData()['user_id_group']) ? $this->request->getData()['user_id_group']:'';
            } else {
                $data_group['user_id_group'] =  isset($adgroup->user_id_group) ? $adgroup->user_id_group:'';
                $device_group['user_id_group'] =  isset($adgroup->user_id_group) ? $adgroup->user_id_group:'';
            }
            $list_remove_device_id = array();
            foreach ($before_device as $k => $vl) {
                if (!in_array($vl, $this->request->getData()['device_id'])) {
                    $list_remove_device_id[] = $vl;
                }
            }
            //todo update data devices add to group
            $result_id_devices = $this->request->getData()['device_id'];
            $device_adgroup = array(
                'adgroup_id' => $id,
                //'user_id' => $device_group['user_id_group']
            );
            $this->publishall($result_id_devices, $device_adgroup);
            $this->removeAdgroupIdDevice($list_remove_device_id);
            $log_before = $adgroup->toArray();
            unset($log_before['created']);
            unset($log_before['modified']);
            $group = $this->DeviceGroups->get($device_group_id['id']);
            $group = $this->DeviceGroups->patchEntity($group, $device_group);
            $adgroup = $this->Adgroups->patchEntity($adgroup, $data_group);
            $log_after = $adgroup->toArray();
            unset($log_after['created']);
            unset($log_after['modified']);
            $diffs = array_diff_assoc($log_before, $log_after);
            $result_change = array();
            if (!empty($diffs)) {
                foreach ($diffs as $k => $vl) {
                    $result_change[] = array(
                        'fields' => $k,
                        'from' => $vl,
                        'to' => $log_after[$k]
                    );
                }
            }
            $change_log = array(
                'adgroup_id' => $adgroup->id,
                'contents' => json_encode($result_change, true)
            );
            $AdgroupChangeHistoriesTable = $this->AdgroupChangeHistories->newEntity();
            $AdgroupChangeHistoriesTable = $this->AdgroupChangeHistories->patchEntity($AdgroupChangeHistoriesTable, $change_log);
            $chk = true;
            if (empty($adgroup->errors())) {
                if ($this->Adgroups->save($adgroup)) {
                    if (!$this->AdgroupChangeHistories->save($AdgroupChangeHistoriesTable)) {
                        $chk = false;
                    }
                    if (!$this->DeviceGroups->save($group)) {
                        $chk = false;
                    }
                    if ($chk) {
                        $conn->commit();
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                        return $this->redirect(['action' => 'detailGroup'.'/'.\UrlUtil::_encodeUrl($id)]);
                    }
                } else {
                    $conn->rollback();
                    return $this->redirect(['action' => 'detailGroup'.'/'.\UrlUtil::_encodeUrl($id)]);
                }
            } else {
                $conn->rollback();
                return $this->redirect(['action' => 'detailGroup'.'/'.\UrlUtil::_encodeUrl($id)]);
            }
        }
        $apt_device_number = $this->radompassWord();
        $this->set(compact('adgroup','apt_device_number', 'devices', 'list_users'));
    }

    /**
     * Update langding group_id_ for devices
     *
     * @param $list_id
     * @param $lan
     * @return bool
     */
    public function publishall($list_id, $lan)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $chk = true;
        $device = $this->Devices->find('all')->where(['id IN' => $list_id])->toArray();
        foreach ($device as $item) {
            $device = $this->Devices->patchEntity($item, $lan);
            if (empty($device->errors())) {
                if (!$this->Devices->save($device)) {
                    $chk = false;
                }
            }
        }
         if ($chk) {
             $conn->commit();
             return true;
         } else {
            $conn->rollback();
             return false;
         }
    }

    /**
     * @param $device_id
     * @return bool
     */
    public function removeAdgroupIdDevice($device_id)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $chk = true;
        $adgroup = array(
            'adgroup_id' => ''
        );
        foreach ($device_id as $item) {
            $device = $this->Devices->get($item);
            $device = $this->Devices->patchEntity($device, $adgroup);
            if (empty($device->errors())) {
                if (!$this->Devices->save($device)) {
                    $chk = false;
                }
            }
        }
        if ($chk) {
            $conn->commit();
            return true;
        } else {
            $conn->rollback();
            return false;
        }
    }

    public function getUser()
    {
        $this->autoRender = false;
        if ($this->request->data) {
            $list_device_id = $this->request->getData('id');
            $role = $this->request->getData('role');
            if (!empty($list_device_id)) {
                $user_id = $this->Devices->find()
                    ->where(['id In' => $list_device_id, 'delete_flag !=' => DELETED])
                    ->select(['id','user_id'])
                    ->combine('id', 'user_id')
                    ->toArray();
//                if ($role == User::ROLE_ONE) {
//                    $conditions = array(
//                        'delete_flag !=' => DELETED,
//                        'id NOT IN' => 1,
//                        'id IN' => $user_id,
//                    );
//                } else {
//                    $conditions = array(
//                        'id IN' => $user_id,
//                        'delete_flag !=' => DELETED
//                    );
//                }
                $conditions = array(
                    'id IN' => $user_id,
                    'delete_flag !=' => DELETED
                );
                $username = $this->Users->find()
                    ->select(['id', 'username'])
                    ->where($conditions)
                    ->combine('id', 'username')
                    ->toArray();
                die(json_encode($username));
            } else {
                die(json_encode(array()));
            }
        }
    }
}

