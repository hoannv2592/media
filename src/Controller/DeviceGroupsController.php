<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeviceGroups Controller
 *
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 */
class DeviceGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adgroups', 'Devices']
        ];
        $deviceGroups = $this->paginate($this->DeviceGroups);

        $this->set(compact('deviceGroups'));
        $this->set('_serialize', ['deviceGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Device Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deviceGroup = $this->DeviceGroups->get($id, [
            'contain' => ['Adgroups', 'Devices']
        ]);

        $this->set('deviceGroup', $deviceGroup);
        $this->set('_serialize', ['deviceGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deviceGroup = $this->DeviceGroups->newEntity();
        if ($this->request->is('post')) {
            $deviceGroup = $this->DeviceGroups->patchEntity($deviceGroup, $this->request->getData());
            if ($this->DeviceGroups->save($deviceGroup)) {
                $this->Flash->success(__('The device group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device group could not be saved. Please, try again.'));
        }
        $adgroups = $this->DeviceGroups->Adgroups->find('list', ['limit' => 200]);
        $devices = $this->DeviceGroups->Devices->find('list', ['limit' => 200]);
        $this->set(compact('deviceGroup', 'adgroups', 'devices'));
        $this->set('_serialize', ['deviceGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Device Group id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deviceGroup = $this->DeviceGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deviceGroup = $this->DeviceGroups->patchEntity($deviceGroup, $this->request->getData());
            if ($this->DeviceGroups->save($deviceGroup)) {
                $this->Flash->success(__('The device group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device group could not be saved. Please, try again.'));
        }
        $adgroups = $this->DeviceGroups->Adgroups->find('list', ['limit' => 200]);
        $devices = $this->DeviceGroups->Devices->find('list', ['limit' => 200]);
        $this->set(compact('deviceGroup', 'adgroups', 'devices'));
        $this->set('_serialize', ['deviceGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deviceGroup = $this->DeviceGroups->get($id);
        if ($this->DeviceGroups->delete($deviceGroup)) {
            $this->Flash->success(__('The device group has been deleted.'));
        } else {
            $this->Flash->error(__('The device group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
