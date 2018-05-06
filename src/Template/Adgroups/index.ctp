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
                            Quản lý nhóm thiết bị quảng cáo
                        </h2>

                    </div>
                    <div class="body">
                        <div class="button-demo">
                            <div class="button-demo">
                                <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'add']) ?>"
                                   class="btn btn-primary waves-effect m-r-20" id="add_new">THÊM NHÓM THIẾT BỊ</a>
                            </div>
                        </div>
                        <?php if (!empty($adgroups)) { ?>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover m-t-10">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th class="text-center">STT</th>
                                    <th>Tên quảng cáo</th>
                                    <th>Số lượng thiết bị</th>
                                    <th>User quản lý</th>
                                    <th>Địa chỉ</th>
                                    <th>Loại quảng cáo</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-center">Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $page = $this->Paginator->counter(['format' => __('{{page}}')]);
                                $count = 0;
                                $count = ($page - 1) * 10;
                                foreach ($adgroups as $key => $adgroup) { $count++;
                                    $array =  (array) json_decode($adgroup->device_name);
                                    $array = array_values($array);
                                    $rowspan = count($array);
                                    if ($count % 2 == 0) $class = "odd"; else $class = "even";
                                    ?>
                                    <tr class="<?= $class ?>">
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>" class="text-center"> <?php echo $count; ?></td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>" class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'detail_group' . '/' . UrlUtil::_encodeUrl($adgroup->id)]) ?>"><?php echo h($adgroup->name); ?></a>
                                        </td>

                                        <td>
                                            <a class="font-bold col-pink" href="javascript:void(0)"><?= $array[0]?></a>
                                        </td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>" class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($adgroup['user']['id'])]) ?>">
                                                <?php echo $adgroup['user']['username']; ?>
                                            </a>
                                        </td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>">
                                            <?php echo  nl2br($adgroup->address);?>
                                        </td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>">
                                            <?php echo isset(\App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]:''; ?>
                                        </td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>"><?php echo nl2br($adgroup->description); ?></td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>"><?php echo date('d/m/Y', strtotime($adgroup->created));?></td>
                                        <td rowspan="<?= ($rowspan && $rowspan > 0) ? $rowspan :'' ?>" class="delete_advertise text-center" value="<?php echo h($adgroup->id); ?>">
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa</button></td>
                                    </tr>
                                    <?php
                                    if ($rowspan > 1) {
                                        for ($i = 1; $i < $rowspan; $i++) { ?>
                                            <tr class="<?= $class ?>">
                                                <td>
                                                    <a class="font-bold col-pink" href="javascript:void(0)"><?= $array[$i]?></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                            <div class="paginator">
                                <ul class="pagination pull-right">
                                    <?= $this->Paginator->first(__('First')) ?>
                                    <?= $this->Paginator->prev(__('Previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('Next')) ?>
                                    <?= $this->Paginator->last(__('Last')) ?>
                                </ul>
                                <p style="padding-top: 25px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}} showing {{current}} record(s) out of {{count}} total')]) ?></p>
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