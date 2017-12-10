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
                        <div class="button-demo">
                                <div class="button-demo">
                                    <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'add']) ?>"
                                       class="btn btn-primary waves-effect m-r-20">THÊM MỚI CHIẾN DỊCH</a>
                                </div>
<!--                            --><?php //if ($userData['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
<!--                            --><?php //} else { ?>
<!--                                <a disabled="disabled" href="javascript:void(0);"-->
<!--                                   class="btn btn-primary waves-effect m-r-20">THÊM MỚI CHIẾN DỊCH</a>-->
<!--                            --><?php //} ?>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-exportable_c dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>STT</th>
                                    <th>Tên chiến dịch</th>
                                    <th>Thời gian</th>
                                    <th>Địa chỉ</th>
                                    <th>Thiết bị</th>
                                    <th>Số lượng voucher</th>
                                    <th>Loại random</th>
                                    <th>Mô tả chiến dịch</th>
                                    <th>User quản lý</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                foreach ($campaignGroups as $key => $campaignGroup) {
                                    $count++; ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'detail_campaig' . '/' . UrlUtil::_encodeUrl($campaignGroup->id)]) ?>">
                                                <?php echo $campaignGroup->name; ?>
                                            </a>
                                        </td>

                                        <td><?php echo $campaignGroup->time; ?></td>
                                        <td><?php echo $campaignGroup->address; ?></td>
                                        <td>
                                            <table class="table">
                                                <?php foreach (json_decode($campaignGroup->device_name) as $k => $vl) { ?>
                                                    <tr>
                                                        <td><?php echo $vl; ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </table>
                                        </td>
                                        <td>
                                            <?php
                                                $number = count($campaignGroup->partner_vouchers);
                                            echo $number.'/'.$campaignGroup->number_voucher; ?>
                                        </td>
                                        <td><?php echo isset(\App\Model\Entity\CampaignGroup::$random[$campaignGroup->random]) ? \App\Model\Entity\CampaignGroup::$random[$campaignGroup->random] : '' ?></td>
                                        <td><?php echo nl2br($campaignGroup->description); ?></td>
                                        <td class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($campaignGroup['user']['id'])]) ?>">
                                                <?php echo $campaignGroup['user']['username']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($campaignGroup->created)); ?></td>
                                        <td class="delete_advertise" value="<?php echo h($campaignGroup->id); ?>">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-toggle="modal" data-target="#modal-03">Xóa chiến dịch
                                            </button>
                                        </td>
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
    <?php echo $this->element('campaign_group/get_campaign_group'); ?>
</section>