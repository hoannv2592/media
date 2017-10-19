<?php
/**
  * @var \App\View\AppView $this
  * @var $flag
  * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $adgroups
  * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $userData
  */
$this->assign('title', 'Quản lý nhóm thiết bị quảng cáo');
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý nhóm thiết bị quảng cáo <small>Description text here...</small>
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
                            <?php if ($userData['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                                <div class="button-demo">
                                    <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'add']) ?>"
                                       class="btn btn-primary waves-effect m-r-20" id="add_new">THÊM NHÓM THIẾT BỊ</a>
                                </div>
                            <?php } else { ?>
                                <a disabled="disabled" href="javascript:void(0);" class="btn btn-primary waves-effect m-r-20">THÊM NHÓM QUẢNG CÁO</a>
                            <?php } ?>
                        </div>
                        <?php if (!empty($adgroups)) { ?>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example_ad dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>STT</th>
                                    <th>Tên quảng cáo</th>
                                    <th>Số lượng thiết bị</th>
                                    <th>User quản lý</th>
                                    <th>Địa chỉ</th>
                                    <th>Loại quảng cáo</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;

                                foreach ($adgroups as $key => $adgroup) { $count++;?>
                                    <tr>
                                        <td> <?php echo $count; ?></td>
                                        <td class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'detail_group' . '/' . UrlUtil::_encodeUrl($adgroup->id)]) ?>"><?php echo h($adgroup->name); ?></a>
                                        </td>

                                        <td>
                                            <?php if (!empty($adgroup->device_name)) {
                                                $array =  (array) json_decode($adgroup->device_name);
                                                echo count($array);
                                             } ?>
                                        </td>
                                        <td><?php echo isset($users[$adgroup->user_id_group]) ? $users[$adgroup->user_id_group]: ''?></td>
                                        <td>
                                            <?php echo  nl2br($adgroup->address);?>
                                        </td>
                                        <td>
                                            <?php echo isset(\App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]:''; ?>
                                        </td>
                                        <td><?php echo nl2br($adgroup->description); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($adgroup->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($adgroup->id); ?>">
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa nhóm</button></td>
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
    <?php echo $this->element('adgroup/get_ad_group'); ?>
</section>
<script type="application/javascript">
    $(document).ready(function () {
       var flag = "<?php echo $flag;?>";
       $('#add_new').click(function () {
           if (flag) {
               alert_message('Bạn không thể tạo được nhóm thết bị vì không còn thiết bị để tạo nhóm.');
               return false;
           }
       });
    });
</script>