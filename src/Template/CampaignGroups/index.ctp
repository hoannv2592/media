<?php
/**
 * @var \App\View\AppView $this
 * @var \App\View\AppView $userData
 * @var \App\Model\Entity\CampaignGroup[]|\Cake\Collection\CollectionInterface $campaignGroups
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý chiến dịch
                        </h2>
                    </div>
                    <div class="body">
                        <div class="button-demo">
                            <div class="button-demo">
                                <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'add']) ?>"
                                   class="btn btn-primary waves-effect m-r-20">THÊM MỚI CHIẾN DỊCH</a>
                            </div>
                        </div>
                        <?php if (!empty($campaignGroups)) { ?>
                            <div class="table-responsive m-t-10">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th class="text-center">STT</th>
                                        <th>Tên chiến dịch</th>
                                        <th>Thời gian</th>
                                        <th>Thiết bị</th>
                                        <th>Số lượng voucher</th>
                                        <th>Random</th>
                                        <th>Địa chỉ</th>
                                        <th>User</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-center">Điều hướng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $page = $this->Paginator->counter(['format' => __('{{page}}')]);
                                    $count = 0;
                                    $count = ($page - 1) * 10;
                                    foreach ($campaignGroups as $key => $campaignGroup) { $count++;  $device = json_decode($campaignGroup->device_name);
                                        $device = (array) $device;
                                        $name_device = array_values($device);
                                        $rowspan = count($device);
                                        if ($count % 2 == 0) $class = "odd"; else $class = "even";
                                        ?>
                                        <tr class="<?= $class ?>">
                                            <td rowspan="<?=  $rowspan ?>" class="align-center"><?php echo $count; ?></td>
                                            <td rowspan="<?=  $rowspan ?>" class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'detail_campaig' . '/' . UrlUtil::_encodeUrl($campaignGroup->id)]) ?>">
                                                    <?php echo $campaignGroup->name; ?>
                                                </a>
                                            </td>
                                            <td rowspan="<?=  $rowspan ?>"><?php echo $campaignGroup->time; ?></td>
                                            <td > <a class="font-bold col-pink" href="javascript:void(0);"><?= $name_device[0];?></a></td>
                                            <td rowspan="<?=  $rowspan ?>">
                                                <?php
                                                $number = count($campaignGroup->partner_vouchers);
                                                echo $number.'/'.$campaignGroup->number_voucher; ?>
                                            </td>
                                            <td rowspan="<?=  $rowspan ?>"><?php echo isset(\App\Model\Entity\CampaignGroup::$random[$campaignGroup->random]) ? \App\Model\Entity\CampaignGroup::$random[$campaignGroup->random] : '' ?></td>
                                            <td rowspan="<?=  $rowspan ?>"><?php echo $campaignGroup->address; ?></td>
                                            <td rowspan="<?=  $rowspan ?>" class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($campaignGroup['user']['id'])]) ?>">
                                                    <?php echo $campaignGroup['user']['username']; ?>
                                                </a>
                                            </td>
                                            <td rowspan="<?=  $rowspan ?>"><?php echo date('d/m/Y', strtotime($campaignGroup->created)); ?></td>
                                            <td rowspan="<?=  $rowspan ?>" class="delete_advertise text-center" value="<?php echo h($campaignGroup->id); ?>">
                                                <button type="button" class="btn btn-danger waves-effect"
                                                        data-toggle="modal" data-target="#modal-03">Xóa
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                            if ($rowspan > 1) {
                                                for ($i = 1; $i < $rowspan; $i++) { ?>
                                                    <tr class="<?= $class ?>">
                                                        <td><a class="font-bold col-pink" href="javascript:void(0);"><?= $name_device[$i];?></a></td>
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
    <?php echo $this->element('campaign_group/get_campaign_group'); ?>
</section>

<style>

</style>
