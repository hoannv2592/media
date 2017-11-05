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
                                <?php if (isset($device->path) && $device->path != '') { ?>
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
                            'url' => ['controller' => 'Devices', 'action' => 'set_qc_mirkotic'.'/'. UrlUtil::_encodeUrl($device_id).'/'.UrlUtil::_encodeUrl($user_id)],
                            'id' => 'uploadForm',
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ]); ?>

                        <h2 class="card-inside-title">Tên cơ sở dịch vụ</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="tile_name" id="tile_name" class="form-control" value="<?php echo isset($device->tile_name) ? $device->tile_name :'';?>" placeholder="Điền tên..">
                            </div>
                        </div>
                        <h2 class="card-inside-title">Địa chỉ đặt thiết bị</h2>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ đặt thiết bị" id="address" value="<?php echo isset($device['address']) ? $device['address']:''?>" required>
                            </div>
                            <div class="help-info">Địa chỉ đặt thiết bị</div>
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
