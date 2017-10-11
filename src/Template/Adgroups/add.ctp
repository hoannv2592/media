<?php
/**
  * @var \App\View\AppView $this
  * @var $devices
  * @var $device
  * @var $adgroup
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb ">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'index']) ?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active"><a href="javascript:void(0)">Tạo nhóm</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NHÓM THIẾT BỊ QUẢNG CÁO </h2><small>Description text here...</small>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Landingpages', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'file',
                            'url' => array('controller' => 'Adgroups', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <label for="name">Tên nhóm thiết bị</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhóm thiết bị" required>
                            </div>
                            <div class="help-info">Tên nhóm thiết bị</div>
                        </div>
                        <label for="description">Mô tả nhóm thiết bị</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" placeholder="Mô tả nhóm thiết bị" required></textarea>
                            </div>
                            <div class="help-info">Mô tả nhóm thiết bị</div>
                        </div>
                        <h2 class="card-inside-title">Chọn thiết bị cho nhóm</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <select data-placeholder="Chọn thiết bị" class="chosen-select" multiple tabindex="8" name="device_id[]">
                                    <?php $user_de_id = json_decode($adgroup->device_name);
                                    foreach ($devices as $key => $device) {
                                        if (isset($user_de_id->$key)) { ?>
                                            <option selected="selected" value="<?php echo $key; ?>"><?php echo $device ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $device ?></option>
                                        <?php }
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Tên cơ sở dịch vụ</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="tile_name" id="tile_name" class="form-control" value="<?php echo isset($device->tile_name) ? $device->tile_name :'';?>" placeholder="Điền tên..">
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="demo-radio-button">
                                <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" checked/>
                                <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                                <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" />
                                <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                                <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey"  />
                                <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                            </div>
                            </div>
                        </div>
                            <div class="check_pass_device m-t-15">
                                <h2 class="card-inside-title"> Mật khẩu thiết bị </h2>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="apt_device_number" maxlength="8" id="apt_device_number" value="<?php echo isset($apt_device_number) ? $apt_device_number:'' ?>" placeholder="Điền mật khẩu.." class="form-control">
                                    </div>
                                </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Tên cơ sở dịch vụ</th>
                                    <th width="25%">Ảnh nền</th>
                                    <th width="10%">Ngày tải lên</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($device->path)) { ?>
                                    <tr>
                                        <td><?php echo $device->id; ?></td>
                                        <td><?php echo $device->tile_name; ?></td>
                                        <td class="image"><embed src="<?= '/'.$device->path ?>" width="450" height="300"></td>
                                        <td><?php echo $device->created; ?></td>
                                    </tr>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <h2 class="card-inside-title"> Chọn một ảnh </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file" id="file" value="<?php echo isset($device->path) ? '/'.$device->path: '';?>" class="form-control">
                            </div>
                        </div>
                        <!-- #END# Multi Select -->
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
        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $('#form_advanced_validation').validate({
            onkeyup: false,
            rules: {
                'name': {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Adgroups/isNameExistAdd'
                    }
                },
                'tile_name': {required: true},
                'langdingpage_id': {required: true},
                'apt_device_number': {required: true},
                "device_id[]": "required"

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
        $(function () {
            //Multi-select
            $('#optgroup').multiSelect({});
        });
    });
</script>
<script type="application/javascript">
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        console.log(__val);
        if (__val != 1) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', '');
        }
    });
    $('#uploadForm').validate({
        rules: {
            'tile_name': { required: true },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true }
        },
        messages:{
            'tile_name': { required: 'Hãy nhập' },
            'langdingpage_id': { required: 'Hãy nhập' },
            'apt_device_number': { required: 'Hãy nhập' }
        }
    });
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.image').html('');
                $('.image').append('<div class="text-center"><img src="'+e.target.result+'" width="450" height="300"/></div>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file").change(function () {
        filePreview(this);
    });

    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        console.log(__val);
        alert('xxx');
        if ($(this).is(':checked')){
            $(this).prop('checked', true).attr('checked', 'checked');
        } else {
            $(this).prop('checked', false).removeAttr('checked');
        }
    });
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
</style>