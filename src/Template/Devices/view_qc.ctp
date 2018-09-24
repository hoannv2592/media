<?php
/**
 * @var \App\View\AppView $voucher_flag
 * @var \App\View\AppView $infor_devices
 * @var \App\View\AppView $device_group
 * @var \App\View\AppView $this
 * @var \App\View\AppView auth_target
 * @var $partner_id
 * @var $flag_client_mac
 *
 */
$this->layout = 'landing';
$this->assign('title', 'view cáo thiết bị');
$slogan = isset($infor_devices->slogan) ? $infor_devices->slogan : 'Welcome to our <br/> free WiFi!';
$message = isset($infor_devices->message) ? $infor_devices->message : 'Vui lòng nhập số điện thoại để nhận được ưu đãi qua sms';
$path = isset($infor_devices->path) ? $infor_devices->path : 'images/entry3.jpg';
$langdingpage_id = isset($infor_devices->langdingpage_id) ? $infor_devices->langdingpage_id : '';
$passrord = $infor_devices->apt_device_number;
$type = isset($infor_devices->type) ? $infor_devices->type : '';
$title_connect = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Nhận voucher';
$title_connect_normal = isset($infor_devices->title_connect) ? $infor_devices->title_connect : 'Đăng ký nhận voucher';
$flag_check_isexit_partner = isset($flag_check_isexit_partner) ? $flag_check_isexit_partner : '2';
$tile_congratulations_return = isset($infor_devices->tile_congratulations_return) ? $infor_devices->tile_congratulations_return : 'Cảm ơn quý khách đã quay lại.!';
    if ($voucher_flag == 1) {
        //$this->layout = 'voucher_tow';
        $this->layout = 'voucher_modal';
    } else {
        if ($flag_client_mac == 1) {
            $this->layout = 'voucher_one';
        } else {
            if ($type == '' || $type == \App\Model\Entity\Device::TB_NORMAR) {
                if ($langdingpage_id == \App\Model\Entity\Device::LANDING_THREE) {
                    if ($flag_check_isexit_partner == 1) {
                        $this->layout = 'popup_one';
                    } else {

                        //$this->layout = 'popup_tow';
                        $this->layout = 'popup_modal';
                    }
                } else if ($langdingpage_id == \App\Model\Entity\Device::LANDING_ONE) {
                    $this->layout = 'password';
                } else if ($langdingpage_id == \App\Model\Entity\Device::LANDING_TOW) {
                    $this->layout = 'facebook';
                } else { ?>
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
                <?php }
            } else {
                if ($langdingpage_id == \App\Model\Entity\Device::LANDING_ONE) {
                    $this->layout = 'password';
                } elseif ($langdingpage_id == \App\Model\Entity\Device::LANDING_TOW) {
                    $this->layout = 'facebook';
                } elseif ($langdingpage_id == \App\Model\Entity\Device::LANDING_THREE) {
                    if ($flag_check_isexit_partner == 1) {
                        $this->layout = 'popup_one';
                    } else {
                        //$this->layout = 'popup_tow';
                        $this->layout = 'popup_modal';
                    }
                } else { ?>
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

                                        <form class="form-validation" style="width: 100%" name="login" id="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                                            <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                                            <input type="hidden" name="popup" value="true"/>
                                            <input style="display: none;" name="username" type="text" value="wifimedia"/>
                                            <input style="display: none;" name="password" type="password" value="wifimedia"/>
                                            <input style="width: 100%" type="submit" value="Connect to wifi" class="btn btn-lg btn-block bg-pink waves-effect">
                                        </form>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-xs-6 col-xs-offset-3">
                                        <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc_mirkotic' . '/' . UrlUtil::_encodeUrl($infor_devices->id) . '/' . UrlUtil::_encodeUrl($infor_devices->user_id)]); ?>"
                                           class="btn btn-lg btn-block bg-purple waves-effect">Setting quảng cáo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
                <?php }
            }
        }
    }
    ?>
