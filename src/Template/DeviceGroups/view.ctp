<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device Group'), ['action' => 'edit', $deviceGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device Group'), ['action' => 'delete', $deviceGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Device Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deviceGroups view large-9 medium-8 columns content">
    <h3><?= h($deviceGroup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adgroup') ?></th>
            <td><?= $deviceGroup->has('adgroup') ? $this->Html->link($deviceGroup->adgroup->name, ['controller' => 'Adgroups', 'action' => 'view', $deviceGroup->adgroup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $deviceGroup->has('device') ? $this->Html->link($deviceGroup->device->id, ['controller' => 'Devices', 'action' => 'view', $deviceGroup->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Back Ground') ?></th>
            <td><?= h($deviceGroup->back_ground) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Pass') ?></th>
            <td><?= h($deviceGroup->number_pass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tile Name') ?></th>
            <td><?= h($deviceGroup->tile_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deviceGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deviceGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($deviceGroup->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Path') ?></h4>
        <?= $this->Text->autoParagraph(h($deviceGroup->path)); ?>
    </div>
    <div class="row">
        <h4><?= __('Device Name') ?></h4>
        <?= $this->Text->autoParagraph(h($deviceGroup->device_name)); ?>
    </div>
</div>
