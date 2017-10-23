<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LogAuths Controller
 *
 * @property \App\Model\Table\LogAuthsTable $LogAuths
 */
class LogAuthsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $logAuths = $this->paginate($this->LogAuths);

        $this->set(compact('logAuths'));
        $this->set('_serialize', ['logAuths']);
    }

    /**
     * View method
     *
     * @param string|null $id Log Auth id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logAuth = $this->LogAuths->get($id, [
            'contain' => []
        ]);

        $this->set('logAuth', $logAuth);
        $this->set('_serialize', ['logAuth']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logAuth = $this->LogAuths->newEntity();
        if ($this->request->is('post')) {
            $logAuth = $this->LogAuths->patchEntity($logAuth, $this->request->getData());
            if ($this->LogAuths->save($logAuth)) {
                $this->Flash->success(__('The log auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The log auth could not be saved. Please, try again.'));
        }
        $this->set(compact('logAuth'));
        $this->set('_serialize', ['logAuth']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Log Auth id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logAuth = $this->LogAuths->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logAuth = $this->LogAuths->patchEntity($logAuth, $this->request->getData());
            if ($this->LogAuths->save($logAuth)) {
                $this->Flash->success(__('The log auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The log auth could not be saved. Please, try again.'));
        }
        $this->set(compact('logAuth'));
        $this->set('_serialize', ['logAuth']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Log Auth id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logAuth = $this->LogAuths->get($id);
        if ($this->LogAuths->delete($logAuth)) {
            $this->Flash->success(__('The log auth has been deleted.'));
        } else {
            $this->Flash->error(__('The log auth could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
