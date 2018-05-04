<?php
/**
 * @var \App\View\AppView $campaignGroups_title
 * @var \App\View\AppView $campaigns
 * @var \App\View\AppView $list_day
 * @var \App\View\AppView $chart_number_partner
 * @var \App\View\AppView $count_old_partner
 * @var \App\View\AppView $count_new_partner
 * @var \App\View\AppView $count_phone_partner
 * @var \App\View\AppView $get_date
 * @var \App\View\AppView $data_get
 * @var \App\View\AppView $new_condition
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'index']); ?>"
                           style="margin-left: 10px">
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
                                <div class="card-box">
                                <div class="row m-t-10">
                                    <b>Tên khách hàng</b>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_circle</i>
                                                </span>
                                        <?php
                                        echo $this->Form->create('Partners', array(
                                            'id' => 'form_advanced_validation_x',
                                            'type' => 'get'
                                        ));
                                        ?>
                                        <div class="form-line">
                                            <?php
                                            $name = isset($data_get['name']) ? ($data_get['name']):'';
                                            echo $this->Form->control('name', array(
                                                'label' => false,
                                                'class' => 'form-control',
                                                'value' => $name,
                                                'required' => false,
                                                'id' => 'name'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <b>Số điện thoại di động</b>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">phone_iphone</i>
                                                </span>
                                        <div class="form-line">
                                            <?php
                                            $phone = isset($data_get['phone']) ? ($data_get['phone']):'';
                                            echo $this->Form->control('phone', array(
                                                'label' => false,
                                                'class' => 'form-control mobile-phone-number',
                                                'value' => $phone,
                                                'required' => false,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <b>Địa chỉ mac </b>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">location_searching</i>
                                                </span>
                                        <div class="form-line">
                                            <?php
                                            $client_mac = isset($data_get['client_mac']) ? ($data_get['client_mac']):'';
                                            echo $this->Form->control('client_mac', array(
                                                'label' => false,
                                                'class' => 'form-control',
                                                'value' => $client_mac,
                                                'required' => false,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="sel1">Chọn thiết bị</label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">devices</i>
                                                </span>
                                            <div class="form-line">
                                                <?php
                                                echo $this->Form->select('device',
                                                    $device, [
                                                        'empty' => '-----',
                                                        'value' => isset($data_get['device']) ? $data_get['device']: '',
                                                        'class' => 'form-control sel1'
                                                    ]
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="sel1">Số lần kết nối</label>
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">confirmation_number</i>
                                                </span>
                                            <div class="form-line">
                                                <?php
                                                echo $this->Form->select('number_connect',
                                                    [
                                                        1 => 'Từ 1 đến 5',
                                                        2 => 'Từ 6 đến 10',
                                                        3 => 'Từ 11 đến 15',
                                                        4 => 'Lớn hơn 15'
                                                    ], [
                                                        'empty' => '-----',
                                                        'value' => isset($data_get['number_connect']) ? $data_get['number_connect']: '',
                                                        'class' => 'form-control sel1'
                                                    ]
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <b>Khoảng thời gian</b>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                        <div class="form-line">
                                            <?php
                                            $birthday = (isset($data_get['date']) && $data_get['date'] != '') ? ($data_get['date']): $get_date;
                                            echo $this->Form->control('date', array(
                                                'label' => false,
                                                'class' => 'form-control datetime',
                                                'value' => $birthday,
                                                'required' => false,
                                                'id' => 'config-demo',
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=""><button class="btn btn-primary waves-effect" id="submit" type="submit">Tìm kiếm</button> </div>
                                </div>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-primary mb30 table-bordered detail header bg-grey">
                                            <tbody>
                                            <tr>
                                                <th width="25%" class="middle">Tên chiến dịch</th>
                                                <td width="75%" colspan="1" class="middle">
                                                    <?= h($campaignGroups_title->name) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="middle">Số lượng voucher</th>
                                                <td colspan="1" class="middle" id="name"><?= h($count . '/' . $campaignGroups_title->number_voucher) ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="middle">Thời gian</th>
                                                <td colspan="1" class="middle">
                                                    <?= h($campaignGroups_title->time) ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-box">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_1">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Tổng khách
                                                    hàng</p>
                                                <h4 class="m-b-10"><?= $this->Paginator->counter(['format' => __('{{count}}')]) ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_2">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">khách đã confirm</p>
                                                <h4 class="m-b-10"><?= isset($sum_new_partner) ? $sum_new_partner : ''; ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_3">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">khách chưa confirm</p>
                                                <h4 class="m-b-10"><?= isset($sum_old_partner) ? $sum_old_partner : ''; ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="m-t-20 m-b-20 storke_4">
                                                <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Khách có SDT</p>
                                                <h4 class="m-b-10"><?= isset($sum_phone_partner) ? $sum_phone_partner : ''; ?></h4>
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
                                    <?php
                                        echo $this->Form->create('Users', array(
                                            'id' => 'form_advanced_validation_x',
                                            'type' => 'post',
                                            'url' => array('controller' => 'Users', 'action' => 'downloadExcelVoucher'),
                                        ));
                                    ?>
                                    <input type="hidden" name="name" value="<?= isset($data_get['name']) ? $data_get['name'] :'';?>" />
                                    <input type="hidden" name="phone" value="<?= isset($data_get['phone']) ? $data_get['phone'] :'';?>" />
                                    <input type="hidden" name="client_mac" value="<?= isset($data_get['client_mac']) ? $data_get['client_mac'] :'';?>" />
                                    <input type="hidden" name="device" value="<?= isset($data_get['device']) ? $data_get['device'] :'';?>" />
                                    <input type="hidden" name="number_connect" value="<?= isset($data_get['number_connect']) ? $data_get['number_connect'] :'';?>" />
                                    <input type="hidden" name="date" value="<?= isset($data_get['date']) ? $data_get['date'] :'';?>" />
                                    <input type="hidden" name="campaign_group_id" value="<?= isset($campaign_id) ? $campaign_id :'';?>" />
                                    <input type="hidden" name="date_begin" value="<?= isset($campaignGroups_title['time']) ? $campaignGroups_title['time'] :'';?>" />
                                    <button type="submit" class="btn bg-orange waves-effect">Tải về danh sách</button>
                                    <?php echo $this->Form->end(); ?>
                                <?php } ?>
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
                                            $page = $this->Paginator->counter(['format' => __('{{page}}')]);
                                            $count = 0;
                                            $count = ($page - 1) * 10;
                                            foreach ($campaigns as $partner_voucher_log) {
                                                $count++; ?>
                                                <tr valign="middle">
                                                    <td><?php echo $count; ?></td>
                                                    <td class="advertise font-bold col-cyan">
                                                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'detail_partner_voucher' . '/' . UrlUtil::_encodeUrl($partner_voucher_log->id) . '/' . UrlUtil::_encodeUrl($campaign_id)]) ?>">
                                                            <?php echo h($partner_voucher_log->name); ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo nl2br($partner_voucher_log->client_mac); ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($partner_voucher_log->modified)); ?></td>
                                                    <td><?php echo nl2br($partner_voucher_log->phone); ?></td>
                                                    <td><?php echo nl2br($partner_voucher_log->birthday); ?></td>
                                                    <td><?php echo nl2br($partner_voucher_log->address); ?></td>
                                                    <td>
                                                        <input type="checkbox"
                                                               id="basic_checkbox_<?php echo $partner_voucher_log->id; ?>"
                                                               name="confirm" value="<?php echo $count ?>"
                                                               class="filled-in <?php echo $partner_voucher_log->id; ?>" <?php if ($partner_voucher_log->confirm == 1) {
                                                            echo 'checked';
                                                        } ?> />
                                                        <label for="basic_checkbox_<?php echo $partner_voucher_log->id; ?>">confirm</label>
                                                        <?php if ($partner_voucher_log->confirm != 1) { ?>
                                                            <a class="btn btn-primary waves-effect pull-right check_submit"
                                                               id="<?php echo $partner_voucher_log->id; ?>">Cập nhật</a>
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
        if ($('.' + id).is(":checked")) {
            $.ajax({
                url: "/Reports/add_log_confirm_voucher",
                type: "POST",
                data: {id: id},
                cache: false,
                success: function (data) {
                    location.reload();
                }
            });
        } else {
            $.ajax({
                url: "/Reports/remove_log_confirm_voucher",
                type: "POST",
                data: {id: id},
                cache: false,
                success: function (data) {
                    location.reload();
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
    $('#config-demo').dateRangePicker({
        language:'vi',
        showShortcuts: true,
        shortcuts :
            {
                'next-days': [3, 5, 7],
                'next': ['week','month','year']
            },
        format: 'YYYY-MM-DD',
        separator: ' to '
    });
    //Line chart with tooltips
    var list_day = jQuery.parseJSON('<?= $list_day;?>');
    var chart_number_partner = jQuery.parseJSON('<?= $chart_number_partner;?>');
    var count_old_partner = jQuery.parseJSON('<?= $count_old_partner;?>');
    var count_new_partner = jQuery.parseJSON('<?= $count_new_partner;?>');
    var count_phone_partner = jQuery.parseJSON('<?= $count_phone_partner;?>');
    new Chartist.Line('#line-chart-tooltips', {
            labels: list_day,
            series: [
                {
                    name: 'Khách hàng',
                    data: chart_number_partner
                },
                {
                    name: 'khách đã confirm',
                    data: count_new_partner
                },
                {
                    name: 'khách chưa confirm',
                    data: count_old_partner
                },
                {
                    name: 'khách hàng có SDT',
                    data: count_phone_partner
                }
            ]
        },
        {
            low: 0,
            showArea: false,
            plugins: [
                Chartist.plugins.tooltip()
            ],
            fullWidth: true,
            chartPadding: {
                right: 40
            }
        }
    );
    var $chart = $('#line-chart-tooltips');
    var $toolTip = $chart
        .append('<div class="tooltip"></div>')
        .find('.tooltip')
        .hide();

    $chart.on('mouseenter', '.ct-point', function () {
        var $point = $(this),
            value = $point.attr('ct:value'),
            seriesName = $point.parent().attr('ct:series-name');
        $toolTip.html(seriesName + '<br>' + value).show();
    });

    $chart.on('mouseleave', '.ct-point', function () {
        $toolTip.hide();
    });

    $chart.on('mousemove', function (event) {
        $toolTip.css({
            left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
            top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
        });
    });

</script>