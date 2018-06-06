<?php
/**
  * @var \App\View\AppView $this
  * @var $devices
  * @var $user_login
  * @var $device
  * @var $adgroup
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
$this->assign('title', 'Thêm nhóm thiết bị quảng cáo');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'index']) ?>">
                            <i class="material-icons" style="margin-left: 10px;">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active"><a href="javascript:void(0)">Tạo nhóm</a></li>
                </ol>
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NHÓM THIẾT BỊ QUẢNG CÁO </h2>
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
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Tên nhóm thiết bị</label>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" placeholder="Tên nhóm thiết bị" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label for="name">Mô tả</label>
                                            <textarea name="description" cols="30" rows="2" class="form-control no-resize"></textarea>
                                        </div>
                                    </div>

                                    <label class="">Chọn thiết bị cho nhóm</label>
                                    <div class="form-group" id="end_show">
                                        <div class="form-line">
                                            <select data-placeholder="Chọn thiết bị" id="select_device" class="chosen-select" multiple tabindex="8" name="device_id[]">
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
                                    <?php if ($user_login['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                                        <label class="" >User quản lý nhóm thiết bị</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select  class="form-control required" name="user_id_group" id="user_id_group">
                                                    <option disabled selected value> --- Chọn user --- </option>
                                                    <?php foreach ($users as $key => $item) {
                                                        if (isset($adgroup->user_id_group) && $adgroup->user_id_group ) { ?>
                                                            <option selected="selected" value="<?php echo $key; ?>"><?php echo $item ?></option>
                                                        <?php } else { ?>
                                                            <option  value="<?php echo $key; ?>" ><?php echo $item;?></option>
                                                        <?php }?>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="user_id_group"  value="<?php echo $user_login['id'];?>" class="form-control"/>
                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $type_adv = isset($adgroup->type_adv) ? $adgroup->type_adv: 1;
                                            if ($type_adv == 0) {
                                                $type_adv = 1;
                                            }
                                            echo  $this->Form->input('type_adv', array(
                                                'type' => 'select',
                                                'options' => [
                                                    '1' => 'Kết nối bình thường',
                                                    '2' => 'Hiển thị popup quảng cáo'
                                                ],
                                                'empty' => '--- Chọn hiển thị ---',
                                                'label'=> 'Cài đặt loại quảng cáo',
                                                'value' => $type_adv,
                                                'escape' => false,
                                                'id' => 'type_adv',
                                                'error' => false,
                                                'class' => 'form-control input_select_medium'
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 radio">
                                            <div class="demo-radio-button">
                                                <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey"  />
                                                <label style="font-weight: bold" for="radio_32">Thông tin khách hàng</label>
                                                <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" />
                                                <label style="font-weight: bold" for="radio_31">Facebook-SMS-Email</label>
                                                <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" checked/>
                                                <label style="font-weight: bold" for="radio_30">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden_face">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $option_tow = isset($adgroup->option_tow) ? json_decode($adgroup->option_tow):'';
                                                echo $this->Form->control('option_tow', [
                                                    'type' => 'select',
                                                    'multiple' => 'checkbox',
                                                    'label' => false,
                                                    'class' => 'option_tow',
                                                    'options' => [
                                                        ['value' => 1, 'text' => __('Login với Facebook')],
                                                        ['value' => 2, 'text' => __('Login với SMS')],
                                                        ['value' => 3, 'text' => __('Login với Email')],
                                                        ['value' => 4, 'text' => __('Connect Snow')],
                                                    ],
                                                    'templates' => [
                                                        'nestingLabel' => '{{input}}<label{{attrs}}>{{text}}</label>',
                                                        'radioWrapper' => '<div class="radio">{{label}}</div>'
                                                    ],
                                                    'value' => $option_tow
                                                ]);
                                                ?>
                                                <div id="check_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $fb_fanpage = isset($adgroup->fb_fanpage) ? ($adgroup->fb_fanpage):'' ?>
                                                <?php echo $this->Form->control('fb_fanpage', array(
                                                    'label' => 'Facebook Fan Page',
                                                    'class' => 'form-control',
                                                    'value' => $fb_fanpage,
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $fb_latitude = isset($adgroup->fb_latitude) ? ($adgroup->fb_latitude):'' ?>
                                                <?php echo $this->Form->control('fb_latitude', array(
                                                    'label' => 'Latitude',
                                                    'class' => 'form-control',
                                                    'value' => $fb_latitude,
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $fb_longtitude = isset($adgroup->fb_longtitude) ? ($adgroup->fb_longtitude):'' ?>
                                                <?php echo $this->Form->control('fb_longtitude', array(
                                                    'label' => 'Longtitude',
                                                    'class' => 'form-control',
                                                    'value' => $fb_longtitude,
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $fb_checkin_msg = isset($adgroup->fb_checkin_msg) ? ($adgroup->fb_checkin_msg):'' ?>
                                                <?php echo $this->Form->control('fb_checkin_msg', array(
                                                    'label' => 'Check-in message',
                                                    'class' => 'form-control',
                                                    'value' => $fb_checkin_msg,
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="check_pass_device ">
                                        <label class=""> Mật khẩu thiết bị </label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="apt_device_number" maxlength="8" id="apt_device_number" value="<?php echo isset($apt_device_number) ? $apt_device_number:'' ?>" placeholder="Điền mật khẩu.." class="form-control">
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
                                    </div>
                                    <div class="form-group">
                                        <label> Ảnh Logo  </label>
                                        <div class="form-group">
                                            <div class="file-loading">
                                                <input id="file-2" type="file" class="file" name="logo_image" data-overwrite-initial="false" data-min-file-count="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $hidden_connect = isset($adgroup->hidden_connect) ? $adgroup->hidden_connect: '1';
                                            echo  $this->Form->input('hidden_connect', array(
                                                'type' => 'select',
                                                'options' => [
                                                    '1' => 'Hiển thị button connect-slow',
                                                    '2' => 'Không hiển thị'
                                                ],
                                                'empty' => '--- Chọn hiển thị ---',
                                                'label'=> 'Cài đặt hiển thị button connect-slow',
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
                                                echo $this->Form->control('button_slow',[
                                                    'label' => 'Đổi tên button connect-Slow',
                                                    'id' => 'button_slow',
                                                    'class' => 'form-control',
                                                    'value' => 'Connect now - Slow'
                                                ])
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $button_fast = isset($adgroup->button_fast) ? $adgroup->button_fast: '';
                                            echo $this->Form->control('button_fast',[
                                                'label' => 'Đổi tên button connect-Fast',
                                                'id' => 'button_slow',
                                                'class' => 'form-control',
                                                'value' => $button_fast
                                            ])
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group" id="end_show">
                                        <div class="form-line">
                                            <?php $tile_name = isset($adgroup->tile_name) ? ($adgroup->tile_name):'' ?>
                                            <?php echo $this->Form->control('tile_name', array(
                                                'label' => 'Tên cơ sở dịch vụ',
                                                'class' => 'form-control',
                                                'id' => 'slogan',
                                                'value' => $tile_name,
                                                'placeholder' => "Điền tên.."
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group" id="end_show">
                                        <div class="form-line">
                                            <?php $address = isset($adgroup->address) ? ($adgroup->address):'' ?>
                                            <?php echo $this->Form->control('address', array(
                                                'label' => 'Địa chỉ nhóm thiết bị',
                                                'class' => 'form-control',
                                                'id' => 'slogan',
                                                'value' => $address,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <?php $tile_congratulations_return = isset($adgroup->tile_congratulations_return) ? ($adgroup->tile_congratulations_return):'' ?>
                                    <div class="form-group" style="margin-bottom: 10px !important;">
                                        <div class="form-line">
                                            <label for="tile-congratulations-return">Tiêu đề chúc mừng kết nối lại</label>
                                            <input name="tile_congratulations_return[]"
                                                   class="form-control valid" id="tile-congratulations-return"
                                                   value="<?= $tile_congratulations_return ?>" aria-invalid="false" type="text" />
                                        </div>
                                        <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 5px">Thêm mới</a>
                                    </div>
                                    <div class="add"></div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $title_connect = isset($adgroup->title_connect) ? ($adgroup->title_connect):'' ?>
                                            <?php echo $this->Form->control('title_connect', array(
                                                'label' => 'Tiêu đề button kết nối',
                                                'class' => 'form-control',
                                                'value' => $title_connect,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $title_campaign = isset($adgroup->title_campaign) ? ($adgroup->title_campaign):'' ?>
                                            <?php echo $this->Form->control('title_campaign', array(
                                                'label' => 'Tiêu đề button khảo sát',
                                                'class' => 'form-control',
                                                'value' => $title_campaign,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <label class=""> Chọn một ảnh </label>
                                    <div class="form-group">
                                        <div class="file-loading">
                                            <input id="file-1" type="file" multiple class="file" name="file[]" data-overwrite-initial="false" data-min-file-count="2">
                                        </div>
                                    </div>
                                    <div class="show_adv">
                                        <div class="border">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php echo $this->Form->control('link_adv[]', array(
                                                        'label' => 'Link quảng cáo',
                                                        'class' => 'form-control',
                                                        'id' => 'tile_name',
                                                        'placeholder' => 'Link...'
                                                    ));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?php echo $this->Form->control('image_adv[]', array(
                                                        'type' => 'file',
                                                        'label' => ' Ảnh quảng cáo',
                                                        'class' => 'form-control',
                                                        'id' => 'file',
                                                    ));
                                                    ?>
                                                </div>
                                                <a href="javascript:void(0);"  id="delete_bak" class="btn btn-danger waves-effect plus-file" style="margin-top: 10px">Thêm mới</a>
                                            </div>
                                        </div>
                                        <div class="file-add"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary waves-effect" id = "submit" type="submit">THÊM MỚI</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="application/javascript">
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
    $('#select_device').change(function () {
        var val = $(this).val();
        var role = "<?php echo $user_login['role'];?>";
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
    $(document).ready(function () {
        if(document.getElementById('option-tow-1').checked) {
            $('.face').css('display', '');
        } else {
            $('.face').css('display', 'none');
        }
        $('#option-tow-1').click(function() {
            if (!$(this).is(':checked')) {
                $('.face').css('display', 'none');
            } else {
                $('.face').css('display', '');
            }
        });
        var langding = "<?php echo isset($device->langdingpage_id) ? $device->langdingpage_id:'1'; ?>";
        if (langding == 1) {
            $('.check_pass_device').css('display', '');
            $('.hiddenccc').css('display', 'none');
            $('.hidden_face').css('display', 'none');
            //$('.face').css('display', 'none');
        } else if (langding == 3) {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', '');
            $('.hidden_face').css('display', 'none');
            //$('.face').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', 'none');
            $('.hidden_face').css('display', '');
            //$('.face').css('display', '');
        }
    });
    $('.radio-col-grey').change(function () {
        var __val = $(this).val();
        if (__val == 1) {
            $('.check_pass_device').css('display', '');
            $('.hiddenccc').css('display', 'none');
            $('.hidden_face').css('display', 'none');
            //$('.face').css('display', 'none');
        } else if (__val == 3) {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', '');
            $('.hidden_face').css('display', 'none');
            //('.face').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
            $('.hiddenccc').css('display', 'none');
            $('.hidden_face').css('display', '');
            //$('.face').css('display', '');
        }
    });
    var y = 1; //initlal text box count
    var max_fields = 10; //maximum input boxes allowed
    var wrapper_file = $("div.file-add"); //Fields wrapper
    var add_button_file = $(".plus-file"); //Add button class
    $(add_button_file).click(function (e) { //on add file button click
        e.preventDefault();
        if (y < max_fields) { //max input file allowed
            $(wrapper_file).append('<div class="border_add">'+
                '<div class="form-group">\n' +
                '<div class="form-line">\n' +
                '<div class="input text"><label for="tile_name">Link quảng cáo</label><input type="text" name="link_adv[]" class="form-control" id="tile_name" placeholder="Link..."></div></div></div>\n' +
                '<div class="form-group " style="margin-bottom: 10px">\n' +
                '<div class="form-line">\n' +
                '<div class="input file">\n' +
                '<label for="file"> Ảnh quảng cáo</label>\n' +
                '<input type="file" name="image_adv[]" class="form-control" id="file"></div></div>\n' +
                '</div>'+
                '<a href="javascript:void(0);" id="delete_bak" class="btn btn-danger waves-effect remove_field_file" style="margin-top: 0;margin-bottom: 10px">Xóa link</a>\n' +
                '</div>'
            );
            y++; //input file increment
        }
    }); //add input box
    $(wrapper_file).on("click", ".remove_field_file", function (e) { //user click on remove
        e.preventDefault();
        $(this).parent('div').remove();
        $(this).parent('div').remove();
        y--;
    });

    $('#type_adv').change(function () {
        var val = $(this).val();
        if (val == 1 || val == '') {
            $('.show_adv').hide();
        } else {
            $('.show_adv').show();
        }
    });
    $(document).ready(function () {
        var val = $('#type_adv').val();
        if (val == 1 || val == '') {
            $('.show_adv').hide();
        } else {
            $('.show_adv').show();
        }

        var check_slow = $('#hidden_connect').val();
        $('.hide_snow').hide();
        if (check_slow == 1) {
            $('.hide_snow').show();
        }
    });

    $('#hidden_connect').change(function () {
        var check_slow = $(this).val();
        if (check_slow == 1) {
            $('.hide_snow').show();
        } else {
            $('.hide_snow').hide();
        }
    });
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
</style>