<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * ServiceGroups Controller
 *
 * @property \App\Model\Table\ServiceGroupsTable $ServiceGroups
 *
 * @method \App\Model\Entity\ServiceGroup[] paginate($object = null, array $settings = [])
 */
class ServiceGroupsController extends AppController
{

    public function beforeRender(Event $event)
    {
//        $this->viewBuilder()->layout('index');
        parent::beforeRender($event); // TODO: Change the autogenerated stub
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->ServiceGroups
            ->find()
            ->select()
            ->where(['delete_flag !=' => DELETED])
            ->order(['id' => 'DESC']);
        $serviceGroups = $query->toArray();
        $this->set(compact('serviceGroups'));
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
}


