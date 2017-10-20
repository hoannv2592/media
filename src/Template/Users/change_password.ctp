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
$this->assign('title', 'Đổi mật khẩu user');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">Đổi mật khẩu</a>
                    </li>
                </ol>
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>ĐỔI MẬT KHẨU USER</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?= $this->Flash->render() ?>
                        <?php echo $this->Form->create($user, array(
                            'id' => 'form_advanced_validation_change_password',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'change_password'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false,
                            ),
                            'autocomplete' => "off"
                        ));
                        ?>
                        <label for="email">Mật khẩu cũ</label>
                        <div class="form-group form-float">
                            <div class="form-line" id="email_user">
                                <div class="form-line">
                                    <?php echo $this->Form->input('password', array(
                                            'id' => 'password',
                                            'type' => 'password',
                                            'class' => 'form-control',
                                            'placeholder' => 'Mật khẩu cũ...',
                                            'label' => false,
                                            'required' => false
                                        )
                                    );?>
                                </div>
                            </div>
                            <div class="help-info">Mật khẩu hiện tại</div>
                        </div>
                        <label for="username">Mật khẩu mới</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo $this->Form->input('password_new', array(
                                        'id' => 'password_new',
                                        'type' => 'password',
                                        'class' => 'form-control',
                                        'placeholder' => 'Mật khẩu mới...',
                                        'label' => false,
                                        'required' => false
                                    )
                                );?>
                            </div>
                            <div class="help-info">Mật khẩu mới</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id="submit" type="submit">CẬP NHẬT</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $('#form_advanced_validation_change_password').validate({
        onkeyup: false,
        rules: {},
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
</script>
<style>
    .error-message{
        color: red;
    }
</style>