<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Users[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý người dùng
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
                        <?php if ($userData['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                            <div class="button-demo">
                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>"
                                   class="btn btn-primary waves-effect m-r-20">THÊM MỚI NGƯỜI DÙNG</a>
                            </div>
                        <?php } else { ?>
                            <a disabled="disabled" href="javascript:void(0);"
                               class="btn btn-primary waves-effect m-r-20">THÊM MỚI NGƯỜI DÙNG</a>
                        <?php } ?>
                        <?php
                        if (!empty($users)) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th>STT</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Thiết bị</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày tạo</th>
                                        <th>Điều hướng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($users as $key => $user) { $count ++;?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'detail_partner' . '/' . $user->id]) ?>"><?php echo h($user->username); ?></a>
                                            </td>
                                            <td><?php echo nl2br($user->email); ?></td>
                                            <td>
                                                <table class="table">
                                                    <?php foreach ($user->devices as $device) { ?>
                                                        <tr>
                                                            <td><a class="font-bold"
                                                                   href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'detail_device' . '/' . $device->id]) ?>"> <?php echo $device->name; ?></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </td>
                                            <td><?php echo nl2br($user->address); ?></td>
                                            <td><?php echo nl2br($user->phone); ?></td>
                                            <td><?php echo date('d/m/Y H:i', strtotime($user->created)); ?></td>
                                            <td class="delete_advertise" value="<?php echo h($user->id); ?>">
                                                <button type="button" class="btn btn-danger waves-effect"
                                                        data-toggle="modal" data-target="#modal-03">Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-03" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>XÁC NHẬN</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Users', array(
                            'id' => 'form_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Users', 'action' => 'delete'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <p>Bạn có chắc chắn muốn xóa người dùng này không? </p>
                        <div class="modal-footer">
                            <button class="btn btn-primary waves-effect" id="submit_delete" type="submit">XÓA NGƯỜI DÙNG
                            </button>
                            <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">ĐÓNG</button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $('.delete_advertise').click(function () {
        var id = $(this).attr('value');
        $('#submit_delete').click(function () {
            var url = "<?php echo URL_DELETE_US; ?>";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {id: id},
                success: function (response) {
                    if (response) {
                        window.location.reload();
                    } else {
                        alert_message('Đã có lỗi xảy ra.vui lòng thử lại');
                        return false;
                    }
                }
            });
        });
    });
</script>

