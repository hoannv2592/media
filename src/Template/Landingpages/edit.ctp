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
                ['action' => 'delete', $landingpage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $landingpage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Landingpages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="landingpages form large-9 medium-8 columns content">
    <?= $this->Form->create($landingpage) ?>
    <fieldset>
        <legend><?= __('Edit Landingpage') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
