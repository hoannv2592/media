<?php
/**
 * @var $device_id
 * @var $user_id
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $device
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $logo
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $back_group
 */
$this->assign('title', 'Tạo quảng cáo thiết bị');
?>
<style>
    .form-control {
        height: auto !important;
    }
</style>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class=" header breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a style="margin-left: 10px" href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);">Thông tin quảng cáo thiết bị</a>
                    </li>
                </ol>
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>TẠO ẢNH NỀN & TITLE CHO THIẾT BỊ</h2>
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
                        <!-- Table -->
                        <?= $this->Flash->render() ?>
                        <?php echo $this->Form->create('Devices', [
                            'type' => 'file',
                            'url' => ['controller' => 'Devices', 'action' => 'set_qc'.'/'. UrlUtil::_encodeUrl($device_id).'/'.UrlUtil::_encodeUrl($user_id)],
                            'id' => 'uploadForm',
                            'onsubmit'=>"event.returnValue = checkuploadfile()",
                        ]); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $tile_name = isset($device->tile_name) ? ($device->tile_name):'' ?>
                                    <?php echo $this->Form->control('tile_name', array(
                                        'label' => 'Tên cơ sở dịch vụ',
                                        'class' => 'form-control',
                                        'id' => 'tile_name',
                                        'value' => $tile_name,
                                        'placeholder' => 'Điền tên..'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $address = isset($device['address']) ? $device['address']:'' ?>
                                    <?php echo $this->Form->control('address', array(
                                        'label' => 'Địa chỉ nhóm thiết bị',
                                        'class' => 'form-control',
                                        'id' => 'tile_name',
                                        'value' => $address,
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $type_adv = isset($device->type_adv) ? $device->type_adv: 1;
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
                                        'class' => 'form-control required input_select_medium'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $fb_fanpage = isset($device->fb_fanpage) ? ($device->fb_fanpage):'' ?>
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
                                    <?php $fb_latitude = isset($device->fb_latitude) ? ($device->fb_latitude):'' ?>
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
                                    <?php $fb_longtitude = isset($device->fb_longtitude) ? ($device->fb_longtitude):'' ?>
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
                                    <?php $fb_checkin_msg = isset($device->fb_checkin_msg) ? ($device->fb_checkin_msg):'' ?>
                                    <?php echo $this->Form->control('fb_checkin_msg', array(
                                        'label' => 'Check-in message',
                                        'class' => 'form-control',
                                        'value' => $fb_checkin_msg,
                                    ));
                                    ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $title_campaign = isset($device->title_campaign) ? ($device->title_campaign):'' ?>
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
                                    <?php $title_connect = isset($device->title_connect) ? ($device->title_connect):'' ?>
                                    <?php echo $this->Form->control('title_connect', array(
                                        'label' => 'Tiêu đề button kết nối',
                                        'class' => 'form-control',
                                        'value' => $title_connect,
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Ảnh logo </label>
                                <div class="form-line">
                                    <input type="file" name="logo_image" id="file" value="" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped dataTable table-hover">
                                        <thead>
                                        <tr>
                                            <th width="20%">Ảnh logo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($logo)) {
                                            foreach ($logo as $k => $vl) { if ($vl != '') { ?>
                                                <tr>
                                                    <td class="image"><embed src="<?= '/'.$vl ?>" width="330" height="180"></td>
                                                </tr>
                                            <?php } }
                                            ?>
                                        <?php } else { ?>
                                        <tr><td colspan="4" class="image">No file(s) found......</td>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="show_tite">
                                <?php if (isset($device->tile_congratulations_return) && $device->tile_congratulations_return != '') {
                                    $tile_congratulations_return = json_decode($device->tile_congratulations_return) ;
                                    $count = count($tile_congratulations_return);
                                    if ($count > 0) {
                                        foreach ($tile_congratulations_return as $k => $item) {
                                            if ($k == 0) {?>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="tile-congratulations-return">Tiêu đề chúc mừng kết nối lại</label>
                                                        <input name="tile_congratulations_return[]"
                                                               class="form-control valid" id="tile-congratulations-return"
                                                               value="<?= $item ?>" aria-invalid="false" type="text" />
                                                    </div>
                                                    <a href="javascript:void(0);" id="add_title" class="btn btn-danger waves-effect" style="margin-top: 10px">Thêm mới</a>
                                                </div>
                                            <?php } else {?>
                                                <div class="form-group" id="title_<?= $k?>">
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
                                                       value="<?= $device->tile_congratulations_return ?>" aria-invalid="false" type="text" />
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
                                    <?php
                                    $hidden_connect = isset($device->hidden_connect) ? $device->hidden_connect: '1';
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
                                <div class="form-line">
                                    <label class=""> Chọn loại quảng cáo </label>
                                    <div class="demo-radio-button">
                                        <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php if ($device->langdingpage_id == 3) { echo 'checked'; }?> />
                                        <label style="font-weight: bold" for="radio_32">Thông tin khách hàng</label>
                                        <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php if ($device->langdingpage_id == 2) { echo 'checked'; }?> />
                                        <label style="font-weight: bold" for="radio_31">Facebook-Login</label>
                                        <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey" <?php if ($device->langdingpage_id == 1 || $device->langdingpage_id == '') { echo 'checked'; } ?> />
                                        <label style="font-weight: bold" for="radio_30">Password</label>
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
                            <div class="check_pass_device">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label class=""> Mật khẩu thiết bị </label>
                                        <input type="text" name="apt_device_number" id="apt_device_number" value="<?php echo isset($device->apt_device_number) ? $device->apt_device_number: $apt ?>" placeholder="Điền mật khẩu.." class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable table-hover">
                                    <thead>
                                    <tr>
                                        <th width="20%">Ảnh nền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($back_group)) {
                                        foreach ($back_group as $k => $vl) { if ($vl != '') { ?>
                                            <tr id="<?= $k;?>">
                                                <td class="image"><embed src="<?= '/'.$vl ?>" width="330" height="180"><input type="hidden" name="file_backup[]" value="<?= '/'.$vl; ?>"></td>
                                                <td><a href="javascript:void(0);"  id="delete_bak" onclick="delete_bak(<?php echo $k; ?>)" class="btn btn-danger waves-effect">Xóa</a></td>
                                            </tr>
                                        <?php }}?>
                                    <?php } else { ?>
                                        <tr><td colspan="4" class="image">No file(s) found......</td></tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <label class=""> Chọn một ảnh </label>
                            <div class="form-group">
                                <div class="file-loading">
                                    <input id="file-1" type="file" multiple class="file" name="file_upload[]" data-overwrite-initial="false" data-min-file-count="2">
                                </div>
                            </div>
                            <div class="show_adv">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped dataTable table-hover">
                                        <thead>
                                        <tr>
                                            <th width="20%">Ảnh quảng cáo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($adv)) {
                                            foreach ($adv as $k => $vl) {
                                                if ($vl['path'] != '') { ?>
                                                    <tr id="<?= $vl['id'];?>">
                                                        <td class="image"><embed src="<?= '/'.$vl['path'] ?>" width="330" height="180">
                                                            <strong><?php echo $vl['url_link']?></strong>
                                                            <input type="hidden" name="file_backup[]" value="<?= '/'.$vl['path']; ?>">
                                                        </td>
                                                        <td><a href="javascript:void(0);"  id="delete_bak" onclick="delete_adv(<?php echo $vl['id']; ?>)" class="btn btn-danger waves-effect">Xóa</a></td>
                                                    </tr>
                                                <?php }}?>
                                        <?php } else { ?>
                                            <tr><td colspan="4" class="image">No file(s) found......</td></tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

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
                        <?php echo $this->Form->input('device_id', [
                            'type' => 'hidden',
                            'value' => $device->id
                        ]);
                        echo $this->Form->input('user_id', [
                            'type' => 'hidden',
                            'value' => $device->user_id
                        ]);
                        echo $this->Form->input('status', [
                            'type' => 'hidden',
                            'value' => $device->status
                        ]);?>
                        <div class="p-l-0 align-left">
                            <button class="btn btn-primary waves-effect" id="submit_delete" type="submit">
                                CÀI ĐẶT
                            </button>
                        </div>
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
    var max_fields = 10; //maximum input boxes allowed
    var wrapper_file = $("div.file-add"); //Fields wrapper
    var add_button_file = $(".plus-file"); //Add button class
    var y = 1; //initlal text box count
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


    function delete_adv(id) {
        $.ajax({
            type: 'POST',
            url: '/Devices/delete_adv',
            async: true,
            data: {
                id: id
            },
            dataType: 'json',
            success: function (rp) {
                if (rp == true) {
                    $('tr#'+id).remove()
                }
            }
        });
    }
    function delete_bak(id) {
        $.ajax({
            type: 'POST',
            url: '/Devices/delete_backgroud',
            async: true,
            data: {
                id: id
            },
            dataType: 'json',
            success: function (rp) {
                if (rp == true) {
                    $('tr#'+id).remove()
                }
            }
        });
    }

    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: '/Devices/upload', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 10000,
        maxFilesNum: 5,
        dropZoneEnabled : false,
        showUpload : false
    });

    $("#file-2").fileinput({
        theme: 'fa',
        uploadUrl: '/Devices/upload', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 10000,
        maxFilesNum: 5,
        maxFileCount: 10,
        dropZoneEnabled : false,
        showUpload : false
    });

        function checkuploadfile() {
            var $fileUpload = $("input[type='file']");
            if (parseInt($fileUpload.get(0).files.length) > 5){
                alert("You can only upload a maximum of 5 files");
                return false;
            } else {
                return true;
            }
        }
    $(document).ready(function () {
        var langding = "<?php echo $device->langdingpage_id; ?>";
        if (langding == 1 || langding == '') {
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
    $('#uploadForm').validate({
        rules: {
            'tile_name': { required: true },
            'langdingpage_id': { required: true },
            'apt_device_number': { required: true },
            'title_campaign': { required: true },
            // 'link_adv[]': {
            //     required: function (element) {
            //         var val = $('#type_adv').val();
            //         if (val == 2) {return true} else {return false;}
            //     }
            //
            // },
            // 'image_adv[]': {
            //     required: function (element) {
            //         var val = $('#type_adv').val();
            //         if (val == 2) {return true} else {return false;}
            //     } },
            //'packages[]': { required: true }
        },
        messages:{
            'tile_name': { required: 'Hãy nhập' },
            'langdingpage_id': { required: 'Hãy nhập' },
            'apt_device_number': { required: 'Hãy nhập' },
            'title_campaign': { required: 'Hãy nhập' },
            // 'link_adv[]': { required: 'Hãy nhập' },
            // 'image_adv[]': { required: 'Hãy nhập' },
            //'packages[]': { required: 'Hãy chọn các label' }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "packages[]") {
                error.insertAfter($("#check_error"));
            } else {
                // the default error placement for the rest
                error.insertAfter(element);
            }
        }

    });

    $('#type_adv').change(function () {
        var val = $(this).val();
        if (val == 1) {
            $('.show_adv').hide();
        } else {
            $('.show_adv').show();
        }
    });
    $(document).ready(function () {
        var val = $('#type_adv').val();
        if (val == 1) {
            $('.show_adv').hide();
        } else {
            $('.show_adv').show();
        }
    });
    $('.radio-col-grey').change(function () {
        if ($(this).is(':checked')){
            $(this).prop('checked', true).attr('checked', 'checked');
        } else {
            $(this).prop('checked', false).removeAttr('checked');
        }
    });
</script>
<style>
    .kv-file-upload, .kv-file-remove{
        color:#fff !important;
        visibility: hidden !important;

    }
</style>
