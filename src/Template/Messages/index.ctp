<?php
/**
 * @var \App\View\AppView $this
 * @var $userData
 * @var \App\Model\Entity\Users[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="content" xmlns="">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>Danh sách khách sử dung SMS</h2>
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
                    <div class="body"><div class="button-demo m-b-10">
                            <?php
                            if (isset($id_message) && $id_message != '') { ?>
                                <a class="btn btn-primary waves-effect" href="<?php echo $this->Url->build(['controller' => 'Messages', 'action' => 'detail_message/'.$id_message]) ?>">Xem cài đặt màn hình sms</a>
                            <?php } else {?>
                                <a class="btn btn-primary waves-effect" href="<?php echo $this->Url->build(['controller' => 'Messages', 'action' => 'add_message']) ?>">Cài đặt màn hình sms</a>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="bg-blue-grey">
                                    <th scope="col" style="text-align: center"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('client_mac') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('confirm') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('expired_date') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <td style="text-align: center"><?= ($message->id) ?></td>
                                        <td><?= isset($message->client_mac)? h($message->client_mac):'' ?></td>
                                        <td><?= isset($message->phone)? h($message->phone):'' ?></td>
                                        <td><?= $this->Number->format($message->confirm) ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($message->expired_date)); ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($message->created)); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                            <div class="row">
                                <div class="col-md-6">
                                    <p style="margin: 20px 0;"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                                </div>
                                <div class="col-md-6">
                                    <ul class="pagination pull-right" >
                                        <?= $this->Paginator->first(__('First')) ?>
                                        <?= $this->Paginator->prev(__('Previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('Next')) ?>
                                        <?= $this->Paginator->last(__('Last')) ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .bg-blue-grey>th>a {
        color: #ffffff !important;
    }
    .pagination li.active a {
        background-color: #2196f3;
    }

    .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
        color: #777;
        cursor: not-allowed;
        background-color: #fff !important;
        border-color: #ddd;
    }
</style>