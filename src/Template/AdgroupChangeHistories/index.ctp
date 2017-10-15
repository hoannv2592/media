<?php
/**
 * @var \App\View\AppView $this
 * @var $userData
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
                            Lịch sử thay đổi nhóm thiết bị
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
                        <?php
                        if (!empty($logs)) {?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-exportable_log dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th>STT</th>
                                        <th>Nhóm thay đổi</th>
                                        <th>Nội dung thay đổi</th>
                                        <th>Ngày thay đổi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($logs as $k => $vl) {
                                        $count ++;?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td class="advertise"><?php echo $vl['adgroup']['name'];?></td>
                                            <td><?php
                                                foreach (json_decode($vl['contents']) as $key => $item) {
                                                    if ($item->fields == 'langdingpage_id') {
                                                        echo 'langdingpage : ' . \App\Model\Entity\Device::$langding_page[$item->from] .' -> '. \App\Model\Entity\Device::$langding_page[$item->to].'<br >';
                                                    } elseif ($item->fields == 'description')
                                                    {
                                                        echo 'Mô tả : '.$item->from .' -> ' .$item->to .'<br>';
                                                    } elseif ($item->fields == 'device_name') {
                                                        $imploded_from = implode(',', (array) json_decode($item->from));
                                                        $imploded_to = implode(',', (array) json_decode($item->to)); ;
                                                        echo 'Thiết bị: ' .$imploded_from .' -> '.$imploded_to .'<br>';
                                                    } elseif($item->fields == 'name') {
                                                        echo 'Tên nhóm : ' . $item->to .' -> '. $item->to .'<br>';
                                                    } elseif ($item->fields == 'tile_name') {
                                                        echo 'Tên : ' .$item->from .' -> '.$item->to .'<br>';
                                                    } elseif($item->fields == 'image_backgroup') {
                                                        echo 'Ảnh nền : ' .$item->from .' -> '.$item->to. '<br>';
                                                    } elseif($item->fields == 'delete_flag') {
                                                        echo 'Status : '. $item->from .' -> '.$item->to .'<br >';
                                                    } elseif ($item->fields == 'message') {
                                                        echo 'Message voucher : ' .$item->from .' -> '.$item->to .'<br >';
                                                    } elseif ($item->fields == 'slogan') {
                                                        echo 'Slogan : ' .$item->from .' -> '.$item->to .'<br >';
                                                    }
                                                }
                                                ?></td>
                                            <td><?php echo date('d/m/Y H:i:s', strtotime($vl['modified'])); ?></td>
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

