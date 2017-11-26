<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reports form large-9 medium-8 columns content">
    <?= $this->Form->create($report) ?>
    <fieldset>
        <legend><?= __('Add Report') ?></legend>
        <?php
            echo $this->Form->control('tile_congratulations');
            echo $this->Form->control('random');
            echo $this->Form->control('name');
            echo $this->Form->control('time');
            echo $this->Form->control('number_voucher');
            echo $this->Form->control('path');
            echo $this->Form->control('device_name');
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
            echo $this->Form->control('delete_flag');
            echo $this->Form->control('image_backgroup');
            echo $this->Form->control('tile_name');
            echo $this->Form->control('langdingpage_id');
            echo $this->Form->control('message');
            echo $this->Form->control('slogan');
            echo $this->Form->control('description');
            echo $this->Form->control('apt_device_number');
            echo $this->Form->control('address');
            echo $this->Form->control('user_id_campaign_group');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
