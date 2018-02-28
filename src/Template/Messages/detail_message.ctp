<?php
/**
 * @var $device_id
 * @var $user_id
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $device
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $back_group
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $logo
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
                <ol class="breadcrumb breadcrumb-bg-blue-grey">
                    <li>
                        <a href="<?php echo $this->Url->build(['controller' => 'Messages', 'action' => 'index'])?>">
                            <i class="material-icons">home</i> Trang chủ
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);">Thông tin các màn hình quảng cáo</a>
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
                        <?= $this->Flash->render() ?>
                        <?php echo $this->Form->create('Messages', [
                            'type' => 'file',
                            'url' => ['controller' => 'Messages', 'action' => 'detailMessage/'.$id],
                            'id' => 'uploadForm',
                        ]); ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $button_backgroud = isset($device->button_backgroud) ? ($device->button_backgroud):'' ?>
                                    <?php echo $this->Form->control('button_backgroud', array(
                                        'label' => 'Name button backgroup',
                                        'class' => 'form-control',
                                        'value' => $button_backgroud,
                                        'placeholder' => 'Name button backgroup'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $button_popup = isset($device->button_popup) ? $device->button_popup:'' ?>
                                    <?php echo $this->Form->control('button_popup', array(
                                        'label' => 'Name button submit popup',
                                        'class' => 'form-control',
                                        'value' => $button_popup,
                                        'placeholder' => 'Name button submit popup'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $title_popup = isset($device->title_popup) ? $device->title_popup:'' ?>
                                    <?php echo $this->Form->control('title_popup', array(
                                        'label' => 'Title_popup',
                                        'class' => 'form-control',
                                        'id' => 'title_popup',
                                        'value' => $title_popup,
                                        'placeholder' => 'title_popup'
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php
                                    $opption = \App\Model\Entity\Message::$opption;
                                    echo  $this->Form->input('options', array(
                                        'type' => 'select',
                                        'options' => $opption,
                                        'empty' => '--- Chọn hiển thị ---',
                                        'label'=> 'Select opption',
                                        'value' => $device->options,
                                        'escape' => false,
                                        'error' => false,
                                        'class' => 'form-control required input_select_medium'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <label class=""> Chọn một ảnh </label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable table-hover">
                                    <thead>
                                    <tr>
                                        <th width="20%">Ảnh nền</th>
                                        <th width="10%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($back_group)) {
                                        foreach ($back_group as $k => $vl) {  if ($vl != '') { ?>
                                            <tr id="<?php echo $k; ?>">
                                                <td class="image"><embed src="<?= '/'.$vl ?>" width="350" height="180"></td>
                                                <td><a href="javascript:void(0);"  id="delete_bak" onclick="delete_bak(<?php echo $k; ?>)" class="btn btn-danger waves-effect">Xóa</a></td>
                                            </tr>
                                        <?php } }
                                        ?>
                                    <?php } else { ?>
                                        <tr><td colspan="4" class="image">No file(s) found......</td></tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <label class=""> Chọn một ảnh </label>
                            <div class="form-group">
                                <div class="file-loading">
                                    <input id="file-1" type="file" multiple class="file" name="backgroud[]" data-overwrite-initial="false" data-min-file-count="2">
                                </div>
                            </div>
                        </div>
                        <div class="p-l-0 align-left">
                            <button class="btn btn-primary waves-effect" id="submit_delete" type="submit"> CÀI ĐẶT</button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function delete_bak(id) {
        $.ajax({
            type: 'POST',
            url: '/Messages/delete_backgroud',
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
        showUpload : false,
        //allowedFileTypes: ['image', 'video', 'flash'],
        // slugCallback: function (filename) {
        //     return filename.replace('(', '_').replace(']', '_');
        // }
    });
</script>
<script type="application/javascript">

    function checkuploadfile() {
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length) > 5){
            alert("You can only upload a maximum of 5 files");
            return false;
        } else {
            return true;
        }
    }
    $('#uploadForm').validate({
        rules: {
            'button_backgroud': { required: true },
            'button_popup': { required: true },
            'options': { required: true }
        },
        messages:{
            'button_backgroud': { required: 'Hãy nhập' },
            'button_popup': { required: 'Hãy nhập' },
            'options': { required: 'Hãy nhập' }
        }
    });
</script>
<style>
    .kv-file-upload, .kv-file-remove{
        color:#fff !important;
        visibility: hidden !important;

    }
</style>
