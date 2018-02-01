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
                                <a href="javascript:void(0);"
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
                                                <th style="text-align: center">No</th>
                                                <th>Name</th>
<!--                                                <th>Name</th>-->
                                                <th>Code</th>
                                                <th>Type</th>
                                                <th>Ad type</th>
                                                <th>Create</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            foreach ($devices as $key => $device) {
                                                $count++; ?>
                                                <tr valign="middle">
                                                    <td style="text-align: center"><?php echo $count; ?></td>
                                                    <td class="advertise font-bold col-cyan"><a href="#" onclick="view_log_partner_histories(<?php echo $device->id; ?>)" data-toggle="modal" data-target="#defaultModal"><?php echo h($device->name); ?></a></td>
<!--                                                    <td class="advertise font-bold col-cyan"><a href="--><?php //echo $this->Url->build(['controller' => 'Devices', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($device->id)]) ?><!--">--><?php //echo h($device->name); ?><!--</a></td>-->
                                                    <td><?php echo nl2br($device->apt_key); ?></td>
                                                    <td><?php echo isset($device->type) ? \App\Model\Entity\Device::$category[$device->type] : 'Thiết bị thường'; ?></td>
                                                    <td><?php echo isset(\App\Model\Entity\Device::$langding_page[$device->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$device->langdingpage_id] : 'Mặc định'; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($device->created)); ?></td>
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
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Tạo QC</a>
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
                                                                       href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'set_qc_mirkotic' . '/' . UrlUtil::_encodeUrl($device->id) . '/' . UrlUtil::_encodeUrl($device->user->id)]) ?>">Tạo
                                                                        QC</a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <a class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa TB</a>
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
                            <?php echo $this->Form->create('Devices', array(
                                'id' => 'form_validation',
                                'type' => 'post',
                                'url' => array('controller' => 'Devices', 'action' => 'delete'),
                                'inputDefaults' => array(
                                    'label' => false,
                                    'div' => false
                                ),
                                'onsubmit' => "event.returnValue = false; return false;",
                            ));
                            ?>
                            <p>Bạn có chắc chắn muốn xóa thiết bị này không? </p>
                            <div class="modal-footer">
                                <button class="btn btn-primary waves-effect" id="submit_delete" type="submit">XÓA THIẾT BỊ
                                </button>
                                <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">CLOSE</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="application/javascript">
        var id;
        $('.delete_advertise').click(function () {
            id = $(this).attr('value');
            $('#submit_delete').click(function () {
                var url = "<?php echo URL_DELETE_APT; ?>";
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
    <div class="modal" id="defaultModal" tabindex="-1" role="dialog">
        <?php echo $this->element('device_groups/modal-02'); ?>
    </div>
</section>
<script type="application/javascript">
    view_log_partner_histories = function (id) {
        $.ajax({
            url: '/devices/loadLogPartnerHistories',
            type: 'POST',
            dataType: 'html',
            data: {
                id: id
            },
            success: function (response) {
                $('#defaultModal').html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    };

</script>