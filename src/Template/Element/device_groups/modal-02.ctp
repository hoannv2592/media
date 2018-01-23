<div class="modal-dialog" role="document">
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header bg-light-blue">
                    <h2>THÔNG TIN THIẾT BỊ</h2>
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
                    <?php
                    $id = isset($device['id']) ?$device['id'] :'';
                    echo $this->Form->create('Devices', array(
                        'id' => 'form_edit_validation',
                        'type' => 'post',
                        'url' => array('controller' => 'Devices', 'action' => 'edit' . '/' . UrlUtil::_encodeUrl($id)),
                    ));
                    ?>
                    <div class="modal-body">
                        <input id="backup_name_dev" type="hidden"
                               value="<?php echo isset($device['name']) ? $device['name'] : '' ?>">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Điền tên thiết bị"
                                           value="<?php echo isset($device['name']) ? $device['name'] : '' ?>" required>
                                </div>
                            </div>
                            <label for="name">Code</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input disabled="disabled" type="text" class="form-control" name="apt_key"
                                           id="apt_key"
                                           value="<?php echo isset($device['apt_key']) ? $device['apt_key'] : '' ?>"
                                           required>
                                </div>
                            </div>
                            <label for="name">Up time</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="" placeholder="" id="uptime"
                                           readonly="readonly"
                                           value="<?php echo isset($device['uptime']) ? $device['uptime'] : '' ?>">
                                </div>
                            </div>
                            <label for="name">Address</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="address"
                                           placeholder="Địa chỉ đặt thiết bị" id="address"
                                           value="<?php echo isset($device['address']) ? $device['address'] : '' ?>"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php $adgroup_id = isset($device['adgroup_id']) ? $device['adgroup_id'] :'';?>
                            <label for="name">Adgroup</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="" placeholder="" id="adgroup_id"
                                           readonly="readonly"
                                           value="<?php echo isset($Adgroups[$adgroup_id]) ? $Adgroups[$adgroup_id] : '' ?>">
                                </div>
                            </div>
                            <label for="name">Num_clients</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="" placeholder="" id="num_clients"
                                           readonly="readonly"
                                           value="<?php echo isset($device['num_clients']) ? $device['num_clients'] : '' ?>">
                                </div>
                            </div>
                            <label for="name">Campaign_group</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="" placeholder="" id="adgroup_id"
                                           readonly="readonly"
                                           value="<?php echo isset($campaign_name) ? $campaign_name : '' ?>">
                                </div>
                            </div>
                            <label for="user_id">Chọn tài khoản</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php
                                    if ($userData['role'] == \App\Model\Entity\User::ROLE_TOW) {
                                        echo isset($users[$device['user_id']]) ? $users[$device['user_id']] : '';
                                    } else { ?>
                                        <select class="form-control required" name="user_id" id="user_id">
                                            <option disabled selected value> -- Chọn tài khoản --</option>
                                            <?php foreach ($users as $key => $user) {
                                                if ($device['user_id'] == $key) { ?>
                                                    <option selected="selected"
                                                            value="<?php echo $key; ?>"><?php echo $user ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $key; ?>"><?php echo $user ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary waves-effect" type="submit">CẬP NHẬT</button>
                        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        //Advanced Form Validation
        $('#form_edit_validation').validate({
            onkeyup: false,
            rules: {
                'name' : {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/Devices/isNameEditlExist',
                        data: {
                            backup_name: function () {
                                return $('#backup_name_dev').val();
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
    });
</script>