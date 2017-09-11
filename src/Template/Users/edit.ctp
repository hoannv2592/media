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
            <ol class="breadcrumb breadcrumb-col-pink">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> Edit user
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
                            'id' => 'form_edit_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'edit'.'/'. $user['id']),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" value="<?php echo $user['username'] ? $user['username']: ''; ?>" required>
                            </div>
                            <div class="help-info">Tên username</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" id="email"  value="<?php echo $user['email'] ? $user['email']: ''; ?>" required>
                            </div>
                            <div class="help-info">Email</div>
                            <input type="hidden" id="email_backup"  value="<?php echo $user['email'] ? $user['email']: ''; ?>" >
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"  name="phone" value="<?php echo $user['phone'] ? $user['phone']: ''; ?>" required>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" value="<?php echo $user['address'] ? $user['address']: ''; ?>" required>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
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
                            </div>
                            <div class="help-info">Loại user</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">CHỈNH SỬA</button>
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
                'phone': {
                    number : true
                },
                'email' : {
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
