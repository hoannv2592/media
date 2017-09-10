<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> new landingpage
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI MÀN QUẢNG CÁO</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php
                        echo $this->Form->create('Landingpages', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Landingpages', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Tên loại quảng cáo" required>
                            </div>
                            <div class="help-info">Tên loại quảng cáo</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" placeholder="Mô tả quảng cáo" required></textarea>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">THÊM MỚI</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        //Advanced Form Validation
        $('#form_advanced_validation').validate({
            onkeyup: false,
            rules: {
                'name' : {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Landingpages/isNameExist'
                    }
                }
            },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            }
        });
    });
</script>