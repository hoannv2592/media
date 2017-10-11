<?php
/**
 * @var \App\View\AppView $partner
 */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">Thông tin khách hàng</a>
                </li>
            </ol>
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
                            'url' => array('controller' => 'Partners', 'action' => 'edit'.'/'. $partner['id']),
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
                                            <input type="text" class="form-control " name="name" id="name"  value="<?php echo $partner['name'] ? $partner['name']: ''; ?>" required placeholder="Tên khách hàng">
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
                                            <input type="text" class="form-control mobile-phone-number" name="phone" placeholder="Số điện thoại" value="<?php echo $partner['phone'] ? $partner['phone']: ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Địa chỉ email</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control email" name="email" value="<?php echo $partner['email'] ? $partner['email']: ''; ?>" placeholder="Ex: example@example.com" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Loại thành viên</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_ind</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control time12" value="Member" name="role" readonly="readonly" placeholder="Loại thành viên">
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

                                            <input type="text" class="form-control datetime" id="datetime_birthday" name="birthday" value="<?php echo $partner['birthday'] ? $partner['birthday']: ''; ?>" placeholder="Ex: 30/07/2016 23:59">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <b>Số lần ghé thăm</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" readonly="readonly" class="form-control mobile-phone-number" name="num_clients_connect" value="<?php echo isset($partner->num_clients_connect) ? $partner->num_clients_connect:''; ?>" placeholder="Ex: +00 (000) 000-00-00">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b>Giới tính</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">perm_identity</i>
                                            </span>
                                        <div class="form-line">
                                            <select class="form-control" name="sex" id="sex">
                                                <option disabled selected value> Không xác định </option>
                                                <option value="1" >Nam</option>
                                                <option value="2" >Nữ</option>
                                            </select>
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
                                            <input type="text" class="form-control" name="address" placeholder="Điền địa chỉ" value="<?php echo $partner['address'] ? $partner['address']: ''; ?>" required>
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
        $('#datetime_birthday').bootstrapMaterialDatePicker({
            weekStart : 0,
            time: false,
            format : 'DD/MM/YYYY'
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
                'phone': {
                    required: true,
                    number : true,
                    minlength:9,
                    maxlength:11
                },
                'email' : {
                    'email' : true
                }
            }
        });
    });
</script>
