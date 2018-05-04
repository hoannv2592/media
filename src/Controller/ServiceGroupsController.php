<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use App\Model\Entity\User;
use DateTime;

/**
 * ServiceGroups Controller
 *
 * @property \App\Model\Table\ServiceGroupsTable $ServiceGroups
 * @property \App\Model\Table\PartnerVouchersTable $PartnerVouchers
 * @property \App\Model\Table\PartnersTable $Partners
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\ServiceGroup[] paginate($object = null, array $settings = [])
 */
class ServiceGroupsController extends AppController
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
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $login = $this->Auth->user();
        if ($login['role'] == User::ROLE_ONE) {
            $users = $this->Users->find('all',[
                'contain'  => ['Devices' => function ($q) {
                    return $q
                        ->where([
                            'Devices.delete_flag !=' => 1
                        ])
                        ->select([
                            'Devices.user_id', 'id', 'name',
                            'total' => $q->func()->count('Devices.user_id')
                        ])->group(['Devices.user_id']);
                }],
                'conditions' => [
                    'Users.delete_flag !=' => 1
                ]
            ])->toArray();
        } else {
            $users = $this->Users->find('all',[
                'contain'  => ['Devices' => function ($q) {
                    return $q
                        ->where([
                            'Devices.delete_flag !=' => 1,
                        ])
                        ->select([
                            'Devices.user_id', 'id', 'name',
                            'total' => $q->func()->count('Devices.user_id')
                        ]);
                }],
                'conditions' => [
                    'Users.id' => $login['id'],
                    'Users.delete_flag !=' => 1,
                ]
            ])->toArray();
        }
        $this->set(compact('serviceGroups', 'users'));
        $this->set('_serialize', ['serviceGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Service Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceGroup = $this->ServiceGroups->get($id, [
            'contain' => []
        ]);

        $this->set('serviceGroup', $serviceGroup);
        $this->set('_serialize', ['serviceGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->autoRender = false;
        $serviceGroup = $this->ServiceGroups->newEntity();
        if ($this->request->is('post')) {
            $serviceGroup = $this->ServiceGroups->patchEntity($serviceGroup, $this->request->getData());
            $serviceGroup->delete_flag = false;
            if (empty($serviceGroup->errors())) {
                if ($this->ServiceGroups->save($serviceGroup)) {
                    $conn->commit();
                    //$this->Flash->success(__('The service group has been saved.'));
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->getData()) {
            $serviceGroups = $this->ServiceGroups->get($this->request->getData('id'), [
                'contain' => []
            ]);
            $serviceGroups = $this->ServiceGroups->patchEntity($serviceGroups, $this->request->getData());
            if (empty($serviceGroups->errors())) {
                if ($this->ServiceGroups->save($serviceGroups)) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->request->allowMethod(['post', 'delete']);
        if ($this->request->getData()) {
            $landingpage = $this->ServiceGroups->get($this->request->getData('id'));
            $landingpage->delete_flag = true;
            if($this->ServiceGroups->save($landingpage)){
                $conn->commit();
                die(json_encode(true));
            } else {
                $conn->rollback();
                die(json_encode(false));
            }
        }
    }


    /**
     * load method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function load()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->ServiceGroups->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'id' => $this->request->getData('id'),
                    'delete_flag !=' => DELETED
                )));
            $row = $query->first()->toArray();
            if ($row) {
                $dataExist = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description']
                );
                die(json_encode($dataExist));
            }
        }

    }


    /**
     * isNameExist method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('backup_name') != $this->request->getData('name')) {
                $query = $this->ServiceGroups->find('all', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'name' => $this->request->getData('name'),
                        'delete_flag !=' => DELETED
                    )));


                $number = $query->count();
                if (!$number) {
                    die(json_encode(true));
                } else {
                    die(json_encode(false));
                }
            } else {
                die(json_encode(true));
            }
        }
    }
    /**
     * isNameExistAdd method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameExistAdd()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->ServiceGroups->find('all', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'name' => $this->request->getData('name'),
                        'delete_flag !=' => DELETED
                    ))
            );
            $number = $query->count();
            if (!$number) {
                die(json_encode(true));
            } else {
                die(json_encode(false));
            }
        }
    }

    /**
     *
     * ********************************************
     *
     * @param null $user_id
     * @return void || arra data
     * ***********************************************
     */
    public function seviceDetail($user_id = null)
    {
        $user_id = \UrlUtil::_decodeUrl($user_id);
        $users = $this->Users->find('all',[
            'contain'  => ['Devices' => function ($q) {
                return $q
                    ->where([
                        'Devices.delete_flag !=' => 1
                    ])
                    ->select([
                        'Devices.user_id', 'id', 'name'
                    ]);
            }],
            'conditions' => [
                'Users.delete_flag !=' => 1,
                'id' => $user_id
            ]
        ])->first();
        $limit_value = 10;
        $day_before_ten_day = date('Y-m-d', strtotime('-10 days'));
        $current = date('Y-m-d');
        $get_date = $day_before_ten_day.' to '. $current;
        $list_day = $this->get_label(array($day_before_ten_day, $current));
        $list_date = $this->getListDay(array($day_before_ten_day, $current));
        $list_id_devices = Hash::extract($users['devices'], '{n}.id');
        $list_devices = Hash::combine($users['devices'], '{n}.id', '{n}.name');
        $conditions = array();
        if (isset($_GET) && $_GET != '') {
            $date_full_current = date('Y-m-d');
            $date_full_before_ten_day = date('Y-m-d', strtotime('-10 days'));
            //$date_to = Datetime::createFromFormat('Y-m-d', $date_full_current)->format('Y-m-d');
            // todo get data search created one day vd: 02/03 ---> 03/03
            $date_to = strtotime(date("Y-m-d", strtotime($date_full_current))." +1 days ");
            $date_to = strftime("%Y-%m-%d", $date_to);
            $date_form = Datetime::createFromFormat('Y-m-d', $date_full_before_ten_day)->format('Y-m-d');
            $conditions['Partners.created >='] = $date_full_before_ten_day;
            $conditions['Partners.created <='] = $date_to;
            $data_get['date'] = $date_form.' to '. $date_to;
            if (isset($_GET['date']) && $_GET['date'] != '') {
                $date = explode(' to ', $_GET['date']);
                $date_form = $date[0];
                $date_to = $date[1];
                $flag_date_to = $this->verifyDate($date_to);
                $flag_date_form = $this->verifyDate($date_form);
                if ($flag_date_to) {
                    $date_to = Datetime::createFromFormat('Y-m-d', $date_to)->format('Y-m-d');
                    $conditions['Partners.created <='] = $date_to;
                }
                if ($flag_date_form) {
                    $date_form = Datetime::createFromFormat('Y-m-d', $date_form)->format('Y-m-d');
                    $conditions['Partners.created >='] = $date_form;
                }
                $list_day = $this->get_label($date);
                $list_date = $this->getListDay($date);
            }
            if (isset($_GET['name']) && $_GET['name'] != '') {
                $conditions['Partners.name LIKE'] = "%".trim($_GET['name'])."%";
            }
            if (isset($_GET['phone']) && $_GET['phone'] != '') {
                $conditions['Partners.phone'] = trim($_GET['phone']);
            }
            if (isset($_GET['device_name']) && $_GET['device_name'] != '') {
                $conditions['Devices.name LIKE'] = "%".trim($_GET['device_name'])."%";
            }
            if (isset($_GET['client_mac']) && $_GET['client_mac'] != '') {
                $conditions['Partners.client_mac LIKE'] = "%".trim($_GET['client_mac'])."%";
            }
            if (isset($_GET['number_connect']) && $_GET['number_connect'] != '') {
                switch ($_GET['number_connect']) {
                    case "1":
                        $conditions['Partners.num_clients_connect >='] = $_GET['number_connect'];
                        $conditions['Partners.num_clients_connect <='] = 5;
                        break;
                    case "2":
                        $conditions['Partners.num_clients_connect >='] = 6;
                        $conditions['Partners.num_clients_connect <='] = 10;
                        break;
                    case "3":
                        $conditions['Partners.num_clients_connect >='] = 11;
                        $conditions['Partners.num_clients_connect <='] = 15;
                        break;
                    default:
                        $conditions['Partners.num_clients_connect >='] = 15;
                }
            }
            if (isset($_GET['device']) && $_GET['device'] != '') {
                $conditions['device_id'] = $_GET['device'];
            } else {
                $conditions['device_id IN'] = $list_id_devices;
            }
            $data_get = $_GET;
        }
        $query = $this->Partners->getOders($conditions);
        $new_condition = array();
        foreach ($conditions as $index => $condition) {
            if ($index == 'device_id IN') {
                $index = 'deviceidlist';
            } else if ($index == 'device_id') {
                $index = 'deviceid';
            } else if ($index == 'Partners.num_clients_connect >=') {
                $index = 'Partners.numclientsconnect>=';
            } else if ($index == 'Partners.num_clients_connect <=') {
                $index = 'Partners.numclientsconnect<=';
            }
            $new_condition[$index] = $condition;
        }
        $data = array();
        $total_partner = count($query->toArray());
        foreach ($query->toArray() as $k => $vl) {
            $vl['created'] = date('Y-m-d', strtotime($vl['created']));
            $data[$k] = $vl;
        }
        $old_p = array();
        $new_p = array();
        $phone_p = array();
        $chart_n = array();
        $count_phone_partner = array();
        $list_id_partner = array();
        $count_old_partner = array();
        $count_new_partner = array();
        $chart_number_partner = array();
        if (!empty($data)) {
            $partner_phone = Hash::combine($data, '{n}.id', '{n}.phone', '{n}.created');
            foreach ($partner_phone as  $k => $partner) {
                $phone_partner = array();
                $id_partner = array();
                foreach ($partner as $key => $val) {
                    if ($val != '') {
                        $phone_partner[] = $val;
                        $id_partner[] = $key;
                    }
                }
                $count_phone_partner[$k] = count($phone_partner);
                $list_id_partner[] = $id_partner;
            }
            if (!empty($list_id_partner)) {
                $list_id_partner = call_user_func_array('array_merge', $list_id_partner);
                $list_id_partner = json_encode($list_id_partner);
            }
            $partners = Hash::combine($data, '{n}.id', '{n}.num_clients_connect', '{n}.created');

            foreach ($partners as  $k => $partner) {
                $chart_number_partner[$k] = count($partner);
                $old_partner = array();
                $new_partner = array();
                foreach ($partner as $key => $val) {
                    if ($val > 1) {
                        $old_partner[] = $val;
                    } else {
                        $new_partner[] = $val;
                    }
                }
                $count_old_partner[$k] = count($old_partner);
                $count_new_partner[$k] = count($new_partner);
            }

            foreach ($list_date as $index => $item) {
                if (!isset($count_old_partner[$item])) {
                    $old_p[$index] = 0;
                } else {
                    $old_p[$index] = $count_old_partner[$item];
                }
                if (!isset($count_new_partner[$item])) {
                    $new_p[$index] = 0;
                } else {
                    $new_p[$index] = $count_new_partner[$item];
                }
                if (!isset($count_phone_partner[$item])) {
                    $phone_p[$index] = 0;
                } else {
                    $phone_p[$index] = $count_phone_partner[$item];
                }
                if (!isset($chart_number_partner[$item])) {
                    $chart_n[$index] = 0;
                } else {
                    $chart_n[$index] = $chart_number_partner[$item];
                }
            }
        }
        $sum_old_partner        = array_sum($old_p);
        $sum_new_partner        = array_sum($new_p);
        $sum_phone_partner      = array_sum($phone_p);
        $chart_number_partner   = json_encode($chart_n);
        $count_old_partner      = json_encode($old_p);
        $count_new_partner      = json_encode($new_p);
        $count_phone_partner    = json_encode($phone_p);
        $partners = $this->paginate($query, ['limit' => $limit_value])->toArray();
        $this->set(compact(
            'partners',
            'conditions',
            'new_condition',
            'list_day',
            'data_get',
            'get_date',
            'total_partner',
            'sum_old_partner',
            'sum_new_partner',
            'list_id_partner',
            'count_old_partner',
            'sum_phone_partner',
            'count_new_partner',
            'count_phone_partner',
            'chart_number_partner',
            'list_devices'
        ));
        $this->set('_serialize', ['partners']);
    }

    /**
     * *********************************************************
     *
     * method getLableField
     * @return array
     *
     * * *********************************************************
     */
    public function getLableField()
    {
        $fields_member_histoty = $this->Partners->query()->aliasFields(
            $this->Partners->schema()->columns(), $this->Partners->alias()
        );
        return $fields_member_histoty;
    }

    /**
     * **********************************************
     * @param array $date
     * @return string
     *
     * **************************************
     */
    public function get_label ($date = array())
    {
        if ($this->verifyDate($date[0])) {
            $begin = Datetime::createFromFormat('Y-m-d', $date[0])->format('Y-m-d');
        } else {
            $begin = date('Y-m-d', strtotime('-10 days'));
        }
        if ($this->verifyDate($date[1])) {
            $end = Datetime::createFromFormat('Y-m-d', $date[1])->format('Y-m-d');
        } else {
            $end = date('Y-m-d');
        }
        $begin = new DateTime( $begin );
        $end   = new DateTime( $end );
        $list_day = array();
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $list_day[] = $i->format("d/m/Y");
        }
        $count = count($list_day);
        end($list_day);         // move the internal pointer to the end of the array
        $last_key = key($list_day);  // fetches the key of the element pointed to by the internal pointer
        reset($list_day);
        $first_key = key($list_day);
        $check_list = array($first_key, $last_key);
        if ($count > 7) {
            foreach ($list_day as $k => $vl) {
                if (!in_array($k, $check_list)) {
                    $vl = '';
                }
                $list_day[$k] = $vl;
            }
        }
        return json_encode($list_day);
    }
}


