<?php
/**
 * $partners
 * @var \App\View\AppView $partners
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
                        <h2>
                            Chăm sóc khách hàng
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-6" style="margin-bottom: 0 !important;">
                                <?php echo $this->Form->create('ServiceGroups', array(
                                    'id' => 'form_advanced_validation_x',
                                    'type' => 'post',
//                                                'url' => array('controller' => 'Partners', 'action' => 'index'),
                                    'inputDefaults' => array(
                                        'label' => false,
                                        'div' => false,
                                    ),
                                    'autocomplete' => "off"
                                ));
                                ?>
                                    <div class="col-md-12">
                                        <b>Tên khách hàng</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                            <div class="form-line">
                                                <?php
                                                $name = isset($conditions['name']) ? ($conditions['name']):'';
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
                                    <div class="col-md-12">
                                        <b>Số điện thoại di động</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                            <div class="form-line">
                                                <?php
                                                $phone = isset($conditions['phone']) ? ($conditions['phone']):'';
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

                                    <div class="col-md-12">
                                        <b>Thiết bị quản lý </b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">devices</i>
                                            </span>
                                            <div class="form-line">
                                                <?php
                                                $device_name = isset($conditions['device_name']) ? ($conditions['device_name']):'';
                                                echo $this->Form->control('device_name', array(
                                                    'label' => false,
                                                    'class' => 'form-control',
                                                    'value' => $device_name,
                                                    'required' => false,
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <b>Địa chỉ mac </b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_searching</i>
                                            </span>
                                            <div class="form-line">
                                                <?php
                                                $client_mac = isset($conditions['client_mac']) ? ($conditions['client_mac']):'';
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
                                    <div class="col-md-12">
                                        <b>Khoảng thời gian</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <?php
                                                $birthday = isset($conditions['date']) ? ($conditions['date']):'';
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
                                    <div class="col-md-12">
                                        <div class=""><button class="btn btn-primary waves-effect" id="submit" type="submit">Tìm kiếm</button> </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
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
                                    </div>
                                    <?php $list_id_partner = json_decode($list_id_partner);
                                    if (!empty($list_id_partner)) { ?>
                                        <div class="col-md-12 pull-right">
                                            <div class="">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'download_excel/'.$list_id_partner]);?>" class="btn btn-primary waves-effect" style="box-shadow:none;">Export danh sách khách hàng có số điện thoại</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row"></div>
                        </div>
                        <div class="table-responsive m-b-15 m-t-5">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ mac</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Thời gian truy cập</th>
                                    <th>Số lần ghé thăm</th>
                                    <th>Thiết bị quản lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($partners as $key => $partner) {
                                     ?>
                                        <tr>
                                            <td><?php echo h($partner['id']); ?></td>
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
                                <p style="padding-top: 25px;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
        color: #777;
        cursor: not-allowed;
        background-color: #fff !important;
        border-color: #ddd;
    }
    .desc {
        float: right;
    }
    th>a {
        float: right;
    }
    .label{
        font-weight: normal !important;
    }
    #select{
        margin-bottom: 0px !important;
        margin-left: -10px !important;
    }
    .storke_1{
        border: 2px solid #4489e4;
    }
    .storke_2{
        border: 2px solid #f96a74;
    }
    .storke_3 {
        border: 2px solid #ffa91c;
    }
    .storke_4{
        border: 2px solid #32c861;
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
        format: 'DD-MM-YYYY',
        separator: ' to '
    });
    //Line chart with tooltips
    var list_day = jQuery.parseJSON('<?= isset($list_day) ? $list_day:"";?>');
    var chart_number_partner = jQuery.parseJSON('<?= isset($chart_number_partner) ? $chart_number_partner:[];?>');
    var count_old_partner = jQuery.parseJSON('<?= isset($count_old_partner)?$count_old_partner:[];?>');
    var count_new_partner = jQuery.parseJSON('<?= isset($count_new_partner)?$count_new_partner:[];?>');
    var count_phone_partner = jQuery.parseJSON('<?= isset($count_phone_partner)?$count_phone_partner:[];?>');
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