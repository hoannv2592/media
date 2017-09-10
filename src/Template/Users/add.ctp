<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $user
 * @var \App\View\AppView $devices
 * @var \App\View\AppView $adgroups
 * @var \App\View\AppView $landingpages
 * @var \App\View\AppView $serviceGroups
 * @var \App\View\AppView $campaignGroups
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> new user
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI USERS</h2>
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
                        <?php echo $this->Form->create('Users', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Tên username"
                                       required>
                                <!--                                <label class="form-label">Tên username</label>-->
                            </div>
                            <div class="help-info">Tên username</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line" id="email_user">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                       required>
                            </div>
                            <div class="help-info">Email</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Mật khẩu" required>
                            </div>
                            <div class="help-info">Mật khẩu</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"
                                       required>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" required>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="role" id="role">
                                    <option disabled selected value> -- Chọn quyền --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User thường</option>
                                </select>
                            </div>
                            <div class="help-info">Loại user</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="landingpage_id" id="landingpage_id">
                                    <option disabled selected value> -- Loại quảng cáo --</option>
                                    <?php foreach ($landingpages as $key => $landingpage) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $landingpage ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info">Loại quảng cáo</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id="submit" type="submit">THÊM MỚI</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        $("#email").parent().removeClass("focused");
        $("div.form-line").removeClass("focused");
        //Advanced Form Validation
        $('#form_advanced_validation').validate({
            onkeyup: false,
            rules: {
                'phone': {
                    number: true
                },
                'email': {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Users/isEmailExist'
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