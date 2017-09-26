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
            <ol class="breadcrumb ">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active"><a href="javascript:void(0)">Tạo mới người dùng</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NGƯỜI DÙNG</h2>
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
                                'div' => false,
                            ),
                            'autocomplete' => "off"
                        ));
                        ?>
                        <label for="username">Tên người dùng</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username"
                                       placeholder="Điền tên người dùng" required>
                            </div>
                            <div class="help-info">Tên người dùng</div>
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group form-float">
                            <div class="form-line" id="email_user">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Điền email"
                                       required>
                            </div>
                            <div class="help-info">Email</div>
                        </div>
                        <label for="password">Mật khẩu</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password"
                                       autofill="off"
                                       placeholder="Mật khẩu" required autocomplete="off">
                            </div>
                            <div class="help-info">Mật khẩu</div>
                        </div>
                        <label for="phone">Số điện thoại</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone" placeholder="Điền số điện thoại"
                                       required>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <label for="address">Địa chỉ</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" placeholder="Điền địa chỉ"
                                       required>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <label for="user_id">Loại tài khoản</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="role" id="role">
                                    <option disabled selected value> -- Chọn quyền --</option>
                                    <option value="1">Admin quản lý</option>
                                    <option value="2">Người dùng thường</option>
                                </select>
                            </div>
                            <div class="help-info">Loại tài khoản</div>
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
                    email: true,
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