<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeviceFiles Controller
 *
 * @property \App\Model\Table\DeviceFilesTable $DeviceFiles
 */
class DeviceFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Devices']
        ];
        $deviceFiles = $this->paginate($this->DeviceFiles);

        $this->set(compact('deviceFiles'));
        $this->set('_serialize', ['deviceFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Device File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deviceFile = $this->DeviceFiles->get($id, [
            'contain' => ['Devices']
        ]);

        $this->set('deviceFile', $deviceFile);
        $this->set('_serialize', ['deviceFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deviceFile = $this->DeviceFiles->newEntity();
        if ($this->request->is('post')) {
            $deviceFile = $this->DeviceFiles->patchEntity($deviceFile, $this->request->getData());
            if ($this->DeviceFiles->save($deviceFile)) {
                $this->Flash->success(__('The device file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device file could not be saved. Please, try again.'));
        }
        $devices = $this->DeviceFiles->Devices->find('list', ['limit' => 200]);
        $this->set(compact('deviceFile', 'devices'));
        $this->set('_serialize', ['deviceFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Device File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deviceFile = $this->DeviceFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deviceFile = $this->DeviceFiles->patchEntity($deviceFile, $this->request->getData());
            if ($this->DeviceFiles->save($deviceFile)) {
                $this->Flash->success(__('The device file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device file could not be saved. Please, try again.'));
        }
        $devices = $this->DeviceFiles->Devices->find('list', ['limit' => 200]);
        $this->set(compact('deviceFile', 'devices'));
        $this->set('_serialize', ['deviceFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deviceFile = $this->DeviceFiles->get($id);
        if ($this->DeviceFiles->delete($deviceFile)) {
            $this->Flash->success(__('The device file has been deleted.'));
        } else {
            $this->Flash->error(__('The device file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
