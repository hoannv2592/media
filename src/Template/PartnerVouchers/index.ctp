<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partner Voucher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partnerVouchers index large-9 medium-8 columns content">
    <h3><?= __('Partner Vouchers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partnerVouchers as $partnerVoucher): ?>
            <tr>
                <td><?= $this->Number->format($partnerVoucher->id) ?></td>
                <td><?= $partnerVoucher->has('user') ? $this->Html->link($partnerVoucher->user->id, ['controller' => 'Users', 'action' => 'view', $partnerVoucher->user->id]) : '' ?></td>
                <td><?= h($partnerVoucher->full_name) ?></td>
                <td><?= h($partnerVoucher->birthday) ?></td>
                <td><?= h($partnerVoucher->telephone) ?></td>
                <td><?= h($partnerVoucher->address) ?></td>
                <td><?= $partnerVoucher->has('device') ? $this->Html->link($partnerVoucher->device->id, ['controller' => 'Devices', 'action' => 'view', $partnerVoucher->device->id]) : '' ?></td>
                <td><?= h($partnerVoucher->created) ?></td>
                <td><?= h($partnerVoucher->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partnerVoucher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partnerVoucher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partnerVoucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partnerVoucher->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
