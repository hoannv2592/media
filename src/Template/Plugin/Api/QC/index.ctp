
<?php
/**
 * @var \App\View\AppView $apt_key_check
 * @var \App\View\AppView $this
 */

pr($apt_key_check);

?>
<?php echo $this->Html->css(['page1', 'page2' , 'page3']);?>

<?php $this->layout = 'landing'; ?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý thiết bị
                            <small>Description text here...</small>
                        </h2>
                        <ul class="header-dropdown m-r-0">
                            <li>
                                <a href="javascript:void(0);">
                                    <i class="material-icons">info_outline</i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i class="material-icons">help_outline</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="landing" >

                            <div class="wapper"  style="background: url(/webroot/images/entry3.png) top center"></div>

                            <div class="landing__cover-overlay"></div>
                            <div class="landing__cover landing__cover--main landing__cover--flexible"  >

                                <div class="u-ui-padding-x-large landing__cover-wrapper">
                                    <div class="landing__cover-content u-color-white">
                                        <div class="c-text--heading c-text--parent c-text--center c-text">Welcome to our <br/> free WiFi!</div>
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
                                            <a class="redirect__discount" href="#modal_discount"  data-toggle="modal">Đăng ký nhận voucher</a>
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


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal HTML -->
    <div id="modal_discount" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Nhận đăng ký giảm  giá</h4>
                </div>
                <div class="modal-body">
                    <div class="m-text--discount c-text--center c-text ">
                        Vui lòng nhập số điện thoại để nhận được voucher giảm 50% qua sms
                    </div>
                    <div class="c-spacer--x-large c-spacer"></div>
                    <form action="" name="register_form" class="register_form" method="post" onsubmit="javascript: submit_form_register();return false;">
                        <p><input type="text" id="_reg_full_name" name="_reg_full_name" value="" class="txt_input" placeholder="Họ và tên"></p>
                        <p><input type="text" id="_reg_telephone" name="_reg_telephone" value="" class="txt_input" placeholder="Số điện thoại"></p>
                        <p><input type="text" id="_reg_address" name="_reg_address" value="" class="txt_input" placeholder="Địa chỉ"></p>
                        <p><input type="submit" class="_btn" value="Đăng ký"></p>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php

if ($apt_key_check['langdingpage_id'] == \App\Model\Entity\Device::LANDING_ONE) {

} else if ($apt_key_check['langdingpage_id'] == \App\Model\Entity\Device::LANDING_TOW) {

} else {

}




?>


<script>

    function initialize(){
        var w = $(window).width();//画面(ウィンドウ)の幅、高さを取得
        var h = $(window).height();


        //console.log('centering : ' + nowModalSyncer + ' ::: cw : ' + ((w - cw)/2) + ' ::: ch : ' + ((h - ch)/2));
        $('.landing ').css({"min-height":$(window).height() - $('.body-content').offset().top});//センタリングを実行する


        if($(window).width() < 768){
            $('.modal-dialog').css({"left": "", "top":"","position":'relative'});//センタリングを実行する
            $('.landing__cover ').css({"left": "", "top":"","position":"relative","margin": "0 auto"});//センタリングを実行する
        } else {
            //コンテンツ(#modal-content)の幅、高さを取得
            cw = $('.landing__cover ').outerWidth();//outerWidth({margin:true});
            ch = $('.landing__cover ').outerHeight();//outerHeight({margin:true});
            $('.landing__cover ').css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px","position":'absolute',"margin": ""});//センタリングを実行する
            mw = $('.modal-dialog').outerWidth();
            mh = $('.modal-dialog').outerHeight();
            $('.modal-dialog').css({"left": ((w - mw) / 2) + "px", "top": ((h - mh) / 3) + "px","position":'absolute'});//センタリングを実行する
        }
    }

    // initilize after window resize
    var id;
    $(window).resize( function() {
        clearTimeout(id);
        id = setTimeout(initialize, 500);
    });

    $(function() {
        // initilize onload
        initialize();

    });
</script>