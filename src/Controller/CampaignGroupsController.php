<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Utility\Hash;
/**
 * CampaignGroups Controller
 *
 * @property \App\Model\Table\CampaignGroupsTable $CampaignGroups
 * @property  \App\Controller\Component\UploadImageComponent $UploadImage
 * @property \App\Model\Table\PartnerVouchersTable $PartnerVouchers
 * @property \App\Model\Table\PartnerVoucherLogsTable $PartnerVoucherLogs
 *
 * @method \App\Model\Entity\CampaignGroup[] paginate($object = null, array $settings = [])
 */
class CampaignGroupsController extends AppController
{

    public function beforeRender(Event $event)
    {
        $this->loadModel('Users');
        $this->loadModel('Devices');
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }

    public function initialize()
    {
        parent::initialize();
        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadComponent('UploadImage');

        // Load Files model
        $this->loadModel('Logs');
        $this->loadModel('DeviceGroups');
        $this->loadModel('PartnerVouchers');
        $this->loadModel('FileAttachments');
        $this->loadModel('PartnerVoucherLogs');
        $this->loadModel('AdgroupChangeHistories');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $login = $this->Auth->user();
        $user_login_id = $login['id'];
        if ($login['role'] == User::ROLE_ONE) {
            $campaignGroups = $this->CampaignGroups->find('all',[
                'contain'  => [
                    'PartnerVouchers' => function ($q) {
                    return $q
                        ->where([
                            'PartnerVouchers.confirm ' => 1
                        ])
                        ->select([
                            'campaign_group_id','id'
                        ]);
                },
                    'Users' => function ($q) {
                        return $q
                        ->select([
                            'Users.id','Users.username'
                        ]);
                    }
                ],
                'conditions' => [
                    'CampaignGroups.delete_flag !=' => 1,
                ]
            ])->toArray();
        } else {
            $campaignGroups = $this->CampaignGroups->find('all',[
                'contain'  => [
                    'PartnerVouchers' => function ($q) {
                        return $q
                            ->where([
                                'PartnerVouchers.confirm ' => 1
                            ])
                            ->select([
                                'campaign_group_id','id'
                            ]);
                    },
                    'Users' => function ($q) {
                        return $q
                            ->select([
                                'Users.id','Users.username'
                            ]);
                    }
                ],
                'conditions' => [
                    'CampaignGroups.delete_flag !=' => 1,
                    'CampaignGroups.user_id_campaign_group' => $user_login_id
                ]
            ])->toArray();
        }
        $this->set(compact('campaignGroups'));
        $this->set('_serialize', ['campaignGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaignGroup = $this->CampaignGroups->get($id, [
            'contain' => []
        ]);

        $this->set('campaignGroup', $campaignGroup);
        $this->set('_serialize', ['campaignGroup']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->getAllData();
        $user = $this->Auth->user();
        $campaign = $this->CampaignGroups->find()
            ->select(['id', 'time'])
            ->where(['delete_flag !=' => DELETED])
            ->combine('id', 'time')
            ->toArray();
        $current_date = date('d/m/Y');
        $campaing_id = array();
        if (!empty($campaign)) {
            foreach ($campaign as $k => $vl) {
                $vl = explode('-', $vl);
                $my_date = date('d/m/Y', strtotime($vl[1]));
                if ($my_date >= $current_date) {
                    $campaing_id[$k] = $k;
                }
            }
        }
        $groups = array();
        if (!empty($campaing_id)) {
            $groups = $this->CampaignGroups->find()
                ->select(['id', 'device_id'])
                ->where([
                    'id IN' => $campaing_id,
                    'delete_flag !=' => DELETED
                ])
                ->combine('id', 'device_id')->toArray();
        }
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
        $campaign_groups = $this->CampaignGroups->newEntity();
        if ($this->request->is('post')) {
            $listNameDevice = ($this->getNameDevice($this->request->getData()['device_id']));
            $devices = $this->Devices->find()
                ->where(['id IN' => $this->request->getData('device_id')])->select(['id'])
                ->hydrate(false)->toList();
            // Common Usage:
            $result_id_devices = Hash::extract($devices, '{n}.id');

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
                $this->request->data['path'] = implode(',', $path);
            }
            if ($image_up_load != '') {
                $this->request->data['image_backgroup'] = implode(',', $image_up_load);
            }
            $list_device_id = json_encode(array_values($this->request->getData('device_id')));
            $this->request->data['device_id'] = $list_device_id;
            $this->request->data['device_name'] = $listNameDevice;
            $campaign_groups = $this->CampaignGroups->patchEntity($campaign_groups, $this->request->data);
            $campaign_groups->delete_flag = UN_DELETED;
            if (empty($campaign_groups->errors())) {
                $save_ad = $this->CampaignGroups->save($campaign_groups);
                if ($save_ad) {
                    $campaign_group_id = $save_ad->id;
                    //todo update data devices add to group
                    $device_adgroup = array(
                        'campaign_group_id' => $campaign_group_id,
                        'user_id_campaign' => $this->request->getData('user_id_campaign_group')
                    );
                    $this->publishall($result_id_devices, $device_adgroup);
                    $conn->commit();
                    $this->redirect(['action' => 'index']);
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
        $this->set(compact('campaignGroup'));
        $this->set('_serialize', ['campaignGroup']);
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaignGroup = $this->CampaignGroups->get($this->request->getData('id'), [
                'contain' => []
            ]);
            $campaignGroup = $this->CampaignGroups->patchEntity($campaignGroup, $this->request->getData());
            if (empty($campaignGroup->errors())) {
                if ($this->CampaignGroups->save($campaignGroup)) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('campaignGroup'));
        $this->set('_serialize', ['campaignGroup']);
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
            $campaignGroup = $this->CampaignGroups->get($this->request->getData('id'));
            $this->removeAdgroupIdDevice(json_decode($campaignGroup->device_id));
            $campaignGroup->delete_flag = true;
            if($this->CampaignGroups->save($campaignGroup)){
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
            $query = $this->CampaignGroups->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'id' => $this->request->getData('id'),
                    'delete_flag !=' => DELETED
                )));
            $row = $query->first()->toArray();
            if ($row) {
                $dataExist = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'start_date' => $row['start_date'],
                    'end_date' => $row['end_date'],
                );
                die(json_encode($dataExist));
            }
        }

    }

    /**
     * isNameExist method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('backup_name') != $this->request->getData('name')) {
                $query = $this->CampaignGroups->find('all', array(
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
            $query = $this->CampaignGroups->find('all', array(
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

    public function detailCampaig($id)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->CampaignGroups->exists(['id' => $id])) {
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Auth->user();
        $this->getAllData();
        $campaign_group = $this->CampaignGroups->get($id);
        $device_id = $campaign_group->device_id;

        $campaign = $this->CampaignGroups->find()
            ->select(['id', 'time'])
            ->where(['delete_flag !=' => DELETED])
            ->combine('id', 'time')
            ->toArray();
        $current_date = date('d/m/Y');
        $campaing_id = array();
        if (!empty($campaign)) {
            foreach ($campaign as $k => $vl) {
                $vl = explode('-', $vl);
                $my_date = date('d/m/Y', strtotime($vl[1]));
                if ($my_date < $current_date) {
                    $campaing_id[$k] = $k;
                }
            }
        }

        $groups = array();
        if (!empty($campaing_id)) {
            $groups = $this->CampaignGroups->find()
                ->select(['id', 'device_id'])
                ->where([
                    'id IN' => $campaing_id,
                    'delete_flag !=' => DELETED
                ])
                ->combine('id', 'device_id')->toArray();
        }
        $device_id_old = array();
        foreach ($groups as $k => $vl) {
            $device_id_old[] = json_decode($vl);
        }
        $list_old_device_id = call_user_func_array('array_merge', $device_id_old);
        $campaign_groups = $this->CampaignGroups->find()
            ->select(['id', 'device_id'])
            ->where(['delete_flag !=' => DELETED])
            ->combine('id', 'device_id')->toArray();
        if (!empty($campaign_groups)) {
            $list_device_id = array();
            foreach ($campaign_groups as $group) {
                if ($device_id != $group) {
                    $list_device_id[] = ($group);
                }
            }
            $device_id = array();
            foreach ($list_device_id as $k => $vl) {
                $device_id[] = json_decode($vl);
            }
            if (!empty($device_id)) {
                $merged = call_user_func_array('array_merge', $device_id);
                $list_device_end = array();
                foreach ($merged as $k => $vl) {
                    if (!in_array($vl, $list_old_device_id)) {
                        $list_device_end[$k] = $vl;
                    }
                }
                if (!empty($list_device_end)) {
                    if ($user['role'] == User::ROLE_ONE) {
                        $conditions = array(
                            'id NOT IN' => $list_device_end,
                            'delete_flag !=' => DELETED,
                        );
                    } else {
                        $conditions = array(
                            'id NOT IN' => $list_device_end,
                            'delete_flag !=' => DELETED,
                            'user_id' => $user['id']
                        );
                    }
                } else {
                    if ($user['role'] == User::ROLE_ONE) {
                        $conditions = array(
                            'delete_flag !=' => DELETED,
                        );
                    } else {
                        $conditions = array(
                            'delete_flag !=' => DELETED,
                            'user_id' => $user['id']
                        );
                    }
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
                        'user_id' => $user['id']
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
        $before_device = json_decode($campaign_group->device_id);
        if ($this->request->is('post')) {
            $new_device = $this->request->getData()['device_id'];
            $listUserid = $this->getNameDevice($this->request->getData()['device_id']);
            $this->request->data['device_name'] = $listUserid;
            $this->request->data['device_id'] = json_encode($this->request->getData()['device_id']);
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
                if ($path != '') {
                    $this->request->data['path'] = implode(',', $path);
                }
                if ($image_up_load != '') {
                    $this->request->data['image_backgroup'] = implode(',', $image_up_load);
                }
                unset($this->request->data['file']);
            } else {
                unset($this->request->data['file']);
            }

            $list_remove_device_id = array();
            foreach ($before_device as $k => $vl) {
                if (!in_array($vl, $new_device)) {
                    $list_remove_device_id[] = $vl;
                }
            }
            //todo update data devices add to group
            $device_adgroup = array(
                'campaign_group_id' => $campaign_group->id,
                'user_id_campaign' => $this->request->getData('user_id_campaign_group')
            );
            $this->publishall($new_device, $device_adgroup);
            $this->removeAdgroupIdDevice($list_remove_device_id);
            $campaign_group = $this->CampaignGroups->patchEntity($campaign_group, $this->request->data);
            if (empty($campaign_group->errors())) {
                if ($this->CampaignGroups->save($campaign_group)) {
                    $conn->commit();
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    return $this->redirect(['action' => 'edit'.'/'.\UrlUtil::_encodeUrl($id)]);
                }
            } else {
                $conn->rollback();
                return $this->redirect(['action' => 'edit'.'/'.\UrlUtil::_encodeUrl($id)]);
            }
        }
        $this->set(compact('campaign_group', 'devices', 'list_users'));
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
            'user_id_campaign' => '',
            'campaign_group_id' => '',
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
}
