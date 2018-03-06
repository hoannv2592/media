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
</style>