<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $device
 * @var \App\View\AppView $users
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">Thông tin thiết bị</a>
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN THIẾT BỊ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <input id="backup_name_dev" type="hidden" value="<?php echo isset($device['name']) ? $device['name'] :''?>">
                        <label for="name">Tên thiết bị</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($device['name']) ? $device['name'] :''?>
                            </div>
                            <div class="help-info">Tên thiết bị</div>
                        </div>
                        <label for="name">Mã apt_key</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($device['apt_key']) ? $device['apt_key']:''?>
                            </div>
                            <div class="help-info">Mã apt_key</div>
                        </div>
                        <label for="user_id">Người dùng quản lý thiết bị</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($users[$device['user_id']]) ? $users[$device['user_id']]:''?>
                            </div>
                            <div class="help-info">Người dùng quản lý thiết bị</div>
                        </div>
                        <a class="btn btn-primary waves-effect" href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'edit/'.$device['id']])?>">CHỈNH SỬA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>