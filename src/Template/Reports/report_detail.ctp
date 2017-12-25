<?php
/**
 * @var \App\View\AppView $campaignGroups_title
 * @var \App\View\AppView $campaigns
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
                        <h2>
                            Báo cáo khách hàng chiến dịch
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
                        foreach ($campaignGroups_title as $k => $campaign) { if ($k == 0) { ?>

                            <h2 class="card-inside-title">Tên chiến dịch : <?php echo $campaign->name?> </h2>
                            <h2 class="card-inside-title">Số lượng voucher : <?php
                                $number = count($campaign->partner_vouchers);
                                echo $number.'/'.$campaign->number_voucher; ?> </h2>
                            <h2 class="card-inside-title">Thời gian : <?php echo $campaign->time?> </h2>
                         <?php } } ?>
                        <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'componentExcel'.'/'.$campaignGroups_title[0]['id']]);?>" class="btn btn-primary waves-effect" style="box-shadow:none;">Tải xuống</a>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <?php if (!empty($campaigns)) { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable exportable_partner_voucher">
                                        <thead>
                                        <tr class="bg-blue-grey">
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Địa chỉ mac</th>
                                            <th>Thời gian truy cập</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày sinh</th>
                                            <th>Địa chỉ</th>
                                            <th>Đối chiếu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count = 0;
                                        foreach ($campaigns[0]['partner_vouchers'] as $partner_voucher_log) {
                                            $count++; ?>
                                            <tr valign="middle">
                                                <td><?php echo $count; ?></td>
                                                <td class="advertise font-bold col-cyan">
                                                    <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'detail_partner_voucher' . '/' . UrlUtil::_encodeUrl($partner_voucher_log->id). '/' . UrlUtil::_encodeUrl($campaign_id)]) ?>">
                                                        <?php echo h($partner_voucher_log->name); ?>
                                                    </a>
                                                </td>
                                                <td><?php echo nl2br($partner_voucher_log->client_mac); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($partner_voucher_log->modified)); ?></td>
                                                <td><?php echo nl2br($partner_voucher_log->phone); ?></td>
                                                <td><?php echo nl2br($partner_voucher_log->birthday); ?></td>
                                                <td><?php echo nl2br($partner_voucher_log->address); ?></td>
                                                <td>
                                                    <input type="checkbox" id="basic_checkbox_<?php echo $partner_voucher_log->id; ?>"  name="confirm" value="<?php echo $count?>"
                                                           class="filled-in <?php echo $partner_voucher_log->id; ?>" <?php if ($partner_voucher_log->confirm == 1 ) { echo 'checked';}?> />
                                                    <label for="basic_checkbox_<?php echo $partner_voucher_log->id; ?>">confirm</label>
                                                    <?php if ($partner_voucher_log->confirm != 1 ) { ?>
                                                        <a class="btn btn-primary waves-effect pull-right check_submit" id="<?php echo $partner_voucher_log->id;?>">Cập nhật</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                       ?>
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
</section>
 <script type="application/javascript">
     $('.check_submit').click(function () {
         var id = $(this).attr('id');
         if ($('.'+id).is(":checked")) {
             $.ajax({
                 url: "/Reports/add_log_confirm_voucher",
                 type: "POST",
                 data: { id : id },
                 cache: false,
                 success: function (data) {
                     if (data == 'true') {
                         location.reload();
                     } else {
                         return false;
                     }
                 }
             });
         } else {
             $.ajax({
                 url: "/Reports/remove_log_confirm_voucher",
                 type: "POST",
                 data: { id : id },
                 cache: false,
                 success: function (data) {
                     console.log(data);
                     if (data == 'true') {
                         location.reload();
                     } else {
                         return false;
                     }
                 }
             });
         }
     });
 </script>
 <style>
     .card-inside-title {
         color: #555 !important;
         font-size: 14px !important;
     }
 </style>