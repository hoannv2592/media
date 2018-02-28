<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Message'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adMessages index large-9 medium-8 columns content">
    <h3><?= __('Ad Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('button_backgroud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('button_popup') ?></th>
                <th scope="col"><?= $this->Paginator->sort('backgroud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('options') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adMessages as $adMessage): ?>
            <tr>
                <td><?= $this->Number->format($adMessage->id) ?></td>
                <td><?= h($adMessage->button_backgroud) ?></td>
                <td><?= h($adMessage->button_popup) ?></td>
                <td><?= h($adMessage->backgroud) ?></td>
                <td><?= h($adMessage->options) ?></td>
                <td><?= h($adMessage->created) ?></td>
                <td><?= h($adMessage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adMessage->id)]) ?>
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
