<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;


/**
 * Partners Controller
 *
 * @property \App\Model\Table\PartnersTable $Partners
 * @property \App\Model\Table\PartnerVouchersTable $PartnerVouchers
 */
class PartnersController extends AppController
{

    public $paginate = [
        'sortWhitelist' => [
            'Partners.id',
            'Partners.name',
            'Partners.client_mac',
            'Partners.phone',
            'Partners.birthday',
            'Partners.address',
            'Partners.modified',
            'Partners.num_clients_connect',
            'Devices.name'
        ],
        'order' => [
            'Partners.created' => 'desc',
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $limit_value = 10;
        $user = $this->Auth->user();
        if ($user['role'] == User::ROLE_ONE) {
            $conditions = array('Devices.delete_flag !=' => 1);
            $query = $this->Partners->getOders($conditions);
        } else {
            $device = $this->Devices->find()->where(['user_id' => $user['id']])->select(['id'])->combine('id', 'id')->toArray();
            if (!empty($device)) {
                $conditions = array('device_id IN' => $device, 'Devices.delete_flag !=' => 1);
                $query = $this->Partners->getOders($conditions);
            }
        }
        $partners = $this->paginate($query, ['limit' => $limit_value]);
        $this->set(compact('partners'));
        $this->set('_serialize', ['partners']);
    }

    /**
     * View method
     *
     * @param string|null $id Partner id.
     * @return void
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
     * @return \Cake\Http\Response
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
            'contain' => [
                'PartnerVouchers' => function ($q) {
                    return $q
                        ->select([
                            'PartnerVouchers.partner_id', 'PartnerVouchers.id'
                        ]);
                }]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            if (!empty($partner['partner_vouchers'])) {
                $partner_voucher_id = $partner['partner_vouchers'][0]['id'];
                $partner_voucher = $this->PartnerVouchers->get($partner_voucher_id);
                $partner_voucher = $this->PartnerVouchers->patchEntity($partner_voucher, $this->request->getData());
                if (empty($partner->errors())) {
                    if ($this->Partners->save($partner)) {
                        if ($this->PartnerVouchers->save($partner_voucher)) {
                            $conn->commit();
                            return $this->redirect(['action' => 'index']);
                        }
                    } else {
                        $conn->rollback();
                    }
                } else {
                    $conn->rollback();
                }
            } else {
                if (empty($partner->errors())) {
                    if ($this->Partners->save($partner)) {
                        $conn->commit();
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $conn->rollback();
                    }
                } else {
                    $conn->rollback();
                }
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
     * @return \Cake\Http\Response
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
