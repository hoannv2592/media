<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */
$cakeDescription = 'Media ';
?>
<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */
$cakeDescription = 'Media ';
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
    <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
    <meta name="author" content="Codrops" />
    <?php echo $this->Html->css(['back_end/font-awesome.min']); ?>
    <?php echo $this->Html->css([
            'password/bootstrap.min',
            'back_end/my_style',
            'page2',
        ]
    );
    echo $this->Html->script([
            'back_end/jquery-1.11.0.min',
            'back_end/md5',
            'jquery.validate',
            'back_end/commom',
            'bootstrap.min'
        ]
    );
    ?>

</head>
<?php
$slogan = isset($infor_devices->slogan) ? $infor_devices->slogan : 'Welcome to our <br/> free WiFi!';
$message = isset($infor_devices->message) ? $infor_devices->message : 'Vui lòng nhập số điện thoại để nhận được ưu đãi qua sms';
$path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg';
$langdingpage_id = isset($infor_devices->langdingpage_id) ? $infor_devices->langdingpage_id : '';
$type = isset($infor_devices->type) ? $infor_devices->type : '';
$title_connect = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Nhận voucher';
$title_connect_normal = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Đăng ký nhận voucher';
$flag_check_isexit_partner = isset($flag_check_isexit_partner) ? $flag_check_isexit_partner : '2';
$tile_congratulations_return = isset($infor_devices->tile_congratulations_return) ? $infor_devices->tile_congratulations_return : 'Cảm ơn quý khách đã quay lại.!';
$list_path = explode(',', $infor_devices->path);
$auth_target = isset($infor_devices->auth_target) ? $infor_devices->auth_target :'';
$apt_device_number = isset($infor_devices->apt_device_number) ? $infor_devices->apt_device_number :'';
?>
<body>
<!-- Inspired by https://codepen.io/transportedman/pen/NPWRGq -->
<div class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach ($list_path as $k => $vl) {
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
        } ?>
    </div>
</div>
<div class="title text-center">
    <div class="body-content">
        <div class="landing">
        <div class="landing__cover landing__cover--main landing__cover--flexible">
            <div class="u-ui-padding-x-large landing__cover-wrapper">
                <div class="landing__cover-content u-color-white"></div>
                <div class="c-spacer--xx-large c-spacer"></div>
                <div class="logo">
                    <div class="logo__inner">
                        <?php if (isset($infor_devices->path_logo) && $infor_devices->path_logo != '') { ?>
                            <a class="" href="javascript:void(0)"><img src="<?php echo '/' . $infor_devices->path_logo; ?>" alt="logo_image" style="height: 100px;"></a>
                        <?php } else { ?>
                            <a class="" href="javascript:void(0)"><img src="/webroot/images/logo.png" alt="logo image"></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="c-spacer--xx-large c-spacer"></div>
                <div class="c-text--name c-text--parent c-text--center c-text"><?php echo $infor_devices->tile_name; ?></div>
                <div class="redirect">
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="redirect-wrapper" style="max-width: 280px !important;">
                        <div class="m-text--desc " style="text-align: center;color: red; word-wrap: break-word;">
                            <?php echo $tile_congratulations_return; ?>
                        </div>
                        <div class=" c-spacer"></div>
                        <div class="c-cell">
                            <?php if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) { ?>
                                <form class="form-validation" style="width: 100%" name="login"
                                      id="login" action="<?php echo $infor_devices->auth_target; ?>"
                                      method="post">
                                    <input style="width: 100%" type="submit" value="Connect now" class="btn btn-success br-2 mr-5 block /">
                                </form>
                            <?php } else { ?>
                                <form name="sendin" action="<?php echo $infor_devices->link_login_only; ?>" method="post">
                                    <input type="hidden" class="need_push_username" name="username"/>
                                    <input type="hidden" name="password"/>
                                    <input type="hidden" class="need_push_password" name="password"/>
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="false"/>
                                </form>
                                <form class="form-validation" style="width: 100%" name="login" id="login"
                                      action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="true"/>
                                    <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                    <input style="display: none;" name="password" type="password" value="wifimedia"/>
                                    <input style="width: 100%" type="submit" value="Connect now" class="btn btn-success br-2 mr-5 block /">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
<?php echo $this->Html->script(['md5']); ?>
<script type="text/javascript">
    function doLogin() {
        <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = md5 ('<?php echo $infor_devices->chap_id; ?>' + document.login.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
        document.sendin.submit();
        return false;
    }
    $('.carousel').carousel();
</script>
<style>
    html {
        position: relative;
        min-height: 100%;
    }
    .carousel-fade .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
    }
    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }
    .carousel-fade .carousel-control {
        z-index: 2;
    }
    @media all and (transform-3d),
    (-webkit-transform-3d) {
        .carousel-fade .carousel-inner > .item.next,
        .carousel-fade .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.prev,
        .carousel-fade .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.next.left,
        .carousel-fade .carousel-inner > .item.prev.right,
        .carousel-fade .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    .carousel {
        z-index: -99;
    }
    .carousel .item {
        position: fixed;
        width: 100%;
        height: 100%;
    }
    .title {
        text-align: center;
        padding: 10px;
        color: #FFF;
    }
</style>