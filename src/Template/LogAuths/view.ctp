<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Log Auth'), ['action' => 'edit', $logAuth->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Log Auth'), ['action' => 'delete', $logAuth->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logAuth->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Log Auths'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log Auth'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logAuths view large-9 medium-8 columns content">
    <h3><?= h($logAuth->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Auth') ?></th>
            <td><?= h($logAuth->auth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Mac') ?></th>
            <td><?= h($logAuth->client_mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logAuth->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($logAuth->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($logAuth->modified) ?></td>
        </tr>
    </table>
</div>
