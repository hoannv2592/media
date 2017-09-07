<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Landingpages'), ['controller' => 'Landingpages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Landingpage'), ['controller' => 'Landingpages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Service Groups'), ['controller' => 'ServiceGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service Group'), ['controller' => 'ServiceGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('status');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('delete_flag');
            echo $this->Form->control('phone');
            echo $this->Form->control('adgroup_id', ['options' => $adgroups]);
            echo $this->Form->control('address');
            echo $this->Form->control('role');
            echo $this->Form->control('landingpage_id', ['options' => $landingpages]);
            echo $this->Form->control('device_id', ['options' => $devices]);
            echo $this->Form->control('service_group_id', ['options' => $serviceGroups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
