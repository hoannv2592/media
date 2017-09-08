<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adgroups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="adgroups form large-9 medium-8 columns content">
    <?= $this->Form->create($adgroup) ?>
    <fieldset>
        <legend><?= __('Add Adgroup') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
