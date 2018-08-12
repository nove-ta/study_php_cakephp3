<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Want $want
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wants form large-9 medium-8 columns content">
    <?= $this->Form->create($want) ?>
    <fieldset>
        <legend><?= __('Add Want') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('width_min');
            echo $this->Form->control('width_max');
            echo $this->Form->control('depth_min');
            echo $this->Form->control('depth_max');
            echo $this->Form->control('height_min');
            echo $this->Form->control('height_max');
            echo $this->Form->control('num');
            echo $this->Form->control('memo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
