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
                ['action' => 'delete', $adgroupChangeHistory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adgroupChangeHistory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adgroup Change Histories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adgroups'), ['controller' => 'Adgroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adgroup'), ['controller' => 'Adgroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adgroupChangeHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($adgroupChangeHistory) ?>
    <fieldset>
        <legend><?= __('Edit Adgroup Change History') ?></legend>
        <?php
            echo $this->Form->control('adgroup_id', ['options' => $adgroups, 'empty' => true]);
            echo $this->Form->control('contents');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
