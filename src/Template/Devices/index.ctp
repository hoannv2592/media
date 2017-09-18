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
                        <?php if ($userData['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                            <div class="button-demo">
                                <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'add']) ?>"
                                   class="btn btn-primary waves-effect m-r-20">THÊM THIẾT BỊ</a>
                            </div>
                        <?php } else { ?>
                            <a disabled="disabled" href="javascript:void(0);" class="btn btn-primary waves-effect m-r-20">THÊM MỚI THIẾT BỊ</a>
                        <?php } ?>
                        <?php if (!empty($devices)) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-exportable_dev dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th>Tên thiết bị</th>
                                        <th>User quản lý</th>
                                        <th>Mã xác thực</th>
                                        <th>Ngày tạo</th>
                                        <th>Điều hướng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($devices as $key => $device) { ?>
                                        <tr>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'detail-device' . '/' . $device->id]) ?>"><?php echo h($device->name); ?></a>
                                            </td>
                                            <td class="font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'detail_partner' . '/' . $device->user->id]) ?>"><?php echo h($device->user->username); ?></a>
                                            </td>
                                            <td><?php echo nl2br($device->apt_key); ?></td>
                                            <td><?php echo date('d/m/Y H:i', strtotime($device->created)); ?></td>
                                            <td class="delete_advertise" value="<?php echo h($device->id); ?>">

                                                <div class="button-demo">
                                                    <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modal-04">Tạo quảng cáo</button>
                                                </div>
                                                <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa thiết bị</button>
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
    <?php echo $this->element('device_groups/get_device_group'); ?>
</section>


