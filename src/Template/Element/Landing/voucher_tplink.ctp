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
                    <img src="
					<?php echo '/' . $infor_devices->path_logo; ?>"
                         alt="logo_image" style="height: 100px;">
                </a>
            <?php } else { ?>
                <a class="" href="javascript:void(0)">
                    <img src="/webroot/images/logo.png" alt="logo image">
                </a>
            <?php } ?>
        </div>
        <div class="col-md-3 col-sm-8 text-center align-self-center card-title"
             style="visibility: visible; animation-name: fadeInLeft;">
            <h5 class="title text-white">
                <?php echo isset($infor_devices->tile_name) ? $infor_devices->tile_name : ''; ?>
            </h5>
        </div>
        <div class="col-md-4 col-sm-8 text-center align-self-center button">
            <?php
            if (empty($packages)) { ?>
                <a class="btn btn-primary button_connect form-group upercase" href="<?php echo $infor_devices->auth_target; ?>">Connect now - Fast</a>
            <?php } else { ?>
                <a href="#_" class="btn btn-primary button_connect form-group upercase" data-toggle="modal"
                   data-target="#modal_login">
                    <?php if (isset($infor_devices->title_connect) && $infor_devices->title_connect != '') {
                        echo $infor_devices->title_connect;
                    } else {
                        echo $title_connect_normal;
                    } ?>
                </a>
            <?php } ?>
            <a class="btn btn-primary button_connect subscribe upercase" href="<?php echo $infor_devices->auth_target; ?>"><span>Connect now - Slow</span></a>
        </div>
    </div>
</div>
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