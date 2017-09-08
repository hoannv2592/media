<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Service Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="serviceGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($serviceGroup) ?>
    <fieldset>
        <legend><?= __('Add Service Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('delete_flag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
