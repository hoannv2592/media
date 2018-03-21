<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Datasource\ConnectionManager;
use Cake\Core\App;
use DateTime;


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
        if ($this->request->is('post')) {
            $data_post = $this->request->getData();
            $conditions = array();
            if (isset($data_post['date']) && $data_post['date'] != '') {
                $date = explode(' to ', $data_post['date']);
                $date_form = $date[0];
                $date_to = $date[1];
                $date_to = Datetime::createFromFormat('d-m-Y', $date_to)->format('Y-m-d');
                $date_form = Datetime::createFromFormat('d-m-Y', $date_form)->format('Y-m-d');
                $conditions['Partners.modified >='] = $date_form;
                $conditions['Partners.modified <='] = $date_to;
            }
            if (isset($data_post['name']) && $data_post['name'] != '') {
                $conditions['Partners.name LIKE'] = "%".trim($data_post['name'])."%";
            }
            if (isset($data_post['phone']) && $data_post['phone'] != '') {
                $conditions['Partners.phone'] = trim($data_post['phone']);
            }
            if (isset($data_post['device_name']) && $data_post['device_name'] != '') {
                $conditions['Devices.name LIKE'] = "%".trim($data_post['device_name'])."%";
            }
            if (isset($data_post['client_mac']) && $data_post['client_mac'] != '') {
                $conditions['Partners.client_mac LIKE'] = "%".trim($data_post['client_mac'])."%";
            }
            $this->request->session()->write('conditions', $data_post);
            $this->request->session()->write('data_search', $conditions);
        }
        $user = $this->Auth->user();
        $conditions = $this->request->session()->read('data_search');
        if ($user['role'] == User::ROLE_ONE) {
            $conditions['Devices.delete_flag !='] = DELETED;
            $query = $this->Partners->getOders($conditions);
        } else {
            $device = $this->Devices->find()->where(['user_id' => $user['id']])->select(['id'])->combine('id', 'id')->toArray();
            if (!empty($device)) {
                $conditions = array('device_id IN' => $device, 'Devices.delete_flag !=' => 1);
                $query = $this->Partners->getOders($conditions);
            }
        }
        $conditions = $this->request->session()->read('conditions');
        $partners = $this->paginate($query, ['limit' => $limit_value]);
        $this->set(compact('partners', 'conditions'));
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
