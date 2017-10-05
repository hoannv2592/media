<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Partners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partners form large-9 medium-8 columns content">
    <?= $this->Form->create($partner) ?>
    <fieldset>
        <legend><?= __('Add Partner') ?></legend>
        <?php
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
            echo $this->Form->control('client_mac');
            echo $this->Form->control('auth_target');
            echo $this->Form->control('apt_device_number');
            echo $this->Form->control('num_clients_connect');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
