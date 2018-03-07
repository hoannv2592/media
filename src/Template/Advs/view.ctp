<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adv'), ['action' => 'edit', $adv->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adv'), ['action' => 'delete', $adv->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adv->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Advs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adv'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="advs view large-9 medium-8 columns content">
    <h3><?= h($adv->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $adv->has('device') ? $this->Html->link($adv->device->id, ['controller' => 'Devices', 'action' => 'view', $adv->device->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url Link') ?></th>
            <td><?= h($adv->url_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adv->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adv->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adv->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Flag') ?></th>
            <td><?= $adv->active_flag ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($adv->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Path') ?></h4>
        <?= $this->Text->autoParagraph(h($adv->path)); ?>
    </div>
</div>
