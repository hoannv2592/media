<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device File'), ['action' => 'edit', $deviceFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device File'), ['action' => 'delete', $deviceFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Device Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deviceFiles view large-9 medium-8 columns content">
    <h3><?= h($deviceFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $deviceFile->has('device') ? $this->Html->link($deviceFile->device->id, ['controller' => 'Devices', 'action' => 'view', $deviceFile->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deviceFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($deviceFile->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($deviceFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Flag') ?></th>
            <td><?= $deviceFile->active_flag ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('File Name') ?></h4>
        <?= $this->Text->autoParagraph(h($deviceFile->file_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Path') ?></h4>
        <?= $this->Text->autoParagraph(h($deviceFile->path)); ?>
    </div>
</div>
