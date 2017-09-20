<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $campaignGroups
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý chiến dịch <small>Description text here...</small>
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
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">THÊM MỚI CHIẾN DỊCH </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>Tên chiến dịch</th>
                                    <th>Mô tả chiến dịch</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($campaignGroups as $key => $campaignGroup) { ?>
                                    <tr>
                                        <td class="advertise font-bold col-cyan" value="<?php echo h($campaignGroup->id); ?>"><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-02"> <?php echo h($campaignGroup->name); ?></a></td>
                                        <td><?php echo nl2br($campaignGroup->description); ?></td>
                                        <td><?php echo $campaignGroup->start_date;?></td>
                                        <td><?php echo $campaignGroup->end_date;?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($campaignGroup->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($campaignGroup->id); ?>"><button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa chiến dịch</button></td>
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