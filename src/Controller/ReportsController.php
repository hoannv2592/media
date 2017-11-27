<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Device;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\Utility\Hash;
/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 * @property \App\Model\Table\PartnerVoucherLogsTable $PartnerVoucherLogs
 */
class ReportsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadModel('Adgroup');
        $this->loadModel('LogAuths');
        $this->loadComponent('UploadImage');
        $this->loadModel('DeviceGroups');
        $this->loadModel('PartnerVouchers');
        $this->loadModel('PartnerVoucherLogs');

        // Load Files model
        $this->loadModel('FileAttachments');
        $this->loadModel('Logs');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $list_campaign = $this->CampaignGroups->find('all', [
            'contain'  => ['PartnerVoucherLogs' => function ($q) {
                return $q ;
            }],
            'conditions' => [
                'CampaignGroups.delete_flag !=' => 1
            ]
        ]) ->toArray();
        $this->set(compact('list_campaign'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => ['Devices', 'Langdingpages']
        ]);

        $this->set('report', $report);
        $this->set('_serialize', ['report']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $devices = $this->Reports->Devices->find('list', ['limit' => 200]);
        $langdingpages = $this->Reports->Langdingpages->find('list', ['limit' => 200]);
        $this->set(compact('report', 'devices', 'langdingpages'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $devices = $this->Reports->Devices->find('list', ['limit' => 200]);
        $langdingpages = $this->Reports->Langdingpages->find('list', ['limit' => 200]);
        $this->set(compact('report', 'devices', 'langdingpages'));
        $this->set('_serialize', ['report']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function reportDetail($campaign_id)
    {
        $campaign_id = \UrlUtil::_decodeUrl($campaign_id);
        $campaigns = $this->CampaignGroups->find('all', [
            'contain'  => ['PartnerVoucherLogs' => function ($q) {
                return $q ;
            }],
            'conditions' => [
                'CampaignGroups.delete_flag !=' => 1,
                'CampaignGroups.id' => $campaign_id
            ]
        ])->toArray();
        $campaignGroups_title = $this->CampaignGroups->find('all',[
            'contain'  => ['PartnerVoucherLogs' => function ($q) {
                return $q
                    ->where([
                        'PartnerVoucherLogs.confirm ' => 1,
                    ])
                    ->select([
                        'campaign_group_id','id'
                    ]);
            }],
            'conditions' => [
                'CampaignGroups.delete_flag !=' => 1,
                'CampaignGroups.id' => $campaign_id
            ]
        ])->toArray();
        $this->set(compact('campaigns', 'campaign_id', 'campaignGroups_title'));
    }

    public function detailPartnerVoucher($partner_id, $campaign_id)
    {
        $partner_id = \UrlUtil::_decodeUrl($partner_id);
        if (isset($campaign_id)) {
            $campaign_id = \UrlUtil::_decodeUrl($campaign_id);
        }
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $partner_voucher_logs = $this->PartnerVoucherLogs->get($partner_id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partner_voucher_logs = $this->PartnerVoucherLogs->patchEntity($partner_voucher_logs, $this->request->getData());
            if (empty($partner_voucher_logs->errors())) {
                if ($this->PartnerVoucherLogs->save($partner_voucher_logs)) {
                    $conn->commit();
                    $this->Flash->success(__('The partner has been saved.'));
                    return $this->redirect(['action' => 'reportDetail' . '/' . \UrlUtil::_encodeUrl($campaign_id)]);
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
        }

            $this->set(compact('partner_voucher_logs', 'campaign_id'));
        $this->set('_serialize', ['partner']);
    }

    public function addLogConfirmVoucher()
    {
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->data) {
            $id = $this->request->data['id'];
            $partner_log_voucher = $this->PartnerVoucherLogs->get($id);
            $partner_log_voucher = $this->PartnerVoucherLogs->patchEntity($partner_log_voucher, $this->request->data);
            $partner_log_voucher->confirm = 1;
            if (empty($partner_log_voucher->errors())) {
                if ($this->PartnerVoucherLogs->save($partner_log_voucher)) {
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

    public function removeLogConfirmVoucher()
    {
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->data) {
            $id = $this->request->data['id'];
            $this->loadModel('PartnerVoucherLogs');
            $partner_log_voucher = $this->PartnerVoucherLogs->get($id);
            $partner_log_voucher = $this->PartnerVoucherLogs->patchEntity($partner_log_voucher, $this->request->data);
            $partner_log_voucher->confirm = '2';
            if (empty($partner_log_voucher->errors())) {
                if ($this->PartnerVoucherLogs->save($partner_log_voucher)) {
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


    public function checkAddNewDevice()
    {
        $url = $this->request;
        $apt_key = $this->slug($url->params['id']);
        $flag_id = $this->slug($url->params['flag_id']);
        $this->request->allowMethod(['post', 'get' ,'put','ajax','delete']);
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->loadModel('Partners');
        $campaign_data = $this->check_exits_voucher($apt_key);
        $client_mac = isset($this->request->data['client_mac']) ? $this->request->data['client_mac']: '';
        // todo dem so luong voucher phat ra.
        $number_voucher_userd = $this->PartnerVouchers->find()
            ->where(['confirm ' => '1'])
            ->count()
        ;

        $flag_normal = true;
        if (!empty($campaign_data['id_campaign'])) {
            $campaign = $this->CampaignGroups->find()
                ->where(['id' => $campaign_data['id_campaign']])
                ->first()
            ;
            // todo kiem tra partner da ton tai trong partner_voucher.
            $pa_voucher = $this->PartnerVouchers->find()->where(
                array(
                    'device_id' => $campaign_data['id_device'],
                    'client_mac' => $client_mac,
                ))
                ->first()
            ;

            $query = $this->PartnerVouchers->find('all', [])->count();
            $check_save = $this->check_random_of_voucher(
                $campaign,
                $query ,
                $number_voucher_userd,
                $pa_voucher,
                $campaign_data,
                $client_mac
            );
        } else {
            $flag_normal = false;
            $check_save = $this->save_partner_normal($campaign_data['id_device'], $client_mac);
        }
        $apt_key_check = $this->Devices->find()->where(
            [
                'apt_key' => $apt_key,
                'delete_flag !=' => DELETED
            ])
            ->select()
            ->hydrate(true)
            ->first()
        ;
        if (isset($flag_id) && $flag_id == Device::TB_MIRKOTIC) {
            if (!empty($apt_key_check)) {
                $device = $this->Devices->patchEntity($apt_key_check, $this->request->data);
                $device->type = Device::TB_MIRKOTIC;
                if (empty($device->errors())) {
                    if (!$this->Devices->save($device)) {
                        $check_save['chk'] = true;
                    }
                }
                if (!$check_save['chk']) {
                    $conn->commit();
                    if (!$check_save['flag_true'] && $flag_normal) {
                        $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id) . '/' . \UrlUtil::_encodeUrl(1)]);
                    } else {
                        $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id). '/' . \UrlUtil::_encodeUrl(2)]);
                    }
                } else {
                    $conn->rollback();
                }
            } else {
                $data = $this->request->data;
                $this->save_new_data($apt_key , $data, Device::TB_MIRKOTIC);
//                $query = $this->Users->find('all', [])->count();
//                $users = $this->Users->newEntity();
//                $data_user = [
//                    'username' => USER.($query + 1),
//                    'email' => USER.($query + 1).'@wifimedia.com',
//                    'password' => '123456',
//                    'delete_flag' => UN_DELETED,
//                    'role' => User::ROLE_TOW
//                ];
//
//
//                $this->request->data['type'] = $flag_id;
//                $device = $this->Devices->newEntity();
//                $device = $this->Devices->patchEntity($device, $this->request->data);
//                $device->apt_key = isset($this->request->data['gateway_mac']) ? $this->request->data['gateway_mac'] : $apt_key;
//                $device->delete_flag = UN_DELETED;
//                $device->status = UN_DELETED;
//                $device->name = DEVICE.($query + 1);
//                $users = $this->Users->patchEntity($users, $data_user);
//                $query = $this->Partners->find('all', [])->count();
//                $data_new_par = array(
//                    'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:'',
//                    'link_login_only' => isset($this->request->data['link_login_only']) ? $this->request->data['link_login_only']:'',
//                    'num_clients_connect' => 1,
//                    'name' => PARTNER.($query + 1)
//                );
//
//                $partner = $this->Partners->newEntity();
//                $partner = $this->Partners->patchEntity($partner, $data_new_par);
//                if (empty($users->errors())) {
//                    $result = $this->Users->save($users);
//                    if ($result) {
//                        $device->user_id = $result->id;
//                        if (empty($device->errors())) {
//                            $data_device = $this->Devices->save($device);
//                            if ($data_device) {
//                                $partner->device_id = $data_device->id;
//                                if (empty($partner->errors())) {
//                                    if ($this->Partners->save($partner)) {
//                                        $conn->commit();
//                                        $this->redirect([
//                                            'plugin' => null,
//                                            'controller' => 'Devices',
//                                            'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($data_device->id). '/' . \UrlUtil::_encodeUrl(2)
//                                        ]);
//                                    }
//                                }
//                            } else {
//                                $conn->rollback();
//                            }
//                        } else {
//                            $conn->rollback();
//                        }
//                    } else {
//                        $conn->rollback();
//                    }
//                }
            }
        } else {
            if (!empty($apt_key_check)) {
                $device = $this->Devices->patchEntity($apt_key_check, $this->request->data);
                $device->type = Device::TB_MIRKOTIC;
                if (empty($device->errors())) {
                    if (!$this->Devices->save($device)) {
                        $check_save['chk'] = true;
                    }
                }
                if (!$check_save['chk']) {
                    $conn->commit();
                    if (!$check_save['flag_true'] && $flag_normal) {
                        $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id) . '/' . \UrlUtil::_encodeUrl(1)]);
                    } else {
                        $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($device->id). '/' . \UrlUtil::_encodeUrl(2)]);
                    }
                } else {
                    $conn->rollback();
                }
            } else {
                $data = $this->request->data;
                $this->save_new_data($apt_key , $data, Device::TB_NORMAR);
            }
        }
    }

    public function save_new_data($apt_key = null, $data = array(), $type = null)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $query = $this->Users->find('all', [])->count();
        $data_user = [
            'username' => USER.($query + 1),
            'email' => USER.($query + 1).'@wifimedia.com',
            'password' => '123456',
            'delete_flag' => UN_DELETED,
            'role' => User::ROLE_TOW
        ];
        // todo save new Devices
        $device = $this->Devices->newEntity();
        $device = $this->Devices->patchEntity($device, $this->request->data);
        $device->delete_flag = UN_DELETED;
        $device->status = UN_DELETED;
        $device->name = DEVICE.($query + 1);
        $device->apt_device_number = $this->radompassWord();
        $device->apt_key = isset($this->request->data['gateway_mac']) ? $this->request->data['gateway_mac'] : $apt_key;
        $device->type = $type;
        $count_query = $this->Partners->find('all', [])->count();
        if ($type == Device::TB_MIRKOTIC) {
            $data_new_par = array(
                'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:'',
                'link_login_only' => isset($this->request->data['link_login_only']) ? $this->request->data['link_login_only']:'',
                'num_clients_connect' => 1,
                'name' => PARTNER.($count_query + 1),
                'apt_device_pass' => $this->radompassWord()
            );
        } else {
            $data_new_par = array(
                'client_mac' => isset($this->request->data['client_mac']) ? $this->request->data['client_mac']:'',
                'auth_target' => isset($this->request->data['auth_target']) ? $this->request->data['auth_target']:'',
                'num_clients_connect' => 1,
                'name' => PARTNER.($query + 1),
                'apt_device_pass' => $this->radompassWord()
            );
        }
        // todo save new Partners
        $partner = $this->Partners->newEntity();
        $partner = $this->Partners->patchEntity($partner, $data_new_par);
        // todo save new users
        $users = $this->Users->newEntity();
        $users = $this->Users->patchEntity($users, $data_user);
        if (empty($users->errors())) {
            $result = $this->Users->save($users);
            if ($result) {
                $device->user_id = $result->id;
                if (empty($device->errors())) {
                    $data_device = $this->Devices->save($device);
                    if ($data_device) {
                        $partner->device_id = $data_device->id;
                        pr($partner);
                        pr(empty($partner->errors())); die;
                        if (empty($partner->errors())) {
                        var_dump($this->Partners->save($partner)); die;
                            if ($this->Partners->save($partner)) {
                                $conn->commit();
                                $this->redirect(['plugin' => null, 'controller' => 'Devices', 'action' => 'view_qc' . '/' . \UrlUtil::_encodeUrl($data_device->id). '/' . \UrlUtil::_encodeUrl(2)]);
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
    public function save_partner_normal($device_id = null , $client_mac = null)
    {
        $chk = false;
        $flag_true = false;
        $partner = $this->Partners->find()->where(
            array(
                'device_id' => $device_id,
                'client_mac' => $client_mac,
            ))
            ->first();
        $query = $this->Partners->find('all', [])->count();
        if (empty($partner)) {
            $save_new_pa = array(
                'device_id' => $device_id,
                'client_mac' => $client_mac,
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
        $result = array(
            'chk' => $chk,
            'flag_true' => $flag_true
        );
        return $result;
    }

    public function check_random_of_voucher(
        $campaign = array(),
        $query= null,
        $number_voucher_userd = null,
        $pa_voucher = array(),
        $campaign_data = null,
        $id_campaign = null,
        $client_mac = null
    ) {
        $chk = false;
        $flag_true = false;
        if ($campaign->random == 2) {
            if (empty($pa_voucher)) {
                $save_new_pa_vou = array(
                    'device_id' => $campaign_data['id_device'],
                    'client_mac' => $client_mac,
                    'num_clients_connect' => 1,
                    'name' => PARTNER.($query + 1),
                    'confirm' => '1',
                    'campaign_group_id' => $campaign_data['id_campaign']
                );
                $new_partner_vou = $this->PartnerVouchers->newEntity();
                $new_partner_vou = $this->PartnerVouchers->patchEntity($new_partner_vou, $save_new_pa_vou);
                if (empty($new_partner_vou->errors())) {
                    if (!$this->PartnerVouchers->save($new_partner_vou)) {
                        $chk = true;
                        $flag_true = true;
                    }
                }
            } else {
                $data_update = array(
                    'num_clients_connect' => $pa_voucher->num_clients_connect + 1,
                );
                $partner = $this->PartnerVouchers->patchEntity($pa_voucher, $data_update);
                if (empty($partner->errors())){
                    if (!$this->PartnerVouchers->save($partner)) {
                        $chk = true;
                        $flag_true = true;
                    }
                }
            }
        } else {
            $flag_get_voucher = $this->getVoucher($client_mac);
            if ($flag_get_voucher) {
                if ($number_voucher_userd <= $campaign->number_voucher) {
                    if (empty($pa_voucher)) {
                        $save_new_pa_vou = array(
                            'device_id' => $campaign_data['id_device'],
                            'client_mac' => $client_mac,
                            'num_clients_connect' => 1,
                            'name' => PARTNER.($query + 1),
                            'campaign_group_id' => $campaign_data['id_campaign']
                        );
                        $new_partner_vou = $this->PartnerVouchers->newEntity();
                        $new_partner_vou = $this->PartnerVouchers->patchEntity($new_partner_vou, $save_new_pa_vou);
                        if (empty($new_partner_vou->errors())) {
                            if (!$this->PartnerVouchers->save($new_partner_vou)) {
                                $chk = true;
                                $flag_true = true;
                            }
                        }
                    } else {
                        $data_update = array(
                            'num_clients_connect' => $pa_voucher->num_clients_connect + 1,
                        );
                        $partner = $this->PartnerVouchers->patchEntity($pa_voucher, $data_update);
                        if (empty($partner->errors())){
                            if (!$this->PartnerVouchers->save($partner)) {
                                $chk = true;
                                $flag_true = true;
                            }
                        }
                    }
                }
            }
        }

        $result = array(
            'chk' => $chk,
            'flag_true' => $flag_true
        );
        return $result;
    }
    public function check_exits_voucher($apt_key = null)
    {
        $apt_key_check = $this->Devices->find()->where(
            [
                'apt_key' => $apt_key,
                'delete_flag !=' => DELETED
            ])
            ->select()
            ->hydrate(true)
            ->first()
        ;
        $id_device = '';
        $id_campaign = '';
        if (!empty($apt_key_check)) {
            $id_device = $apt_key_check->id;
        }
        $vouchers = $this->CampaignGroups->find()
            ->select(['id','device_id'])
            ->where(['delete_flag !=' => 1])
            ->hydrate(false)
            ->combine('id', 'device_id')
            ->toArray()
        ;
        if (!empty($vouchers)) {
            foreach ($vouchers as $k => $voucher) {
                $list_device_id_voucher[$k] = json_decode($voucher);
            }
            if (!empty($list_device_id_voucher)) {
                foreach ($list_device_id_voucher as $k =>  $vl) {
                    foreach ($vl as $key => $item) {
                        if ($id_device == $item) {
                            $id_campaign = $k;
                        }
                    }
                }
            }
        }
        $result = array(
            'id_campaign' => $id_campaign,
            'id_device' => $id_device
        );
        return $result;
    }
}
