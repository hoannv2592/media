<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\CampaignGroup $campaignGroup
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campaign Group'), ['action' => 'edit', $campaignGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campaign Group'), ['action' => 'delete', $campaignGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaignGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Campaign Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campaignGroups view large-9 medium-8 columns content">
    <h3><?= h($campaignGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($campaignGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($campaignGroup->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($campaignGroup->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($campaignGroup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delete Flag') ?></th>
            <td><?= $this->Number->format($campaignGroup->delete_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($campaignGroup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($campaignGroup->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($campaignGroup->description)); ?>
    </div>
</div>
