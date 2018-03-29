<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Chronos\Date;
use Cake\Datasource\ConnectionManager;
use Cake\Core\App;
use Cake\Utility\Hash;
use DateTime;
use Cake\Collection\Collection;

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
        $current_month = date('m');
        $day_before_ten_day = date('d', strtotime('-10 days'));
        $current = date('d');
        $list_day = array();
        for ($i = $day_before_ten_day; $i <= $current; $i++) {
            $list_day[] = $i.'/'.$current_month;
        }
        $list_day = json_encode(array_values($list_day));
        if ($this->request->is('get')) {
            $date_full_current = date('Y-m-d');
            $date_full_before_ten_day = date('Y-m-d', strtotime('-10 days'));
            $conditions['Partners.created >='] = $date_full_before_ten_day;
            $conditions['Partners.created <='] = $date_full_current;
            $date_to = Datetime::createFromFormat('Y-m-d', $date_full_current)->format('d-m-Y');
            $date_form = Datetime::createFromFormat('Y-m-d', $date_full_before_ten_day)->format('d-m-Y');
            $data_post['date'] = $date_form.' to '. $date_to;
        }
        if ($this->request->is('post')) {
            $data_post = $this->request->getData();
            $conditions = array();
            if (isset($data_post['date']) && $data_post['date'] != '') {
                $date = explode(' to ', $data_post['date']);
                $date_form = $date[0];
                $date_to = $date[1];
                $date_to = Datetime::createFromFormat('d-m-Y', $date_to)->format('Y-m-d');
                $date_form = Datetime::createFromFormat('d-m-Y', $date_form)->format('Y-m-d');
                $conditions['Partners.created >='] = $date_form;
                $conditions['Partners.created <='] = $date_to;
                $list_day = $this->get_label($date);
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
            $this->request->session()->write('data_search', $conditions);
            $conditions = $this->request->session()->read('data_search');
        }
        $this->request->session()->write('conditions', $data_post);
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
        $data = array();
        $total_partner = count($query->toArray());
        foreach ($query->toArray() as $k => $vl) {
            $vl['created'] = date('Y-m-d', strtotime($vl['created']));
            $data[$k] = $vl;
        }
        $partner_phone = Hash::combine($data, '{n}.id', '{n}.phone', '{n}.created');
        $count_phone_partner = array();
        $list_id_partner = array();
        foreach ($partner_phone as  $k => $partner) {
            $phone_partner = array();
            $id_partner = array();
            foreach ($partner as $key => $val) {
                if ($val != '') {
                    $phone_partner[] = $val;
                    $id_partner[] = $key;
                }
            }
            $count_phone_partner[] = count($phone_partner);
            $list_id_partner[] = $id_partner;
        }
        $list_id_partner = call_user_func_array('array_merge', $list_id_partner);
        $partners = Hash::combine($data, '{n}.id', '{n}.num_clients_connect', '{n}.created');
        $count_old_partner = array();
        $count_new_partner = array();
        $chart_number_partner = array();
        foreach ($partners as  $k => $partner) {
            $chart_number_partner[] = count($partner);
            $old_partner = array();
            $new_partner = array();
            foreach ($partner as $key => $val) {
                if ($val > 1) {
                    $old_partner[] = $val;
                } else {
                    $new_partner[] = $val;
                }
            }
            $count_old_partner[] = count($old_partner);
            $count_new_partner[] = count($new_partner);
        }
        $sum_old_partner = array_sum($count_old_partner);
        $sum_new_partner = array_sum($count_new_partner);
        $sum_phone_partner = array_sum($count_phone_partner);
        $chart_number_partner = json_encode($chart_number_partner);
        $count_old_partner = json_encode($count_old_partner);
        $count_new_partner = json_encode($count_new_partner);
        $count_phone_partner = json_encode($count_phone_partner);
        $list_id_partner = json_encode($list_id_partner);
        $conditions = $this->request->session()->read('conditions');
        $partners = $this->paginate($query, ['limit' => $limit_value])->toArray();
        $this->set(compact(
            'partners', 'conditions',
            'list_day', 'chart_number_partner',
            'count_old_partner', 'sum_phone_partner',
            'total_partner', 'count_new_partner',
            'count_phone_partner', 'sum_old_partner', 'sum_new_partner', 'list_id_partner'
        ));
        $this->set('_serialize', ['partners']);
    }

    public function get_label ($date = array())
    {
        $begin = Datetime::createFromFormat('d-m-Y', $date[0])->format('Y-m-d');
        $end = Datetime::createFromFormat('d-m-Y', $date[1])->format('Y-m-d');
        $begin = new DateTime( $begin );
        $end   = new DateTime( $end );
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $list_day[] = $i->format("d");
        }
        return json_encode($list_day);
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
