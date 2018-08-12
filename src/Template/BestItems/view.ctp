<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BestItem $bestItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <ul>
        <li><?= $this->Html->link(__('Edit Best Item'), ['action' => 'edit', $bestItem->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Best Item'), ['action' => 'delete', $bestItem->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bestItem->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Best Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Best Item'), ['action' => 'add']) ?> </li>
        </ul>
        <?= $this->element('side_common'); ?>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wants'), ['controller' => 'Wants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Want'), ['controller' => 'Wants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bestItems view large-9 medium-8 columns content">
    <h3><?= h($bestItem->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bestItem->has('user') ? $this->Html->link($bestItem->user->name, ['controller' => 'Users', 'action' => 'view', $bestItem->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $bestItem->has('item') ? $this->Html->link($bestItem->item->name, ['controller' => 'Items', 'action' => 'view', $bestItem->item->item_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Want') ?></th>
            <td><?= $bestItem->has('want') ? $this->Html->link($bestItem->want->name, ['controller' => 'Wants', 'action' => 'view', $bestItem->want->want_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bestItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($bestItem->updated) ?></td>
        </tr>
    </table>
</div>
