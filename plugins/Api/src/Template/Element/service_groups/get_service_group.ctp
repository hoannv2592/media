<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI NHÓM DỊCH VỤ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Landingpages', array(
                            'id' => 'form_advanced_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'ServiceGroups', 'action' => 'add'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            )
                        ));
                        ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name"  required>
                                <label class="form-label">Tên nhóm dịch vụ</label>
                            </div>
                            <div class="help-info">Tên nhóm dịch vụ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                <label class="form-label">Mô tả nhóm dịch vụ</label>
                            </div>
                            <div class="help-info">Mô tả nhóm dịch vụ</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">THÊM MỚI</button>
                        <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">CLOSE</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-02" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÔNG TIN NHÓM DỊCH VỤ</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('adgroups', array(
                            'id' => 'form_validation_se',
                            'type' => 'post',
                            'url' => array('controller' => 'ServiceGroups', 'action' => 'edit'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                            //'onsubmit'=>"event.returnValue = false; return false;",
                        ));
                        ?>
                        <input id="cname" name="id" type="hidden">
                        <input id="landingpage" name="landingpage" type="hidden">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="help-info">Tên loại nhóm dịch vụ</div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" id="description" required></textarea>
                            </div>
                            <div class="help-info">Mô tả quảng cáo</div>
                        </div>
                        <button class="btn btn-primary waves-effect" id = "submit" type="submit">CHỈNH SỬA</button>
                        <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">CLOSE</button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-03" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>XÁC NHẬN</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php echo $this->Form->create('Landingpages', array(
                            'id' => 'form_validation',
                            'type' => 'post',
                            'url' => array('controller' => 'Landingpages', 'action' => 'delete'),
                            'inputDefaults' => array(
                                'label' => false,
                                'div' => false
                            ),
                            'onsubmit'=>"event.returnValue = false; return false;",
                        ));
                        ?>
                        <p>Bạn có chắc chắn muốn xóa nhóm dịch vụ này không? </p>
                        <div class="modal-footer">
                            <button class="btn btn-primary waves-effect" id = "submit_delete" type="submit">XÓA DỊCH VỤ</button>
                            <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">CLOSE</button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        var id;
        $('.delete_advertise').click(function () {
            id = $(this).attr('value');
            $('#submit_delete').click(function () {
                var url = "<?php echo URL_DELETE_SERVICE; ?>";
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: { id: id },
                    success: function (response) {
                        if (response) {
                            alert_message('Đã xóa thành công');
                            setTimeout(function(){
                                window.location.reload();
                            }, 1000);
                        } else {
                            alert_message('Đã có lỗi xảy ra.vui lòng thử lại');
                            return false;
                        }
                    }
                });
            });
        });

        $('.advertise').click(function () {
            var id = $(this).attr('value');
            $('#cname').val(id);
            var url = "<?php echo URL_LOAD_SERVICE; ?>";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function (response) {
                    if (response) {
                        $('#modal-02 #name').val(response.name);
                        $('#modal-02 #description').val(response.description);
                        $('#modal-02 #landingpage').val(response.name);
                    }
                }
            });
        });
        $('#form_advanced_validation').validate({
            rules: {
                'name': {
                    remote: {
                        type: 'POST',
                        async: false,
                        url: '/ServiceGroups/isNameExistAdd'
                    }
                }
            },
            onkeyup: function(element, event) {
                if ($(element).attr('name') === "name") {
                    return false; // disable onkeyup for your element named as "name"
                } else { // else use the default on everything else
                    if ( event.which === 9 && this.elementValue( element ) === "" ) {
                        return;
                    } else if ( element.name in this.submitted || element === this.lastElement ) {
                        this.element( element );
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
    </script>