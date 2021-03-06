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
                            <a href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'add']) ?>" class="btn btn-primary waves-effect m-r-20">THÊM QUẢNG CÁO</a>
                        </div>
                        <?php if (!empty($landingpages)) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr class="bg-blue-grey">
                                        <th>Tên quảng cáo</th>
                                        <th>Mô tả</th>
                                        <th>Demo</th>
                                        <th>Ngày tạo</th>
                                        <th>Điều hướng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($landingpages as $key => $landingpage) { ?>
                                        <tr>
                                            <td class="advertise font-bold col-cyan">
                                                <a href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'detail_langdingpage' . '/' . $landingpage->id]) ?>"><?php echo h($landingpage->name); ?></a>
                                            </td>
                                            <td><?php echo nl2br($landingpage->description); ?></td>
                                            <td><a class="btn bg-indigo waves-effect" href="<?php echo $this->Url->build(['controller' => 'Landingpages', 'action' => 'laneding_demo' . '/' . $landingpage->id]) ?>">Demo</a></td>
                                            <td><?php echo date('d/m/Y H:i', strtotime($landingpage->created));?></td>
                                            <td class="delete_advertise" value="<?php echo h($landingpage->id); ?>"><button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa quảng cáo</button></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
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
    $('.delete_advertise').click(function () {
        var id = $(this).attr('value');
        $('#submit_delete').click(function () {
            var url = "<?php echo URL_DELETE; ?>";
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: { id: id },
                success: function (response) {
                    if (response) {
                        setTimeout(function(){
                            window.location.reload();
                        }, 100);
                    } else {
                        alert_message('Đã có lỗi xảy ra.vui lòng thử lại');
                        return false;
                    }
                }
            });
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
</script>