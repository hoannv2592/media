<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $adgroups
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
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">THÊM NHÓM QUẢNG CÁO</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>Tên quảng cáo</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($adgroups as $key => $adgroup) { ?>
                                    <tr>
                                        <td class="advertise font-bold col-cyan" value="<?php echo h($adgroup->id); ?>"><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-02"> <?php echo h($adgroup->name); ?></a></td>
                                        <td><?php echo nl2br($adgroup->description); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($adgroup->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($adgroup->id); ?>"><button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa quảng cáo</button></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('adgroup/get_ad_group'); ?>
</section>