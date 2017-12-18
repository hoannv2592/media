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
                                <div class="help-info">Tên chiến dịch</div>
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
                                <div class="help-info">hời gian bắt đầu và kết thúc chiến dịch</div>
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
                                <div class="help-info">Số lượng voucher phát ra</div>
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
                                <div class="help-info">Mô tả chiến dịch</div>
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
                                <div class="help-info">User quản lý nhóm thiết bị</div>
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
                                    'id' => 'tile_name',
                                    'placeholder' => 'Điền tên..'
                                ));
                                ?>
                                <div class="help-info">Tên cơ sở dịch vụ</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line"
                            <?php echo $this->Form->control('tile_congratulations', array(
                                'label' => 'Nội dung tin nhắn chúc mừng',
                                'class' => 'form-control',
                                'placeholder' => 'Nội dung tin nhắn chúc mừng..'
                            ));
                            ?>
                            <div class="help-info">Nội dung tin nhắn chúc mừng</div>
                        </div>
                        <div class="form-group" id="end_show">
                            <div class="form-line">
                                <?php $address = isset($campaign_group->address) ? ($campaign_group->address):'' ?>
                                <?php echo $this->Form->control('address', array(
                                    'label' => 'Địa chỉ nhóm thiết bị',
                                    'class' => 'form-control',
                                    'id' => 'slogan',
                                    'value' => $address,
                                    'placeholder' => 'Điền địa chỉ nhóm thiết bị..'
                                ));
                                ?>
                                <div class="help-info">Địa chỉ nhóm thiết bị</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $tile_congratulations_return = isset($campaign_group->tile_congratulations_return) ? ($campaign_group->tile_congratulations_return):'' ?>
                                <?php echo $this->Form->control('tile_congratulations_return', array(
                                    'label' => 'Tile congratulations return',
                                    'class' => 'form-control',
                                    'value' => $tile_congratulations_return,
                                    'placeholder' => 'Tile congratulations return..'
                                ));
                                ?>
                                <div class="help-info">Tile congratulations return</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <?php $title_connect = isset($campaign_group->title_connect) ? ($campaign_group->title_connect):'' ?>
                                <?php echo $this->Form->control('title_connect', array(
                                    'label' => 'Title button connect',
                                    'class' => 'form-control',
                                    'value' => $title_connect,
                                    'placeholder' => 'Title_connect..'
                                ));
                                ?>
                                <div class="help-info">Title_connect</div>
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
                                <div class="help-info">logo_image</div>
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
                }
            }
        });
    });
    $('#config-demo').daterangepicker({}, function(start, end, label) {});
</script>
<style>
    .chosen-container {
        width: 100% !important;
    }
    label {
        color: black;
    }
</style>