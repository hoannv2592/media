<?php
/**
 * @var \App\View\AppView $this
 * @var $userData
 * @var \App\Model\Entity\Users[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>Danh sách khách hàng đang sử dụng dịch vụ</h2>
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
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-6" style="margin-bottom: 0 !important;">
                                    <div class="col-md-12">
                                        <b>Tên khách hàng</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                            <?php
                                            echo $this->Form->create('Partners', array(
                                                'id' => 'form_advanced_validation_x',
                                                'type' => 'post',
                                                'url' => array('controller' => 'Partners', 'action' => 'index'),
                                                'inputDefaults' => array(
                                                    'label' => false,
                                                    'div' => false,
                                                ),
                                                'autocomplete' => "off"
                                            ));
                                            ?>
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
<!--                                        <div class="text-center">-->
<!--                                            <div class="row">-->
<!--                                                <div class="col-xs-6">-->
<!--                                                    <div class="m-t-20 m-b-20">-->
<!--                                                        <p class="text-uppercase m-b-5 font-13 font-600">Khách kết nối nhiều nhất</p>-->
<!--                                                        <h4 class="m-b-10">7584</h4>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="col-xs-6">-->
<!--                                                    <div class="m-t-20 m-b-20">-->
<!--                                                        <p class="text-uppercase m-b-5 font-13 font-600">Tổng khách ghé thăm</p>-->
<!--                                                        <h4 class="m-b-10">4521</h4>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div id="morris-area-example" style="height: 320px;"></div>-->
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="m-t-20 m-b-20">
                                                        <h4 class="m-b-10">5623</h4>
                                                        <p class="text-uppercase m-b-5 font-13 font-600">Lifetime total sales</p>
                                                        <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="m-t-20 m-b-20">
                                                        <h4 class="m-b-10">69695</h4>
                                                        <p class="text-uppercase m-b-5 font-13 font-600">Income amounts</p>
                                                        <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="m-t-20 m-b-20">
                                                        <h4 class="m-b-10">2651</h4>
                                                        <p class="text-uppercase m-b-5 font-13 font-600">Total visits</p>
                                                        <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-10">
                                            <div id="chart-with-area" class="ct-chart ct-golden-section"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"></div>
                        </div>
                        <?php if (!empty($partners)) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th scope="col" class="text-center">
                                            ID
                                            <?= $this->Paginator->sort('Partners.id', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.id', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Tên người dùng
                                            <?= $this->Paginator->sort('Partners.name', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.name', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Địa chỉ mac
                                            <?= $this->Paginator->sort('Partners.client_mac', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.client_mac', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Số điện thoại
                                            <?= $this->Paginator->sort('Partners.phone', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.phone', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Ngày sinh
                                            <?= $this->Paginator->sort('Partners.birthday', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.birthday', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Địa chỉ
                                            <?= $this->Paginator->sort('Partners.address', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.address', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Thời gian truy cập
                                            <?= $this->Paginator->sort('Partners.modified', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.modified', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Số lần ghé thăm
                                            <?= $this->Paginator->sort('Partners.num_clients_connect', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Partners.num_clients_connect', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                        <th scope="col">Thiết bị quản lý
                                            <?= $this->Paginator->sort('Devices.name', '▼', ['direction' => 'desc', 'escape' => false]) ?>
                                            <?= $this->Paginator->sort('Devices.name', '▲', ['direction' => 'asc', 'escape' => false]); ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($partners as $k => $vl) { ?>
                                        <tr>
                                            <td><?php echo h($vl['id']); ?></td>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($vl['id'])]) ?>">
                                                    <?php echo h($vl['name']); ?>
                                                </a>
                                            </td>
                                            <td><?php echo h($vl['client_mac']); ?></td>
                                            <td><?php echo h($vl['phone']); ?></td>
                                            <td><?php echo h($vl['birthday']); ?></td>
                                            <td><?php echo h($vl['address']); ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($vl['modified'])); ?></td>
                                            <td><?php echo h($vl['num_clients_connect']); ?></td>
                                            <td><?php echo isset($vl['Devices']['name']) ? $vl['Devices']['name'] : ''; ?></td>
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
                        <?php } else { ?>
                            <div class="text-left">Chưa có khách hàng sử dụng thiết bị này</div>
                        <?php } ?>
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
</style>
<script type="application/javascript">
    $('#config-demo').dateRangePicker({
        language:'vi',
        showShortcuts: true,
        shortcuts :
            {
                'next-days': [3,5,7],
                'next': ['week','month','year']
            },

        format: 'DD-MM-YYYY',
        separator: ' to '
    });
</script>