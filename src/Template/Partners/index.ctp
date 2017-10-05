<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partner'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partners index large-9 medium-8 columns content">
    <h3><?= __('Partners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_mac') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auth_target') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apt_device_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_clients_connect') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partners as $partner): ?>
            <tr>
                <td><?= $this->Number->format($partner->id) ?></td>
                <td><?= $partner->has('device') ? $this->Html->link($partner->device->id, ['controller' => 'Devices', 'action' => 'view', $partner->device->id]) : '' ?></td>
                <td><?= h($partner->client_mac) ?></td>
                <td><?= h($partner->auth_target) ?></td>
                <td><?= h($partner->apt_device_number) ?></td>
                <td><?= h($partner->num_clients_connect) ?></td>
                <td><?= h($partner->created) ?></td>
                <td><?= h($partner->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partner->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partner->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partner->id)]) ?>
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
