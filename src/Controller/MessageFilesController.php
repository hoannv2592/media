<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MessageFiles Controller
 *
 * @property \App\Model\Table\MessageFilesTable $MessageFiles
 */
class MessageFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdMessages']
        ];
        $messageFiles = $this->paginate($this->MessageFiles);

        $this->set(compact('messageFiles'));
        $this->set('_serialize', ['messageFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Message File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageFile = $this->MessageFiles->get($id, [
            'contain' => ['AdMessages']
        ]);

        $this->set('messageFile', $messageFile);
        $this->set('_serialize', ['messageFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messageFile = $this->MessageFiles->newEntity();
        if ($this->request->is('post')) {
            $messageFile = $this->MessageFiles->patchEntity($messageFile, $this->request->getData());
            if ($this->MessageFiles->save($messageFile)) {
                $this->Flash->success(__('The message file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message file could not be saved. Please, try again.'));
        }
        $adMessages = $this->MessageFiles->AdMessages->find('list', ['limit' => 200]);
        $this->set(compact('messageFile', 'adMessages'));
        $this->set('_serialize', ['messageFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messageFile = $this->MessageFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messageFile = $this->MessageFiles->patchEntity($messageFile, $this->request->getData());
            if ($this->MessageFiles->save($messageFile)) {
                $this->Flash->success(__('The message file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message file could not be saved. Please, try again.'));
        }
        $adMessages = $this->MessageFiles->AdMessages->find('list', ['limit' => 200]);
        $this->set(compact('messageFile', 'adMessages'));
        $this->set('_serialize', ['messageFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messageFile = $this->MessageFiles->get($id);
        if ($this->MessageFiles->delete($messageFile)) {
            $this->Flash->success(__('The message file has been deleted.'));
        } else {
            $this->Flash->error(__('The message file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
