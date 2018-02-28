<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Utility\Hash;
/**
 * AdMessages Controller
 *
 * @property \App\Model\Table\AdMessagesTable $AdMessages
 * @property  \App\Controller\Component\UploadImageComponent $UploadImage
 */
class AdMessagesController extends AppController
{
    public function initialize()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        parent::initialize();
        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadComponent('UploadImage');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adMessages = $this->paginate($this->AdMessages);

        $this->set(compact('adMessages'));
        $this->set('_serialize', ['adMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adMessage = $this->AdMessages->get($id, [
            'contain' => []
        ]);

        $this->set('adMessage', $adMessage);
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adMessage = $this->AdMessages->newEntity();
        if ($this->request->is('post')) {
            $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->getData());
            if ($this->AdMessages->save($adMessage)) {
                $this->Flash->success(__('The ad message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad message could not be saved. Please, try again.'));
        }
        $this->set(compact('adMessage'));
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adMessage = $this->AdMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->getData());
            if ($this->AdMessages->save($adMessage)) {
                $this->Flash->success(__('The ad message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad message could not be saved. Please, try again.'));
        }
        $this->set(compact('adMessage'));
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adMessage = $this->AdMessages->get($id);
        if ($this->AdMessages->delete($adMessage)) {
            $this->Flash->success(__('The ad message has been deleted.'));
        } else {
            $this->Flash->error(__('The ad message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function setMessage()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        $this->autoRender = false;
        if ($this->request->is('Post')) {
            if (!empty($this->request->data['backgroud'][0]['error'] != 4)) {
                // upload the file to the server
                $new_arr = array();
                $list_file = $this->request->getData('backgroud');
                foreach ($list_file as $k => $vl) {
                    $new_arr[]['file'] = $vl;
                }
                $fileOK = array();
                foreach ($new_arr as $k => $vl) {
                    $fileOK[$k] = $this->UploadImage->uploadFiles('upload/files', $vl);
                }
                $result = Hash::extract($fileOK, '{n}.urls');
                $path = call_user_func_array('array_merge', $result);
                unset($this->request->data['backgroud']);
                $adMessage = $this->AdMessages->newEntity();
                $adMessage->backgroud = implode(',', $path);
                $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
                if (empty($adMessage->errors())) {
                    if ($this->AdMessages->save($adMessage)) {
                        $conn->commit();
                        return $this->redirect(['Controller' => 'messages','action' => 'index']);
                    } else {
                        $conn->rollback();
                        return $this->redirect(['Controller' => 'Controller', 'action' => 'addMessage']);
                    }
                } else {
                    $conn->rollback();
                    return $this->redirect(['Controller' => 'messages', 'action' => 'addMessage']);
                }
            }
        }
    }
}
