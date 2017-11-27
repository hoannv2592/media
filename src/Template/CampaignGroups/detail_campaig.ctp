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
                                <div class="help-info">Tên chiến dịch</div>
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
                                <div class="help-info">hời gian bắt đầu và kết thúc chiến dịch</div>
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
                                <div class="help-info">Số lượng voucher phát ra</div>
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
                                <div class="help-info">Mô tả chiến dịch</div>
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
                                <div class="help-info">User quản lý nhóm thiết bị</div>
                            </div>
                        <?php }?>
                        <div class="form-group">
                            <div class="form-line">
                                <label> Chọn loại quảng cáo </label>
                                <div class="demo-radio-button">
                                    <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey langding" <?php if ($campaign_group->langdingpage_id == 1 || $campaign_group->langdingpage_id == '') { echo 'checked'; } ?> />
                                    <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                                    <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey langding" <?php if ($campaign_group->langdingpage_id == 2) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                                    <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey langding" <?php if ($campaign_group->langdingpage_id == 3) { echo 'checked'; }?> />
                                    <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                                </div>
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
                                <?php $tile_congratulations = isset($campaign_group->tile_congratulations) ? ($campaign_group->tile_congratulations):'' ?>
                                <?php echo $this->Form->control('tile_congratulations', array(
                                    'label' => 'Nội dung tin nhắn chúc mừng',
                                    'class' => 'form-control',
                                    'escape' => false,
                                    'value' => $tile_congratulations
                                ));
                                ?>
                                <div class="help-info">Nội dung tin nhắn chúc mừng</div>
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
                                <div class="help-info">Tên cơ sở dịch vụ</div>
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
                                <div class="help-info">Địa chỉ nhóm thiết bị</div>
                            </div>
                        </div>

                        <div class="form-group check_pass_device">
                            <div class="form-line">
                                <?php $apt_device_number_ = isset($campaign_group->apt_device_number) ? ($campaign_group->apt_device_number): $apt_device_number ?>
                                <?php echo $this->Form->control('apt_device_number', array(
                                    'label' => 'Mật khẩu thiết bị',
                                    'class' => 'form-control check_pass_device',
                                    'id' => 'apt_device_number',
                                    'value' => $apt_device_number_
                                ));
                                ?>
                                <div class="help-info">Mật khẩu thiết bị</div>
                            </div>
                        </div>
                        <!-- Table -->
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
                                <?php if (isset($campaign_group->path) && $campaign_group->path != '') {
                                    $list_background = explode(',', $campaign_group->path);
                                    foreach ($list_background as $k => $vl) { ?>
                                        <tr>
                                            <td><?php echo $campaign_group->id; ?></td>
                                            <td><?php echo $campaign_group->tile_name; ?></td>
                                            <td class="image"><embed src="<?= '/'.$vl ?>" width="450" height="300"></td>
                                            <td><?php echo $campaign_group->created; ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                <?php } else { ?>
                                <tr><td colspan="4" class="image">No file(s) found......</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <label> Chọn một ảnh </label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="file[]" id="file" multiple="multiple" value="<?php echo isset($campaign_group->path) ? '/'.$campaign_group->path: '';?>" class="form-control">
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
//    $(document).ready(function () {
//        var role = "<?php //echo $user_login['role'];?>//";
//        var user_id_group = '<?php //echo $campaign_group->user_id_campaign_group;?>//';
//        var devceid = $('#select_device').val();
//        $.ajax({
//            url: "/Adgroups/getUser",
//            type: "POST",
//            cache: false,
//            data: {
//                id : devceid,
//                role : role
//            },
//            success: function (responce) {
//                $('#user_id_group').find('option').remove().end()
//                    .append('<option disabled selected value>--- Chọn user ---</option>')
//                    .val('')
//                ;
//                var resp = [JSON.parse(responce)];
//                $.each(resp, function () {
//                    $.each(this, function (name, value) {
//                        $('#user_id_group').append($('<option>',
//                            {
//                                value: name,
//                                text : value
//                            })
//                        );
//                    });
//                });
//                $('#user_id_group option[value=' + user_id_group + ']').prop('selected', 'selected');
//            }
//        });
//    });
//    $('#select_device').change(function () {
//        var role = "<?php //echo $user_login['role'];?>//";
//        var val = $(this).val();
//        $.ajax({
//            url: "/Adgroups/getUser",
//            type: "POST",
//            cache: false,
//            data: {
//                id : val,
//                role : role
//            },
//            success: function (responce) {
//                $('#user_id_group').find('option').remove().end()
//                    .append('<option disabled selected value>--- Chọn user ---</option>')
//                    .val('')
//                ;
//                var resp = [JSON.parse(responce)];
//                $.each(resp, function () {
//                    $.each(this, function (name, value) {
//                        $('#user_id_group').append($('<option>',
//                            {
//                                value: name,
//                                text : value
//                            })
//                        );
//                    });
//                });
//            }
//        });
//    });
//    function remove(value) {
//        var select = $('select#user_id_group option');
//        var assistantId = '#user_id_group';
//        for (var i = 0; i < select.length; i++) {
//            if (select[i].value !== '') {
//                if (select[i].value === value) {
//                    $(assistantId + " option[value='" + select[i].value + "']").remove();
//                }
//            }
//        }
//    }


    $(document).ready(function () {
        var langding = "<?php echo $campaign_group->langdingpage_id; ?>";
        if (langding == 1) {
            $('.check_pass_device').css('display', '');
        } else if (langding == 3) {
            $('.check_pass_device').css('display', 'none');
        } else {
            $('.check_pass_device').css('display', 'none');
        }
    });
    $('.langding').change(function () {
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
            'tile_name': { required: true },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true },
            'device_id[]': { required: true },
            'number_voucher': { required: true },
            'random': { required: true }
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
    $('#config-demo').daterangepicker({}, function(start, end, label) {});
</script>
<style>
    .chosen-container{
        width: 100% !important;
    }
</style>
