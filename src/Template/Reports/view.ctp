<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Report'), ['action' => 'edit', $report->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Report'), ['action' => 'delete', $report->id], ['confirm' => __('Are you sure you want to delete # {0}?', $report->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reports view large-9 medium-8 columns content">
    <h3><?= h($report->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tile Congratulations') ?></th>
            <td><?= h($report->tile_congratulations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($report->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($report->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $report->has('device') ? $this->Html->link($report->device->id, ['controller' => 'Devices', 'action' => 'view', $report->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Backgroup') ?></th>
            <td><?= h($report->image_backgroup) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tile Name') ?></th>
            <td><?= h($report->tile_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apt Device Number') ?></th>
            <td><?= h($report->apt_device_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($report->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Random') ?></th>
            <td><?= $this->Number->format($report->random) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Voucher') ?></th>
            <td><?= $this->Number->format($report->number_voucher) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete Flag') ?></th>
            <td><?= $this->Number->format($report->delete_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Langdingpage Id') ?></th>
            <td><?= $this->Number->format($report->langdingpage_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id Campaign Group') ?></th>
            <td><?= $this->Number->format($report->user_id_campaign_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($report->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($report->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Path') ?></h4>
        <?= $this->Text->autoParagraph(h($report->path)); ?>
    </div>
    <div class="row">
        <h4><?= __('Device Name') ?></h4>
        <?= $this->Text->autoParagraph(h($report->device_name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($report->message)); ?>
    </div>
    <div class="row">
        <h4><?= __('Slogan') ?></h4>
        <?= $this->Text->autoParagraph(h($report->slogan)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($report->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($report->address)); ?>
    </div>
</div>
