<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Log Auth'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logAuths index large-9 medium-8 columns content">
    <h3><?= __('Log Auths') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_mac') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logAuths as $logAuth): ?>
            <tr>
                <td><?= $this->Number->format($logAuth->id) ?></td>
                <td><?= h($logAuth->auth) ?></td>
                <td><?= h($logAuth->client_mac) ?></td>
                <td><?= h($logAuth->created) ?></td>
                <td><?= h($logAuth->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $logAuth->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logAuth->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logAuth->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logAuth->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
