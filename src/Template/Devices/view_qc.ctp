<?php
/**
 * @var \App\View\AppView $infor_devices
 * @var \App\View\AppView $device_group
 * @var \App\View\AppView $this
 * @var \App\View\AppView auth_target
 *
 */
$this->layout = 'landing';
$this->assign('title', 'view cáo thiết bị');
$slogan = isset($infor_devices->slogan) ? $infor_devices->slogan : 'Welcome to our <br/> free WiFi!';
$message = isset($infor_devices->message) ? $infor_devices->message : 'Vui lòng nhập số điện thoại để nhận được ưu đãi qua sms';
$path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg';
$langdingpage_id = isset($infor_devices->langdingpage_id) ? $infor_devices->langdingpage_id : '';
$type = isset($infor_devices->type) ? $infor_devices->type : '';
if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) {
    if ($langdingpage_id == \App\Model\Entity\Device::LANDING_THREE) {
        echo $this->Html->css('back_end/page1'); ?>
        <div class="landing">
            <div class="wapper" style="background: url(<?php echo '/' . $path; ?>) top center"></div>
            <div class="landing__cover-overlay"></div>
            <div class="landing__cover landing__cover--main landing__cover--flexible">
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white">
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="logo">
                            <div class="logo__inner">
                                <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="discount">
                            <div class="c-spacer--x-large c-spacer"></div>
                            <a class="redirect__discount" href="#modal_discount" data-toggle="modal">Đăng ký nhận
                                voucher</a>
                        </div>
                        <div class="c-spacer--x-large c-spacer"></div>
                        <div class="redirect">
                            <a class="redirect__normal" href="<?php echo $infor_devices->auth_target; ?>">Connect now -
                                Slow</a>
                        </div>
                    </div>
                </div>
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="c-text--social c-text--parent c-text--center c-text">Our social profiles</div>
                    <ul class="icons mbl">
                        <li class="facebook">
                            <a href="" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="youtube">
                            <a href="" target="_blank"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li class="googleplus">
                            <a href="" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="twitter">
                            <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="modal_discount" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Nhận đăng ký giảm giá</h4>
                    </div>
                    <div class="modal-body">
                        <div class="c-spacer--x-large c-spacer"></div>
                        <form action="#" name="register_form" class="register_form" id="register_form" method="post">
                            <p>
                                <input type="text" id="_reg_full_name" name="full_name" value="" class="txt_input"
                                       placeholder="Họ và tên">
                            </p>
                            <p>
                                <input type="text" id="_reg_telephone" name="telephone" value="" class="txt_input"
                                       placeholder="Số điện thoại">
                            </p>
                            <p><input type="text" id="_reg_address" name="address" value="" class="txt_input"
                                      placeholder="Địa chỉ"></p>
                            <input type="hidden" name="device_id" value="<?php echo $infor_devices->id; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $infor_devices->user_id; ?>">
                            <p><input type="submit" class="_btn" value="Đăng ký"></p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php } else if ($langdingpage_id == \App\Model\Entity\Device::LANDING_ONE) {
        echo $this->Html->css('back_end/page2'); ?>
        <div class="landing">
            <div class="wapper" style="background: url(<?php echo '/' . $path; ?>) top center"></div>
            <div class="landing__cover-overlay"></div>
            <div class="landing__cover landing__cover--main landing__cover--flexible">
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white">
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="logo">
                        <div class="logo__inner">
                            <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                    <div class="redirect">
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="redirect-wrapper">
                            <div class="m-text--desc ">Việc truy cập vào mạng wifi này đồng nghĩa với điều khoản sử dụng
                                của chúng tôi
                            </div>
                            <div class=" c-spacer"></div>
                            <label class="c-input--default c-input--password c-input" for="user_password">
                                <div class="c-input__content js-input-content">
                                    <input type="password" name="password" id="user_password" class="c-input__value " placeholder="Nhập mật khẩu">
                                </div>
                            </label>
                            <div class="c-cell">
                                <div class="c-cell__content">
                                    <div class="c-cell__body">
                                        <a id="submit_password" href="javascript:void (0);"
                                           class="redirect__normal c-button--filled c-button--normal c-button "
                                           onclick="submitContactForm()"><span class="c-button__content">Connect now</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($langdingpage_id == \App\Model\Entity\Device::LANDING_TOW) {
        echo $this->Html->css('back_end/page3');
        $path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg'; ?>
        <div class="landing">
            <div class="wapper" style="background: url(<?php echo '/' . $path; ?>) top center"></div>
            <div class="landing__cover-overlay"></div>
            <div class="landing__cover landing__cover--main landing__cover--flexible">
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white">
                        <div class="logo">
                            <div class="logo__inner"> <a class="" href="javascript:void(0);"><img src="/webroot/images/logo-go-wi-fi-free-fast.png" alt="crm.wifimedia.vn"></a>
                            </div>
                        </div>
                        <div class="c-text--heading c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                        <div class="c-spacer--x-large c-spacer"></div>
                        <div class="redirect">
                            <a class="btn _face" href="<?php echo $infor_devices->auth_target; ?>"><i class="fa fa-facebook"></i>Login with Facebook</a>
                            <div class="c-spacer"></div>
                            <a class="btn _goog" href="<?php echo $infor_devices->auth_target; ?>"><i class="fa fa-google-plus"></i>Login with Google</a>
                            <div class="c-spacer"></div>
                            <a class="btn _wifi" href="<?php echo $infor_devices->auth_target; ?>"><i class="fa fa-wifi"></i>Connect now - Slow</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <?php $this->layout = 'demo'; ?>
        <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);"><b>WIFI</b></a>
                <small>Demo by wifi - media</small>
            </div>
            <div class="card">
                <div class="body">
                    <div class="msg"></div>
                    <div class="">
                        <div class="form-line"></div>
                    </div>
                    <div class="">
                        <div class="form-line"></div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-6 col-xs-offset-3">
                            <a href="<?php echo $infor_devices->auth_target; ?>"
                               class="btn btn-lg btn-block bg-pink waves-effect">Connect to wifi</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xs-6 col-xs-offset-3">
                            <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc' . '/' . UrlUtil::_encodeUrl($infor_devices->id) . '/' . UrlUtil::_encodeUrl($infor_devices->user_id)]); ?>"
                               class="btn btn-lg btn-block bg-purple waves-effect">Setting quảng cáo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
    <?php } ?>
    <script type="application/javascript">
        var url = "<?php echo $infor_devices->auth_target?>";
        function submitContactForm() {
            var pass = $('#user_password').val();
            var __check = "<?php echo $infor_devices->apt_device_number?>";
            if (pass.trim() == '') {
                $('#user_password').focus();
                $('#user_password-error').remove();
                $('#user_password').parent().parent().append('<div id="user_password-error" class="c-input c-input__value " style="color: red;display: block;"><?php echo __("Hãy nhập mật khẩu") ?></div>');
                $('#submit_password').attr('disabled', true);
                return false;
            } else {
                if (pass == __check) {
                    $("#submit_password").attr("href", url);
                    return true;
                } else {
                    $('#user_password').focus();
                    $('#user_password-error').remove();
                    $('#user_password').parent().parent().append('<div id="user_password-error" class="c-input c-input__value " style="color: red;display: block;"><?php echo __("Bạn đã nhập sai mật khẩu") ?></div>');
                    $('#submit_password').attr('disabled', true);
                    return false;
                }
            }
        }

        $('#user_password').keyup(function () {
            $('#submit_password').removeAttr('disabled');
            $('#user_password-error').remove();
        });

        jQuery.validator.addMethod("nonNumeric", function (value, element) {
            return this.optional(element) || isNaN(parseInt(value));
        }, "Hãy nhập đúng tên");
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        }, "Please enter a valid phone number");
        $('#register_form').validate({
            rules: {
                'full_name': {
                    required: true,
                    nonNumeric: true
                },
                'telephone': {
                    required: true,
                    customphone: true,
                    minlength: 10,
                    maxlength: 11
                },
                'address': {
                    required: true
                }
            },
            messages: {
                'full_name': {
                    required: 'Hãy nhập'
                },
                'telephone': {
                    required: 'Hãy nhập',
                    number: 'Hãy nhập số điện thoại',
                    minlength: 'Bạn đã nhập sai số điện thoại'
                },
                'address': {
                    required: 'Hãy nhập'
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "/Devices/add_log",
                    type: "POST",
                    data: $("#register_form").serialize(),
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == 'true') {
                            window.location.href = url;
                            return true;
                        } else {
                            return false;
                        }
                    }
                });
                window.location.href = url;
                return false;
            }
        });

    </script>
    <style>
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #cccccc;
        }

        ::-moz-placeholder { /* Firefox 19+ */
            color: #cccccc;
        }

        :-ms-input-placeholder { /* IE 10+ */
            color: #cccccc;
        }

        :-moz-placeholder { /* Firefox 18- */
            color: #cccccc;
        }

        .c-text--name {
            color: #ffffff;
        }

        .error {
            color: red;
            font-weight: inherit;
        }
    </style>

<?php } else { ?>
<form name="sendin" action="<?php echo $infor_devices->link_login_only; ?>" method="post">
    <input type="hidden" class="need_push_username" name="username"/>
    <input type="hidden" name="password"/>
    <input type="hidden" class="need_push_password" name="password"/>
    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
    <input type="hidden" name="popup" value="true"/>
</form>
<script type="text/javascript">
    function doLogin() {
        <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = hexMD5('<?php echo $infor_devices->chap_id; ?>' + document.login.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
        document.sendin.submit();
        return false;
    }
</script>
<?php if ($langdingpage_id == \App\Model\Entity\Device::LANDING_ONE) {
    echo $this->Html->css('back_end/page2');
    $list_path = explode(',', $infor_devices->path); ?>
    <div id="fullpage">
        <div class="section" id="section1">
            <?php foreach ($list_path as $k => $vl) { ?>
                <div class="slide" id="slide<?php echo $k + 1; ?>" style="background-image: url('/<?php echo $vl; ?>')">
                    <div class="landing">
                        <div class="landing__cover-overlay"></div>
                        <div class="landing__cover landing__cover--main landing__cover--flexible">
                            <div class="u-ui-padding-x-large landing__cover-wrapper">
                                <div class="landing__cover-content u-color-white">
                                </div>
                                <div class="c-spacer--xx-large c-spacer"></div>
                                <div class="logo">
                                    <div class="logo__inner">
                                        <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png"
                                                                                   alt="logo"></a>
                                    </div>
                                </div>
                                <div class="c-spacer--xx-large c-spacer"></div>
                                <div class="c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                                <div class="redirect">
                                    <div class="c-spacer--xx-large c-spacer"></div>
                                    <div class="c-spacer--xx-large c-spacer"></div>
                                    <div class="redirect-wrapper">
                                        <div class="m-text--desc ">Việc truy cập vào mạng wifi này đồng nghĩa với điều khoản sử dụng của chúng tôi</div>
                                        <div class=" c-spacer"></div>
                                        <div class="c-cell">
                                            <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                                <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                                <input type="hidden" name="popup" value="true"/>
                                                <div class="form-group mt-10">
                                                    <input type="password" placeholder="Password" id="password_x" name="password_x" class="form-control underline-input">
                                                </div>
                                                <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                                <input style="display: none;" name="password" type="password" value="wifimedia" />
                                                <input style="width: 100%" type="submit" value="Connect now" class="btn btn-success mb-10 br-2 mr-5 block /">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } elseif ($langdingpage_id == \App\Model\Entity\Device::LANDING_TOW) {
        echo $this->Html->css('back_end/page3');
        $path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg';
        $list_path = explode(',', $infor_devices->path);?>
        <div id="fullpage">
            <div class="section" id="section1">
                <?php foreach ($list_path as $k => $vl) { ?>
                    <div class="slide" id="slide<?php echo $k + 1; ?>" style="background-image: url('/<?php echo $vl; ?>')">
                    <div class="landing">
                        <div class="landing__cover-overlay"></div>
                        <div class="landing__cover landing__cover--main landing__cover--flexible set_center_<?php echo $k + 1; ?>" id="check_<?php echo $k + 1; ?>">
                            <div class="u-ui-padding-x-large landing__cover-wrapper">
                                <div class="landing__cover-content u-color-white">
                                    <div class="logo">
                                        <div class="logo__inner">
                                            <a class="" href="javascript:void(0);"><img src="/webroot/images/logo-go-wi-fi-free-fast.png" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="c-text--heading c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                                    <div class="c-spacer--x-large c-spacer"></div>
                                    <div class="redirect">
                                        <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                            <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                            <input type="hidden" name="popup" value="true"/>
                                            <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                            <input style="display: none;" name="password" type="password" value="wifimedia" />
                                            <button class="btn btn-primary btn-success mb-10 br-2 _face"><i class="fa fa-facebook"></i>Login with Facebook</button>
                                            <button class="btn btn-primary btn-success mb-10 br-2 _goog"><i class="fa fa-google-plus"></i>Login with Google</button>
                                            <button class="btn btn-primary btn-success mb-10 br-2 _wifi"><i class="fa fa-wifi"></i>Connect now - Slow</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } elseif ($langdingpage_id == \App\Model\Entity\Device::LANDING_THREE) {
        echo $this->Html->css('back_end/page1');
        $list_path = explode(',', $infor_devices->path); ?>
        <div id="fullpage">
            <div class="section" id="section1">
                <?php foreach ($list_path as $k => $vl) { ?>
                    <div class="slide" id="slide<?php echo $k + 1; ?>" style="background-image: url('/<?php echo $vl; ?>')">
                        <div class="landing">
                            <div class="landing__cover-overlay"></div>
                            <div class="landing__cover landing__cover--main landing__cover--flexible">
                                <div class="u-ui-padding-x-large landing__cover-wrapper">
                                    <div class="landing__cover-content u-color-white">
                                        <div class="c-spacer--xx-large c-spacer"></div>
                                        <div class="logo">
                                            <div class="logo__inner">
                                                <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="c-spacer--xx-large c-spacer"></div>
                                        <div class="c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                                        <div class="c-spacer--xx-large c-spacer"></div>
                                        <div class="discount">
                                            <div class="c-spacer--x-large c-spacer"></div>
                                            <a class="redirect__discount" href="#modal_discount" data-toggle="modal">Đăng ký nhận voucher</a>
                                        </div>
                                        <div class="c-spacer--x-large c-spacer"></div>
                                        <div class="redirect">
                                            <form class="form-validation" style="width: 100%" name="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                                <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                                <input type="hidden" name="popup" value="true"/>
                                                <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                                <input style="display: none;" name="password" type="password" value="wifimedia" />
                                                <button class="redirect__normal">Connect now - Slow</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="u-ui-padding-x-large landing__cover-wrapper">
                                    <div class="c-text--social c-text--parent c-text--center c-text">Our social profiles</div>
                                    <ul class="icons mbl">
                                        <li class="facebook"><a href="" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="youtube"><a href="" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li class="googleplus"><a href="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="twitter"><a href="" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <div id="modal_discount" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Nhận đăng ký giảm giá</h4>
                            </div>
                            <div class="modal-body">
                                <div class="c-spacer--x-large c-spacer"></div>
                                <form class="form-validation" style="width: 100%" name="login_popup" id="info" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin_popup2()">
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="true"/>
                                    <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                    <input style="display: none;" name="password" type="password" value="wifimedia" />
                                    <p><input type="text" id="_reg_full_name" name="full_name" value="" class="txt_input" placeholder="Họ và tên"></p>
                                    <p><input type="text" id="_reg_telephone" name="telephone" value="" class="txt_input" placeholder="Số điện thoại"></p>
                                    <p><input type="text" id="_reg_address" name="address" value="" class="txt_input" placeholder="Địa chỉ"></p>
                                    <input type="hidden" name="device_id" value="<?php echo $infor_devices->id; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $infor_devices->user_id; ?>">
                                    <p><input type="submit" class="_btn" value="Đăng ký"></p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <?php echo $this->Html->script(['md5']); ?>
    <script type="application/javascript">
        function doLogin_popup2() {
            <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
            document.sendin.username.value = document.login_popup.username.value;
            document.sendin.password.value = md5('<?php echo $infor_devices->chap_id; ?>' + document.login_popup.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
            document.sendin.submit();
            return false;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var username = $('#form_show_username').val();
            var pasword = $('#form_show_password').val();
            $('.need_push_username').val(username);
            $('.need_push_password').val(pasword);
        });
    </script>
    <?php } ?>
<?php echo $this->Html->script(['jquery.validate.min']); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var device_id = '<?php echo  $infor_devices->id;?>';
            $('#login').validate({
                onkeyup: false,
                rules: {
                    'password_x': {
                        required: true,
                        remote: {
                            type: 'POST',
                            async: false,
                            url: '/Devices/checkPassword',
                            data: {
                                device_id: function () {
                                    return device_id;
                                }
                            }
                        }
                    }
                },
                messages: {
                    'password_x': {
                        required: 'Hãy nhập mật khẩu',
                        remote : 'Bạn đã nhập sai mật khẩu, hãy thử lại'
                    }
                }
            });

        });

        jQuery.validator.addMethod("nonNumeric", function (value, element) {
            return this.optional(element) || isNaN(parseInt(value));
        }, "Hãy nhập đúng tên");
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        }, "Please enter a valid phone number");
        $('#info').validate({
            rules: {
                'full_name': {
                    required: true,
                    nonNumeric: true
                },
                'telephone': {
                    required: true,
                    customphone: true,
                    minlength: 10,
                    maxlength: 11
                },
                'address': {
                    required: true
                }
            },
            messages: {
                'full_name': {
                    required: 'Hãy nhập'
                },
                'telephone': {
                    required: 'Hãy nhập',
                    number: 'Hãy nhập số điện thoại',
                    minlength: 'Bạn đã nhập sai số điện thoại'
                },
                'address': {
                    required: 'Hãy nhập'
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "/Devices/add_log",
                    type: "POST",
                    data: $("#register_form").serialize(),
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data === 'true') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                });
                return false;
            }
        });
    </script>
