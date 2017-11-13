<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Landingpage[]|\Cake\Collection\CollectionInterface $landingpage
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li><li class="active"><a href="javascript:void(0)">Thông tin màn hình quảng cáo</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN MÀN QUẢNG CÁO</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <label for="name">Tên loại quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($landingpage->name) ? $landingpage->name: '';?>
                            </div>
                            <div class="help-info">Tên loại quảng cáo</div>
                        </div>
                        <label for="name">Mô tả quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?php echo isset($landingpage->description) ? $landingpage->description: '';?>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>
                        <a class="btn btn-primary waves-effect" href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'edit/'. UrlUtil::_encodeUrl($landingpage['id'])])?>">CHỈNH SỬA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>