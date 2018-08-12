<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BestItem $bestItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bestItem->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bestItem->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Best Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wants'), ['controller' => 'Wants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Want'), ['controller' => 'Wants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bestItems form large-9 medium-8 columns content">
    <?= $this->Form->create($bestItem) ?>
    <fieldset>
        <legend><?= __('Edit Best Item') ?></legend>
        <?php
            echo $this->Form->control('want_id', ['options' => $wants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
