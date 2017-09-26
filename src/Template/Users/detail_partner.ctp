<?php
/**
 * @var \App\View\AppView $user
 * @var \App\View\AppView $this
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>"><i class="material-icons">home</i> Trang chủ</a></li>
                <li class="active"><a href="javascript:void(0)">Thông tin người dùng</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN NGƯỜI DÙNG</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <label for="Email">Email</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo $user['email'] ? $user['email']: ''; ?>
                            </div>
                            <div class="help-info">Email</div>
                        </div>
                        <label for="username">Tên người dùng</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo $user['username'] ? $user['username']: ''; ?>
                            </div>
                            <div class="help-info">Tên người dùng</div>
                        </div>
                        <label for="phone">Số điện thoại</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo $user['phone'] ? '0'.$user['phone']: ''; ?>
                            </div>
                            <div class="help-info">Số điện thoại</div>
                        </div>
                        <label for="address">Địa chỉ</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo $user['address'] ? $user['address']: ''; ?>
                            </div>
                            <div class="help-info">Địa chỉ</div>
                        </div>
                        <label for="role">Loại tài khoản</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($role[$user['role']]) ? $role[$user['role']] : '' ?>
                            </div>
                            <div class="help-info">Loại tài khoản</div>
                        </div>
                        <a class="btn btn-primary waves-effect" href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'edit'.'/'.$user['id']]);?>" >CHỈNH SỬA</a>                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>