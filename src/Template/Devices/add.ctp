<?php
/**
  * @var \App\View\AppView $this
 * @var \App\Model\Entity\Devices[]|\Cake\Collection\CollectionInterface $users
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb breadcrumb-col-pink">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Home
                    </a>
                </li>
                <li class="active">
                    <i class="material-icons">library_books</i> thiết bị mới
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI THIẾT BỊ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Devices', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Devices', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name_device" placeholder="Tên thiết bị" required>
                                <label class="form-label"></label>
                            </div>
                            <div class="help-info">Tên thiết bị</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="apt_key" placeholder="Mã apt_key" required>
                                <label class="form-label"></label>
                            </div>
                            <div class="help-info">Mã apt_key</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select class="form-control required" name="user_id" id="user_id">
                                    <option disabled selected value> -- Chọn user --</option>
                                    <?php foreach ($users as $key => $user) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $user ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="help-info">Chọn Users</div>
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
    $('#form_advanced_validation').validate({
        onkeyup: false,
        rules: {
            'name': {
                remote: {
                    type: 'POST',
                    async: false,
                    url: '/Devices/isNameExistAdd'
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
</script>
