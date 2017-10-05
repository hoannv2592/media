<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partner'), ['action' => 'edit', $partner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partner'), ['action' => 'delete', $partner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partners view large-9 medium-8 columns content">
    <h3><?= h($partner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $partner->has('device') ? $this->Html->link($partner->device->id, ['controller' => 'Devices', 'action' => 'view', $partner->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Mac') ?></th>
            <td><?= h($partner->client_mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth Target') ?></th>
            <td><?= h($partner->auth_target) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apt Device Number') ?></th>
            <td><?= h($partner->apt_device_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Clients Connect') ?></th>
            <td><?= h($partner->num_clients_connect) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($partner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partner->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partner->modified) ?></td>
        </tr>
    </table>
</div>
