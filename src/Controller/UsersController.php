<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\User;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\BorderBuilder;
use function MongoDB\BSON\toJSON;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;

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
        $conn = ConnectionManager::get('default');
        $conn->begin();
        if ($this->request->is('post')) {
            $tmpfName = $this->request->data['file_import'];
            $objFile = PHPExcel_IOFactory::identify($tmpfName['tmp_name']);
            $objData = PHPExcel_IOFactory::createReader($objFile);
            //Read only data
            $objData->setReadDataOnly(true);
            //Load data to obj
            $objPHPExcel = $objData->load($tmpfName['tmp_name']);
            //Chọn trang cần truy xuất
            $sheet  = $objPHPExcel->setActiveSheetIndex(0);
            //Lấy ra số dòng cuối cùng
            $Totalrow = $sheet->getHighestRow();
            //Lấy ra tên cột cuối cùng
            $LastColumn = $sheet->getHighestColumn();
            //Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];
            //Tiến hành lặp qua từng ô dữ liệu
            //----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
            for ($i = 2; $i <= $Totalrow; $i++) {
                //----Lặp cột
                for ($j = 0; $j < $TotalCol; $j++) {
                    // Tiến hành lấy giá trị của từng ô đổ vào mảng
                    $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
                }
            }
            $new_array = array();
            $arData = array();
            foreach ($data as $datum) {
                foreach ($datum as $key => $item) {
                    if ($key == 0) {
                        $arData['email'] = $item;
                    } else if ($key == 1) {
                        $arData['password'] = $item;
                    } else if ($key == 2) {
                        $arData['address'] = $item;
                    } else if ($key == 3) {
                        $arData['username'] = $item;
                    } else if ($key == 4) {
                        $arData['phone'] = $item;
                    } else if ($key == 5) {
                        $arData['role'] = $item;
                    } else {
                        $arData['delete_flag'] = $item;
                    }
                }
                $new_array[] = $arData;
            }
            foreach ($new_array as $arDatum) {
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $arDatum);
                if (empty($user->errors())) {
                    if ($this->Users->save($user)) {
                        $conn->commit();
                    } else {
                        $conn->rollback();
                    }
                } else {
                    $conn->rollback();
                }
            }
//            $pathinfo = pathinfo($tmp_name['name']);
//            $extension = $pathinfo['extension'];
//            if ($extension == 'xlsx') {
//                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
//            } else {
//                $reader = ReaderFactory::create(Type::CSV); // for CSV files
//            }
//            $reader->open($tmp_name['tmp_name']);
//            foreach ($reader->getSheetIterator() as $index => $sheet) {
//                if ($index != 1) {
//                    break;
//                }
//                $arData = array();
//                $data = array();
//                foreach ($sheet->getRowIterator() as $index_row => $row) {
//                    if ($index_row == 1) {
//                        continue;
//                    }
//                    foreach ($row as $key => $item) {
//                        if ($key == 0) {
//                            $data['email'] = $item;
//                        } else if ($key == 1) {
//                            $data['password'] = $item;
//                        } else if ($key == 2) {
//                            $data['address'] = $item;
//                        } else if ($key == 3) {
//                            $data['username'] = $item;
//                        } else if ($key == 4) {
//                            $data['phone'] = $item;
//                        } else if ($key == 5) {
//                            $data['role'] = $item;
//                        } else {
//                            $data['delete_flag'] = $item;
//                        }
//                    }
//                    $arData[] = $data;
//                    //if ($index_row % 100 == 0) {
//                        //$arData = array();
//                    //}
//                }
//            }
//            // save data
//            foreach ($arData as $arDatum) {
//                $user = $this->Users->newEntity();
//                $user = $this->Users->patchEntity($user, $arDatum);
//                if (empty($user->errors())) {
//                    if ($this->Users->save($user)) {
//                        $conn->commit();
//                    } else {
//                        $conn->rollback();
//                    }
//                } else {
//                    $conn->rollback();
//                }
//            }
//            $reader->close();
//            $this->redirect(['action' => 'index']);

        }

    }

    public function export ()
    {

        $this->autoRender = false;
        $this->loadModel('Sys_User');
        $apt_key = $this->Sys_User->find('all')
            ->select(['usr_id', 'apt_key'])
            ->where(['apt_key !=' => ''])
            ->limit('100')
            ->toArray();
        $users = $this->Users->find()
            ->select(['id'])
            ->where(['delete_flag !=' => DELETED])
            ->limit('100')
            ->combine('id','id')
            ->toArray();
//        $dataSourceObject = ConnectionManager::get('default')->config();
//        $db = (object) $dataSourceObject;
//
//        $conn = sprintf("host=%s dbname=%s user=%s password=%s", $db->host, $db->database, $db->username, $db->password);
//        $link = pg_connect($conn);
//        if (!$link) {
//            die(' connection error!' . pg_last_error());
//            exit();
//        }
//        pg_set_client_encoding("utf8");
//        //get data table
//        $sql = "SELECT * from $tableName";
//        $result = pg_query($sql);
//        if (!$apt_key) {
//            die('no row' . pg_last_error() . $sql);
//        }
        // Instantiate a new PHPExcel object
//        $objPHPExcel = new PHPExcel();
//        // Set the active Excel worksheet to sheet 0
//        $objPHPExcel->setActiveSheetIndex(0);
//        // Initialise the Excel row number
//        $rowCount = 1;
//
//        //start of printing column names as names of MySQL fields
//        $column = 'A';
//        foreach ($apt_key as  $key => $val) {
//            pr($val->toArray());
//        }
//        die;
//
//        for ($i = 1; $i < count($apt_key); $i++) {
//            $columnName = pg_field_name($apt_key, $i);
//            if (!in_array($columnName, array('id', 'created', 'updated'))) {
//                $objPHPExcel->getActiveSheet()->setCellValue($column . $rowCount, $columnName);
//                $column++;
//            }
//        }
        //end of adding column names
        //start while loop to get data
//        $rowCount = 2;
//        while ($row = pg_fetch_row($apt_key)) {
//            $column = 'A';
//            for ($j = 1; $j < pg_num_fields($apt_key); $j++) {
//                $columnName = pg_field_name($apt_key, $j);
//                if (!in_array($columnName, array('id', 'created', 'updated'))) {
//                    if (!isset($row[$j]))
//                        $value = NULL;
//                    elseif ($row[$j] != "")
//                        $value = strip_tags($row[$j]);
//                    else
//                        $value = "";
//
//                    $objPHPExcel->getActiveSheet()->setCellValue($column . $rowCount, $value);
//                    $column++;
//                }
//            }
//            $rowCount++;
//        }
//        // Close DATABASE connection.
//        pg_close($link);

        $data = [
            ['Nguyễn Khánh Linh', 'Nữ', '500k'],
            ['Ngọc Trinh', 'Nữ', '700k'],
            ['Tùng Sơn', 'Không xác định', 'Miễn phí'],
            ['Kenny Sang', 'Không xác định', 'Miễn phí']
        ];
        //Khởi tạo đối tượng
        $excel = new PHPExcel();
        //Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);
        //Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getActiveSheet()->setTitle('demo ghi dữ liệu');

        //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

        //Xét in đậm cho khoảng cột
        $excel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        //Tạo tiêu đề cho từng cột
        //Vị trí có dạng như sau:
        /**
         * |A1|B1|C1|..|n1|
         * |A2|B2|C2|..|n1|
         * |..|..|..|..|..|
         * |An|Bn|Cn|..|nn|
         */
        $excel->getActiveSheet()->setCellValue('A1', 'Tên');
        $excel->getActiveSheet()->setCellValue('B1', 'Giới Tính');
        $excel->getActiveSheet()->setCellValue('C1', 'Đơn giá(/shoot)');
        // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
        // dòng bắt đầu = 2
        $numRow = 2;
        foreach($data as $row){
            $excel->getActiveSheet()->setCellValue('A'.$numRow, $row[0]);
            $excel->getActiveSheet()->setCellValue('B'.$numRow, $row[1]);
            $excel->getActiveSheet()->setCellValue('C'.$numRow, $row[2]);
            $numRow++;
        }












        // Redirect output to a client痴 web browser
        $fileName = 'data' . '_' . date('Ymd-His');
//        $extension = ($typeDownload == 'excel_xlsx') ? '.xlsx' : '.xls';
//        $excelType = ($typeDownload == 'excel_xlsx') ? 'Excel2007' : 'Excel5';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');




















//        $filePath = 'data_'.date('d-m-Y H-i-s');
//        $writer = WriterFactory::create(Type::XLSX); // for XLSX files
//
//        $border = (new BorderBuilder())
//            ->setBorderBottom(Color::GREEN, Border::WIDTH_THIN, Border::STYLE_DASHED)
//            ->build();
//
//        $style = (new StyleBuilder())
//            ->setBorder($border)
//            ->setBackgroundColor(Color::YELLOW)
//            ->setFontSize(12)
//            ->build();
//
//        $writer->openToFile($filePath); // write data to a file or to a PHP stream
//        foreach ($apt_key as $item) {
//            $writer->addRows(array([$item]));
//        }
//
//        foreach ($users as $user) {
//            $writer->addRows(array([$user]));
//        }
//
//        $writer->close();
//        header("Content-Type: application/force-download");
//        header("Content-Type: application/octet-stream");
//        header("Content-Type: application/download");
//        header('Content-type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename="' . $filePath . '".xlsx"');
//        readfile($filePath);
//        if (file_exists(URL_DIRECTORY . $filePath . '.xlsx')) {
//            unlink(URL_DIRECTORY . $filePath . '.xlsx');
//        }
//        exit;
    }

    public function exportexcel() {
        $this->autoRender = false;



    }
}
