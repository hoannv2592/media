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
                                <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th>STT</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>Giới tính</th>
                                        <th>Loại thành viên</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($partners as $k => $vl) { $count ++;?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td class="advertise font-bold col-cyan"><a href="<?php echo $this->Url->build(['controller' => 'Partners', 'action' => 'detail_partner' . '/' . $vl->id]) ?>"><?php echo h($vl->name); ?></a></td>
                                            <td><?php echo nl2br($vl->email); ?></td>
                                            <td><?php echo nl2br($vl->phone); ?></td>
                                            <td><?php echo nl2br($vl->birthday); ?></td>
                                            <td><?php echo nl2br($vl->address); ?></td>
                                            <td><?php echo (\App\Model\Entity\Partner::$sex[$vl->sex]); ?></td>
                                            <td><?php echo $vl->role; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>