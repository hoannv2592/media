<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $adgroup
 * @var \App\Model\Entity\Adgroup[]|\Cake\Collection\CollectionInterface $userData
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Thông tin nhóm quảng cáo <small>Description text here...</small>
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
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Adgroups', 'action' => 'detail_group'.'/'.$adgroup->id),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <input id="cname" name="id" type="hidden">
                        <input id="landingpage" name="landingpage" value="<?php echo isset($adgroup->name) ? $adgroup->name:'' ?>" type="hidden">
                        <label for="name">Tên loại nhóm quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên loại nhóm quảng cáo" value="<?php echo isset($adgroup->name) ? $adgroup->name:'' ?>" required>
                            </div>
                            <div class="help-info">Tên loại nhóm quảng cáo</div>
                        </div>
                        <label for="description">Mô tả quảng cáo</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" id="description" placeholder="Mô tả quảng cáo" required><?php echo isset($adgroup->description) ? nl2br($adgroup->description):''; ?></textarea>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <label for="description">Chọn người dùng cho nhóm</label>
                                    <select id="optgroup" class="ms" multiple="multiple" name="user_id[]">
                                        <optgroup label="">
                                            <?php
                                            $user_de_id = json_decode($adgroup->user_id);
                                            foreach ($users as $key => $user) {
                                                if (isset($user_de_id->$key)) { ?>
                                                    <option selected="selected" value="<?php echo $key; ?>"><?php echo $user ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $key; ?>"><?php echo $user ?></option>
                                                <?php }
                                                ?>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="demo-radio-button">
                                    <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey"
                                        <?php if ($adgroup->langdingpage_id == 1 || $adgroup->langdingpage_id == '') { echo 'checked'; } ?> />
                                    <label style="font-weight: bold" for="radio_30">Quảng Cáo với Facebook</label>
                                    <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php
                                    if ($adgroup->langdingpage_id == 2) { echo 'checked'; }
                                    ?> />
                                    <label style="font-weight: bold" for="radio_31">Quảng cáo với hình ảnh</label>
                                    <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php
                                    if ($adgroup->langdingpage_id == 3) { echo 'checked'; }
                                    ?> />
                                    <label style="font-weight: bold" for="radio_32">Quảng Cáo với voucher</label>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Multi Select -->
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">CHỈNH SỬA</button>
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
