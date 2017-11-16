<?php
/**
  * @var \App\View\AppView $this
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">Thêm mới chiến dịch</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN CHIẾN DỊCH</h2>
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
                        echo $this->Form->create('CampaignGroups', array(
                            'id' => 'form_advanced',
                            'type' => 'post',
                            'url' => array('controller' => 'CampaignGroups', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false,
                            ),
                        ));
                        ?>
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo $this->Form->control('name', array(
                                        'class' => 'form-control',
                                        'id' => 'name_address',
                                        'label' => 'Tên chiến dịch',
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                    echo $this->Form->control('start_date', array(
                                        'label' => 'Ngày bắt đầu chiến dịch',
                                        'class' => 'form-control datetime',
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                echo $this->Form->control('end_date', array(
                                    'label' => 'Ngày kết thúc chiến dịch',
                                    'class' => 'form-control datetime',
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                echo $this->Form->control('number_voucher', array(
                                    'label' => 'Số lượng voucher phát ra',
                                    'class' => 'form-control',
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                echo $this->Form->control('description', array(
                                    'label' => 'Mô tả chiến dịch',
                                    'class' => 'form-control',
                                    'escape' => false,
                                    'type' => 'textarea'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="config-demo" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" id="submit" type="submit">TẠO MỚI</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        $('.datetime').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            format: "dd/mm/yyyy"
        });
        //Advanced Form Validation
        $('#form_advanced').validate({
            onkeyup: false,
            rules: {
                'name' :{
                    required: true,
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/CampaignGroups/isNameExistAdd'
                    }
                },
                'start_date' :{
                    required: true
                },
                'end_date' :{
                    required: true
                },
                'number_voucher' :{
                    required: true,
                    number : true
                }
            }
        });
    });
    $('#config-demo').daterangepicker({}, function(start, end, label) {});
</script>