<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $adgroups
  * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $userData
  */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý nhóm quảng cáo <small>Description text here...</small>
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
                        <div class="button-demo">
                            <?php if ($userData['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                                <div class="button-demo">
                                    <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'add']) ?>"
                                       class="btn btn-primary waves-effect m-r-20">THÊM NHÓM QUẢNG CÁO</a>
                                </div>
                            <?php } else { ?>
                                <a disabled="disabled" href="javascript:void(0);" class="btn btn-primary waves-effect m-r-20">THÊM NHÓM QUẢNG CÁO</a>
                            <?php } ?>
                        </div>
                        <?php if (!empty($adgroups)) { ?>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example_ad dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>STT</th>
                                    <th>Tên quảng cáo</th>
                                    <th>Người dùng</th>
                                    <th>Loại quảng cáo</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                foreach ($adgroups as $key => $adgroup) { $count++;?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td class="advertise font-bold col-cyan">
                                            <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'detail_group' . '/' . $adgroup->id]) ?>"><?php echo h($adgroup->name); ?></a>
                                        </td>
                                        <td>
                                            <table class="table">
                                            <?php if (!empty($adgroup->user_id)) {
                                                foreach (json_decode($adgroup->user_id) as $k =>$user) { ?>
                                                    <tr>
                                                        <td><a class="font-bold"
                                                               href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'detail-partner' . '/' . $k]) ?>"> <?php echo $user; ?></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            </table>
                                        </td>
                                        <td>
                                            <?php echo isset(\App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]) ? \App\Model\Entity\Device::$langding_page[$adgroup->langdingpage_id]:''; ?>
                                        </td>
                                        <td><?php echo nl2br($adgroup->description); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($adgroup->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($adgroup->id); ?>">
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa nhóm</button></td>
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
    <?php echo $this->element('adgroup/get_ad_group'); ?>
</section>