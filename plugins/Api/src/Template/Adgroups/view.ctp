<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Adgroup $adgroup
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adgroup'), ['action' => 'edit', $adgroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adgroup'), ['action' => 'delete', $adgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adgroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adgroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adgroup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adgroups view large-9 medium-8 columns content">
    <h3><?= h($adgroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($adgroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adgroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adgroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($adgroup->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($adgroup->description)); ?>
    </div>
</div>
