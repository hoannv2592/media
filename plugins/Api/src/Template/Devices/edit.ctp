<?php
/**
  * @var \App\View\AppView $this
 * @var \App\View\AppView $device
 * @var \App\View\AppView $users
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active"><a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'detail-device/'.$device['id']])?>">Thông tin</a></li>
                <li class="active"><a href="javascript:void(0)">Chỉnh sửa thông tin</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN THIẾT BỊ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Devices', array(
                            'id' => 'form_edit_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Devices', 'action' => 'edit'.'/'.$device['id']),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <input id="backup_name_dev" type="hidden" value="<?php echo isset($device['name']) ? $device['name'] :''?>">
                        <label for="name">Tên thiết bị</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name"  value="<?php echo isset($device['name']) ? $device['name'] :''?>" required>
                            </div>
                            <div class="help-info">Tên thiết bị</div>
                        </div>
                        <label for="name">Mã xác thực</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input disabled="disabled" type="text" class="form-control" name="apt_key" id="apt_key" value="<?php echo isset($device['apt_key']) ? $device['apt_key']:''?>" required>
                            </div>
                            <div class="help-info">Mã xác thực</div>
                        </div>
                        <label for="user_id">Chọn tài khoản</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php
                                if ($userData['role'] == \App\Model\Entity\User::ROLE_TOW) {
                                    echo isset($users[$device['user_id']]) ? $users[$device['user_id']]: '';
                                } else { ?>
                                    <select class="form-control required" name="user_id" id="user_id">
                                        <option disabled selected value> -- Chọn tài khoản --</option>
                                        <?php foreach ($users as $key => $user) {
                                            if ($device['user_id'] == $key) { ?>
                                                <option selected="selected" value="<?php echo $key;?>"><?php echo $user ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $key;?>"><?php echo $user ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="help-info">Chọn người dùng</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">CẬP NHẬT</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        //Advanced Form Validation
        $('#form_edit_validation').validate({
            onkeyup: false,
            rules: {
                'name' : {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Devices/isNameEditlExist',
                        data: {
                            backup_name: function () {
                                return $('#backup_name_dev').val();
                            }
                        }
                    }
                }
            },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            }
        });
    });
</script>