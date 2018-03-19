<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Advs Controller
 *
 * @property \App\Model\Table\AdvsTable $Advs
 */
class AdvsController extends AppController
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
        $advs = $this->paginate($this->Advs);

        $this->set(compact('advs'));
        $this->set('_serialize', ['advs']);
    }

    /**
     * View method
     *
     * @param string|null $id Adv id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adv = $this->Advs->get($id, [
            'contain' => ['Devices']
        ]);

        $this->set('adv', $adv);
        $this->set('_serialize', ['adv']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adv = $this->Advs->newEntity();
        if ($this->request->is('post')) {
            $adv = $this->Advs->patchEntity($adv, $this->request->getData());
            if ($this->Advs->save($adv)) {
                $this->Flash->success(__('The adv has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adv could not be saved. Please, try again.'));
        }
        $devices = $this->Advs->Devices->find('list', ['limit' => 200]);
        $this->set(compact('adv', 'devices'));
        $this->set('_serialize', ['adv']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adv id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adv = $this->Advs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adv = $this->Advs->patchEntity($adv, $this->request->getData());
            if ($this->Advs->save($adv)) {
                $this->Flash->success(__('The adv has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adv could not be saved. Please, try again.'));
        }
        $devices = $this->Advs->Devices->find('list', ['limit' => 200]);
        $this->set(compact('adv', 'devices'));
        $this->set('_serialize', ['adv']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adv id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adv = $this->Advs->get($id);
        if ($this->Advs->delete($adv)) {
            $this->Flash->success(__('The adv has been deleted.'));
        } else {
            $this->Flash->error(__('The adv could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
