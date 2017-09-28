<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb ">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Adgroups', 'action' => 'index']) ?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active"><a href="javascript:void(0)">Tạo nhóm</a></li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NHÓM QUẢNG CÁO</h2>
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
                            'type' => 'post',
                            'url' => array('controller' => 'Adgroups', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <label for="name">Tên nhóm quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhóm quảng cáo" required>
                            </div>
                            <div class="help-info">Tên nhóm quảng cáo</div>
                        </div>
                        <label for="description">Mô tả nhóm quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" placeholder="Mô tả nhóm quảng cáo" required></textarea>
                            </div>
                            <div class="help-info">Mô tả nhóm quảng cáo</div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <label for="description">Chọn người dùng cho nhóm</label>
                                    <select id="optgroup" class="ms" multiple="multiple" name="user_id[]">
                                        <optgroup label="">
                                            <?php foreach ($users as $key => $user) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $user ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
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
    $('#form_advanced_validation').validate({
        onkeyup: false,
        rules: {
            'name': {
                remote: {
                    type: 'POST',
                    async: false,
                    url: '/Adgroups/isNameExistAdd'
                }
            }
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
</script>