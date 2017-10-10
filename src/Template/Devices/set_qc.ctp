<?php
/**
 * @var $device_id
 * @var $user_id
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $device
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 */
?>
<style>
    .form-control {
        height: auto !important;
    }
</style>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);">Thông tin các màn hình quảng cáo</a>
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                <?php if (isset($device->path)) { ?>
                                    <tr>
                                        <td><?php echo $device->id; ?></td>
                                        <td><?php echo $device->tile_name; ?></td>
                                        <td class="image"><embed src="<?= '/'.$device->path ?>" width="450" height="300"></td>
                                        <td><?php echo $device->created; ?></td>
                                    </tr>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <?= $this->Flash->render() ?>
                        <?php echo $this->Form->create('energy_input', [
                            'type' => 'file',
                            'url' => ['controller' => 'Devices', 'action' => 'set_qc'.'/'.$device_id.'/'.$user_id],
                            'id' => 'uploadForm',
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ]); ?>

                        <h2 class="card-inside-title"> Chọn loại quảng cáo </h2>
                        <div class="demo-radio-button">
                            <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" <?php if ($device->langdingpage_id == 1 || $device->langdingpage_id == '') { echo 'checked'; } ?> />
                            <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                            <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php if ($device->langdingpage_id == 2) { echo 'checked'; }?> />
                            <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                            <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php if ($device->langdingpage_id == 3) { echo 'checked'; }?> />
                            <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                        </div>
                        <h2 class="card-inside-title">Tên cơ sở dịch vụ</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="tile_name" id="tile_name" class="form-control" value="<?php echo isset($device->tile_name) ? $device->tile_name :'';?>" placeholder="Điền tên..">
                            </div>
                        </div>
                        <div class="check_pass_device">
                            <h2 class="card-inside-title"> Mật khẩu thiết bị </h2>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="apt_device_number" id="apt_device_number" value="<?php echo isset($device->apt_device_number) ? $device->apt_device_number:'' ?>" placeholder="Điền mật khẩu.." class="form-control">
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title"> Chọn một ảnh </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file" id="file" value="<?php echo isset($device->path) ? '/'.$device->path: '';?>" class="form-control">
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
    $(document).ready(function () {
        var langding = "<?php echo $device->langdingpage_id; ?>";
        if (langding != 1) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', '');
        }
    });
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        if (__val != 1) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', '');
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
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.image').html('');
                $('.image').append('<div class="text-center"><img src="'+e.target.result+'" width="450" height="300"/></div>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function () {
        filePreview(this);
    });

    $('.radio-col-grey').change(function () {
        if ($(this).is(':checked')){
            $(this).prop('checked', true).attr('checked', 'checked');
        } else {
            $(this).prop('checked', false).removeAttr('checked');
        }
    });
</script>
