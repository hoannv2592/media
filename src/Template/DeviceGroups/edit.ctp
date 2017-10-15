<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deviceGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deviceGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Device Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($deviceGroup) ?>
    <fieldset>
        <legend><?= __('Edit Device Group') ?></legend>
        <?php
            echo $this->Form->control('adgroup_id', ['options' => $adgroups, 'empty' => true]);
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
            echo $this->Form->control('back_ground');
            echo $this->Form->control('path');
            echo $this->Form->control('number_pass');
            echo $this->Form->control('tile_name');
            echo $this->Form->control('device_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
