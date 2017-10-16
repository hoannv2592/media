<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use function MongoDB\BSON\toJSON;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Border;
use PHPExcel_Cell;
use PHPExcel_Style_Fill;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 *
 * @property  \App\Controller\Component\PhpExcelComponent $PhpExcel
 */
class UsersController extends AppController
{

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
                            'Devices.user_id', 'id', 'name'
                        ]);
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
                            'Devices.user_id', 'id', 'name'
                        ]);
                }],
                'conditions' => [
                    'Users.id' => $login['id'],
                    'Users.delete_flag !=' => 1,
                ]
            ])->toArray();
        }
        $this->set(compact('users'));

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add detailPartner method
     * get an infomation partner
     *
     *
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function detailPartner($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $this->getAllData();
        if (!$this->Users->exists(['id' => $id])) {
            return $this->redirect(['action' => 'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set(compact('user'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->getAllData();
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->delete_flag = '0';
            if (empty($user->errors())) {
                if ($this->Users->save($user)) {
                    $conn->commit();
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->getAllData();
        if (!$this->Users->exists(['id' => $id])) {
            return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (empty($user->errors())) {
                if ($this->Users->save($user)) {
                    $conn->commit();
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'edit'.'/'. $id]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit'.'/'. $id]);
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
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
            $user = $this->Users->get($this->request->getData('id'));
            $user->delete_flag = true;
            if (empty($user->errors())) {
                if ($this->Users->save($user)) {
                    $conn->commit();
                    die(json_encode(true));
                } else {
                    $conn->rollback();
                    die(json_encode(false));
                }
            } else {
                $conn->rollback();
                die(json_encode(false));
            }
        }
    }
	
	/**
     * Login method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	public function login()
    {
        $user = $this->Users->newEntity();
        $session = $this->request->session()->read('Users');
        //pr($session);
        if (!empty($session)) {
            $user = $this->Users->get($session['id']);
            if (!empty($user)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
        }
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (empty($user->errors())) {
                $user = $this->Auth->identify();
                if ($user) {
                    if ($user['delete_flag'] != DELETED) {
                        $session = array(
                            'id' => $user['id'],
                            'email' => $this->request->getData()['email'],
                            'password' => $this->request->getData()['password'],
                        );
                        $this->request->session()->write('Users', $session);
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $this->Flash->error(__(ERROR_USERS_OR_PASSWORD));
                    }
                } else {
                    $this->Flash->error(__(ERROR_USERS_OR_PASSWORD));
                }
            } else {
                $this->set('errors', $user->errors());
            }
        }
        $this->set(compact('user'));
    }

    /**
     * logout method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function logout()
    {
        $this->request->session()->delete('Users');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * isEmailExist method
     * check email when add new users
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isEmailExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->Users->find('all', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'email' => $this->request->getData('email'),
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
     * isEmaiEditlExist method
     * check email when edit new users
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isEmaiEditlExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('email') !== $this->request->getData('backup_email')) {
                $query = $this->Users->find('all', array(
                        'recursive' => -1,
                        'conditions' => array(
                            'email' => $this->request->getData('email'),
                            'delete_flag !=' => DELETED
                        ))
                );
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
     * import method
     * check email when edit new users
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function import()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->is('post')) {
            $tmpfName = $this->request->data['file_import'];
            $objPHPExcel = $this->PhpExcel->identify($tmpfName['tmp_name']);
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $this->PhpExcel->getTotalRow($sheet);
            $TotalCol = $this->PhpExcel->getTotalColum($sheet);
            $data = [];
            //----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
            for ($i = 2; $i <= $Totalrow; $i++) {
                //----Lặp cột
                for ($j = 0; $j < $TotalCol; $j++) {
                    // Tiến hành lấy giá trị của từng ô đổ vào mảng
                    $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }
            pr($data);
            die;
        }
    }

    /**
     *
     */
    public function componentExcel()
    {
        $this->autoRender = false;
        $this->loadModel('Sys_User');
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT usr_email, usr_pass, usr_address, usr_service_name, usr_phone from sys_user  WHERE usr_email != "0" limit 100');
        $first_row = $stmt->fetch('assoc');
        $objPHPExcel = $this->PhpExcel->createWorksheet();
        $objPHPExcel->setActiveSheet(0);
        $lable = array();
        $k = 0;
        $lable[0]['label'] = 'Stt';
        foreach ($first_row as $key => $val) {
            $lable[$k+1]['label'] = $key;
            $k++;
        }
        $headerStyle = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb'=>'00B4F2'),
            ),
            'font' => array(
                'bold' => true,
            )
        );

        $objPHPExcel->addTableHeader($lable, array('bold' => true, 'headerStyle' => $headerStyle));
        $objPHPExcel->addTableFooter();
        // all rows
        $rows = $stmt->fetchAll('assoc');
        foreach ($rows as $k => $row) {
            $objPHPExcel->addTableRow($k, $row);
        }
        $fileName = 'data' . '_' . date('Ymd-His').'.xlsx';
        $objPHPExcel->save($fileName, 'Excel2007');
        $objPHPExcel->output($fileName, 'Excel2007');
    }

    /**
     * profileUser METHOD
     *
     *
     * @param null $id
     */
    public function profileUser($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $this->getAllData();
        if (!$this->Users->exists(['id' => $id])) {
            $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }

        $user = $this->Users->get($id,[
            'contain' =>[]
        ]);
        $this->set(compact('user'));
    }

    public function updateProfile($id = null)
    {
        $id = \UrlUtil::_decodeUrl($id);
        $this->autoRender = false;
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->getAllData();
        if (!$this->Users->exists(['id' => $id])) {
            $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }
        $user = $this->Users->get($id,[
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (empty($user->errors())) {
                if ($this->Users->save($user)) {
                    $conn->commit();
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'edit'.'/'. $id]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit'.'/'. $id]);
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

    }
}
