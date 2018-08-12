<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BestItem $bestItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Best Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Wants'), ['controller' => 'Wants', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bestItems form large-9 medium-8 columns content">
    <?= $this->Form->create($bestItem) ?>
    <fieldset>
        <legend><?= __('Add Best Item') ?></legend>
        <?php
            echo $this->Form->label('user_id');
            echo $this->Form->select('user_id', $sel_users);
            echo $this->Form->label('item_id');
            echo $this->Form->select('item_id', $sel_items);
            echo $this->Form->control('want_id', ['options' => $wants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
