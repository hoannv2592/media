<?php
/**
 * @var $list_day
 * @var $data_get
 * @var $get_date
 * @var $chart_number_partner
 * @var $count_old_partner
 * @var $count_new_partner
 * @var $count_phone_partner
 * @var \App\View\AppView $partners
 * @var $list_devices
 * @var $new_condition
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a style="margin-left: 10px;" href="<?php echo $this->Url->build(['controller' => 'ServiceGroups', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">Thông tin khách hàng</a>
                    </li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>Chăm sóc khách hàng</h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-6" style="margin-bottom: 0 !important;">
                                    <div class="card-box">
                                        <?php echo $this->Form->create('ServiceGroups', array(
                                            'id' => 'form_advanced_validation_x',
                                            'type' => 'get'
                                        ));?>
                                        <div class="row">
                                            <b>Tên khách hàng</b>
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
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
                                                            $list_devices, [
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
                                                    $birthday = (isset($data_get['date']) && $data_get['date'] != '') ? ($data_get['date']):$get_date;
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
                                <div class="col-md-6" style="margin-bottom: 0 !important;">
                                    <div class="card-box">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="m-t-20 m-b-20 storke_1">
                                                        <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Tổng khách hàng</p>
                                                        <h4 class="m-b-10"><?= isset($total_partner)? $total_partner:'';?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="m-t-20 m-b-20 storke_2">
                                                        <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Khách hàng mới</p>
                                                        <h4 class="m-b-10"><?= isset($sum_new_partner) ? $sum_new_partner:'';?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="m-t-20 m-b-20 storke_3">
                                                        <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Khách hàng quay lại</p>
                                                        <h4 class="m-b-10"><?= isset($sum_old_partner) ? $sum_old_partner:'';?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="m-t-20 m-b-20 storke_4">
                                                        <p class="text-uppercase m-b-5 font-13 font-600 m-t-10">Khách hàng có SDT</p>
                                                        <h4 class="m-b-10"><?= isset($sum_phone_partner) ? $sum_phone_partner:'';?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-t-10">
                                            <div id="line-chart-tooltips" class="ct-chart ct-golden-section"></div>
                                        </div>

                                    <?php
                                    if (!empty($list_id_partner)) {
                                        $list_id_partner = json_decode($list_id_partner);
                                    }
                                    if (!empty($list_id_partner)) {
                                        $list_id_partner = json_encode($list_id_partner);
                                        ?>
                                        <div class="row m-t-10">
                                            <div class="">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'download_excel/'.$list_id_partner]);?>" class="btn btn-primary waves-effect" style="box-shadow:none;">Export danh sách khách hàng có số điện thoại</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
                        </div>
                        <?php if (!empty($partners)) { ?>
                            <?php
                                echo $this->Form->create('Users', array(
                                    'id' => 'form_advanced_validation_x',
                                    'type' => 'post',
                                    'url' => array('controller' => 'Users', 'action' => 'download'),
                                ));
                            ?>
                            <input type="hidden" name="name" value="<?= isset($data_get['name']) ? $data_get['name'] :'';?>" />
                            <input type="hidden" name="phone" value="<?= isset($data_get['phone']) ? $data_get['phone'] :'';?>" />
                            <input type="hidden" name="client_mac" value="<?= isset($data_get['client_mac']) ? $data_get['client_mac'] :'';?>" />
                            <input type="hidden" name="device" value="<?= isset($data_get['device']) ? $data_get['device'] :'';?>" />
                            <input type="hidden" name="number_connect" value="<?= isset($data_get['number_connect']) ? $data_get['number_connect'] :'';?>" />
                            <input type="hidden" name="date" value="<?= isset($data_get['date']) ? $data_get['date'] :'';?>" />
                            <input type="hidden" name="date_begin" value="<?= isset($get_date) ? $get_date :'';?>" />
                            <input type="hidden" name="list_id_devices" value="<?= isset($list_id_devices) ? $list_id_devices :'';?>" />
                            <button type="submit" class="btn bg-orange waves-effect">Tải về danh sách</button>
                            <?php echo $this->Form->end(); ?>
                        <?php } ?>
                            <div class="table-responsive m-b-15 m-t-5">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th style="text-align: center">No</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ mac</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Thời gian truy cập</th>
                                    <th>Số lần kết nối</th>
                                    <th>Thiết bị</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $page = $this->Paginator->counter(['format' => __('{{page}}')]);
                                $count = 0;
                                $count = ($page - 1) * 10;
                                foreach ($partners as $key => $partner) {
                                    $count++;
                                    if ($count % 2 == 0) $class = "odd"; else $class = "even"; ?>
                                        <tr class="<?= $class ?>">
                                            <td style="text-align: center"><?php echo h($count); ?></td>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($partner['id'])]) ?>">
                                                    <?php echo h($partner['name']); ?>
                                                </a>
                                            </td>
                                            <td><?php echo h($partner['client_mac']); ?></td>
                                            <td><?php echo nl2br($partner['phone']); ?></td>
                                            <td><?php echo nl2br($partner['birthday']); ?></td>
                                            <td><?php echo nl2br($partner['address']); ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($partner['created'])); ?></td>
                                            <td><?php echo nl2br($partner['num_clients_connect']); ?></td>
                                            <td><?php echo isset($partner['Devices']['name']) ? $partner['Devices']['name'] : ''; ?></td>
                                        </tr>
                                    <?php } ?>
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
                                <p style="padding-top: 25px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}} showing {{current}} record(s) out of {{count}} total')]) ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
    var list_day                = jQuery.parseJSON('<?= isset($list_day) ? $list_day:"";?>');
    var chart_number_partner    = jQuery.parseJSON('<?= isset($chart_number_partner) ? $chart_number_partner:[];?>');
    var count_old_partner       = jQuery.parseJSON('<?= isset($count_old_partner) ? $count_old_partner:[];?>');
    var count_new_partner       = jQuery.parseJSON('<?= isset($count_new_partner) ? $count_new_partner:[];?>');
    var count_phone_partner     = jQuery.parseJSON('<?= isset($count_phone_partner) ? $count_phone_partner:[];?>');
    new Chartist.Line('#line-chart-tooltips', {
            labels: list_day,
            series: [
                {
                    name: 'Khách hàng',
                    data: chart_number_partner
                },
                {
                    name: 'khách hàng mới',
                    data: count_new_partner
                },
                {
                    name: 'khách hàng quay lại',
                    data: count_old_partner
                },
                {
                    name: 'khách hàng có SDT',
                    data: count_phone_partner
                }
            ]
        },
        {
            fullWidth: true,
            chartPadding: {
                right: 40
            },
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