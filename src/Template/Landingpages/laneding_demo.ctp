<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Landingpage[]|\Cake\Collection\CollectionInterface $landingpage
 */
echo $this->Html->css('page1.css');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li><li class="active"><a href="javascript:void(0)">Màn hình demo quảng cáo</a></li>
            </ol>
            <div class="col-lg-3 col-md-3col-sm-5 col-xs-12 col-md-offset-4">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>MÀN HÌNH DEMO QUẢNG CÁO</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">

                            <div class="wapper hidden-xs" style="background: url('../../../webroot/images/cf-burger.jpg') top center"></div>
                            <div class="wapper visible-xs" style="background: url('../../../webroot/images/oliverbrown.png') top center"></div>
                            <div class="landing" >
                                <div class="landing__cover landing__cover--main landing__cover--flexible"  >
                                    <div class="landing__cover-overlay"></div>
                                    <div class="u-ui-padding-x-large landing__cover-wrapper">
                                        <div class="landing__cover-content u-color-white">
                                            <div class="c-text--heading c-text--parent c-text--center c-text">Welcome to our <br/> free WiFi!</div>
                                            <div class="c-spacer--xx-large c-spacer"></div>
                                            <div class="logo">
                                                <div class="logo__inner">
<!--                                                    <a class="" href="javascript:voide(0)"><img src="/webroot/images/logo.png" alt="Foody.vn"></a>-->
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
                                                <a class="redirect__normal" href="javascript:voidd(0)">Connect now - Slow</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-ui-padding-x-large landing__cover-wrapper">
                                        <div class="c-text--social c-text--parent c-text--center c-text">Our social profiles</div>
                                        <ul class="icons mbl">
                                            <li class="facebook">
                                                <a href="javascript:voidd(0)" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="youtube">
                                                <a href="javascript:voidd(0)" target="_blank"><i class="fa fa-youtube"></i></a>
                                            </li>
                                            <li class="googleplus">
                                                <a href="javascript:voidd(0)" target="_blank"><i class="fa fa-google-plus"></i></a>
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
    </div>
</section>