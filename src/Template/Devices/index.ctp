<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
  */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý nhóm dịch vụ <small>Description text here...</small>
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
                        <div class="button-demo">
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">THÊM THIẾT BỊ</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-exportable_apt dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>Tên thiết bị</th>
                                    <th>Apt Key</th>
                                    <th>Mật khẩu Apt Key</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($devices as $key => $device) {?>
                                    <tr>
                                        <td class="advertise font-bold col-cyan" value="<?php echo h($device->id); ?>"><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-02"> <?php echo h($device->name); ?></a></td>
                                        <td><?php echo nl2br($device->apt_key); ?></td>
                                        <td><?php echo nl2br($device->pass_apt_key); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($device->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($device->id); ?>"><button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa thiết bị</button></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('device_groups/get_device_group'); ?>
</section>

