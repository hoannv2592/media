<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Facebook'), ['action' => 'edit', $facebook->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Facebook'), ['action' => 'delete', $facebook->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facebook->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Facebooks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facebook'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['controller' => 'CampaignGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['controller' => 'CampaignGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facebooks view large-9 medium-8 columns content">
    <h3><?= h($facebook->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Campaign Group') ?></th>
            <td><?= $facebook->has('campaign_group') ? $this->Html->link($facebook->campaign_group->name, ['controller' => 'CampaignGroups', 'action' => 'view', $facebook->campaign_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mac') ?></th>
            <td><?= h($facebook->mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($facebook->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($facebook->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $facebook->has('device') ? $this->Html->link($facebook->device->id, ['controller' => 'Devices', 'action' => 'view', $facebook->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link Login Only') ?></th>
            <td><?= h($facebook->link_login_only) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($facebook->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Mac') ?></th>
            <td><?= h($facebook->client_mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apt Device Pass') ?></th>
            <td><?= h($facebook->apt_device_pass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($facebook->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($facebook->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auth Target') ?></th>
            <td><?= h($facebook->auth_target) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($facebook->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($facebook->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirm') ?></th>
            <td><?= $this->Number->format($facebook->confirm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sex') ?></th>
            <td><?= $this->Number->format($facebook->sex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Clients Connect') ?></th>
            <td><?= $this->Number->format($facebook->num_clients_connect) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Flag Face') ?></th>
            <td><?= $this->Number->format($facebook->flag_face) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($facebook->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($facebook->modified) ?></td>
        </tr>
    </table>
</div>
