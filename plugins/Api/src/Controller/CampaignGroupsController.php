<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * CampaignGroups Controller
 *
 * @property \App\Model\Table\CampaignGroupsTable $CampaignGroups
 *
 * @method \App\Model\Entity\CampaignGroup[] paginate($object = null, array $settings = [])
 */
class CampaignGroupsController extends AppController
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
        $query = $this->CampaignGroups
            ->find()
            ->select()
            ->where(['delete_flag !=' => DELETED])
            ->order(['id' => 'DESC']);
        $campaignGroups = $query->toArray();
        $this->set(compact('campaignGroups'));
        $this->set('_serialize', ['campaignGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Campaign Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campaignGroup = $this->CampaignGroups->get($id, [
            'contain' => []
        ]);

        $this->set('campaignGroup', $campaignGroup);
        $this->set('_serialize', ['campaignGroup']);
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
        $campaignGroup = $this->CampaignGroups->newEntity();
        if ($this->request->is('post')) {
            $campaignGroup = $this->CampaignGroups->patchEntity($campaignGroup, $this->request->getData());
            $campaignGroup->delete_flag = UN_DELETED;
            if (empty($campaignGroup->errors())) {
                if ($this->CampaignGroups->save($campaignGroup)) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
            return $this->redirect(['action' => 'index']);
            //$this->Flash->error(__('The campaign group could not be saved. Please, try again.'));
        }
        $this->set(compact('campaignGroup'));
        $this->set('_serialize', ['campaignGroup']);

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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campaignGroup = $this->CampaignGroups->get($this->request->getData('id'), [
                'contain' => []
            ]);
            $campaignGroup = $this->CampaignGroups->patchEntity($campaignGroup, $this->request->getData());
            if (empty($campaignGroup->errors())) {
                if ($this->CampaignGroups->save($campaignGroup)) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                }
            } else {
                $conn->rollback();
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('campaignGroup'));
        $this->set('_serialize', ['campaignGroup']);
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
            $campaignGroup = $this->CampaignGroups->get($this->request->getData('id'));
            $campaignGroup->delete_flag = true;
            if($this->CampaignGroups->save($campaignGroup)){
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
            $query = $this->CampaignGroups->find('all', array(
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
                    'description' => $row['description'],
                    'start_date' => $row['start_date'],
                    'end_date' => $row['end_date'],
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
                $query = $this->CampaignGroups->find('all', array(
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
            $query = $this->CampaignGroups->find('all', array(
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
