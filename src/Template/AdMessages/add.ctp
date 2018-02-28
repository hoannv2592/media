<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($adMessage) ?>
    <fieldset>
        <legend><?= __('Add Ad Message') ?></legend>
        <?php
            echo $this->Form->control('button_backgroud');
            echo $this->Form->control('button_popup');
            echo $this->Form->control('backgroud');
            echo $this->Form->control('options');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
