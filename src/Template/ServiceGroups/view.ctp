<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ServiceGroup $serviceGroup
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service Group'), ['action' => 'edit', $serviceGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service Group'), ['action' => 'delete', $serviceGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Service Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serviceGroups view large-9 medium-8 columns content">
    <h3><?= h($serviceGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($serviceGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($serviceGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete Flag') ?></th>
            <td><?= $this->Number->format($serviceGroup->delete_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($serviceGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($serviceGroup->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($serviceGroup->description)); ?>
    </div>
</div>
