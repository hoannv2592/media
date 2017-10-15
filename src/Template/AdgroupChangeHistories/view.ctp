<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adgroup Change History'), ['action' => 'edit', $adgroupChangeHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adgroup Change History'), ['action' => 'delete', $adgroupChangeHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adgroupChangeHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adgroup Change Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adgroup Change History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adgroupChangeHistories view large-9 medium-8 columns content">
    <h3><?= h($adgroupChangeHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adgroup') ?></th>
            <td><?= $adgroupChangeHistory->has('adgroup') ? $this->Html->link($adgroupChangeHistory->adgroup->name, ['controller' => 'Adgroups', 'action' => 'view', $adgroupChangeHistory->adgroup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adgroupChangeHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adgroupChangeHistory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adgroupChangeHistory->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Contents') ?></h4>
        <?= $this->Text->autoParagraph(h($adgroupChangeHistory->contents)); ?>
    </div>
</div>
