<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
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
            'contain' => ['Landingpages']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
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
//                    return $this->redirect(['action' => 'add']);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
//                return $this->redirect(['action' => 'add']);
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
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->getAllData();
        if (!$this->Landingpages->exists($id)) {
            $this->redirect(array('controller' => 'Users', 'action' => 'index'));
        }

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (empty($user->errors())) {
                if ($this->Users->save($user)) {
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
                        $keep_login = isset($this->request->getData()['keep_login']) ? $this->request->getData()['keep_login']:'';
                        if ($keep_login) {
                            $session = array(
                                'id' => $user['id'],
                                'email' => $this->request->getData()['email'],
                                'password' => $this->request->getData()['password'],
                            );
                            $this->request->session()->write('Users', $session);
                        } else {
                            $this->request->session()->delete('Users');
                        }
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
        if ($this->request->is('post')) {
            $tmp_name = $this->request->data['file_import']['tmp_name'];
            $filename = $tmp_name;
            $loadWorksheet = $this->PhpExcel->loadWorksheet($filename)->getActiveSheet();
            $cell = $loadWorksheet->getCell('A1');
            pr($cell); die;
//            $this->dataArray = $excel->getSheet(0)->toArray();
//            pr($this->dataArray);
            die;

        }
    }
}
