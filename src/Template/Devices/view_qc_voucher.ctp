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
                            <div class="c-spacer--xx-large c-spacer"></div>
                            <div class="redirect">
                                <div class="c-spacer--xx-large c-spacer"></div>
                                <div class="c-spacer--xx-large c-spacer"></div>
                                <div class="redirect-wrapper">
<!--                                    <div class="m-text--desc ">Việc truy cập vào mạng wifi này đồng nghĩa với điều khoản sử dụng-->
<!--                                        của chúng tôi-->
<!--                                    </div>-->
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
            </div>
        <?php } ?>
    </div>
</div>
