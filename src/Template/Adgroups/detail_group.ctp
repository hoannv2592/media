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
                            Thông tin nhóm thiết bị quảng cáo
                        </h2>

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
                        <label class="" for="name">Tên loại nhóm quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên loại nhóm quảng cáo" value="<?php echo isset($adgroup->name) ? ($adgroup->name):'' ?>" required>
                            </div>
                            <div class="help-info">Tên loại nhóm quảng cáo</div>
                        </div>
                        <label class="" for="description">Mô tả quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="2" class="form-control no-resize" id="description" placeholder="Mô tả quảng cáo"><?php echo isset($adgroup->description) ? ($adgroup->description):''; ?></textarea>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>
                        <label class="">Chọn thiết bị cho nhóm</label>
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
                            <label class="" for="description">User quản lý nhóm thiết bị</label>
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
                                <label class=""> Chọn loại quảng cáo </label>
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
                        <div class="hiddenccc">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $packages = isset($adgroup->packages) ? json_decode($adgroup->packages):'';
                                    echo $this->Form->control('packages', [
                                        'type' => 'select',
                                        'multiple' => 'checkbox',
                                        'label' => false,
                                        'options' => [
                                            ['value' => 1, 'text' => __('Họ và tên')],
                                            ['value' => 2, 'text' => __('Ngày sinh')],
                                            ['value' => 3, 'text' => __('Số điện thoại')],
                                            ['value' => 4, 'text' => __('Địa chỉ')],
                                            ['value' => 5, 'text' => __('Địa chỉ email')]
                                        ],
                                        'templates' => [
                                            'nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>',
                                            'radioWrapper' => '<div class="radio">{{label}}</div>'
                                        ],
                                        'value' => $packages
                                    ]);
                                    ?>
                                    <div id="check_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <?php $tile_name = isset($adgroup->tile_name) ? ($adgroup->tile_name):'' ?>
                                <?php echo $this->Form->control('tile_name', array(
                                    'label' => 'Tên cơ sở dịch vụ',
                                    'class' => 'form-control',
                                    'id' => 'tile_name',
                                    'value' => $tile_name,
                                    'placeholder' => 'Điền tên..'
                                ));
                                ?>
                            </div>
                            <div class="help-info">Tên cơ sở dịch vụ</div>
                        </div>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <?php $address = isset($adgroup->address) ? ($adgroup->address):'' ?>
                                <?php echo $this->Form->control('address', array(
                                    'label' => 'Địa chỉ nhóm thiết bị',
                                    'class' => 'form-control',
                                    'id' => 'tile_name',
                                    'value' => $address,
                                    'placeholder' => 'Điền địa chỉ nhóm thiết bị..'
                                ));
                                ?>
                            </div>
                            <div class="help-info">Địa chỉ nhóm thiết bị</div>
                        </div>
                        <div class="check_pass_device">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $apt_device_number = isset($adgroup->apt_device_number) ? ($adgroup->apt_device_number):'' ?>
                                    <?php echo $this->Form->control('apt_device_number', array(
                                        'label' => 'Mật khẩu thiết bị',
                                        'class' => 'form-control',
                                        'id' => 'apt_device_number',
                                        'value' => $apt_device_number,
                                        'placeholder' => "Điền mật khẩu.."
                                    ));
                                    ?>
                                    <div class="help-info">Mật khẩu thiết bị</div>
                                </div>
                            </div>
                        </div>
                        <div class="show_tite">
                            <?php
                            if (isset($adgroup->tile_congratulations_return) && $adgroup->tile_congratulations_return != '') {
                                $tile_congratulations_return = json_decode($adgroup->tile_congratulations_return) ;
                                $count = count($tile_congratulations_return);
                                if ($count > 0) {
                                    foreach ($tile_congratulations_return as $k => $item) {
                                        if ($k == 0) {?>
                                            <div class="form-group" style="margin-bottom: 10px !important;;">
                                                <div class="form-line">
                                                    <label for="tile-congratulations-return">Tiêu đề chúc mừng kết nối lại</label>
                                                    <input name="tile_congratulations_return[]"
                                                           class="form-control valid" id="tile-congratulations-return"
                                                           value="<?= $item ?>" aria-invalid="false" type="text" />
                                                </div>
                                                <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 5px">Thêm mới</a>
                                            </div>
                                        <?php } else {?>
                                            <div class="form-group" id="title_<?= $k?>" style="margin-bottom: 10px !important;">
                                                <div class="form-line">
                                                    <input name="tile_congratulations_return[]"
                                                           class="form-control valid" id="tile-congratulations-return"
                                                           value="<?= $item ?>" aria-invalid="false" type="text" />
                                                </div>
                                                <a href="javascript:void(0);" id="delete_" onclick="delete_title(<?= $k?>)" class="btn btn-danger waves-effect" style="margin-top: 10px">Xóa</a>
                                            </div>
                                        <?php }

                                    }
                                } else { ?>
                                    <div class="form-group" style="margin-bottom: 10px !important;">
                                        <div class="form-line">
                                            <label for="tile-congratulations-return">Tiêu đề chúc mừng kết nối lại</label>
                                            <input name="tile_congratulations_return[]"
                                                   class="form-control valid" id="tile-congratulations-return"
                                                   value="<?= $adgroup->tile_congratulations_return ?>" aria-invalid="false" type="text" />
                                        </div>
                                        <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 5px">Thêm mới</a>
                                    </div>
                                <?php }
                            }
                            ?>
                        </div>
                        <div class="add"></div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $title_connect = isset($adgroup->title_connect) ? ($adgroup->title_connect):'' ?>
                                <?php echo $this->Form->control('title_connect', array(
                                    'label' => 'Title button connect',
                                    'class' => 'form-control',
                                    'value' => $title_connect
                                ));
                                ?>
                                <div class="help-info">Title_connect</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $title_campaign = isset($adgroup->title_campaign) ? ($adgroup->title_campaign):'' ?>
                                <?php echo $this->Form->control('title_campaign', array(
                                    'label' => 'Title campaign ',
                                    'class' => 'form-control',
                                    'value' => $title_campaign,
                                    'placeholder' => 'title_campaign..'
                                ));
                                ?>
                                <div class="help-info">Title_campaign</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $hidden_connect = isset($adgroup->hidden_connect) ? $adgroup->hidden_connect: '1';
                                echo  $this->Form->input('hidden_connect', array(
                                    'type' => 'select',
                                    'options' => [
                                        '1' => 'Hiển thị button connect-snow',
                                        '2' => 'Không hiển thị'
                                    ],
                                    'empty' => '--- Chọn hiển thị ---',
                                    'label'=> 'Setting hidden button connect-snow',
                                    'value' => $hidden_connect,
                                    'escape' => false,
                                    'error' => false,
                                    'class' => 'form-control required input_select_medium'
                                ));
                                ?>
                            </div>
                            <div class="help-info">Setting hidden button connect-snow</div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped dataTable table-hover">
                                <thead>
                                <tr>
                                    <th width="25%">Ảnh logo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($adgroup->path_logo) && $adgroup->path_logo != '') {
                                    $list_background = explode(',', $adgroup->path_logo);
                                    foreach ($list_background as $k => $vl) { ?>
                                        <tr>
                                            <td class="image"><embed src="<?= '/'.$vl ?>" width="450" height="300"></td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label> Logo Image </label>
                            <div class="form-line">
                                <?php $logo_image = isset($adgroup->path_logo) ? ($adgroup->path_logo):''; ?>
                                <input type="file" name="logo_image" value="<?php echo $logo_image;?>" class="form-control"/>
                                <div class="help-info">logo_image</div>
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
                        <label class=""> Chọn một ảnh </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" id="file" multiple="multiple" value="<?php echo isset($adgroup->path) ? '/'.$adgroup->path: '';?>" class="form-control">
                            </div>
                        <div class="help-info">Chọn một ảnh</div>
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
    function delete_title(id) {
        $('#title_'+id).remove();
    }
    var y = 1; //initlal text box count
    var max_fields = 10; //maximum input boxes allowed
    var wrapper_title = $("div.add"); //Fields wrapper
    var add_button_title = $("#add_title"); //Add button class
    $(add_button_title).click(function (e) { //on add file button click
        e.preventDefault();
        if (y < max_fields) { //max input file allowed
            $(wrapper_title).append('<div class="border_add">'+
                '<div class="form-group" style="margin-bottom: 5px !important;">\n' +
                '<div class="form-line">\n' +
                '<div class="input text">' +
                '<input name="tile_congratulations_return[]" class="form-control valid" aria-invalid="false" type="text"></div>' +
                '</div>' +
                '</div>\n' +
                '<a href="javascript:void(0);" id="delete_bak" class="btn btn-danger waves-effect remove_field_title" style="margin-top: 0;margin-bottom: 10px">Xóa</a>\n' +
                '</div>'

            );
            y++; //input file increment
        }
    }); //add input box
    $(wrapper_title).on("click", ".remove_field_title", function (e) { //user click on remove
        e.preventDefault();
        $(this).parent('div').remove();
        $(this).parent('div').remove();
        y--;
    });
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
            $('.hiddenccc').css('display', 'none');
        } else if (langding == 3) {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', '');
        } else {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', 'none');
        }
    });
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        if (__val == 1) {
            $('.check_pass_device').css('display', '');
            $('.hiddenccc').css('display', 'none');
        } else if (__val == 3) {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', '');
        } else {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', 'none');
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
            // 'packages[]': { required: true }
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
