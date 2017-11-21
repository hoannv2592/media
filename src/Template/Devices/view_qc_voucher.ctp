<?php
/**
 * @var \App\View\AppView $flag_voucher
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
$type = 2;
echo $this->Html->css('back_end/page2');
$list_path = explode(',', $infor_devices->path);
if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) { ?>
    <div id="fullpage">
        <div class="section" id="section1">
            <?php foreach ($list_path as $k => $vl) { ?>
                <div class="slide" id="slide<?php echo $k + 1; ?>" style="background-image: url('/<?php echo $vl; ?>')">
                    <div class="landing">
                        <div class="landing__cover-overlay"></div>
                        <div class="landing__cover landing__cover--main landing__cover--flexible">
                            <div class="u-ui-padding-x-large landing__cover-wrapper">
                                <div class="landing__cover-content u-color-white"></div>
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
                                        <div class="m-text--desc " style="text-align: center;color: red">Chúc mừng bạn đã nhận được voucher Bạn hãy đem hình ảnh này đến quầy thu ngân để được nhận khuyến mại.!</div>
                                        <div class=" c-spacer"></div>
                                        <div class="c-cell">
                                            <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->auth_target; ?>" method="post">
                                                <input style="width: 100%" type="submit" value="Connect now" class="btn btn-success br-2 mr-5 block /">
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
    </div>
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
    <div class="fullpage">
        <div class="section" id="section1">
            <?php foreach ($list_path as $k => $vl) { ?>
                <div class="slide" id="slide<?php echo $k + 1; ?>" style="background-image: url('/<?php echo $vl; ?>')">
                    <div class="landing">
                        <div class="landing__cover-overlay"></div>
                        <div class="landing__cover landing__cover--main landing__cover--flexible">
                            <div class="u-ui-padding-x-large landing__cover-wrapper">
                                <div class="landing__cover-content u-color-white"></div>
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
                                        <div class="m-text--desc " style="text-align: center;color: red">Chúc mừng bạn đã nhận được voucher Bạn hãy đem hình ảnh này đến quầy thu ngân để được nhận khuyến mại.!</div>
                                        <div class=" c-spacer"></div>
                                        <div class="c-cell">
                                            <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                                <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                                <input type="hidden" name="popup" value="true"/>
                                                <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                                <input style="display: none;" name="password" type="password" value="wifimedia" />
                                                <input style="width: 100%" type="submit" value="Connect now" class="btn btn-success br-2 mr-5 block /">
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
    </div>
<?php } ?>


