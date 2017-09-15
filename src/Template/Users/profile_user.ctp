<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $user
 * @var \App\View\AppView $devices
 * @var \App\View\AppView $adgroups
 * @var \App\View\AppView $landingpages
 * @var \App\View\AppView $serviceGroups
 * @var \App\View\AppView $campaignGroups
 * @var \App\View\AppView $role
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">Chỉnh sửa người dùng</a>
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN USERS</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Users', array(
                            'id' => 'form_edit_validation_profile',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'updateProfile'.'/'. $user['id']),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <label for="Email">Email</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" id="email"  value="<?php echo $user['email'] ? $user['email']: ''; ?>" required>
                            </div>
                            <div class="help-info">Email</div>
                            <input type="hidden" id="email_backup"  value="<?php echo $user['email'] ? $user['email']: ''; ?>" >
                        </div>
                        <label for="username">Tên người dùng</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ? $user['username']: ''; ?>" required>
                            </div>
                            <div class="help-info">Tên username</div>
                        </div>
                        <label for="phone">Số điện thoại</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"  name="phone" value="<?php echo $user['phone'] ? '0'.$user['phone']: ''; ?>" required>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <label for="address">Địa chỉ</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" value="<?php echo $user['address'] ? $user['address']: ''; ?>" required>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <label for="role">Loại người dùng</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php
                                if ($userData['role'] == \App\Model\Entity\User::ROLE_TOW) {
                                    echo isset($role[$user['role']]) ? $role[$user['role']]: '';
                                } else { ?>
                                    <select class="form-control required" name="role" id="role">
                                        <option disabled selected value> -- chọn quyền -- </option>
                                        <?php
                                        foreach ($role as $key => $item) {
                                            if ($user['role'] == $key) { ?>
                                                <option selected="selected" value="<?php echo $key; ?>" ><?php echo $item; ?></option>
                                            <?php } else { ?>
                                                <option  value="<?php echo $key; ?>" ><?php echo $item;?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select>
                                <?php } ?>
                            </div>
                            <div class="help-info">Loại người dùng</div>
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
        $('#form_edit_validation_profile').validate({
            onkeyup: false,
            rules: {
                'phone': {
                    number : true
                },
                'email' : {
                    email : true,
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Users/isEmaiEditlExist',
                        data: {
                            backup_email: function () {
                                return $('#email_backup').val();
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
