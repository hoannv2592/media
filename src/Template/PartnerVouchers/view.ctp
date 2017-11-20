<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partner Voucher'), ['action' => 'edit', $partnerVoucher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partner Voucher'), ['action' => 'delete', $partnerVoucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partnerVoucher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partner Vouchers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partner Voucher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partnerVouchers view large-9 medium-8 columns content">
    <h3><?= h($partnerVoucher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $partnerVoucher->has('user') ? $this->Html->link($partnerVoucher->user->id, ['controller' => 'Users', 'action' => 'view', $partnerVoucher->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Name') ?></th>
            <td><?= h($partnerVoucher->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($partnerVoucher->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($partnerVoucher->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($partnerVoucher->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $partnerVoucher->has('device') ? $this->Html->link($partnerVoucher->device->id, ['controller' => 'Devices', 'action' => 'view', $partnerVoucher->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($partnerVoucher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partnerVoucher->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partnerVoucher->modified) ?></td>
        </tr>
    </table>
</div>
