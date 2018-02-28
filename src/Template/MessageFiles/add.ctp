<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Message Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['controller' => 'AdMessages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad Message'), ['controller' => 'AdMessages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messageFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($messageFile) ?>
    <fieldset>
        <legend><?= __('Add Message File') ?></legend>
        <?php
            echo $this->Form->control('ad_message_id', ['options' => $adMessages]);
            echo $this->Form->control('name');
            echo $this->Form->control('path');
            echo $this->Form->control('active_flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
