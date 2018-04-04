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
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active"><a href="javascript:void(0)">Tạo nhóm</a></li>
                </ol>
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NHÓM THIẾT BỊ QUẢNG CÁO </h2>
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
                                <textarea name="description" cols="30" rows="2" class="form-control no-resize" placeholder="Mô tả nhóm thiết bị"></textarea>
                            </div>
                            <div class="help-info">Mô tả nhóm thiết bị</div>
                        </div>
                        <label class="">Chọn thiết bị cho nhóm</label>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <select data-placeholder="Chọn thiết bị"
                                        id="select_device" class="chosen-select" multiple tabindex="8" name="device_id[]">
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
                                <div class="help-info">User quản lý nhóm thiết bị</div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" name="user_id_group"  value="<?php echo $user_login['id'];?>" class="form-control"/>
                        <?php } ?>
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
                        <div class="hiddenccc">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $packages = isset($device->packages) ? json_decode($device->packages):'';
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

<!--                        <div class="form-group">-->
<!--                            <div class="form-line">-->
<!--                                --><?php //echo $this->Form->control('tile_congratulations_return', array(
//                                    'label' => 'Tiêu đề chúc mừng kết nối lại',
//                                    'class' => 'form-control',
//                                    'value' => $tile_congratulations_return,
//                                ));
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
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
                                    'label'=> 'Cài đặt hiển thị button connect-snow',
                                    'value' => $hidden_connect,
                                    'escape' => false,
                                    'error' => false,
                                    'class' => 'form-control required input_select_medium'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Logo Image </label>
                            <div class="form-line">
                                <input type="file" name="logo_image" id="file" value="" class="form-control"/>
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
                        <label class=""> Chọn một ảnh </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" id="file" multiple="multiple" value="<?php echo isset($device->path) ? '/'.$device->path: '';?>" class="form-control">
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
                'tile_name': {required: true},

                'apt_device_number': {required: true},
                'slogan': {required: true},
                'message': {required: true},
                "device_id[]": "required",
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
            $('#optgroup').multiSelect({});
        });
    });
</script>
<script type="application/javascript">
    $(document).ready(function () {
        var langding = "<?php echo isset($device->langdingpage_id) ? $device->langdingpage_id:'1'; ?>";
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
    });
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
</style>