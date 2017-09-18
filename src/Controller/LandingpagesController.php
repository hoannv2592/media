<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Landingpages Controller
 *
 * @property \App\Model\Table\LandingpagesTable $Landingpages
 *
 * @method \App\Model\Entity\Landingpage[] paginate($object = null, array $settings = [])
 */
class LandingpagesController extends AppController
{

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
        $query = $this->Landingpages
            ->find()
            ->select()
            ->where(['delete_flag !=' => DELETED])
            ->order(['id' => 'DESC']);
        $landingpages = $query->toArray();
        $this->set(compact('landingpages'));
//        $this->set('_serialize', ['landingpages']);
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
            $query = $this->Landingpages->find('all', array(
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
    public function isNameEditExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('backup_name') != $this->request->getData('name')) {
                $query = $this->Landingpages->find('all', array(
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
     * isNameExist method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            $query = $this->Landingpages->find('all', array(
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
        } else {
            die(json_encode(true));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Landingpage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landingpage = $this->Landingpages->get($id, [
            'contain' => []
        ]);

        $this->set('landingpage', $landingpage);
        $this->set('_serialize', ['landingpage']);
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
        $landingpage = $this->Landingpages->newEntity();
        if ($this->request->is('post')) {
            $landingpage = $this->Landingpages->patchEntity($landingpage, $this->request->getData());
            if (empty($landingpage->errors())) {
                if ($this->Landingpages->save($landingpage)) {
                    $conn->commit();
                    $this->Flash->success(__('The landingpage has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('landingpage'));
        $this->set('_serialize', ['landingpage']);
    }

    /**
     * Edit method
     *
     * @param null $id
     * @param string|null $id Landingpages id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->Landingpages->exists($id)) {
            $this->redirect(array('controller' => 'Landingpages', 'action' => 'index'));
        }
        $landingpage = $this->Landingpages->get($id, [
            'contain' => []
        ]);
        if ($this->request->getData()) {
            $landingpage = $this->Landingpages->patchEntity($landingpage, $this->request->getData());
            if (empty($landingpage->errors())) {
                if ($this->Landingpages->save($landingpage)) {
                    $conn->commit();
                    $this->Flash->success(__('The landingpage has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'edit'.'/'. $id]);
                }
            } else {
                $conn->rollback();
                $this->Flash->error(__('The landingpage could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit'.'/'. $id]);
            }
        }
        $this->set(compact('landingpage'));
        $this->set('_serialize', ['landingpage']);
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
            $landingpage = $this->Landingpages->get($this->request->getData('id'));
            $landingpage->delete_flag = true;
            if($this->Landingpages->save($landingpage)){
                $conn->commit();
                die(json_encode(true));
            } else {
                $conn->rollback();
                die(json_encode(false));
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
            $query = $this->Landingpages->find('all', array(
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
     * isNameEditlExist method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function isNameEditlExist()
    {
        $this->autoRender = false;
        if ($this->request->getData()) {
            if ($this->request->getData('name') != $this->request->getData('backup_name')) {
                $query = $this->Landingpages->find('all', array(
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
            } else {
                die(json_encode(true));
            }
        }
    }

    public function detailLangdingpage($id = null)
    {
        if (!$this->Landingpages->exists($id)) {
            $this->redirect(array('controller' => 'Landingpages', 'action' => 'index'));
        }
        $landingpage = $this->Landingpages->get($id,[
            'contain' => []
        ]);
        $this->set(compact('landingpage'));
    }


    public function lanedingDemo($id = null)
    {
        if (!$this->Landingpages->exists($id)) {
            $this->redirect(array('controller' => 'Landingpages', 'action' => 'index'));
        }
        $landingpage = $this->Landingpages->get($id,[
            'contain' => []
        ]);

        if ($landingpage['name'] == 'Quảng Cáo với Facebook') {
            $code_lan = 1;
        } else if ($landingpage[''] == 'Quảng Cáo với Facebook') {
            $code_lan = 2;
        } else {
            $code_lan = 3;
        }
        $this->set(compact('code_lan'));
    }
}

