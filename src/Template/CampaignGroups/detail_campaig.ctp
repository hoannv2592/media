<?php
/**
 * @var $devices
 * @var $apt_device_number
 * @var $users
 * @var $user_login
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $campaign_group
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
                        <a href="<?php echo $this->Url->build(['controller' => 'CampaignGroups', 'action' => 'index']) ?>" style="margin-left: 10px;">
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
                        <div class="card-box">
                            <?php echo $this->Form->create('adgroups', array(
                                'id' => 'form_advanced',
                                'type' => 'file',
                                'url' => array(
                                    'controller' => 'CampaignGroups',
                                    'action' => 'detailCampaig'.'/'. UrlUtil::_encodeUrl($campaign_group->id)
                                ),
                                'inputDefaults' => array(
                                    'label' => false,
                                    'div' => false
                                )
                            ));
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="cname" name="id" type="hidden">
                                    <input id="landingpage" name="landingpage" value="<?php echo isset($campaign_group->name) ? $campaign_group->name:'' ?>" type="hidden">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $name = isset($campaign_group->name) ? ($campaign_group->name):'' ?>
                                            <?php echo $this->Form->control('name', array(
                                                'class' => 'form-control',
                                                'id' => 'name_address',
                                                'label' => 'Tên chiến dịch',
                                                'value' => $name
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $time = isset($campaign_group->time) ? ($campaign_group->time):'' ?>
                                            <?php
                                            echo $this->Form->control('time', array(
                                                'label' => 'Thời gian bắt đầu và kết thúc chiến dịch',
                                                'class' => 'form-control',
                                                'id' => 'config-demo',
                                                'value' => $time
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $number_voucher = isset($campaign_group->number_voucher) ? ($campaign_group->number_voucher):'' ?>
                                            <?php echo $this->Form->control('number_voucher', array(
                                                'label' => 'Số lượng voucher phát ra',
                                                'class' => 'form-control',
                                                'value' => $number_voucher
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $description = isset($campaign_group->description) ? ($campaign_group->description):'' ?>
                                            <?php echo $this->Form->control('description', array(
                                                'label' => 'Mô tả chiến dịch',
                                                'class' => 'form-control',
                                                'escape' => false,
                                                'type' => 'textarea',
                                                'value' => $description
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Chọn thiết bị cho nhóm</h2>
                                    <div class="form-group" id="end_show">
                                        <div class="form-line">
                                            <select data-placeholder="Chọn thiết bị" id="select_device" class="chosen-select " multiple tabindex="8" name="device_id[]">
                                                <?php
                                                $user_de_id = json_decode($campaign_group->device_name);
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
                                        <label for="description">User quản lý nhóm thiết bị</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select class="form-control required" name="user_id_campaign_group" id="user_id_group">
                                                    <option disabled selected value> --- Chọn user --- </option>
                                                    <?php foreach ($users as $key => $item) {
                                                        if (isset($campaign_group->user_id_campaign_group) && $campaign_group->user_id_campaign_group == $key) { ?>
                                                            <option selected="selected" value="<?php echo $key; ?>"><?php echo $item ?></option>
                                                        <?php } else { ?>
                                                            <option  value="<?php echo $key; ?>" ><?php echo $item;?></option>
                                                        <?php }?>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="user_id_campaign_group"  value="<?php echo $user_login['id'];?>" class="form-control"/>
                                    <?php }?>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label> Loại quảng cáo </label>
                                            <div class="demo-radio-button">
                                                <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey langding" <?php if ($campaign_group->langdingpage_id == 3) { echo 'checked'; }?> />
                                                <label style="font-weight: bold" for="radio_32">Khảo sát thông tin khách hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $packages = isset($campaign_group->packages) ? json_decode($campaign_group->packages):'';
                                            echo $this->Form->control('packages', [
                                                'type' => 'select',
                                                'multiple' => 'checkbox',
                                                'label' => false,
                                                'options' => [
                                                    ['value' => 1, 'text' => __('Họ và tên')],
                                                    ['value' => 2, 'text' => __('Số điện thoại')],
                                                    ['value' => 3, 'text' => __('Ngày sinh')],
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped dataTable table-hover">
                                            <thead>
                                            <tr>
                                                <th width="25%">Ảnh logo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (isset($campaign_group->path_logo) && $campaign_group->path_logo != '') {
                                                $list_background = explode(',', $campaign_group->path_logo);
                                                foreach ($list_background as $k => $vl) { ?>
                                                    <tr>
                                                        <td class="image"><embed src="<?= '/'.$vl ?>" width="350" height="200"></td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            <?php } else { ?>
                                            <tr><td colspan="4" class="image">No file(s) found......</td>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php $logo_image = isset($campaign_group->path_logo) ? ($campaign_group->path_logo):''; ?>
                                    <div class="form-group">
                                        <div class="file-loading">
                                            <input id="file-2" type="file" class="file" name="logo_image"  value="<?php echo $logo_image;?>" data-overwrite-initial="false" data-min-file-count="2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $hidden_connect = isset($campaign_group->hidden_connect) ? $campaign_group->hidden_connect: '1';
                                            echo  $this->Form->input('hidden_connect', array(
                                                'type' => 'select',
                                                'options' => [
                                                    '1' => 'Hiển thị button connect-slow',
                                                    '2' => 'Không hiển thị'
                                                ],
                                                'empty' => '--- Chọn hiển thị ---',
                                                'label'=> 'Setting hidden button connect-slow',
                                                'value' => $hidden_connect,
                                                'escape' => false,
                                                'error' => false,
                                                'id' => 'hidden_connect',
                                                'class' => 'form-control required input_select_medium'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="hide_snow">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $button_slow = isset($campaign_group->button_slow) ? $campaign_group->button_slow: '';
                                                echo $this->Form->control('button_slow',[
                                                    'label' => 'Đổi tên button connect-Slow',
                                                    'id' => 'button_slow',
                                                    'class' => 'form-control',
                                                    'value' => $button_slow
                                                ])
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $button_fast = isset($campaign_group->button_fast) ? $campaign_group->button_fast: '';
                                            echo $this->Form->control('button_fast',[
                                                'label' => 'Đổi tên button connect-Fast',
                                                'id' => 'button_slow',
                                                'class' => 'form-control',
                                                'value' => $button_fast
                                            ])
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $random = isset($campaign_group->random) ? $campaign_group->random: '';
                                            echo  $this->Form->input('random', array(
                                                'type' => 'select',
                                                'options' => [
                                                    '1' => 'Random thông thường',
                                                    '2' => 'Random Fix cứng'
                                                ],
                                                'empty' => '--- Chọn loại Random ---',
                                                'label'=> 'Chọn loại Random',
                                                'value' => $random,
                                                'escape' => false,
                                                'error' => false,
                                                'class' => 'form-control required input_select_medium'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $tile_name = isset($campaign_group->tile_name) ? ($campaign_group->tile_name):'' ?>
                                            <?php echo $this->Form->control('tile_name', array(
                                                'label' => 'Tên cơ sở dịch vụ',
                                                'class' => 'form-control',
                                                'escape' => false,
                                                'value' => $tile_name
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $tile_congratulations = isset($campaign_group->tile_congratulations) ? ($campaign_group->tile_congratulations):'' ?>
                                            <?php echo $this->Form->control('tile_congratulations', array(
                                                'label' => 'Nội dung tin nhắn chúc mừng',
                                                'class' => 'form-control',
                                                'escape' => false,
                                                'value' => $tile_congratulations
                                            ));
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $address = isset($campaign_group->address) ? ($campaign_group->address):'' ?>
                                            <?php echo $this->Form->control('address', array(
                                                'label' => 'Địa chỉ nhóm thiết bị',
                                                'class' => 'form-control',
                                                'escape' => false,
                                                'value' => $address
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $title_connect = isset($campaign_group->title_connect) ? ($campaign_group->title_connect):'' ?>
                                            <?php echo $this->Form->control('title_connect', array(
                                                'label' => 'Title button connect',
                                                'class' => 'form-control',
                                                'value' => $title_connect,
                                                'placeholder' => 'Title conect..'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $title_campaign = isset($campaign_group->title_campaign) ? ($campaign_group->title_campaign):'' ?>
                                            <?php echo $this->Form->control('title_campaign', array(
                                                'label' => 'Title campaign ',
                                                'class' => 'form-control',
                                                'value' => $title_campaign
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="show_tite">
                                        <?php
                                        if (isset($campaign_group->tile_congratulations_return) && $campaign_group->tile_congratulations_return != '') {
                                            $tile_congratulations_return = json_decode($campaign_group->tile_congratulations_return) ;
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
                                                               value="<?= $campaign_group->tile_congratulations_return ?>" aria-invalid="false" type="text" />
                                                    </div>
                                                    <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 5px">Thêm mới</a>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="form-group" style="margin-bottom: 10px !important;">
                                                <div class="form-line">
                                                    <label for="tile-congratulations-return">Tiêu đề chúc mừng kết nối lại</label>
                                                    <input name="tile_congratulations_return[]"
                                                           class="form-control valid" id="tile-congratulations-return" aria-invalid="false" type="text" />
                                                </div>
                                                <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 5px">Thêm mới</a>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="add"></div>
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped dataTable table-hover">
                                            <thead>
                                            <tr>
                                                <th width="20%">Ảnh nền</th>
                                                <th width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($campaign_group->path) && $campaign_group->path != '') {
                                                $list_background = explode(',', $campaign_group->path);
                                                $list_background = array_filter($list_background);
                                                foreach ($list_background as $k => $vl) { ?>
                                                <tr id="<?= $k;?>">
                                                    <td class="image"><embed src="<?= '/'.$vl ?>" width="350" height="200"></td>
                                                    <td><a href="javascript:void(0);"  id="delete_bak" onclick="delete_bak(<?php echo $k; ?>, <?= $campaign_group->id ?>)" class="btn btn-danger waves-effect">Xóa</a> </td>
                                                </tr>
                                            <?php }
                                            ?>
                                            <?php } else { ?>
                                                <tr><td colspan="4" class="image">No file(s) found......</td></tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <label> Chọn một ảnh </label>
                                    <div class="form-group">
                                        <div class="file-loading">
                                            <input id="file-1" type="file" multiple class="file" name="file[]" value="<?php echo isset($campaign_group->path) ? '/'.$campaign_group->path: '';?>" data-overwrite-initial="false" data-min-file-count="2">
                                        </div>
                                    </div>
                                    <!-- #END# Multi Select -->
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary waves-effect" id = "submit" type="submit">CẬP NHẬT</button>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    function delete_bak(id, cp_id) {
        $.ajax({
            type: 'POST',
            url: '/CampaignGroups/delete_backgroud',
            async: true,
            data: {
                id: id,
                cp_id: cp_id
            },
            dataType: 'json',
            success: function (rp) {
                if (rp == true) {
                    $('tr#'+id).remove()
                }
            }
        });
    }
    $("#file-2").fileinput({
        theme: 'fa',
        uploadUrl: '/Devices/upload', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif', 'pjpeg', 'jpeg'],
        overwriteInitial: false,
        maxFileSize: 10000,
        maxFilesNum: 5,
        maxFileCount: 10,
        dropZoneEnabled : false,
        showUpload : false
    });
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: '/Devices/upload', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif', 'pjpeg', 'jpeg'],
        overwriteInitial: false,
        maxFileSize: 10000,
        maxFilesNum: 5,
        dropZoneEnabled : false,
        showUpload : false
    });
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
        var user_id_group = '<?php echo $campaign_group->user_id_campaign_group;?>';
        var devceid = $('#select_device').val();
        console.log(devceid);
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

    $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    $('#form_advanced').validate({
        onkeyup: false,
        rules: {
            'name': {
                required: true,
                remote: {  // value of 'username' field is sent by default
                    type: 'POST',
                    async: false,
                    url: '/CampaignGroups/isNameExist',
                    data: {
                        backup_name: function () {
                            return $('#landingpage').val();
                        }
                    }
                }
            },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true },
            'device_id[]': { required: true },
            'number_voucher': { required: true },
            'random': { required: true },
            // 'tile_name': { required: true },
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
    $('#config-demo').dateRangePicker({
        language:'vi',
        showShortcuts: true,
        shortcuts :
            {
                'next-days': [3,5,7],
                'next': ['week','month','year'],
            },

        format: 'DD/MM/YYYY',
        separator: ' - '
    });
    // $('#config-demo').daterangepicker({}, function(start, end, label) {});
    $('#hidden_connect').change(function () {
        var check_slow = $(this).val();
        if (check_slow == 1) {
            $('.hide_snow').show();
        } else {
            $('.hide_snow').hide();
        }
    });
    $(document).ready(function () {
        var check_slow = $('#hidden_connect').val();
        $('.hide_snow').hide();
        if (check_slow == 1) {
            $('.hide_snow').show();
        }
    });
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
    button.kv-file-upload.btn.btn-kv.btn-default.btn-outline-secondary {
        display: none;
    }
</style>
