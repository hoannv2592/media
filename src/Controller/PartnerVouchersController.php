<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PartnerVouchers Controller
 *
 * @property \App\Model\Table\PartnerVouchersTable $PartnerVouchers
 */
class PartnerVouchersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Devices']
        ];
        $partnerVouchers = $this->paginate($this->PartnerVouchers);

        $this->set(compact('partnerVouchers'));
        $this->set('_serialize', ['partnerVouchers']);
    }

    /**
     * View method
     *
     * @param string|null $id Partner Voucher id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partnerVoucher = $this->PartnerVouchers->get($id, [
            'contain' => ['Users', 'Devices']
        ]);

        $this->set('partnerVoucher', $partnerVoucher);
        $this->set('_serialize', ['partnerVoucher']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partnerVoucher = $this->PartnerVouchers->newEntity();
        if ($this->request->is('post')) {
            $partnerVoucher = $this->PartnerVouchers->patchEntity($partnerVoucher, $this->request->getData());
            if ($this->PartnerVouchers->save($partnerVoucher)) {
                $this->Flash->success(__('The partner voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner voucher could not be saved. Please, try again.'));
        }
        $users = $this->PartnerVouchers->Users->find('list', ['limit' => 200]);
        $devices = $this->PartnerVouchers->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partnerVoucher', 'users', 'devices'));
        $this->set('_serialize', ['partnerVoucher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner Voucher id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partnerVoucher = $this->PartnerVouchers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partnerVoucher = $this->PartnerVouchers->patchEntity($partnerVoucher, $this->request->getData());
            if ($this->PartnerVouchers->save($partnerVoucher)) {
                $this->Flash->success(__('The partner voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner voucher could not be saved. Please, try again.'));
        }
        $users = $this->PartnerVouchers->Users->find('list', ['limit' => 200]);
        $devices = $this->PartnerVouchers->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partnerVoucher', 'users', 'devices'));
        $this->set('_serialize', ['partnerVoucher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner Voucher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partnerVoucher = $this->PartnerVouchers->get($id);
        if ($this->PartnerVouchers->delete($partnerVoucher)) {
            $this->Flash->success(__('The partner voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The partner voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
