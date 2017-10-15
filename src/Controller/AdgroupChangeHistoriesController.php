<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdgroupChangeHistories Controller
 *
 * @property \App\Model\Table\AdgroupChangeHistoriesTable $AdgroupChangeHistories
 */
class AdgroupChangeHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adgroups']
        ];
        $logs = $this->AdgroupChangeHistories->find('all', [
            'contain' => ['Adgroups' => function ($q) {
                return $q
                    ->select(['Adgroups.name'])
                    ->hydrate(false);
            }],
        ])->hydrate(false)->select(['id', 'contents', 'modified'])->toList();
        //$adgroupChangeHistories = $this->paginate($this->AdgroupChangeHistories);

        $this->set(compact('logs'));
        $this->set('_serialize', ['logs']);
    }

    /**
     * View method
     *
     * @param string|null $id Adgroup Change History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adgroupChangeHistory = $this->AdgroupChangeHistories->get($id, [
            'contain' => ['Adgroups']
        ]);

        $this->set('adgroupChangeHistory', $adgroupChangeHistory);
        $this->set('_serialize', ['adgroupChangeHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adgroupChangeHistory = $this->AdgroupChangeHistories->newEntity();
        if ($this->request->is('post')) {
            $adgroupChangeHistory = $this->AdgroupChangeHistories->patchEntity($adgroupChangeHistory, $this->request->getData());
            if ($this->AdgroupChangeHistories->save($adgroupChangeHistory)) {
                $this->Flash->success(__('The adgroup change history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adgroup change history could not be saved. Please, try again.'));
        }
        $adgroups = $this->AdgroupChangeHistories->Adgroups->find('list', ['limit' => 200]);
        $this->set(compact('adgroupChangeHistory', 'adgroups'));
        $this->set('_serialize', ['adgroupChangeHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adgroup Change History id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adgroupChangeHistory = $this->AdgroupChangeHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adgroupChangeHistory = $this->AdgroupChangeHistories->patchEntity($adgroupChangeHistory, $this->request->getData());
            if ($this->AdgroupChangeHistories->save($adgroupChangeHistory)) {
                $this->Flash->success(__('The adgroup change history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adgroup change history could not be saved. Please, try again.'));
        }
        $adgroups = $this->AdgroupChangeHistories->Adgroups->find('list', ['limit' => 200]);
        $this->set(compact('adgroupChangeHistory', 'adgroups'));
        $this->set('_serialize', ['adgroupChangeHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adgroup Change History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adgroupChangeHistory = $this->AdgroupChangeHistories->get($id);
        if ($this->AdgroupChangeHistories->delete($adgroupChangeHistory)) {
            $this->Flash->success(__('The adgroup change history has been deleted.'));
        } else {
            $this->Flash->error(__('The adgroup change history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
