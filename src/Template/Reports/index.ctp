<?php
/**
 * @var \App\View\AppView $this
 * @var $list_campaign
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'index']);?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">Báo cáo chiến dịch</a>
                    </li>
                </ol>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>Báo cáo danh sách chiến dịch </h2>
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
                        <div class="list-group">
                            <?php
                                foreach ($list_campaign as $k => $vl) { ?>
                                    <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'report_detail'.'/'. UrlUtil::_encodeUrl($vl->id)]) ?>" class="list-group-item"><?php echo isset($vl->name) ? $vl->name : ''; ?><span class="badge bg-pink">
                                            <?php $number_partner = count($vl->partner_vouchers);
                                            echo $number_partner .'/'. $vl->number_voucher ;?> new
                                        </span>
                                    </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>