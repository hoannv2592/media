<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Log Auths'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logAuths form large-9 medium-8 columns content">
    <?= $this->Form->create($logAuth) ?>
    <fieldset>
        <legend><?= __('Add Log Auth') ?></legend>
        <?php
            echo $this->Form->control('auth');
            echo $this->Form->control('client_mac');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
