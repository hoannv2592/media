<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use App\Model\Entity\User;
use Cake\I18n\Number;
use Cake\Core\Configure;
use Cake\Utility\Inflector;
use Cake\Routing\Exception\MissingControllerException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 * @property \App\Model\Table\DevicesTable $Devices
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\LandingpagesTable $Landingpages
 * @property \App\Model\Table\ServiceGroupsTable $ServiceGroups
 * @property \App\Model\Table\CampaignGroupsTable $CampaignGroups
 * @property \App\Model\Table\AdgroupsTable $Adgroups
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('PhpExcel');
		$this->loadComponent('Auth', [
            'authenticate' =>[
                'Form' => [
                    'fields' => [
                        'username' =>'email',
                        'password' => 'password'
                    ],
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
        ]);
        $this->loadModel('Users');
        $this->loadModel('Devices');
        $this->loadModel('Adgroups');
        $this->loadModel('Landingpages');
        $this->loadModel('ServiceGroups');
        $this->loadModel('CampaignGroups');
        $this->Auth->config('authorize', false);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * checkPerms callback.
     *
     * @return bool
     */
    public function checkPerms() {

        $action = Inflector::underscore($this->request->getParam('action'));
        $aryAcoAro = Configure::read('acl.aco.aro');
        $controller = Inflector::camelize($this->request->getParam('controller'));
        $aryAclAcoExcept = Configure::read('acl.aco.except');
        if (!empty($aryAclAcoExcept[$controller][$action])) {
            return true;
        }
        if (!in_array($controller, (array_keys($aryAcoAro)))) {
            throw new MissingControllerException('Controller not found');
        }

        if(!empty($this->Auth->user())){
            $user_type = $this->Auth->user()['role'];
            if(!empty($user_type)){
                $userType = [$user_type];
            }else{
                $userType = [];
            }
        }else{
            $userType = [];
        }
        $row = array();
        foreach ($userType as $value){
            if (!empty($aryAcoAro[$controller]['-' . $action]) && in_array($value, $aryAcoAro[$controller]['-' . $action])) {
                $row[] = false;
            }
            if (!empty($aryAcoAro[$controller][$action]) && in_array($value, $aryAcoAro[$controller][$action])) {
                $row[] = true;
            }
            if (!empty($aryAcoAro[$controller]['*']) && in_array($value, $aryAcoAro[$controller]['*'])) {
                $row[] = true;
            }
        }
        if(in_array(true, $row)){
            return true;
        }else{
            return false;
        }
    }

    public function isAuthorized($user) {

        if ($user['delete_flag'] == DELETED) {
            $this->Session->setFlash('You need to verify your Account first.');
            return false;
        }
        return false;
    }

    public function beforeFilter(Event $event)
    {
        $param = (Router::parse($this->request->here));
        $controller = $param['controller'];
        $this->set('controller', $controller);
        $this->set('action', $param['action']);
        if ($this->Auth->user()) {
            $this->set('userData', $this->Auth->user());
        }
        if (!$this->Auth->user()) {
            $this->Auth->config('authError', false);
        }


        switch ($this->name) {
            case 'Devices':
                $this->Auth->allow('add');
                break;
        }
        return parent::beforeFilter($event); // TODO: Change the autogenerated stub
    }


    /**
     * getAllData method
     *
     * @return array
     */
    public function getAllData()
    {
        $devices = $this->Devices->find()
            ->where(['Devices.delete_flag !=' => DELETED])
            ->select(['Devices.id', 'Devices.name'])
            ->order(['Devices.id'=> 'DESC'])
            ->combine('id', 'name')
            ->toArray();

        $adgroups = $this->Adgroups->find()
            ->where(['Adgroups.delete_flag !=' => DELETED])
            ->select(['Adgroups.id', 'Adgroups.name'])
            ->order(['Adgroups.id' => 'DESC'])
            ->combine('id', 'name')
            ->toArray();

        $landingpages = $this->Landingpages->find()
            ->where(['Landingpages.delete_flag !=' => DELETED])
            ->select(['Landingpages.id', 'Landingpages.name'])
            ->order(['Landingpages.id'=> 'DESC'])
            ->combine('id', 'name')
            ->toArray();

        $campaignGroups = $this->CampaignGroups->find()
            ->where(['CampaignGroups.delete_flag !=' => DELETED])
            ->select(['CampaignGroups.id', 'CampaignGroups.name'])
            ->order(['CampaignGroups.id'=> 'DESC'])
            ->combine('id', 'name')
            ->toArray();

        $serviceGroups = $this->ServiceGroups->find()
            ->where(['ServiceGroups.delete_flag !=' => DELETED])
            ->select(['ServiceGroups.id', 'ServiceGroups.name'])
            ->order(['ServiceGroups.id'=> 'DESC'])
            ->combine('id', 'name')
            ->toArray();
        $users = $this->Users->find()
            ->where(['Users.delete_flag !=' => DELETED])
            ->select(['Users.id', 'Users.username'])
            ->order(['Users.id'=> 'DESC'])
            ->combine('id', 'username')
            ->toArray();
        $role = User::$role;
        $this->set(compact('devices', 'landingpages', 'role', 'users'));
    }


    /**
     * uploads files to the server
     * @params:
     *        $folder    = the folder to upload the files e.g. 'img/files'
     *        $formdata    = the array containing the form files
     *        $itemId    = id of the item (optional) will create a new sub folder
     * @param $folder
     * @param $formdata
     * @param null $itemId
     * @return mixed :
     *        will return an array with the success of each file upload
     */
    function uploadFiles($folder, $formdata, $itemId = null)
    {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url,0755, true);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url,0755, true);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        // loop through and deal with the files
        foreach ($formdata as $file) {
            // replace spaces with underscores
            $filename = str_replace(' ', '_', $file['name']);
            // assume filetype is false
            $typeOK = false;
            // check filetype is ok
            foreach ($permitted as $type) {
                if ($type == $file['type']) {
                    $typeOK = true;
                    break;
                }
            }

            // if file type ok upload the file
            if ($typeOK) {
                // switch based on error code
                switch ($file['error']) {
                    case 0:
                        // check filename already exists
                        if (!file_exists($folder_url . '/' . $filename)) {
                            // create full filename
                            $full_url = $folder_url . '/' . $filename;
                            $url = $rel_url . '/' . $filename;
                            // upload the file
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        } else {
                            // create unique filename and upload file
                            ini_set('date.timezone', 'Europe/London');
                            $now = date('Y-m-d-His');
                            $full_url = $folder_url . '/' . $now . $filename;
                            $url = $rel_url . '/' . $now . $filename;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        }
                        // if upload was successful
                        if ($success) {
                            // save the url of the file
                            $result['urls'][] = $url;
                        } else {
                            $result['errors'][] = "Error uploaded $filename. Please try again.";
                        }
                        break;
                    case 3:
                        // an error occured
                        $result['errors'][] = "Error uploading $filename. Please try again.";
                        break;
                    default:
                        // an error occured
                        $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                        break;
                }
            } elseif ($file['error'] == 4) {
                // no file was selected for upload
                $result['nofiles'][] = "No file Selected";
            } else {
                // unacceptable file type
                $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        }
        return $result;
    }

}
