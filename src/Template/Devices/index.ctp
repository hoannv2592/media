<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $Adgroups
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $action
 */
$this->assign('title', 'Quản lý thiết bị');
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
                                   class="btn btn-primary waves-effect m-r-20">THÊM MỚI THIẾT BỊ</a>
                            </div>
                        <?php } else { ?>
                            <a disabled="disabled" href="javascript:void(0);"
                               class="btn btn-primary waves-effect m-r-20">THÊM MỚI THIẾT BỊ</a>
                        <?php } ?>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <?php if (!empty($devices)) { ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable_has">
                                            <thead>
                                            <tr class="bg-blue-grey">
                                                <th>STT</th>
                                                <th>Tên thiết bị</th>
                                                <th>User quản lý</th>
                                                <th>Nhóm thiết bị</th>
                                                <th>Mã thiết bị</th>
                                                <th>Khách hàng sử dụng</th>
                                                <th>Loại thiết bị</th>
                                                <th>Loại quảng cáo</th>
                                                <th>Ngày tạo</th>
                                                <th>Điều hướng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            foreach ($devices as $key => $device) {
                                                $count++; ?>
                                                <tr valign="middle">
                                                    <td><?php echo $count; ?></td>
                                                    <td class="advertise font-bold col-cyan">
                                                        <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($device->id)]) ?>"><?php echo h($device->name); ?></a>
                                                    </td>
                                                    <td class="font-bold col-cyan">
                                                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>"><?php echo h($device->user->username); ?></a>
                                                    </td>
                                                    <td><?php
                                                        echo isset($Adgroups[$device->adgroup_id]) ? $Adgroups[$device->adgroup_id]: '';
                                                        ?></td>
                                                    <td><?php echo nl2br($device->apt_key); ?></td>
                                                    <td> <?php echo isset($device->partners) ? count($device->partners): 0; ?></td>
                                                    <td> <?php
                                                        echo isset($device->type) ? \App\Model\Entity\Device::$category[$device->type] : 'Thiết bị thường'; ?>
                                                    </td>
                                                    <td><?php echo isset(\App\Model\Entity\Device::$langding_page[$device->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$device->langdingpage_id] : ''; ?></td>
                                                    <td><?php echo date('d/m/Y H:i', strtotime($device->created)); ?></td>
                                                    <td class="delete_advertise" value="<?php echo h($device->id); ?>">
                                                        <div class="button-demo">
                                                            <?php
                                                            if ($device->type != \App\Model\Entity\Device::TB_MIRKOTIC) {
                                                                $langdingpage_id = isset(\App\Model\Entity\Device::$langding_page[$device->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$device->langdingpage_id] : '';
                                                                if ($langdingpage_id != '') { ?>
                                                                    <a class="btn btn-success waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'view_qc' . '/' . UrlUtil::_encodeUrl($device->id)]) ?>">Xem
                                                                        QC</a>
                                                                    <a class="btn btn-primary waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Sửa
                                                                        QC</a>
                                                                <?php } else { ?>
                                                                    <a class="btn btn-primary waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Tạo
                                                                        QC</a>
                                                                <?php }

                                                            } else {
                                                                if ($device->path != '') { ?>
                                                                    <a class="btn btn-success waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'view_qc' . '/' . UrlUtil::_encodeUrl($device->id)]) ?>">Xem
                                                                        QC</a>
                                                                    <a class="btn btn-primary waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc_mirkotic' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Sửa
                                                                        QC</a>
                                                                <?php } else { ?>
                                                                    <a class="btn btn-primary waves-effect"
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Tạo
                                                                        QC</a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <a class="btn btn-danger waves-effect" data-toggle="modal"
                                                               data-target="#modal-03">Xóa TB</a>
                                                        </div>
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
        </div>
    </div>
    </div>
    <?php echo $this->element('device_groups/get_device_group'); ?>
</section>
