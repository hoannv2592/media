<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Landingpage $landingpage
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Landingpage'), ['action' => 'edit', $landingpage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Landingpage'), ['action' => 'delete', $landingpage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landingpage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Landingpages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Landingpage'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="landingpages view large-9 medium-8 columns content">
    <h3><?= h($landingpage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($landingpage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($landingpage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($landingpage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($landingpage->updated) ?></td>
        </tr>
    </table>
</div>
