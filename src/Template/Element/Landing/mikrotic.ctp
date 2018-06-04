<?php
/**
 * @var $infor_devices
 */
$title_connect_normal = 'Đăng ký nhận voucher';
if (isset($infor_devices->title_connect) && $infor_devices->title_connect != '') {
    $title_connect_normal = $infor_devices->title_connect;
}
$packages = isset($infor_devices->packages) ? json_decode($infor_devices->packages) : array();
$title_campaign = isset($infor_devices->title_campaign) ? $infor_devices->title_campaign : 'Vui lòng điền thông tin khảo sát';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-8 text-center align-self-center logo">
            <?php /** @var TYPE_NAME $infor_devices */
            if (isset($infor_devices->path_logo) && $infor_devices->path_logo != '') { ?>
                <a class="" href="javascript:void(0)">
                    <img src="<?php echo '/' . $infor_devices->path_logo; ?>" alt="logo_image" style="height: 100px;">
                </a>
            <?php } ?>
        </div>
        <div class="col-md-4 col-sm-8 text-center align-self-center card-title"
             style="visibility: visible; animation-name: fadeInLeft;">
            <h5 class="title text-white">
                <?php echo isset($infor_devices->tile_name) ? $infor_devices->tile_name : ''; ?>
            </h5>
        </div>
        <div class="col-md-3 col-sm-8 text-center align-self-center button">
            <form name="login" action="<?php echo $infor_devices->link_login_only; ?>" method="post" onSubmit="return doLogin()">
                <input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
                <input type="hidden" name="popup" value="false"/>
                <input type="text" name="username" value="wifimedia" class="hidden"/>
                <input type="password" name="password" value="wifimedia" class="hidden"/>
            </form>
            <a href="#_" class="btn btn-primary button_connect form-group upercase" data-toggle="modal"
               data-target="#modal_login">
                <?php if (isset($infor_devices->title_connect) && $infor_devices->title_connect != '') {
                    echo $infor_devices->title_connect;
                } else {
                    echo $title_connect_normal;
                } ?>
            </a>
            <?php
//            if (empty($packages)) { ?>
<!--                --><?php //echo $this->Form->create('login', array(
//                    'type' => 'post',
//                    'name' => 'login_fast',
//                    'class' => 'form-validation',
//                    'url' => $infor_devices->link_login_only,
//                    'onsubmit' => "return doLogin()"
//                ));
//                ?>
<!--                <button type="submit" class="btn btn-primary button_connect form-group upercase">Connect now - Fast-->
<!--                </button>-->
<!--                --><?php //echo $this->Form->end(); ?>
<!--            --><?php //} else { ?>
<!--                <a href="#_" class="btn btn-primary button_connect form-group upercase" data-toggle="modal"-->
<!--                   data-target="#modal_login">-->
<!--                    --><?php //if (isset($infor_devices->title_connect) && $infor_devices->title_connect != '') {
//                        echo $infor_devices->title_connect;
//                    } else {
//                        echo $title_connect_normal;
//                    } ?>
<!--                </a>-->
<!--            --><?php //} ?>
            <?php echo $this->Form->create('login', array(
                'type' => 'post',
                'name' => 'login_slow',
                'class' => 'form-validation',
                'url' => $infor_devices->link_login_only,
                'onsubmit' => "return doLogin()"
            ));
            ?>
            <?php if (isset($infor_devices->hidden_connect) && $infor_devices->hidden_connect == 1) { ?>
                <button type="submit" class="btn btn-primary button_connect subscribe upercase">
                    <?php if (isset($infor_devices->button_slow) && $infor_devices->button_slow != '') {
                        echo $infor_devices->button_slow;
                    } else {
                        echo 'CONNECT NOW - SLOW';
                    }
                    ?>
                </button>
            <?php } ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php echo $this->Form->create('sendin', array(
    'type' => 'post',
    'name' => 'sendin',
    'url' => $infor_devices->link_login_only
));
?>
<input type="hidden" class="need_push_username" name="username"/>
<input type="hidden" name="password"/>
<input type="hidden" class="need_push_password" name="password"/>
<input type="hidden" name="dst" value="<?php echo $infor_devices->link_orig; ?>"/>
<input type="hidden" name="popup" value="false"/>
<?php echo $this->Form->end(); ?>
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <?php
        echo $this->Form->create('login_popup', array(
            'id' => 'modal_form_login',
            'type' => 'post',
            'class' => 'form-validation',
            'url' => $infor_devices->link_login_only
        ));
        $device_id = isset($infor_devices->id) ? $infor_devices->id : '';
        echo $this->Form->control('device_id', array(
            'type' => 'hidden',
            'label' => false,
            'value' => $device_id
        ));
        $user_id = isset($infor_devices->user_id) ? $infor_devices->user_id : '';
        echo $this->Form->control('user_id', array(
            'type' => 'hidden',
            'label' => false,
            'value' => $user_id
        ));
        $partner_id = isset($partner_id) ? $partner_id : '';
        echo $this->Form->control('partner_id', array(
            'type' => 'hidden',
            'label' => false,
            'value' => $partner_id
        ));
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mg-0-at text-center">
                    <?php echo ($title_campaign && $title_campaign !== '') ? $title_campaign : 'Vui lòng điền thông tin khảo sát'; ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (!empty($packages)) {
                    foreach ($packages as $k => $vl) {
                        if ($vl == 1) { ?>
                            <div class="form-group">
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user" aria-hidden="true"></i>
										</span>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Điền họ, tên"/>
                                </div>
                            </div>
                        <?php } elseif ($vl == 2) { ?>
                            <div class="form-group">
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-phone" aria-hidden="true"></i>
										</span>
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Điền số điện thoại"/>
                                </div>
                            </div>
                        <?php } elseif ($vl == 3) { ?>
                            <div class="form-group">
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-birthday-cake" aria-hidden="true"></i>
										</span>
                                    <input type="text" id="birthday" name="birthday" class="form-control" placeholder="Ngày sinh"/>
                                </div>
                            </div>
                        <?php } else if ($vl == 4) { ?>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ"/>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"/>
                                </div>
                            </div>
                        <?php }
                    }
                } else { ?>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Điền họ, tên"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </span>
                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Điền số điện thoại"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                            </span>
                            <input type="text" id="birthday" name="birthday" class="form-control" placeholder="Ngày sinh"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            </span>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email"/>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary font-weight-bold " data-dismiss="modal">CANCEL</button>
                <button type="submit" class="btn btn-primary font-weight-bold">ĐĂNG KÝ</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script type="application/javascript">
    function doLogin() {

        <?php if (strlen($infor_devices->chap_id) < 1) echo "return true;\n"; ?>
        document.sendin.username.value = document.login.username.value;
        document.sendin.password.value = md5('<?php echo $infor_devices->chap_id; ?>' + document.login.password.value + '<?php echo $infor_devices->chap_challenge; ?>');
        document.sendin.submit();
        return false;
    }

    new Pikaday({
        field: document.getElementById('birthday'),
        format: 'D/M/YYYY',
        toString(date, format) {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
        parse(dateString, format) {
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1] - 1, 10);
            const year = parseInt(parts[1], 10);
            return new Date(year, month, day);
        },
    });

</script>