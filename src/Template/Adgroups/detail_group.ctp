<?php
/**
 * @var $devices
 * @var $users
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $adgroup
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $userData
 */
$this->assign('title', 'Chỉnh sửa nhóm thiết bị quảng cáo');
?>
<section class="content"  xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'index']) ?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active"><a href="javascript:void(0)">Chỉnh sửa nhóm thiết bị</a></li>
                </ol>
                <div class="card">
                    <div class="header bg-blue">
                        <h2>
                            Thông tin nhóm thiết bị quảng cáo <small>Description text here...</small>
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
                        <?php
                        echo $this->Form->create('adgroups', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'file',
                            'url' => array('controller' => 'Adgroups', 'action' => 'detail_group'.'/'. UrlUtil::_encodeUrl($adgroup->id)),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <input id="cname" name="id" type="hidden">
                        <input id="landingpage" name="landingpage" value="<?php echo isset($adgroup->name) ? $adgroup->name:'' ?>" type="hidden">
                        <h2 class="card-inside-title" for="name">Tên loại nhóm quảng cáo</h2>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên loại nhóm quảng cáo" value="<?php echo isset($adgroup->name) ? ($adgroup->name):'' ?>" required>
                            </div>
                            <div class="help-info">Tên loại nhóm quảng cáo</div>
                        </div>
                        <h2 class="card-inside-title" for="description">Mô tả quảng cáo</h2>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="2" class="form-control no-resize" id="description" placeholder="Mô tả quảng cáo" required><?php echo isset($adgroup->description) ? ($adgroup->description):''; ?></textarea>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>
                        <h2 class="card-inside-title">Chọn thiết bị cho nhóm</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <select data-placeholder="Chọn thiết bị" id="select_device" class="chosen-select " multiple tabindex="8" name="device_id[]">
                                    <?php
                                    $user_de_id = json_decode($adgroup->device_name);
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
                        <?php if ($user_login['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                            <h2 class="card-inside-title" for="description">User quản lý nhóm thiết bị</h2>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control required" name="user_id_group" id="user_id_group">
                                            <option disabled selected value> --- Chọn user --- </option>
                                            <?php foreach ($users as $key => $item) {
                                                if (isset($adgroup->user_id_group) && $adgroup->user_id_group == $key) { ?>
                                                    <option selected="selected" value="<?php echo $key; ?>"><?php echo $item ?></option>
                                                <?php } else { ?>
                                                    <option  value="<?php echo $key; ?>" ><?php echo $item;?></option>
                                                <?php }?>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                <div class="help-info">User quản lý nhóm thiết bị</div>
                            </div>
                        <?php }?>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="card-inside-title"> Chọn loại quảng cáo </h2>
                                <div class="demo-radio-button">
                                    <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" <?php if ($adgroup->langdingpage_id == 1 || $adgroup->langdingpage_id == '') { echo 'checked'; } ?> />
                                    <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                                    <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php if ($adgroup->langdingpage_id == 2) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                                    <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php if ($adgroup->langdingpage_id == 3) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                                </div>
                            </div>
                        </div>
                        <h2 class="card-inside-title">Tên cơ sở dịch vụ</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="tile_name" id="tile_name" class="form-control" value="<?php echo isset($adgroup->tile_name) ? $adgroup->tile_name :'';?>" placeholder="Điền tên..">
                            </div>
                        </div>
                        <h2 class="card-inside-title">Địa chỉ nhóm thiết bị</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <input type="text" name="address" id="tile_name" class="form-control" value="<?php echo isset($adgroup->address) ? $adgroup->address :'';?>" placeholder="Điền địa chỉ nhóm thiết bị..">
                            </div>
                        </div>
                        <div class="check_pass_device">
                        <h2 class="card-inside-title"> Mật khẩu thiết bị </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="apt_device_number" id="apt_device_number" value="<?php echo isset($adgroup->apt_device_number) ? $adgroup->apt_device_number: $apt_device_number ?>" placeholder="Điền mật khẩu.." class="form-control">
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
                                <?php if (isset($adgroup->path) && $adgroup->path != '') {
                                    $list_background = explode(',', $adgroup->path);
                                    foreach ($list_background as $k => $vl) { ?>
                                        <tr>
                                            <td><?php echo $adgroup->id; ?></td>
                                            <td><?php echo $adgroup->tile_name; ?></td>
                                            <td class="image"><embed src="<?= '/'.$vl ?>" width="450" height="300"></td>
                                            <td><?php echo $adgroup->created; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } else { ?>
                                    <tr><td colspan="4" class="image">No file(s) found......</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <h2 class="card-inside-title"> Chọn một ảnh </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" id="file" multiple="multiple" value="<?php echo isset($adgroup->path) ? '/'.$adgroup->path: '';?>" class="form-control">
                            </div>
                        </div>
                        <!-- #END# Multi Select -->
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">CẬP NHẬT</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    $(document).ready(function () {
        var role = "<?php echo $user_login['role'];?>";
        var user_id_group = '<?php echo $adgroup->user_id_group;?>';
        var devceid = $('#select_device').val();
        $.ajax({
            url: "/Adgroups/getUser",
            type: "POST",
            cache: false,
            data: {
                id : devceid,
                role : role
            },
            success: function (responce) {
                $('#user_id_group').find('option').remove().end()
                    .append('<option disabled selected value>--- Chọn user ---</option>')
                    .val('')
                ;
                var resp = [JSON.parse(responce)];
                $.each(resp, function () {
                    $.each(this, function (name, value) {
                        $('#user_id_group').append($('<option>',
                            {
                                value: name,
                                text : value
                            })
                        );
                    });
                });
                $('#user_id_group option[value=' + user_id_group + ']').prop('selected', 'selected');
            }
        });
    });
    $('#select_device').change(function () {
        var role = "<?php echo $user_login['role'];?>";
       var val = $(this).val();
        $.ajax({
            url: "/Adgroups/getUser",
            type: "POST",
            cache: false,
            data: {
                id : val,
                role : role
            },
            success: function (responce) {
                $('#user_id_group').find('option').remove().end()
                    .append('<option disabled selected value>--- Chọn user ---</option>')
                    .val('')
                ;
                var resp = [JSON.parse(responce)];
                $.each(resp, function () {
                    $.each(this, function (name, value) {
                        $('#user_id_group').append($('<option>',
                            {
                                value: name,
                                text : value
                            })
                        );
                    });
                });
            }
        });
    });
    function remove(value) {
        var select = $('select#user_id_group option');
        var assistantId = '#user_id_group';
        for (var i = 0; i < select.length; i++) {
            if (select[i].value !== '') {
                if (select[i].value === value) {
                    $(assistantId + " option[value='" + select[i].value + "']").remove();
                }
            }
        }
    }


    $(document).ready(function () {
        var langding = "<?php echo $adgroup->langdingpage_id; ?>";
        if (langding == 1) {
            $('.check_pass_device').css('display', '');
        } else if (langding == 3) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
        }
    });
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        if (__val == 1) {
            $('.check_pass_device').css('display', '');
        } else if (__val == 3) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
        }
        if ($(this).is(':checked')){
            $(this).prop('checked', true).attr('checked', 'checked');
        } else {
            $(this).prop('checked', false).removeAttr('checked');
        }
    });
    $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    $('#form_advanced_validation').validate({
        onkeyup: false,
        rules: {
            'name': {
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/Adgroups/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            },
            'tile_name': { required: true },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true },
            'device_id[]': { required: true },
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
        $('#optgroup').multiSelect({ selectableOptgroup: true });
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
    $(document).ready(function () {
       $('#user_id_group').val();
    });
    removeElementOption = function(editId, assistant_1, assistant_2, select , assistantId) {
        for (var i = 0; i < select.length; i++) {
            if (select[i].value !== '') {
                if (select[i].value === assistant_1) {
                    $(assistantId + " option[value='" + select[i].value + "']").remove();
                }
                if (select[i].value === assistant_2) {
                    $(assistantId + " option[value='" + select[i].value + "']").remove();
                }
                if (select[i].value === editId) {
                    $(assistantId +" option[value='" + select[i].value + "']").remove();
                }
            }
        }
    }
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
</style>
