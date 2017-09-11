<section class="content">
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            IMPORT FILE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Import', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Import', 'action' => 'index'),
                            'enctype' => 'multipart/form-data'
                        ));
                        ?>
                            <label for="email_address">Import file</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php echo $this->Form->input('file_import', array(
                                            'type' => 'file',
                                            'div' => false,
                                            'label' => false,
                                            'class' => 'form-control',
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">IMPORT</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>