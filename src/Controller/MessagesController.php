<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Utility\Hash;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 * @property \App\Model\Table\PartnersTable $Partners
 * @property \App\Model\Table\AdMessagesTable $AdMessages
 * @property \App\Model\Table\DeviceFilesTable $DeviceFiles
 * @property \App\Model\Table\MessageFilesTable $MessageFiles
 * @property  \App\Controller\Component\UploadImageComponent $UploadImage
 */
class MessagesController extends AppController
{


    public function initialize()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        parent::initialize();
        // Include the FlashComponent
        $this->loadComponent('Flash');
        $this->loadComponent('UploadImage');
        $this->loadModel('AdMessages');
        $this->loadModel('MessageFiles');
        $this->loadModel('DeviceFiles');
        $this->loadModel('Devices');
    }

    /**
     * @param null $client_mac
     */
    public function setMessage($client_mac = null)
    {
        $ad_message = $this->AdMessages->find()->first();
        $this->set(compact('ad_message'));
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $admessage = $this->AdMessages->find()->first();
        $id_message = '';
        if (!empty($admessage)) {
            $id_message = $admessage['id'];
        }
        $this->set(compact('id_message'));
        $messages = $this->paginate($this->Partners,['limit' => 15, 'order' => ['id'=>'DESC']]);

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addMessage()
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        //$this->autoRender = false;
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
                $image_up_load = Hash::extract($list_file, '{n}.name');
                unset($this->request->data['backgroud']);
                $adMessage = $this->AdMessages->newEntity();
                $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
                if (empty($adMessage->errors())) {
                        $result = $this->AdMessages->save($adMessage);
                        $record_id = $result->id;
                        foreach ($image_up_load as $k => $vl) {
                            $data_file[] = array(
                                'ad_message_id' => $record_id,
                                'path' => $path[$k],
                                'name' => $vl,
                                'active_flag' => 0
                            );
                        }
                        foreach ($data_file as $k => $item) {
                            $new_back_group = $this->MessageFiles->newEntity();
                            $new_back_group = $this->MessageFiles->patchEntity($new_back_group, $item);
                            if (!$this->MessageFiles->save($new_back_group)) {
                                $conn->rollback();
                            }
                        }
                        $conn->commit();
                        return $this->redirect(['action' => 'index']);
                } else {
                    $conn->rollback();
                    return $this->redirect(['action' => 'addMessage']);
                }
            }
        }
    }

    public function detailMessage($id = null)
    {
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if (!$this->AdMessages->exists($id)) {
            return $this->redirect(['action' => 'index']);
        }
        $adMessage = $this->AdMessages->get($id);
        $back_group = $this->MessageFiles->find()->where(
            [
                'ad_message_id' => $id,
                'active_flag !=' => 1
            ])->select([ 'id','ad_message_id', 'path'])
            ->combine('id', 'path')->toArray();
        $this->set(compact('device', 'back_group', 'id'));
        $this->set('device', $adMessage);
        //$this->autoRender = false;
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
                $image_up_load = Hash::extract($list_file, '{n}.name');
                unset($this->request->data['backgroud']);
                foreach ($image_up_load as $k => $vl) {
                    $data_file[] = array(
                        'ad_message_id' => $id,
                        'path' => $path[$k],
                        'name' => $vl,
                        'active_flag' => 0
                    );
                }
                foreach ($data_file as $k => $item) {
                    $new_back_group = $this->MessageFiles->newEntity();
                    $new_back_group = $this->MessageFiles->patchEntity($new_back_group, $item);
                    if (!$this->MessageFiles->save($new_back_group)) {
                        $conn->rollback();
                    }
                }
                $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
                if (empty($adMessage->errors())) {
                    if ($this->AdMessages->save($adMessage)) {
                        $conn->commit();
                        return $this->redirect(['action' => 'index']);
                    }
                } else {
                    return $this->redirect(['action' => 'detailMessage/'.$id]);
                }
            } else {
                unset($this->request->data['backgroud']);
                $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
                if (empty($adMessage->errors())) {
                    if ($this->AdMessages->save($adMessage)) {
                        $conn->commit();
                        return $this->redirect(['action' => 'index']);
                    }
                } else {
                    $conn->rollback();
                    return $this->redirect(['action' => 'detailMessage/'.$id]);
                }
            }
        }
    }

    public function deleteBackgroud()
    {
        $this->autoRender = false;
        if ($this->request->data) {
            $id_file =  $this->request->data['id'];
            if (isset($id_file)) {
                $backgroud = $this->MessageFiles->get($id_file);
                if (!empty($backgroud)) {
                    $backgroud->active_flag = 1;
                    if ($this->MessageFiles->save($backgroud)) {
                        die(json_encode(true));
                    } else {
                        die(json_encode(false));
                    }
                } else {
                    die(json_encode(false));
                }
            } else {
                die(json_encode(false));
            }
        }
    }

    /**
     * getDataswitchboard method
     *
     * @return \Cake\Http\Response json
     */
    public function getDataswitchboard($phone_number = null)
    {
        $this->autoRender = false;
        $phone_number = $this->slug($url->params['phone']);
        $this->request->allowMethod(['post', 'get', 'put', 'ajax', 'delete']);
        $current_date = date('d-m-Y');
        $month = strtotime(date("d-m-Y", strtotime($current_date)) . "+ 15 days");
        $expired_date = strftime("%d-%m-%Y", $month);
        $code = $this->radomCode();
        if ($phone_number) {
            $save_message = array(
                'expired_date' => $expired_date,
                'phone' => $phone_number,
                'code' => $code,
                'confirm' => 1
            );
            $message = $this->Messages->newEntity();
            $message = $this->Messages->patchEntity($message, $save_message);
            if ($this->Messages->save($message)) {
                $json = array(
                    'status' => 1,
                    'sms' => 'Ma code dang nhap cua ban la : '. $code,
                    'type' => '1'
                );
            } else {
                $json = array(
                    'status' => 0,
                    'sms' => '',
                    'type' => 0
                );
            }
        } else {
            $json = array(
                'status' => 0,
                'sms' => '',
                'type' => 0
            );
        }

        return json_encode($json);
    }

    /**
     * radomCode method
     *
     * @return string
     */
    public function radomCode()
    {
        $length = 5;
        $strRandom = "";
        $sum = 0;
        $chars = "0123456789";
        $size = strlen($chars);
        for ($j = 0; $j < $length; $j++) {
            $rdcheck = $chars[rand(0, $size - 1)];
            $strRandom .= $rdcheck;
            $sum += $rdcheck;
        }
        $number_add = substr($sum, -1, 1);
        if($number_add == 0){
            $strRandom = $strRandom.$number_add;
        }else{
            $number_add = 10 - substr($sum, -1, 1);
            $strRandom = $strRandom.$number_add;
        }
        return $strRandom;
    }

    public function messageAdv($device_id = null)
    {
        if ($device_id) {
            $infor_devices = $this->Devices->get($device_id);
            $logo = $this->DeviceFiles->find()
                ->where(['device_id' => $device_id, 'type' => 2, 'active_flag !=' => 1])
                ->select([ 'id','device_id','path'])
                ->combine('id', 'path')->toArray();
            $back_group = $this->DeviceFiles->find()
                ->where(['device_id' => $device_id, 'type' => 1, 'active_flag !=' => 1])
                ->select([ 'id','device_id', 'path'])
                ->combine('id', 'path')->toArray();
            $back_group = implode(',', $back_group);
            $logo = implode(',', $logo);
            $infor_devices->path = $back_group;
            $infor_devices->path_logo = $logo;
            $this->set(compact('infor_devices'));
        } else {
            return $this->redirect(['controller' => 'Devices', 'action' => 'index']);
        }
    }
}
