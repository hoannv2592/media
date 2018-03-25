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
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Chăm sóc khách hàng <small>Description text here...</small>
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
                        <span class="label label-warning font-14">Danh sách khách hàng truy cập dưới 3 lần.</span>
                        <div class="m-t-10">
                            <?php if (!empty($list_id_devices)) { ?>
                                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'exportExcel/3/'.$list_id_devices]);?>" class="btn btn-primary waves-effect" style="box-shadow:none;">Tải xuống</a>
                            <?php } ?>
                        </div>
                        <div class="m-t-10">
                            <div class="col-sm-4" id="select">
                                <?= $this->Form->select('num_clients_connect', [
                                        '1' => 'khách hàng truy cập dưới 3 lần',
                                        '2' => 'khách hàng truy cập Từ 3 -> 10 lần',
                                        '3' => 'khách hàng truy cập lớn hơn 10 lần',
                                ], [
                                    'div' => false,
                                    'label' => false,
                                    'empty' => '----',
                                    'class' => 'form-control',
                                    'default' => $num_clients_connect

                                ]) ?>
                            </div>
                            <div class="row"></div>
                        </div>
                        <div class="table-responsive m-b-15 m-t-5">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Number connect</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                if ($currentPage == 1 ) {
                                    $count = 0;
                                } else {
                                    $count = 10 * ($currentPage - 1);
                                }

                                foreach ($partners as $key => $partner) { $count++;
                                     ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($partner->id)]) ?>">
                                                    <?php echo h($partner->name); ?>
                                                </a>
                                            </td>
                                            <td><?php echo nl2br($partner->phone); ?></td>
                                            <td><?php echo nl2br($partner->birthday); ?></td>
                                            <td><?php echo nl2br($partner->address); ?></td>
                                            <td><?php echo nl2br($partner->num_clients_connect); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation" style="display: block;">
                           <ul class="pagination light-theme simple-pagination" id="paging"></ul>
                        </nav>
                        <script type="application/javascript">

                            function pageChange(pageNumber) {
                                var num_clients_connect = $('select[name="num_clients_connect"]').val();
                                window.location.href = '/ServiceGroups/seviceDetail/<?= $detail_sevice ;?>/?page='+ pageNumber + '&num_clients_connect=' + num_clients_connect;
                            }

                            $('#paging').pagination({
                                items: <?php echo isset($total) ? $total:'1'; ?>,
                                currentPage: <?php echo isset($currentPage)?$currentPage:'1'; ?>,
                                itemsOnPage: 10,
                                prevText: 'Trước',
                                nextText: 'Sau',
                                onPageClick: function (pageNumber, event) {
                                    pageChange(pageNumber);
                                }
                            });

                            $('select[name="num_clients_connect"]').change(function () {
                                var num_clients_connect = $(this).val();
                                window.location.href = '/ServiceGroups/seviceDetail/<?= $detail_sevice ;?>/?page=1&num_clients_connect=' + num_clients_connect;
                            });


                        </script>




<!--                        <span class="label label-warning font-14">Danh sách khách hàng truy cập dưới 3 lần.</span>-->
<!--                        <div class="m-t-10">-->
<!--                            --><?php //if (!empty($list_id_devices)) { ?>
<!--                            <a href="--><?php //echo $this->Url->build(['controller' => 'Users', 'action' => 'exportExcel/3/'.$list_id_devices]);?><!--" class="btn btn-primary waves-effect" style="box-shadow:none;">Tải xuống</a>-->
<!--                            --><?php //} ?>
<!--                        </div>-->
<!--                        <div class="table-responsive m-b-15 m-t-5">-->
<!--                            <table class="table table-bordered table-striped table-hover js-basic-example_sevice dataTable">-->
<!--                                <thead>-->
<!--                                <tr class="bg-blue-grey">-->
<!--                                    <th>STT</th>-->
<!--                                    <th>Tên khách hàng</th>-->
<!--                                    <th>Số điện thoại</th>-->
<!--                                    <th>Ngày sinh</th>-->
<!--                                    <th>Địa chỉ</th>-->
<!--                                    <th>Number connect</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                --><?php
//                                $count = 0;
//                                foreach ($partners as $key => $partner) {
//                                    if ($partner->num_clients_connect < 3) { $count++; ?>
<!--                                        <tr>-->
<!--                                            <td>--><?php //echo $count;?><!--</td>-->
<!--                                            <td class="advertise font-bold col-cyan">-->
<!--                                                <a href="--><?php //echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($partner->id)]) ?><!--">-->
<!--                                                    --><?php //echo h($partner->name); ?>
<!--                                                </a>-->
<!--                                            </td>-->
<!--                                            <td>--><?php //echo nl2br($partner->phone); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->birthday); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->address); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->num_clients_connect); ?><!--</td>-->
<!--                                        </tr>-->
<!--                                    --><?php //} ?>
<!--                                --><?php //} ?>
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                        <span class="label label-warning font-14">Danh sách khách hàng truy cập <strong> Từ 3 -> 10 lần.</strong></span>-->
<!--                        <div class="m-t-10">-->
<!--                            --><?php //if (!empty($list_id_devices)) { ?>
<!--                                <a href="--><?php //echo $this->Url->build(['controller' => 'Users', 'action' => 'exportExcel/4/'. $list_id_devices]);?><!--" class="btn btn-primary waves-effect" style="box-shadow:none;">Tải xuống</a>-->
<!--                            --><?php //} ?>
<!--                        </div>-->
<!--                        <div class="table-responsive m-b-15 m-t-5">-->
<!--                            <table class="table table-bordered table-striped table-hover js-basic-example_sevice dataTable">-->
<!--                                <thead>-->
<!--                                <tr class="bg-blue-grey">-->
<!--                                    <th>STT</th>-->
<!--                                    <th>Tên khách hàng</th>-->
<!--                                    <th>Số điện thoại</th>-->
<!--                                    <th>Ngày sinh</th>-->
<!--                                    <th>Địa chỉ</th>-->
<!--                                    <th>Number connect</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                --><?php
//                                $count = 0;
//                                foreach ($partners as $key => $partner) {
//                                    if ($partner->num_clients_connect >= 3 && $partner->num_clients_connect <= 10) { $count++ ;?>
<!--                                        <tr>-->
<!--                                            <td>--><?php //echo $count;?><!--</td>-->
<!--                                            <td class="advertise font-bold col-cyan">-->
<!--                                                <a href="--><?php //echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($partner->id)]) ?><!--">-->
<!--                                                    --><?php //echo h($partner->name); ?>
<!--                                                </a>-->
<!--                                            </td>-->
<!--                                            <td>--><?php //echo nl2br($partner->phone); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->birthday); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->address); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->num_clients_connect); ?><!--</td>-->
<!--                                        </tr>-->
<!--                                    --><?php //} ?>
<!--                                --><?php //} ?>
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                        <span class="label label-warning font-14">Danh sách khách hàng truy cập <strong> lớn hơn 10 lần.</strong></span>-->
<!--                        <div class="m-t-10">-->
<!--                            --><?php //if (!empty($list_id_devices)) { ?>
<!--                            <a href="--><?php //echo $this->Url->build(['controller' => 'Users', 'action' => 'exportExcel/10/'.$list_id_devices]);?><!--" class="btn btn-primary waves-effect" style="box-shadow:none;">Tải xuống</a>-->
<!--                            --><?php //} ?>
<!--                        </div>-->
<!--                        <div class="table-responsive m-b-15 m-t-5">-->
<!--                            <table class="table table-bordered table-striped table-hover js-basic-example_sevice dataTable">-->
<!--                                <thead>-->
<!--                                <tr class="bg-blue-grey">-->
<!--                                    <th>STT</th>-->
<!--                                    <th>Tên khách hàng</th>-->
<!--                                    <th>Số điện thoại</th>-->
<!--                                    <th>Ngày sinh</th>-->
<!--                                    <th>Địa chỉ</th>-->
<!--                                    <th>Number connect</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                --><?php
//                                $count = 0;
//                                foreach ($partners as $key => $partner) {
//                                    $count_number_connect = count($partner->num_clients_connect);
//                                    if ($partner->num_clients_connect > 10) { $count++ ; ?>
<!--                                        <tr>-->
<!--                                            <td>--><?php //echo $count;?><!--</td>-->
<!--                                            <td class="advertise font-bold col-cyan">-->
<!--                                                <a href="--><?php //echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . UrlUtil::_encodeUrl($partner->id)]) ?><!--">-->
<!--                                                    --><?php //echo h($partner->name); ?>
<!--                                                </a>-->
<!--                                            </td>-->
<!--                                            <td>--><?php //echo nl2br($partner->phone); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->birthday); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->address); ?><!--</td>-->
<!--                                            <td>--><?php //echo nl2br($partner->num_clients_connect); ?><!--</td>-->
<!--                                        </tr>-->
<!--                                    --><?php //} ?>
<!--                                --><?php //} ?>
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .label{
        font-weight: normal !important;
    }
    #select{
        margin-bottom: 0px !important;
        margin-left: -10px !important;
    }
</style>