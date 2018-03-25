<?php
/**
  * @var \App\View\AppView $this
  * @var \App\View\AppView $users
  * @var \App\Model\Entity\ServiceGroup[]|\Cake\Collection\CollectionInterface $serviceGroups
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
                        <div class="list-group">
                            <?php foreach ($users as $k => $vl) { if (!empty($vl['devices'])) { ?>
                                <a href="<?php echo $this->Url->build(['controller' => 'ServiceGroups', 'action' => 'sevice_detail'.'/'. UrlUtil::_encodeUrl($vl->id)]) ?>" class="list-group-item"><?php echo isset($vl->username) ? $vl->username : ''; ?>
                                    <span class="badge bg-pink">
                                        <?php echo $vl['devices'][0]['total'] ;?>
                                    </span>
                                </a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('service_groups/get_service_group'); ?>
</section>
