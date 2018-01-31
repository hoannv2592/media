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
                ['action' => 'delete', $deviceFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deviceFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Device Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deviceFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($deviceFile) ?>
    <fieldset>
        <legend><?= __('Edit Device File') ?></legend>
        <?php
            echo $this->Form->control('device_id', ['options' => $devices]);
            echo $this->Form->control('file_name');
            echo $this->Form->control('path');
            echo $this->Form->control('active_flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
