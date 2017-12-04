<?php
/**
 * @var \App\View\AppView $partner
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ol class="breadcrumb breadcrumb-bg-blue-grey">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Partners', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">Thông tin khách hàng</a>
                </li>
            </ol>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN KHÁCH HÀNG</h2>
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
                        echo $this->Form->create('Partners', array(
                            'id' => 'form_advanced_validation_x',
                            'type' => 'post',
                            'url' => array('controller' => 'Partners', 'action' => 'edit'.'/'. UrlUtil::_encodeUrl($partner['id'])),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false,
                            ),
                            'autocomplete' => "off"
                        ));
                        ?>
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <b>Tên khách hàng</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $name = isset($partner['name']) ? ($partner['name']):'';
                                            echo $this->Form->control('name', array(
                                                'label' => false,
                                                'class' => 'form-control',
                                                'value' => $name,
                                                'required' => true,
                                                'id' => 'name'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Số điện thoại di động</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $phone = isset($partner['phone']) ? ($partner['phone']):'';
                                            echo $this->Form->control('phone', array(
                                                'label' => false,
                                                'class' => 'form-control mobile-phone-number',
                                                'value' => $phone,
                                                'required' => true,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Địa chỉ mac</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_ind</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $client_mac = isset($partner['client_mac']) ? ($partner['client_mac']):'';
                                            echo $this->Form->control('client_mac', array(
                                                'label' => false,
                                                'class' => 'form-control time12',
                                                'value' => $client_mac,
                                                'readonly' => 'readonly',
                                                'required' => false,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Ngày sinh</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $birthday = isset($partner['birthday']) ? ($partner['birthday']):'';
                                            echo $this->Form->control('birthday', array(
                                                'label' => false,
                                                'class' => 'form-control datetime',
                                                'value' => $birthday,
                                                'required' => false,
                                                'id' => 'datetime_birthday'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <b>Số lần ghé thăm</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">confirmation_number</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $num_clients_connect = isset($partner['num_clients_connect']) ? ($partner['num_clients_connect']):'';
                                            echo $this->Form->control('num_clients_connect', array(
                                                'label' => false,
                                                'class' => 'form-control mobile-phone-number',
                                                'value' => $num_clients_connect,
                                                'required' => false,
                                                'readonly' => 'readonly'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Địa chỉ</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                        <div class="form-line">
                                            <?php
                                            $address = isset($partner['address']) ? ($partner['address']):'';
                                            echo $this->Form->control('address', array(
                                                'label' => false,
                                                'class' => 'form-control',
                                                'value' => $address,
                                                'required' => false,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" id="submit" type="submit">CẬP NHẬT</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        $('#datetime_birthday').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            format: "dd/mm/yyyy"
        });
        $(document).ready(function () {
           var sex = '<?php echo $partner['sex'];?>';
            $('#sex').val(sex);
        });
        //Advanced Form Validation
        $('#form_advanced_validation_x').validate({
            rules: {
                'name' :{
                    required: true
                },
                'email' : {
                    'email' : true
                }
            }
        });
    });
</script>
