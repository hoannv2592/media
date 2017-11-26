<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PartnerVoucherLogs Controller
 *
 * @property \App\Model\Table\PartnerVoucherLogsTable $PartnerVoucherLogs
 */
class PartnerVoucherLogsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CampaignGroups', 'Users', 'Devices']
        ];
        $partnerVoucherLogs = $this->paginate($this->PartnerVoucherLogs);

        $this->set(compact('partnerVoucherLogs'));
        $this->set('_serialize', ['partnerVoucherLogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Partner Voucher Log id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partnerVoucherLog = $this->PartnerVoucherLogs->get($id, [
            'contain' => ['CampaignGroups', 'Users', 'Devices']
        ]);

        $this->set('partnerVoucherLog', $partnerVoucherLog);
        $this->set('_serialize', ['partnerVoucherLog']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partnerVoucherLog = $this->PartnerVoucherLogs->newEntity();
        if ($this->request->is('post')) {
            $partnerVoucherLog = $this->PartnerVoucherLogs->patchEntity($partnerVoucherLog, $this->request->getData());
            if ($this->PartnerVoucherLogs->save($partnerVoucherLog)) {
                $this->Flash->success(__('The partner voucher log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner voucher log could not be saved. Please, try again.'));
        }
        $campaignGroups = $this->PartnerVoucherLogs->CampaignGroups->find('list', ['limit' => 200]);
        $users = $this->PartnerVoucherLogs->Users->find('list', ['limit' => 200]);
        $devices = $this->PartnerVoucherLogs->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partnerVoucherLog', 'campaignGroups', 'users', 'devices'));
        $this->set('_serialize', ['partnerVoucherLog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner Voucher Log id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partnerVoucherLog = $this->PartnerVoucherLogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partnerVoucherLog = $this->PartnerVoucherLogs->patchEntity($partnerVoucherLog, $this->request->getData());
            if ($this->PartnerVoucherLogs->save($partnerVoucherLog)) {
                $this->Flash->success(__('The partner voucher log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner voucher log could not be saved. Please, try again.'));
        }
        $campaignGroups = $this->PartnerVoucherLogs->CampaignGroups->find('list', ['limit' => 200]);
        $users = $this->PartnerVoucherLogs->Users->find('list', ['limit' => 200]);
        $devices = $this->PartnerVoucherLogs->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partnerVoucherLog', 'campaignGroups', 'users', 'devices'));
        $this->set('_serialize', ['partnerVoucherLog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner Voucher Log id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partnerVoucherLog = $this->PartnerVoucherLogs->get($id);
        if ($this->PartnerVoucherLogs->delete($partnerVoucherLog)) {
            $this->Flash->success(__('The partner voucher log has been deleted.'));
        } else {
            $this->Flash->error(__('The partner voucher log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
