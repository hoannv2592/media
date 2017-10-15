<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Device Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceGroups index large-9 medium-8 columns content">
    <h3><?= __('Device Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adgroup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('back_ground') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number_pass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tile_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deviceGroups as $deviceGroup): ?>
            <tr>
                <td><?= $this->Number->format($deviceGroup->id) ?></td>
                <td><?= $deviceGroup->has('adgroup') ? $this->Html->link($deviceGroup->adgroup->name, ['controller' => 'Adgroups', 'action' => 'view', $deviceGroup->adgroup->id]) : '' ?></td>
                <td><?= h($deviceGroup->back_ground) ?></td>
                <td><?= h($deviceGroup->number_pass) ?></td>
                <td><?= h($deviceGroup->tile_name) ?></td>
                <td><?= h($deviceGroup->created) ?></td>
                <td><?= h($deviceGroup->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $deviceGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deviceGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deviceGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deviceGroup->id)]) ?>
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
