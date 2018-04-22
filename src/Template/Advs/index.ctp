<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Adv'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="advs index large-9 medium-8 columns content">
    <h3><?= __('Advs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url_link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advs as $adv): ?>
            <tr>
                <td><?= $this->Number->format($adv->id) ?></td>
                <td><?= $adv->has('device') ? $this->Html->link($adv->device->id, ['controller' => 'Devices', 'action' => 'view', $adv->device->id]) : '' ?></td>
                <td><?= h($adv->active_flag) ?></td>
                <td><?= h($adv->url_link) ?></td>
                <td><?= h($adv->modified) ?></td>
                <td><?= h($adv->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adv->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adv->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adv->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adv->id)]) ?>
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
