<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $user
 * @var \App\View\AppView $devices
 * @var \App\View\AppView $adgroups
 * @var \App\View\AppView $landingpages
 * @var \App\View\AppView $serviceGroups
 * @var \App\View\AppView $campaignGroups
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> new user
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI USERS</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Users', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username"  required>
                                <label class="form-label">Tên username</label>
                            </div>
                            <div class="help-info">Tên username</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line" id="email_user">
                                <input type="text" class="form-control" name="email" id="email"  required>
                                <label class="form-label">Email</label>
                            </div>
                            <div class="help-info">Email</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <label class="form-label">Mật khẩu</label>
                            </div>
                            <div class="help-info">Mật khẩu</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"  name="phone" required>
                                <label class="form-label">Số điện thoại</label>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="address" required>
                                <label class="form-label">Địa chỉ</label>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="role" id="role">
                                    <option disabled selected value> -- chọn quyền -- </option>
                                    <option  value="1" >Admin</option>
                                    <option  value="2" >User thường</option>
                                </select>
                            </div>
                            <div class="help-info">Thiết bị</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="device_id" id="device_id">
                                    <option disabled selected value> -- chọn thiết bị -- </option>
                                    <?php foreach ($devices as $key => $device) {?>
                                        <option value="<?php echo $key;?>"><?php echo $device; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info"> Thiết bị</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="service_group_id" id="service_group_id">
                                    <option disabled selected value> -- chọn dịch vụ -- </option>
                                    <?php foreach ($serviceGroups as $key => $serviceGroup) {?>
                                        <option value="<?php echo $key;?>"><?php echo $serviceGroup ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info">Dịch vụ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="landingpage_id" id="landingpage_id">
                                    <option disabled selected value> -- chọn landingpage -- </option>
                                    <?php foreach ($landingpages as $key => $landingpage) {?>
                                        <option value="<?php echo $key;?>"><?php echo $landingpage ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info"> Langding page</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="adgroup_id" id="adgroup_id">
                                    <option disabled selected value> -- chọn nhóm quảng cáo -- </option>
                                    <?php foreach ($adgroups as $key => $adgroup) {?>
                                        <option value="<?php echo $key;?>"><?php echo $adgroup ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info">Nhóm quảng cáo</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">THÊM MỚI</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        $("#email").parent().removeClass("focused");
        $("div.form-line").removeClass("focused");
    });
</script>