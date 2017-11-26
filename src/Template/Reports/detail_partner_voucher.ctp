<?php
/**
 * @var \App\View\AppView $partner_voucher_logs
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'index']);?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Reports', 'action' => 'report_detail' .'/'. UrlUtil::_encodeUrl($campaign_id)]);?>">
                            Danh sách khách hàng
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
                        echo $this->Form->create('Reports', array(
                            'id' => 'form_advanced_validation_x',
                            'type' => 'post',
                            'url' => array('controller' => 'Reports',
                                'action' => 'detailPartnerVoucher'.'/'. UrlUtil::_encodeUrl($partner_voucher_logs['id']).'/'. UrlUtil::_encodeUrl($campaign_id)),
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
                                            <input type="text" class="form-control " name="name" id="name"  value="<?php echo $partner_voucher_logs['full_name'] ? $partner_voucher_logs['full_name']: ''; ?>" required placeholder="Tên khách hàng">
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
                                            <input type="text" class="form-control mobile-phone-number" name="telephone" placeholder="Số điện thoại" value="<?php echo $partner_voucher_logs['telephone'] ? $partner_voucher_logs['telephone']: ''; ?>">
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
                                            <input type="text" class="form-control datetime" id="datetime_birthday" name="birthday" value="<?php echo $partner_voucher_logs['birthday'] ? $partner_voucher_logs['birthday']: ''; ?>" placeholder="Ex: 30/07/2016 23:59">
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
                                            <input type="text" class="form-control" name="address" placeholder="Điền địa chỉ" value="<?php echo $partner_voucher_logs['address'] ? $partner_voucher_logs['address']: ''; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" name="confirm" value="1" class="filled-in" <?php if ($partner_voucher_logs->confirm == 1 ) { echo 'checked';}?> />
                                        <label for="basic_checkbox_2">confirm voucher</label>
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
        //Advanced Form Validation
        $('#form_advanced_validation_x').validate({
            rules: {
                'name' :{
                    required: true
                },
                'phone': {
                    required: true,
                    number : true
                },
                'email' : {
                    'email' : true
                }
            }
        });
    });
</script>
