<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Landingpage[]|\Cake\Collection\CollectionInterface $landingpages
  */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Quản lý màn hình quảng cáo <small>Description text here...</small>
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
                        <div class="button-demo">
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">THÊM QUẢNG CÁO</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th>Tên quảng cáo</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Điều hướng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($landingpages as $key => $landingpage) { ?>
                                    <tr>
                                        <td class="advertise font-bold col-cyan" value="<?php echo h($landingpage->id); ?>"><a href="javascript:void(0);" data-toggle="modal" data-target="#modal-02"> <?php echo h($landingpage->name); ?></a></td>
                                        <td><?php echo nl2br($landingpage->description); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($landingpage->created));?></td>
                                        <td class="delete_advertise" value="<?php echo h($landingpage->id); ?>"><button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa quảng cáo</button></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>THÊM MỚI QUẢNG CÁO</h2>
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
                            echo $this->Form->create('Landingpages', array(
                                'id' => 'form_advanced_validation',
                                'type' => 'post',
                                'url' => array('controller' => 'Landingpages', 'action' => 'add'),
                                'inputDefaults' => array(
                                    'label' => false,
                                    'div' => false
                                ),
                                //'onsubmit'=>"event.returnValue = false; return false;",
                            ));
                        ?>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name"  required>
                                    <label class="form-label">Tên loại quảng cáo</label>
                                </div>
                                <div class="help-info">Tên loại quảng cáo</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                    <label class="form-label">Mô tả quảng cáo</label>
                                </div>
                                <div class="help-info">Mô tả quảng cáo</div>
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
                            <h2>THÔNG TIN QUẢNG CÁO</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php echo $this->Form->create('Landingpages', array(
                                'id' => 'form_validation',
                                'type' => 'post',
                                'url' => array('controller' => 'Landingpages', 'action' => 'edit'),
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
                                <div class="help-info">Tên loại quảng cáo</div>
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
                            <p>Bạn có chắc chắn muốn xóa quảng cáo này không? </p>
                            <div class="modal-footer">
                                <button class="btn btn-primary waves-effect" id = "submit_delete" type="submit">XÓA QUẢNG CÁO</button>
                                <button class="btn bg-brown waves-effect" type="button" data-dismiss="modal">CLOSE</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="application/javascript">
    var id;
    $('.delete_advertise').click(function () {
        id = $(this).attr('value');
        $('#submit_delete').click(function () {
            var url = "<?php echo URL_DELETE; ?>";
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
                        }, 3002);
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
        var url = "<?php echo URL_LOAD; ?>";
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
    $('form').on('submit', function(e) {
        var $form = $(this);
        if($form.attr('data-disabled') === true) {
            e.preventDefault();
            return false;
        }
        $form.attr('data-disabled', true);
    });
    $('#form_advanced_validation').validate({
        rules: {
            'name': {
                remote: {
                    type: 'POST',
                    async: false,
                    url: '/Landingpages/isNameExistAdd'
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