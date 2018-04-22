<?php
/**
  * @var \App\View\AppView $this
  * @var $devices
  * @var $user_login
  * @var $users
  * @var $campaign_group
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
                            'type' => 'file',
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
                                echo $this->Form->control('time', array(
                                    'label' => 'Thời gian bắt đầu và kết thúc chiến dịch',
                                    'class' => 'form-control',
                                    'id' => 'config-demo'
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
                        <h2 class="card-inside-title">Chọn thiết bị cho nhóm</h2>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <select data-placeholder="Chọn thiết bị"
                                        id="select_device" class="chosen-select" multiple tabindex="8" name="device_id[]">
                                    <?php $user_de_id = json_decode($adgroup->device_name);
                                    foreach ($devices as $key => $device) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $device ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($user_login['role'] == \App\Model\Entity\User::ROLE_ONE) { ?>
                            <h2 class="card-inside-title" >User quản lý nhóm thiết bị</h2>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select  class="form-control required" name="user_id_campaign_group" id="user_id_group">
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
                            <input type="hidden" name="user_id_campaign_group"  value="<?php echo $user_login['id'];?>" class="form-control"/>
                        <?php } ?>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h2 class="card-inside-title">Loại quảng cáo</h2>
                                <div class="demo-radio-button">
                                    <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" checked />
                                    <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
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
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $random = isset($campaign_group->random) ? $campaign_group->random: '2';
                                echo  $this->Form->input('random', array(
                                    'type' => 'select',
                                    'options' => [
                                        '1' => 'Random thông thường',
                                        '2' => 'Random Fix cứng'
                                    ],
                                    'empty'=>'--- Chọn loại Random ---',
                                    'label'=> 'Chọn loại Random chiến dịch',
                                    'value' => $random,
                                    'escape' => false,
                                    'error' => false,
                                    'class' => 'form-control required input_select_medium'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <?php echo $this->Form->control('tile_name', array(
                                    'label' => 'Tên cơ sở dịch vụ',
                                    'class' => 'form-control',
                                    'id' => 'tile_name'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line"
                            <?php echo $this->Form->control('tile_congratulations', array(
                                'label' => 'Nội dung tin nhắn chúc mừng',
                                'class' => 'form-control'
                            ));
                            ?>
                        </div>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <?php $address = isset($campaign_group->address) ? ($campaign_group->address):'' ?>
                                <?php echo $this->Form->control('address', array(
                                    'label' => 'Địa chỉ nhóm thiết bị',
                                    'class' => 'form-control',
                                    'id' => 'slogan',
                                    'value' => $address
                                ));
                                ?>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="form-line">-->
<!--                                --><?php //$tile_congratulations_return = isset($campaign_group->tile_congratulations_return) ? ($campaign_group->tile_congratulations_return):'' ?>
<!--                                --><?php //echo $this->Form->control('tile_congratulations_return', array(
//                                    'label' => 'Title thống báo truy cập trở lại',
//                                    'class' => 'form-control',
//                                    'value' => $tile_congratulations_return
//                                ));
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
                        <?php $tile_congratulations_return = isset($campaign_group->tile_congratulations_return) ? ($campaign_group->tile_congratulations_return):'' ?>
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
                                <?php $title_connect = isset($campaign_group->title_connect) ? ($campaign_group->title_connect):'' ?>
                                <?php echo $this->Form->control('title_connect', array(
                                    'label' => 'Title button kết nối',
                                    'class' => 'form-control',
                                    'value' => $title_connect,
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $title_campaign = isset($campaign_group->title_campaign) ? ($campaign_group->title_campaign):'' ?>
                                <?php echo $this->Form->control('title_campaign', array(
                                    'label' => 'Title button khảo sát',
                                    'class' => 'form-control',
                                    'value' => $title_campaign,
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php
                                $hidden_connect = isset($campaign_group->hidden_connect) ? $campaign_group->hidden_connect: '1';
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
                        </div>
                        <div class="form-group">
                            <label> Logo Image </label>
                            <div class="form-line">
                                <?php $logo_image = isset($campaign_group->path_logo) ? ($campaign_group->path_logo):''; ?>
                                <input type="file" name="logo_image" id="file" value="" class="form-control"/>
                            </div>
                        </div>
                        <h2 class="card-inside-title"> Chọn ảnh nền </h2>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" multiple = multiple id="file" value="<?php echo isset($device->path) ? '/'.$device->path: '';?>" class="form-control">
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
    $(document).ready(function () {
        //Advanced Form Validation
        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
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
                'time' :{
                    required: true
                },
                'number_voucher' :{
                    required: true,
                    number : true
                },
                'device_id[]': {
                    required : true
                },
                'random': {
                    required: true
                },
                // 'packages[]': { required: true }
            }
        });
    });
   // $('#config-demo').daterangepicker({}, function(start, end, label) {});
   //  $('#config-demo').daterangepicker({}, function(start, end, label) {});
    $('#config-demo').dateRangePicker({
        language:'vi',
        showShortcuts: true,
        shortcuts :
            {
                'next-days': [3,5,7],
                'next': ['week','month','year']
            },

        format: 'DD/MM/YYYY',
        separator: ' - '
    });
</script>
<style>
    .chosen-container {
        width: 100% !important;
    }
    label {
        color: black;
    }
</style>