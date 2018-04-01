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
                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'index']);?>" style="margin-left: 10px">
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
                        <h2>Báo cáo chiến dịch</h2>
                    </div>
                    <div class="body">
                        <div class="col-md-6">
                                <h2 class="card-inside-title">Tên chiến dịch : <?php echo $campaignGroups_title->name?> </h2>
                                <h2 class="card-inside-title">Số lượng voucher : <?php echo $this->Paginator->counter(['format' => __('{{count}}')]).'/'.$campaignGroups_title->number_voucher; ?> </h2>
                                <h2 class="card-inside-title">Thời gian : <?php echo $campaignGroups_title->time?> </h2>
                            <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'downloadExcelVoucher/'.$list_id_partner]);?>" class="btn btn-primary waves-effect" style="box-shadow:none;">Export danh sách khách hàng có số điện thoại</a>
                        </div>
                        <div class="col-md-6">
                            <div class="card-box">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_1">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Tổng khách hàng</p>
                                                <h4 class="m-b-10"><?= $this->Paginator->counter(['format' => __('{{count}}')]) ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_2">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">khách đã confirm</p>
                                                <h4 class="m-b-10"><?= isset($sum_confirm_partner) ? $sum_confirm_partner:'';?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_3">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">khách chưa confirm</p>
                                                <h4 class="m-b-10"><?= isset($sum_no_confirm_partner) ? $sum_no_confirm_partner:'';?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_4">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Khách có SDT</p>
                                                <h4 class="m-b-10"><?= isset($sum_phone_partner) ? $sum_phone_partner:'';?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-10">
                                    <div id="line-chart-tooltips" class="ct-chart ct-golden-section"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <?php if (!empty($campaigns)) { ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable">
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
                                        foreach ($campaigns as $partner_voucher_log) {
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
                                    <div class="paginator">
                                        <ul class="pagination pull-right">
                                            <?= $this->Paginator->first(__('First')) ?>
                                            <?= $this->Paginator->prev(__('Previous')) ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next(__('Next')) ?>
                                            <?= $this->Paginator->last(__('Last')) ?>
                                        </ul>
                                        <p style="padding-top: 25px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                                    </div>
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
<?php
echo $this->Html->script([
    'chartist/js/chartist.min',
    'chartist/js/chartist-plugin-tooltip.min'
])
?>
<script type="application/javascript">
    //Line chart with tooltips
    var list_day = jQuery.parseJSON('<?= $list_day;?>');
    var chart_number_partner = jQuery.parseJSON('<?= $chart_number_partner;?>');
    var count_confirm_partner = jQuery.parseJSON('<?= $count_confirm_partner;?>');
    var count_no_confirm_partner = jQuery.parseJSON('<?= $count_no_confirm_partner;?>');
    var count_phone_partner = jQuery.parseJSON('<?= $count_phone_partner;?>');
    new Chartist.Line('#line-chart-tooltips', {
            labels: list_day,
            series: [
                {
                    name: 'Khách hàng',
                    data: chart_number_partner
                },
                {
                    name: 'khách hàng đã confirm',
                    data: count_confirm_partner
                },
                {
                    name: 'khách hàng chưa confirm',
                    data: count_no_confirm_partner
                },
                {
                    name: 'khách hàng có số điện thoại',
                    data: count_phone_partner
                }
            ]
        },
        {
            low: 0,
            showArea: false,
            plugins: [
                Chartist.plugins.tooltip()
            ]
        }
    );
    var $chart = $('#line-chart-tooltips');
    var $toolTip = $chart
        .append('<div class="tooltip"></div>')
        .find('.tooltip')
        .hide();

    $chart.on('mouseenter', '.ct-point', function() {
        var $point = $(this),
            value = $point.attr('ct:value'),
            seriesName = $point.parent().attr('ct:series-name');
        $toolTip.html(seriesName + '<br>' + value).show();
    });

    $chart.on('mouseleave', '.ct-point', function() {
        $toolTip.hide();
    });

    $chart.on('mousemove', function(event) {
        $toolTip.css({
            left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
            top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
        });
    });

</script>