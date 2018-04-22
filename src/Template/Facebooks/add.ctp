<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Facebooks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['controller' => 'CampaignGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['controller' => 'CampaignGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="facebooks form large-9 medium-8 columns content">
    <?= $this->Form->create($facebook) ?>
    <fieldset>
        <legend><?= __('Add Facebook') ?></legend>
        <?php
            echo $this->Form->control('campaign_group_id', ['options' => $campaignGroups]);
            echo $this->Form->control('confirm');
            echo $this->Form->control('mac');
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
            echo $this->Form->control('link_login_only');
            echo $this->Form->control('birthday');
            echo $this->Form->control('client_mac');
            echo $this->Form->control('apt_device_pass');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('auth_target');
            echo $this->Form->control('role');
            echo $this->Form->control('sex');
            echo $this->Form->control('num_clients_connect');
            echo $this->Form->control('flag_face');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
