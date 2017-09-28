<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $device
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $userData
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'index'])?>">
                        <i class="material-icons">home</i> Trang chủ
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);">Thông tin các màn hình quảng cáo</a>
                </li>
            </ol>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-light-blue">
                        <h2>CHỌN LOẠI QUẢNG CÁO</h2>
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
                        <h2 class="card-inside-title">
                            Chọn loại quảng cáo
                        </h2>
                        <div class="demo-radio-button">
                            <?php
                                echo $this->Form->create('energy_input', array(
                                        'id' => 'EnergyInputForm',
                                        'type' => 'post',
                                        'url' => array('controller' => 'Devices', 'action' => 'set_qc'.'/'.$device_id.'/'.$user_id),
                                        'inputDefaults' => array(
                                            'div' => false
                                        )
                                    )
                                );
                            ?>
                            <input name="langdingpage_id" type="radio" id="radio_30" value="1" class="radio-col-grey"
                                <?php if ($device->langdingpage_id == 1 || $device->langdingpage_id == '') { echo 'checked'; } ?> />
                            <label style="font-weight: bold" for="radio_30">Quảng cáo với password</label>
                            <input name="langdingpage_id" type="radio" id="radio_31" value="2" class="radio-col-grey" <?php
                            if ($device->langdingpage_id == 2) { echo 'checked'; }
                            ?> />
                            <label style="font-weight: bold" for="radio_31">Quảng cáo Facebook-Login</label>
                            <input name="langdingpage_id" type="radio" id="radio_32" value="3" class="radio-col-grey" <?php
                            if ($device->langdingpage_id == 3) { echo 'checked'; }
                            ?> />
                            <label style="font-weight: bold" for="radio_32">Quảng cáo lấy thông tin khách hàng</label>
                        </div>
                        <div class="modal-footer p-l-0 align-left">
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
