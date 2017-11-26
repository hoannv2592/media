<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partner Voucher Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['controller' => 'CampaignGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['controller' => 'CampaignGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partnerVoucherLogs index large-9 medium-8 columns content">
    <h3><?= __('Partner Voucher Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campaign_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_clients_connect') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_mac') ?></th>
                <th scope="col"><?= $this->Paginator->sort('confirm') ?></th>
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
            <?php foreach ($partnerVoucherLogs as $partnerVoucherLog): ?>
            <tr>
                <td><?= $this->Number->format($partnerVoucherLog->id) ?></td>
                <td><?= $partnerVoucherLog->has('campaign_group') ? $this->Html->link($partnerVoucherLog->campaign_group->name, ['controller' => 'CampaignGroups', 'action' => 'view', $partnerVoucherLog->campaign_group->id]) : '' ?></td>
                <td><?= h($partnerVoucherLog->num_clients_connect) ?></td>
                <td><?= h($partnerVoucherLog->client_mac) ?></td>
                <td><?= h($partnerVoucherLog->confirm) ?></td>
                <td><?= $partnerVoucherLog->has('user') ? $this->Html->link($partnerVoucherLog->user->id, ['controller' => 'Users', 'action' => 'view', $partnerVoucherLog->user->id]) : '' ?></td>
                <td><?= h($partnerVoucherLog->full_name) ?></td>
                <td><?= h($partnerVoucherLog->birthday) ?></td>
                <td><?= h($partnerVoucherLog->telephone) ?></td>
                <td><?= h($partnerVoucherLog->address) ?></td>
                <td><?= $partnerVoucherLog->has('device') ? $this->Html->link($partnerVoucherLog->device->id, ['controller' => 'Devices', 'action' => 'view', $partnerVoucherLog->device->id]) : '' ?></td>
                <td><?= h($partnerVoucherLog->created) ?></td>
                <td><?= h($partnerVoucherLog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partnerVoucherLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partnerVoucherLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partnerVoucherLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partnerVoucherLog->id)]) ?>
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
