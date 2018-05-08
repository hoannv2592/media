<?php
/**
 * @var \App\View\AppView $flag_voucher
 * @var \App\View\AppView $infor_devices
 * @var \App\View\AppView $device_group
 * @var \App\View\AppView $this
 * @var \App\View\AppView auth_target
 *
 */
$this->layout = 'voucher_congratulations';
$this->assign('title', 'view cáo thiết bị');
$slogan = isset($infor_devices->slogan) ? $infor_devices->slogan : 'Welcome to our <br/> free WiFi!';
$message = isset($infor_devices->message) ? $infor_devices->message : 'Vui lòng nhập số điện thoại để nhận được ưu đãi qua sms';
$path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg';
$langdingpage_id = isset($infor_devices->langdingpage_id) ? $infor_devices->langdingpage_id : '';
$type = isset($infor_devices->type) ? $infor_devices->type : '';
$tile_congratulations = isset($infor_devices->tile_congratulations) ? $infor_devices->tile_congratulations : 'Chúc mừng bạn đã nhận được voucher Bạn hãy đem hình ảnh này đến quầy thu ngân để được nhận khuyến mại.!';
echo $this->Html->css('back_end/page2');
$list_path_old = explode(',', $infor_devices->path);
foreach ($list_path_old as $k =>  $item) {
    if ($item != '') {
        $list_path[] = $item;
    }
}
?>

<div class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        if (empty($list_path)) { ?>
            <div class="item active"style="
                    background: url('/images/bg4.jpg');
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    "></div>
        <?php } else {
            foreach ($list_path as $k => $vl) {
                if ($k == 0) { ?>
                    <div class="item active"style="
                            background: url('/<?php echo $vl; ?>');
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            "></div>
                <?php } else { ?>
                    <div class="item" style="
                            background: url('/<?php echo $vl; ?>');
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            "></div>
                <?php }
            }
        }

         ?>
    </div>
</div>
<?php if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) { ?>
        <div class="landing">
            <div class="landing__cover-overlay"></div>
            <div class="landing__cover landing__cover--main landing__cover--flexible">
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white"></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="logo">
                        <div class="logo__inner">
                            <?php if (isset($infor_devices->path_logo) && $infor_devices->path_logo != '') { ?>
                                <a class="" href="javascript:void(0)"><img src="<?php echo '/'.$infor_devices->path_logo;?>" alt="logo_image" style="height: 100px;"></a>
                            <?php } else { ?>
                                <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt="logo image"></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-text--name c-text--parent c-text--center c-text"><?php echo isset($infor_devices->tile_name) ?  $infor_devices->tile_name: ''; ?></div>
                    <div class="redirect">
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="redirect-wrapper" style="max-width: 280px !important;">
                            <div class="m-text--desc " style="text-align: center;color: red; word-wrap: break-word; font-weight: bold">
                                <?php echo $tile_congratulations; ?>
                            </div>
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

<?php } else { ?>
    <form name="sendin" action="<?php echo $infor_devices->link_login_only; ?>" method="post">
        <input type="hidden" class="need_push_username" name="username"/>
        <input type="hidden" name="password"/>
        <input type="hidden" class="need_push_password" name="password"/>
        <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
        <input type="hidden" name="popup" value="false"/>
    </form>
    <script type="text/javascript">
        function doLogin() {
            <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
            document.sendin.username.value = document.login.username.value;
            document.sendin.password.value = md5 ('<?php echo $infor_devices->chap_id; ?>' + document.login.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
            document.sendin.submit();
            return false;
        }
    </script>
        <div class="landing">
            <div class="landing__cover-overlay"></div>
            <div class="landing__cover landing__cover--main landing__cover--flexible">
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white"></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="logo">
                        <div class="logo__inner">
                            <?php if (isset($infor_devices->path_logo) && $infor_devices->path_logo != '') { ?>
                                <a class="" href="javascript:void(0)"><img src="<?php echo '/'.$infor_devices->path_logo;?>" alt="logo_image" style="height: 100px;"></a>
                            <?php } else { ?>
                                <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt="logo image"></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-text--name c-text--parent c-text--center c-text"><?php echo isset($infor_devices->tile_name) ? $infor_devices->tile_name: ''; ?></div>
                    <div class="redirect">
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="redirect-wrapper" style="max-width: 250px !important;">
                            <div class="m-text--desc " style="text-align: center;color: red">
                                <?php echo $tile_congratulations; ?>
                            </div>
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
<?php } ?>
<style>
    .redirect .btn{
        display: block;
        border: none;
        color: #fff;
        padding: 10px !important;
        font-size: 13px !important;
        line-height: 100%;
        text-align: center;
        width: 100%;
        text-decoration: none;
        position: relative;
    }
    label.error {
        color: red;
        font-size: 12px !important;
        float: left;
        padding-left:0px !important;
    }
</style>
<script>
    $('.carousel').carousel();
</script>

