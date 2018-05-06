<?php
/**
 * @var \App\View\AppView $this
 * @var $userData
 * @var \App\View\AppView $user
 * @var \App\View\AppView $devices
 * @var \App\View\AppView $adgroups
 * @var \App\View\AppView $landingpages
 * @var \App\View\AppView $serviceGroups
 * @var \App\View\AppView $campaignGroups
 * @var \App\View\AppView $role
 */
$this->assign('title', 'Chỉnh sửa người dùng');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>" style="margin-left: 10px">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">Chỉnh sửa thông tin</a>
                    </li>
                </ol>
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
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'edit'.'/'. UrlUtil::_encodeUrl($user['id'])),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false,
                            ),
                            'autocomplete' => "off"
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line" id="email_user">
                                <div class="form-line">
                                    <?php
                                        $email = isset($user['email']) ? ($user['email']):'';
                                        echo $this->Form->control('email', array(
                                            'label' => 'Email',
                                            'class' => 'form-control',
                                            'value' => $email,
                                            'required' => true,
                                            'id' => 'email'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="help-info">Email</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <div class="form-line">
                                    <?php
                                        echo $this->Form->control('password', array(
                                            'type' => 'password',
                                            'label' => 'Mật khẩu',
                                            'class' => 'form-control',
                                            'required' => false,
                                        ));
                                    ?>
                                </div>
                            </div>
                            <div class="help-info">Mật khẩu</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php
                                $username = isset($user['username']) ? ($user['username']):'';
                                echo $this->Form->control('username', array(
                                    'label' => 'Tên người dùng',
                                    'class' => 'form-control',
                                    'escape' => false,
                                    'value' => $username,
                                    'required' => true,
                                ));
                                ?>
                            </div>
                            <div class="help-info">Tên người dùng</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <div class="form-line">
                                    <?php
                                    $phone = isset($user['phone']) ? ($user['phone']):'';
                                    echo $this->Form->control('phone', array(
                                        'label' => 'Số điện thoại',
                                        'class' => 'form-control',
                                        'escape' => false,
                                        'value' => $phone,
                                        'required' => false,
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <div class="form-line">
                                    <?php
                                    $address = isset($user['address']) ? ($user['address']):'';
                                    echo $this->Form->control('address', array(
                                        'label' => 'Địa chỉ',
                                        'class' => 'form-control',
                                        'escape' => false,
                                        'value' => $address,
                                        'required' => false,
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php
                                if ($userData['role'] == \App\Model\Entity\User::ROLE_TOW) {
                                    echo isset($role[$user['role']]) ? $role[$user['role']]: '';
                                } else {
                                    $role_v = isset($user['role']) ? $user['role']: '';
                                    echo  $this->Form->input('role', array(
                                        'type' => 'select',
                                        'options' => $role,
                                        'empty' => '-- chọn quyền --',
                                        'label'=> 'Loại tài khoản',
                                        'value' => $role_v,
                                        'id' => 'role',
                                        'required' => true,
                                        'class' => 'form-control required input_select_medium'
                                    ));
                                 } ?>
                            </div>
                            <div class="help-info">Loại tài khoản</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id="submit" type="submit">CẬP NHẬT</button>
                        <?php echo $this->Form->end(); ?>
                        <div id="email_backup"  value="<?php echo $user['email'] ? $user['email']: ''; ?>" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        //Advanced Form Validation
        $('#form_advanced_validation').validate({
            onkeyup: false,
            rules: {
                'email' : {
                    'email' : true,
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Users/isEmaiEditlExist',
                        data: {
                            backup_email: function () {
                                return $('#email_backup').attr('value');
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
