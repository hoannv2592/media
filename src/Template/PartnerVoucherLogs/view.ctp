<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partner Voucher Log'), ['action' => 'edit', $partnerVoucherLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partner Voucher Log'), ['action' => 'delete', $partnerVoucherLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partnerVoucherLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partner Voucher Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partner Voucher Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['controller' => 'CampaignGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['controller' => 'CampaignGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partnerVoucherLogs view large-9 medium-8 columns content">
    <h3><?= h($partnerVoucherLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Campaign Group') ?></th>
            <td><?= $partnerVoucherLog->has('campaign_group') ? $this->Html->link($partnerVoucherLog->campaign_group->name, ['controller' => 'CampaignGroups', 'action' => 'view', $partnerVoucherLog->campaign_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Clients Connect') ?></th>
            <td><?= h($partnerVoucherLog->num_clients_connect) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Mac') ?></th>
            <td><?= h($partnerVoucherLog->client_mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $partnerVoucherLog->has('user') ? $this->Html->link($partnerVoucherLog->user->id, ['controller' => 'Users', 'action' => 'view', $partnerVoucherLog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Name') ?></th>
            <td><?= h($partnerVoucherLog->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($partnerVoucherLog->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($partnerVoucherLog->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($partnerVoucherLog->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $partnerVoucherLog->has('device') ? $this->Html->link($partnerVoucherLog->device->id, ['controller' => 'Devices', 'action' => 'view', $partnerVoucherLog->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($partnerVoucherLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partnerVoucherLog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partnerVoucherLog->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirm') ?></th>
            <td><?= $partnerVoucherLog->confirm ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
