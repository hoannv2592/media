<?php
/**
 * @var \App\View\AppView $uploadData
 * @var \App\View\AppView $device
 * @var \App\View\AppView $filesRowNum
 * @var \App\View\AppView $data_update
 *
 */
?>
<section class="content">
    <div class="container-fluid">
        <!-- File Upload | Drag & Drop OR With Click & Choose -->
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:history.back(-1)">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);">Cài đặt quảng cáo</a>
                </li>
            </ol>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TẠO ẢNH NỀN & TITLE CHO THIẾT BỊ
                        </h2>
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
                        <?php echo $this->Form->create($uploadData, [
                            'type' => 'file',
                            'url' => ['controller' => 'Devices', 'action' => 'imageUploadQC'],
                            'id' => 'uploadForm',
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ]); ?>
                        <label for="email_address">Chọn một ảnh</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                        </div>
                        <?php echo $this->Form->input('device_id', [
                                'type' => 'hidden',
                                'value' => isset($data_update['device_id']) ? $data_update['device_id']:''
                            ]);
                        echo $this->Form->input('user_id', [
                                'type' => 'hidden',
                                'value' => isset($data_update['user_id']) ? $data_update['user_id'] :''
                            ]);
                        echo $this->Form->input('status', [
                                'type' => 'hidden',
                                'value' => isset($data_update['status']) ? $data_update['status']:''
                            ]);
                        echo $this->Form->input('langdingpage_id', [
                                'type' => 'hidden',
                                'value' => isset($data_update['langdingpage_id']) ? $data_update['langdingpage_id']: ''
                            ]);
                        ?>
                        <label for="tile_name">Tên cơ sở dịch vụ</label>
                        <?php
                        ?>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="tile_name" id="tile_name" class="form-control" value="<?php echo isset($device->tile_name) ? $device->tile_name :'';?>" placeholder="Điền tên..">
                            </div>
                        </div>
                        <?php if (isset($data_update['langdingpage_id']) && $data_update['langdingpage_id'] == 1) { ?>
                            <label for="password_device">Mật khẩu thiết bị</label>
                            <div class="form-group" id="end_show">
                                <div class="form-line">
                                    <input type="text" maxlength="8" name="apt_device_number" id="apt_device_number" class="form-control" value="<?php echo isset($device->apt_device_number) ? $device->apt_device_number :'';?>" placeholder="Điền mật khẩu..">
                                </div>
                            </div>
                        <?php } else {
                            echo $this->Form->input('apt_device_number', [
                                'type' => 'hidden',
                                'value' => isset($data_update['apt_device_number']) ? $data_update['apt_device_number']: ''
                            ]);
                        } ?>
                        <?php echo $this->Form->button(__('Cập nhật'), [
                                'type' => 'submit',
                                'id' => 'submit',
                                'onclick' => 'submitContactForm()',
                                'class' => 'btn btn-danger waves-effect m-t-10']
                        ); ?>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .form-control {
        height: auto !important;
    }
</style>
<script type="application/javascript">
	$('#uploadForm').validate({
		
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

    function submitContactForm(){
        var tile_name = $('#tile_name').val();
        var file = $('#file').val();
        var apt_device_number = $('#apt_device_number').val();
        var path = "<?php echo $device->path;?>";
        if(file.trim() == '' ){
            if (path == '') {
                $('#file').focus();
                $('#file-error').remove();
                $('#file').parent().parent().append('<label id="file-error" class="error" for="file">Hãy nhập.</label>');
                $('#submit').attr('disabled', true);
                return false;
            }
        } else if (tile_name.trim() == '' ) {
            $('#tile_name').focus();
            $('#tile_name-error').remove();
            $('#tile_name').parent().parent().append('<label id="tile_name-error" class="error" for="tile_name">Hãy nhập.</label>');
            $('#submit').attr('disabled', true);
            return false;
        } else if (apt_device_number.trim() == '' ) {
			$('#apt_device_number').focus();
            $('#apt_device_number-error').remove();
            $('#apt_device_number').parent().parent().append('<label id="apt_device_number-error" class="error" for="apt_device_number">Hãy nhập.</label>');
            $('#submit').attr('disabled', true);
            return false;
		} else {
            return true;
        }
    }
    $('#tile_name').keyup(function () {
        $('#tile_name-error').remove();
        $('#submit').removeAttr('disabled');
    });
    $('#tile_name').change(function () {
        $('#tile_name-error').remove();
        $('#submit').removeAttr('disabled');
    });
    $('#file').change(function () {
        $('#file-error').remove();
        $('#submit').removeAttr('disabled');
    });
	$('#apt_device_number').change(function () {
        $('#apt_device_number-error').remove();
        $('#submit').removeAttr('disabled');
    })
</script>