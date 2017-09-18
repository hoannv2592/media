<div class="body">
    <?php if (!empty($devices)) { ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-exportable_dev dataTable">
                <thead>
                <tr class="bg-blue-grey">
                    <th>Tên thiết bị</th>
                    <th>User quản lý</th>
                    <th>Mã xác thực</th>
                    <th>Ngày tạo</th>
                    <th>Điều hướng</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($devices as $key => $device) { ?>
                    <tr>
                        <td class="advertise font-bold col-cyan">
                            <a href="<?php echo $this->Url->build(['controller' => 'Devices', 'action' => 'detail-device' . '/' . $device->id]) ?>"><?php echo h($device->name); ?></a>
                        </td>
                        <td class="font-bold col-cyan">
                            <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'detail_partner' . '/' . $device->user->id]) ?>"><?php echo h($device->user->username); ?></a>
                        </td>
                        <td><?php echo nl2br($device->apt_key); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($device->created)); ?></td>
                        <td class="delete_advertise" value="<?php echo h($device->id); ?>">

                            <div class="button-demo">
                                <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modal-04">Tạo quảng cáo</button>
                            </div>
                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-03">Xóa thiết bị</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>