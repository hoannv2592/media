<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;


/**
 * Partners Controller
 *
 * @property \App\Model\Table\PartnersTable $Partners
 */
class PartnersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();
        if ($user['role'] == User::ROLE_ONE) {
            $partners = $this->Partners->find('all', [
                'contain' => [
                    'Devices' => function ($q) {
                        return $q
                            ->select(['Devices.name'])
                            ->where(['Devices.delete_flag !=' => 1])
                            ->hydrate(false);
                    }
                ],
            ])->toArray();
        } else {
            $device = $this->Devices->find()->where(['user_id' => $user['id']])->select(['id'])->combine('id', 'id')->toArray();
            $partners = array();
            if (!empty($device)) {
                $partners = $this->Partners->find('all', [
                    'contain' => [
                        'Devices' => function ($q) {
                            return $q
                                ->select(['Devices.name'])
                                ->where(['Devices.delete_flag !=' => 1])
                                ->hydrate(false);
                        }
                    ],
                    'conditions' => array('device_id IN' => $device)
                ])->toArray();
            }
        }
        $this->set(compact('partners'));
        $this->set('_serialize', ['partners']);
    }

    /**
     * View method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partner = $this->Partners->get($id, [
            'contain' => ['Devices']
        ]);

        $this->set('partner', $partner);
        $this->set('_serialize', ['partner']);
    }

    /**
     * View detail_partner
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function detailPartner($id = null)
    {
        if (isset($id)) {
            $id = \UrlUtil::_decodeUrl($id);
            if (!$this->Partners->exists(['id' => $id])) {
                return $this->redirect(array('controller' => 'Partners', 'action' => 'index'));
            }
        }
        $partner = $this->Partners->get($id, [
            'contain' => ['Devices']
        ]);

        $this->set('partner', $partner);
        $this->set('_serialize', ['partner']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partner = $this->Partners->newEntity();
        if ($this->request->is('post')) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The partner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner could not be saved. Please, try again.'));
        }
        $devices = $this->Partners->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partner', 'devices'));
        $this->set('_serialize', ['partner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $partner = $this->Partners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            if (empty($partner->errors())) {
                if ($this->Partners->save($partner)) {
                    $conn->commit();
                    $this->Flash->success(__('The partner has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
        }

        $devices = $this->Partners->Devices->find('list', ['limit' => 200]);
        $this->set(compact('partner', 'devices'));
        $this->set('_serialize', ['partner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partner = $this->Partners->get($id);
        if ($this->Partners->delete($partner)) {
            $this->Flash->success(__('The partner has been deleted.'));
        } else {
            $this->Flash->error(__('The partner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
