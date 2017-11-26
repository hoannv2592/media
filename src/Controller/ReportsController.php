<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
                        'PartnerVoucherLogs.confirm ' => 1
                    ])
                    ->select([
                        'campaign_group_id','id'
                    ]);
            }],
            'conditions' => [
                'CampaignGroups.delete_flag !=' => 1
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
}
