<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */

$this->layout = 'landing';
if ($apt_key_check['langdingpage_id'] == \App\Model\Entity\Device::LANDING_THREE) {
    echo $this->Html->css('back_end/page1'); ?>
    <div class="landing">
        <div class="wapper" style="background: url(/webroot/images/entry3.jpg) top center"></div>
        <div class="landing__cover-overlay"></div>
        <div class="landing__cover landing__cover--main landing__cover--flexible">
            <div class="u-ui-padding-x-large landing__cover-wrapper">
                <div class="landing__cover-content u-color-white">
                    <div class="c-text--heading c-text--parent c-text--center c-text">Welcome to our <br/> free WiFi!
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="logo">
                        <div class="logo__inner">
                            <a class="" href="#"><img src="/webroot/images/logo.png" alt="Foody.vn"></a>
                        </div>
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-text--name c-text--parent c-text--center c-text">Cafe Trung Nguyen</div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="discount">
                        <div class="c-text--discount c-text--center c-text cc">
                            Vui lòng nhập số điện thoại để nhận được voucher giảm 50% qua sms
                        </div>
                        <div class="c-spacer--x-large c-spacer"></div>
                        <a class="redirect__discount" href="#modal_discount" data-toggle="modal">Đăng ký nhận
                            voucher</a>
                    </div>
                    <div class="c-spacer--x-large c-spacer"></div>
                    <div class="redirect">
                        <a class="redirect__normal" href="#">Connect now - Slow</a>
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
                    <div class="m-text--discount c-text--center c-text ">
                        Vui lòng nhập số điện thoại để nhận được voucher giảm 50% qua sms
                    </div>
                    <div class="c-spacer--x-large c-spacer"></div>
                    <form action="" name="register_form" class="register_form" method="post" onsubmit="javascript: void (0)">
                        <p><input type="text" id="_reg_full_name" name="_reg_full_name" value="" class="txt_input"
                                  placeholder="Họ và tên"></p>
                        <p><input type="text" id="_reg_telephone" name="_reg_telephone" value="" class="txt_input"
                                  placeholder="Số điện thoại"></p>
                        <p><input type="text" id="_reg_address" name="_reg_address" value="" class="txt_input"
                                  placeholder="Địa chỉ"></p>
                        <p><input type="submit" class="_btn" value="Đăng ký"></p>

                    </form>
                </div>

            </div>
        </div>
    </div>
<?php } else if ($apt_key_check['langdingpage_id'] == \App\Model\Entity\Device::LANDING_TOW) {
    echo $this->Html->css('back_end/page2'); ?>
    <div class="landing">
        <div class="wapper" style="background: url(/webroot/images/entry3.jpg) top center"></div>
        <div class="landing__cover-overlay"></div>
        <div class="landing__cover landing__cover--main landing__cover--flexible">

            <div class="u-ui-padding-x-large landing__cover-wrapper">
                <div class="landing__cover-content u-color-white">
                    <div class="c-text--heading c-text--parent c-text--center c-text">Welcome to our <br/> free WiFi!
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="logo">
                        <div class="logo__inner">
                            <a class="" href="#"><img src="/webroot/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-text--name c-text--parent c-text--center c-text">Cafe Trung Nguyen</div>
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
                                    <input type="password" name="password" id="user_password" class="c-input__value "
                                           placeholder="Nhập mật khẩu">
                                    <div class="c-input__icon js-input-icon">
                                        <div class="u-cursor-pointer js-password-icon">
                                            <div class="c-icon--medium c-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path d="M12,15 C5.372583,15 0,7.5 0,7.5 C0,7.5 5.372583,0 12,0 C18.627417,0 24,7.5 24,7.5 C24,7.5 18.627417,15 12,15 Z M12,10.5 C13.6568543,10.5 15,9.15685425 15,7.5 C15,5.84314575 13.6568543,4.5 12,4.5 C10.3431457,4.5 9,5.84314575 9,7.5 C9,9.15685425 10.3431457,10.5 12,10.5 Z"
                                                          transform="translate(0.000000, 4.500000)" fill="#BBB"
                                                          fill-rule="nonzero" stroke="none" stroke-width="1"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>
                            <div class="c-cell">
                                <div class="c-cell__content">
                                    <div class="c-cell__body">
                                        <button name="button" type="submit"
                                                class="c-button--filled c-button--normal c-button "><span
                                                    class="c-button__content">Sign Up</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo $this->Html->css('back_end/page3'); ?>
    <div class="landing">
        <div class="wapper" style="background: url(/webroot/images/entry3.jpg) top center"></div>
        <div class="landing__cover-overlay"></div>
        <div class="landing__cover landing__cover--main landing__cover--flexible">
            <div class="u-ui-padding-x-large landing__cover-wrapper">
                <div class="landing__cover-content u-color-white">
                    <div class="logo">
                        <div class="logo__inner">
                            <a class="" href="#"><img src="/webroot/images/logo-go-wi-fi-free-fast.png" alt="Foody.vn"></a>
                        </div>
                    </div>
                    <div class="c-text--name c-text--parent c-text--center c-text">Cafe Trung Nguyen</div>
                    <div class="c-spacer--x-large c-spacer"></div>
                    <div class="c-text--heading c-text--parent c-text--center c-text">Welcome to our <br> <font>free
                            WiFi!</font></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="c-spacer--xx-large c-spacer"></div>
                    <div class="redirect">
                        <a class="btn _face" href="javascript:void (0);"><i class="fa fa-facebook"></i>Login with Facebook</a>
                        <div class=" c-spacer"></div>
                        <a class="btn _goog" href="javascript:void (0);"><i class="fa fa-google-plus"></i>Login with Facebook</a>
                        <div class="c-spacer--x-large c-spacer"></div>
                        <a class="btn _wifi" href="javascript:void (0);"><i class="fa fa-wifi"></i>Connect now - Slow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>