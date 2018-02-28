<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Message File'), ['action' => 'edit', $messageFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Message File'), ['action' => 'delete', $messageFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messageFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Message Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['controller' => 'AdMessages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Message'), ['controller' => 'AdMessages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="messageFiles view large-9 medium-8 columns content">
    <h3><?= h($messageFile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ad Message') ?></th>
            <td><?= $messageFile->has('ad_message') ? $this->Html->link($messageFile->ad_message->id, ['controller' => 'AdMessages', 'action' => 'view', $messageFile->ad_message->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($messageFile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($messageFile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($messageFile->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Flag') ?></th>
            <td><?= $messageFile->active_flag ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($messageFile->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Path') ?></h4>
        <?= $this->Text->autoParagraph(h($messageFile->path)); ?>
    </div>
</div>
