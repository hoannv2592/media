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
                ['action' => 'delete', $partnerVoucherLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partnerVoucherLog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partner Voucher Logs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['controller' => 'CampaignGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['controller' => 'CampaignGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partnerVoucherLogs form large-9 medium-8 columns content">
    <?= $this->Form->create($partnerVoucherLog) ?>
    <fieldset>
        <legend><?= __('Edit Partner Voucher Log') ?></legend>
        <?php
            echo $this->Form->control('campaign_group_id', ['options' => $campaignGroups, 'empty' => true]);
            echo $this->Form->control('num_clients_connect');
            echo $this->Form->control('client_mac');
            echo $this->Form->control('confirm');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('full_name');
            echo $this->Form->control('birthday');
            echo $this->Form->control('telephone');
            echo $this->Form->control('address');
            echo $this->Form->control('device_id', ['options' => $devices, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
