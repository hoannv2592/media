
<?php
// function to verify session status
function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// verifying POST data and adding the values to session variables
if (isset($_POST["code"])) {
    session_start();
    $_SESSION["code"] = $_POST["code"];
    $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
    $ch = curl_init();
    // Set url elements
    $fb_app_id = '2145627442340504';
    $ak_secret = 'e99f0348b8ae26b6b5a32f0ea8ade6dc';
    $token = 'AA|' . $fb_app_id . '|' . $ak_secret;
    // Get access token
    $url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code=' . $_POST["code"] . '&access_token=' . $token;
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    $info = json_decode($result);
    // Get account information
    $url = 'https://graph.accountkit.com/v1.0/me/?access_token=' . $info->access_token;
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);
    $final = json_decode($result);
}
?>
<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 * @var $partner_id
 * @var $infor_devices
 * @var $list_path
 */
$cakeDescription = 'Hệ thống wifi-Maketting';
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9 no-js" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <title>
        <?= $cakeDescription ?>
    </title>
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
            'page3',
        ]
    );
    ?>
    <?php echo $this->Html->script([
            'back_end/jquery-1.11.0.min',
            'jquery.validate',
            'back_end/commom',
            'bootstrap.min',
            'back_end/md5',
            'md5/md5',
//            'sdk.js',
        ]
    );
    echo $this->Html->css('back_end/page3');
    ?>
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>
<?php
$path = isset($infor_devices->path) ? $infor_devices->path : '/images/entry3.jpg';
$type = isset($infor_devices->type) ? $infor_devices->type : '';
$slogan = isset($infor_devices->slogan) ? $infor_devices->slogan : 'Welcome to our <br/> free WiFi!';
$message = isset($infor_devices->message) ? $infor_devices->message : 'Vui lòng nhập số điện thoại để nhận được ưu đãi qua sms';
$title_connect = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Nhận voucher';
$langdingpage_id = isset($infor_devices->langdingpage_id) ? $infor_devices->langdingpage_id : '';
$title_connect_normal = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Đăng ký nhận voucher';
$flag_check_isexit_partner = isset($flag_check_isexit_partner) ? $flag_check_isexit_partner : '2';
$tile_congratulations_return = isset($infor_devices->tile_congratulations_return) ? $infor_devices->tile_congratulations_return : 'Cảm ơn quý khách đã quay lại.!';
if (isset($infor_devices->tile_congratulations_return)) {
    function isJSON($string){
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    if (!empty($infor_devices->tile_congratulations_return)) {
        $isJson = isJSON($infor_devices->tile_congratulations_return);
        if ($isJson) {
            $tile_congratulations = json_decode($infor_devices->tile_congratulations_return);
            $tile_congratulations_return = $tile_congratulations[array_rand($tile_congratulations, 1)];
        } else {
            $tile_congratulations_return = 'Cảm ơn quý khách đã quay lại.!';
        }
    } else {
        $tile_congratulations_return = 'Cảm ơn quý khách đã quay lại.!';
    }
} else {
    $tile_congratulations_return = 'Cảm ơn quý khách đã quay lại.!';
}
$list_path_old = explode(',', $infor_devices->path);
foreach ($list_path_old as $k =>  $item) {
    if ($item != '') {
        $list_path[] = $item;
    }
}
$auth_target = isset($infor_devices->auth_target) ? $infor_devices->auth_target :'';
$apt_device_number = isset($infor_devices->apt_device_number) ? $infor_devices->apt_device_number :'';
?>
<body>
<!-- Inspired by https://codepen.io/transportedman/pen/NPWRGq -->
<div class="carousel slide carousel-fade" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        if (empty($list_path)) { ?>
        <div class="item active"style="
                    background: url('/webroot/images/bg4.jpg');
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    "></div>
        <?php } else {
         foreach ($list_path as $k => $vl) {
            if ($k == 0) { ?>
                <div class="item active"
                     style="
                         background: url('/<?php echo $vl; ?>');
                         -webkit-background-size: cover;
                         -moz-background-size: cover;
                         -o-background-size: cover;
                         background-size: cover;
                         ">

                </div>
            <?php } else { ?>
                <div class="item" style="
                    background: url('/<?php echo $vl; ?>');
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    ">

                </div>
            <?php }
        } }?>
    </div>
</div>
<div class="title text-center">
    <div class="body-content">
        <div class="landing">
            <div class="landing__cover landing__cover--main landing__cover--flexible" >
                <div class="u-ui-padding-x-large landing__cover-wrapper">
                    <div class="landing__cover-content u-color-white">
                        <div class="logo" style="margin-bottom: 20px;">
                            <div class="logo__inner">
                                <?php if (isset($infor_devices->path_logo) && $infor_devices->path_logo != '') { ?>
                                    <a class="" href="javascript:void(0)"><img src="<?php echo '/' . $infor_devices->path_logo; ?>" alt="logo_image" style="height: 100px;"></a>
                                <?php } else { ?>
                                    <a class="" href="javascript:void(0);"><img src="/webroot/images/logo-go-wi-fi-free-fast.png" alt=""></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="c-spacer--x-large c-spacer"></div>
                        <div class="c-text--heading c-text--parent c-text--center c-text"><?php echo isset($infor_devices->tile_name) ? $infor_devices->tile_name: ''; ?></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <div class="c-spacer--xx-large c-spacer"></div>
                        <?php if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) { ?>
                            <div class="redirect">
                                <button type="button" onclick="FBLogin()" class="btn btn-primary btn-success mb-10 br-2 _face"><i class="fa fa-facebook"></i>Login with Facebook </button>
                                <div class="c-spacer"></div>
                                <a class="btn _goog" id="normal_sms" onclick="phone_btn_onclick();"><i class="fa fa-expeditedssl"></i>Login with Sms</a>
                                <div class="c-spacer"></div>
                                <a onclick="email_btn_onclick();" class="btn btn-primary btn-success mb-10 br-2 email"><i class="fa fa-envelope"></i>Login with Email </a>
                                <div class="c-spacer"></div>
                                <a class="btn _wifi" href="<?php echo $infor_devices->auth_target; ?>"><i class="fa fa-wifi"></i>Connect now - Slow</a>
                            </div>
                        <?php } else { ?>
                            <div class="redirect">
                                <form name="sendin" action="<?php echo $infor_devices->link_login_only; ?>" method="post">
                                    <input type="hidden" value="wifimedia" name="username"/>
                                    <input type="hidden" value="wifimedia" name="password"/>
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="false"/>
                                </form>
                                <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="true"/>
                                    <input name="username" type="hidden" value="wifimedia" />
                                    <input name="password" type="hidden" value="wifimedia" />
                                    <button type="button" onclick="FBLogin()" class="btn btn-primary btn-success mb-10 br-2 _face"><i class="fa fa-facebook"></i>Login with Facebook </button><div class="c-spacer"></div>
                                </form>
                                <button onclick="phone_btn_onclick();" class="btn btn-primary btn-success mb-10 br-2 _goog"><i class="fa fa-expeditedssl"></i>Login with Sms </button>
                                <div class="c-spacer"></div>
                                <button onclick="email_btn_onclick();" class="btn btn-primary btn-success mb-10 br-2 email"><i class="fa fa-envelope"></i>Login with Email </button>
                                <div class="c-spacer"></div>
                                <form class="form-validation" style="width: 100%" name="login_slow" id="" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLoginSlow()">
                                    <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                    <input type="hidden" name="popup" value="false"/>
                                    <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                    <input style="display: none;" name="password" type="password" value="wifimedia"/>
                                    <button class="btn btn-primary btn-success mb-10 br-2 _wifi"><i class="fa fa-wifi"></i>Connect now - Slow </button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>

<script type="text/javascript">
    function handleLoginStatus(response){
        if (response.status === 'connected') {
            //display user data
            getFbUserData();
        }
    }

    function getFbUserData(){
        FB.api('/me', {locale: 'en_US', fields: 'id,name,email,gender'}, function(response) {
            var data = {
                partner_id: "<?= $partner_id ?>",
                device_id: "<?= $infor_devices->id ?>",
                user_id: "<?= $infor_devices->user_id; ?>",
                flag_face: "1",
                name: response.name,
                email: response.email};
            $.ajax({
                url: "/Devices/add_log_partner",
                type: "POST",
                data: data,
                cache: false,
                success: function (data) {
                    checkin(data);
                }
            });
        })
    }

        function checkin(data){
        <?php if($infor_devices->fb_fanpage): ?>
        <?php
            $message = '';
            if($infor_devices->fb_checkin_msg)
                $messages = explode(';', $infor_devices->fb_checkin_msg);
                $key = array_rand ($messages);
                $message = $messages[$key];
        ?>
            var fanpage_id = '<?= $infor_devices->fb_fanpage ?>';
            var coordinates = JSON.stringify({latitude: <?= $infor_devices->fb_latitude ?>, longitude: <?= $infor_devices->fb_longtitude ?>});
            FB.api('/me/feed', 'post', { message: "<?= $message ?>", place: fanpage_id, coordinates: coordinates}, function(response){
                        processAuth();
                    // if (data == 'true') {
                    //     processAuth();
                    // }
            });
        <?php else: ?>
                processAuth();
            // if (data == 'true') {
            // }
        <?php endif; ?>
        }

    window.fbAsyncInit = function() {
        // FB JavaScript SDK configuration and setup
        FB.init({
            appId      : '1410831272490928', // FB App ID
            cookie     : true,  // enable cookies to allow the server to access the session
            xfbml      : true,  // parse social plugins on this page
            version    : 'v2.8' // use graph api version 2.8
        });

        // Check whether the user already logged in
        FB.getLoginStatus(handleLoginStatus);
    };

    // Load the JavaScript SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function FBLogin(){
        FB.login(handleLoginStatus, {scope: 'public_profile,email,publish_actions'})
    }

    function processAuth(){
        <?php if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR): ?>
        window.location.href = "<?= $infor_devices->auth_target ?>";
        <?php else: ?>
        doLogin();
        <?php endif ?>
    }

    function doLogin() {
        <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = hexMD5 ('<?php echo $infor_devices->chap_id; ?>' + document.login.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
        document.sendin.submit();
        return false;
    }

    function doLoginSlow() {
        <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login_slow.username.value;
        document.sendin.password.value = hexMD5 ('<?php echo $infor_devices->chap_id; ?>' + document.login_slow.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
        document.sendin.submit();
        return false;
    }
    $('.carousel').carousel();
</script>


<script>
    // initialize Account Kit with CSRF protection
    AccountKit_OnInteractive = function () {
        AccountKit.init(
            {
                appId: 2145627442340504,
                state: "e99f0348b8ae26b6b5a32f0ea8ade6dc",
                version: "v1.0"
            }
            //If your Account Kit configuration requires app_secret, you have to include ir above
        );
    };

    // login callback
    function loginCallback(response) {
        console.log(response);
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            // document.getElementById("code").value = response.code;
            // document.getElementById("csrf_nonce").value = response.state;
            var code = response.code;
            var csrf_nonce = response.state;
            var partner_id = "<?= isset($partner_id) ? $partner_id:'' ?>";
            var type = "<?= $type ?>";
            var url =  '';
            if (type == 1) {
                url = "<?= $infor_devices->auth_target ?>";
            }
            $.ajax({
                url: "/Devices/accountKitFace",
                type: "POST",
                data: {
                    code : code,
                    csrf_nonce: csrf_nonce,
                    partner_id: partner_id,
                },
                success: function (re) {
                    if (type == 1) {
                        window.location.href = url;
                    } else {
                        document.getElementById("login").submit();
                    }
                }
            });

            //document.getElementById("my_form").submit();
        }
        else if (response.status === "NOT_AUTHENTICATED") {
            // handle authentication failure
            console.log("Authentication failure");
        }
        else if (response.status === "BAD_PARAMS") {
            // handle bad parameters
            console.log("Bad parameters");
        }
    }

    // phone form submission handler
    function phone_btn_onclick() {
        // you can add countryCode and phoneNumber to set values
        AccountKit.login('PHONE', {countryCode:'+84'}, // will use default values if this is not specified
            loginCallback);
    }

    // email form submission handler
    function email_btn_onclick() {
        // you can add emailAddress to set value
        AccountKit.login('EMAIL', {}, loginCallback);
    }

    // destroying session
    function logout() {
        document.location = 'logout.php';
    }
</script>
<style>
    .email:hover {
        background-color: #5cb85c !important;
    }
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
