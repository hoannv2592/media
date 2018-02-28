<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Message'), ['action' => 'edit', $adMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Message'), ['action' => 'delete', $adMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Message'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adMessages view large-9 medium-8 columns content">
    <h3><?= h($adMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Button Backgroud') ?></th>
            <td><?= h($adMessage->button_backgroud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Button Popup') ?></th>
            <td><?= h($adMessage->button_popup) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Backgroud') ?></th>
            <td><?= h($adMessage->backgroud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Options') ?></th>
            <td><?= h($adMessage->options) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adMessage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adMessage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adMessage->modified) ?></td>
        </tr>
    </table>
</div>
