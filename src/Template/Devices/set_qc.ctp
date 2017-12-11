<?php
/**
 * @var $device_id
 * @var $user_id
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $device
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 */
$this->assign('title', 'Tạo quảng cáo thiết bị');
?>
<style>
    .form-control {
        height: auto !important;
    }
</style>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);">Thông tin các màn hình quảng cáo</a>
                    </li>
                </ol>
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>TẠO ẢNH NỀN & TITLE CHO THIẾT BỊ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <!-- Table -->
                        <?= $this->Flash->render() ?>
                        <?php echo $this->Form->create('energy_input', [
                            'type' => 'file',
                            'url' => ['controller' => 'Devices', 'action' => 'set_qc'.'/'. UrlUtil::_encodeUrl($device_id).'/'.UrlUtil::_encodeUrl($user_id)],
                            'id' => 'uploadForm',
                            'onsubmit'=>"event.returnValue = checkuploadfile()",
                        ]); ?>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $tile_name = isset($device->tile_name) ? ($device->tile_name):'' ?>
                                <?php echo $this->Form->control('tile_name', array(
                                    'label' => 'Tên cơ sở dịch vụ',
                                    'class' => 'form-control',
                                    'id' => 'tile_name',
                                    'value' => $tile_name,
                                    'placeholder' => 'Điền tên..'
                                ));
                                ?>
                                <div class="help-info">Tên cơ sở dịch vụ</div>
                            </div>
                        </div>
                        <label class=""> Chọn loại quảng cáo </label>
                        <div class="form-group">
                            <div class="form-line">
                                <div class="demo-radio-button">
                                    <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" <?php if ($device->langdingpage_id == 1 || $device->langdingpage_id == '') { echo 'checked'; } ?> />
                                    <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                                    <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php if ($device->langdingpage_id == 2) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                                    <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php if ($device->langdingpage_id == 3) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                                </div>
                            </div>
                            <div class="help-info">Chọn loại quảng cáo</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php $address = isset($device['address']) ? $device['address']:'' ?>
                                <?php echo $this->Form->control('address', array(
                                    'label' => 'Địa chỉ nhóm thiết bị',
                                    'class' => 'form-control',
                                    'id' => 'tile_name',
                                    'value' => $address,
                                    'placeholder' => 'Điền địa chỉ nhóm thiết bị..'
                                ));
                                ?>
                            </div>
                            <div class="help-info">Địa chỉ đặt thiết bị</div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $tile_congratulations_return = isset($device->tile_congratulations_return) ? ($device->tile_congratulations_return):'' ?>
                                <?php echo $this->Form->control('tile_congratulations_return', array(
                                    'label' => 'Tile congratulations return',
                                    'class' => 'form-control',
                                    'value' => $tile_congratulations_return,
                                    'placeholder' => 'Tile congratulations return..'
                                ));
                                ?>
                                <div class="help-info">Tile congratulations return</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $title_connect = isset($device->title_connect) ? ($device->title_connect):'' ?>
                                <?php echo $this->Form->control('title_connect', array(
                                    'label' => 'Title button connect',
                                    'class' => 'form-control',
                                    'value' => $title_connect,
                                    'placeholder' => 'Title button connect..'
                                ));
                                ?>
                                <div class="help-info">Title_connect</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $hidden_connect = isset($device->hidden_connect) ? $device->hidden_connect: '1';
                                echo  $this->Form->input('hidden_connect', array(
                                    'type' => 'select',
                                    'options' => [
                                        '1' => 'Hiển thị button connect-snow',
                                        '2' => 'Không hiển thị'
                                    ],
                                    'empty' => '--- Chọn hiển thị ---',
                                    'label'=> 'Setting hidden button connect-snow',
                                    'value' => $hidden_connect,
                                    'escape' => false,
                                    'error' => false,
                                    'class' => 'form-control required input_select_medium'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable table-hover">
                                <thead>
                                <tr>
                                    <th width="25%">Ảnh logo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($device->path_logo) && $device->path_logo != '') {
                                    $list_background = explode(',', $device->path_logo);
                                    foreach ($list_background as $k => $vl) { ?>
                                        <tr>
                                            <td class="image"><embed src="<?= '/'.$vl ?>" width="450" height="300"></td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label> Logo Image </label>
                            <div class="form-line">
                                <?php
                                $logo_image = isset($device->path_logo) ? ($device->path_logo):''; ?>
                                <input type="file" name="logo_image" id="file" value="<?php echo $logo_image;?>" class="form-control"/>
                                <div class="help-info">logo_image</div>
                            </div>
                        </div>
                        <div class="check_pass_device">
                            <h2 class="card-inside-title"> Mật khẩu thiết bị </h2>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="apt_device_number" id="apt_device_number" value="<?php echo isset($device->apt_device_number) ? $device->apt_device_number: $apt ?>" placeholder="Điền mật khẩu.." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Tên cơ sở dịch vụ</th>
                                    <th width="25%">Ảnh nền</th>
                                    <th width="10%">Ngày tải lên</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($device->path) && $device->path != '') {
                                    $list_background = explode(',', $device->path);
                                    foreach ($list_background as $k => $vl) { ?>
                                        <tr>
                                            <td><?php echo $device->id; ?></td>
                                            <td><?php echo $device->tile_name; ?></td>
                                            <td class="image"><embed src="<?= '/'.$vl ?>" width="450" height="300"></td>
                                            <td><?php echo $device->created; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <h2 class="card-inside-title"> Chọn một ảnh </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" id="file" multiple="multiple" value="<?php echo isset($device->path) ? '/'.$device->path: '';?>" class="form-control">
                            </div>
                        </div>
                        <?php echo $this->Form->input('device_id', [
                            'type' => 'hidden',
                            'value' => $device->id
                        ]);
                        echo $this->Form->input('user_id', [
                            'type' => 'hidden',
                            'value' => $device->user_id
                        ]);
                        echo $this->Form->input('status', [
                            'type' => 'hidden',
                            'value' => $device->status
                        ]);?>
                        <div class="p-l-0 align-left">
                            <button class="btn btn-primary waves-effect" id="submit_delete" type="submit">
                                CÀI ĐẶT
                            </button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
        function checkuploadfile() {
            var $fileUpload = $("input[type='file']");
            if (parseInt($fileUpload.get(0).files.length) > 5){
                alert("You can only upload a maximum of 5 files");
                return false;
            } else {
                return true;
            }
        }
    $(document).ready(function () {

        var langding = "<?php echo $device->langdingpage_id; ?>";
        if (langding == 1 || langding == '') {
            $('.check_pass_device').css('display', '');
        } else if (langding == 3) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
        }
    });
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        if (__val == 1) {
            $('.check_pass_device').css('display', '');
        } else if (__val == 3) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
        }
    });
    $('#uploadForm').validate({
        rules: {
            'tile_name': { required: true },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true }
        },
        messages:{
            'tile_name': { required: 'Hãy nhập' },
            'langdingpage_id': { required: 'Hãy nhập' },
            'apt_device_number': { required: 'Hãy nhập' }
        }
    });
//    function filePreview(input) {
//        if (input.files && input.files[0]) {
//            var reader = new FileReader();
//            reader.onload = function (e) {
//                $('.image').html('');
//                $('.image').append('<div class="text-center"><img src="'+e.target.result+'" width="450" height="300"/></div>');
//            };
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    $("#file").change(function () {
//        filePreview(this);
//    });

    $('.radio-col-grey').change(function () {
        if ($(this).is(':checked')){
            $(this).prop('checked', true).attr('checked', 'checked');
        } else {
            $(this).prop('checked', false).removeAttr('checked');
        }
    });
</script>
