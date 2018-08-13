<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Want $want
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <ul>
        <li><?= $this->Html->link(__('Edit Want'), ['action' => 'edit', $want->want_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Want'), ['action' => 'delete', $want->want_id], ['confirm' => __('Are you sure you want to delete # {0}?', $want->want_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Want'), ['action' => 'add']) ?> </li>
        </ul>
        <?= $this->element('side_common'); ?>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wants view large-9 medium-8 columns content">
    <h3><?= h($want->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($want->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $want->has('category') ? $this->Html->link($want->category->name, ['controller' => 'Categories', 'action' => 'view', $want->category->category_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Want Id') ?></th>
            <td><?= $this->Number->format($want->want_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($want->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width Min') ?></th>
            <td><?= $this->Number->format($want->width_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width Max') ?></th>
            <td><?= $this->Number->format($want->width_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Depth Min') ?></th>
            <td><?= $this->Number->format($want->depth_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Depth Max') ?></th>
            <td><?= $this->Number->format($want->depth_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height Min') ?></th>
            <td><?= $this->Number->format($want->height_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height Max') ?></th>
            <td><?= $this->Number->format($want->height_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num') ?></th>
            <td><?= $this->Number->format($want->num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($want->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($want->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Memo') ?></h4>
        <?= $this->Text->autoParagraph(h($want->memo)); ?>
    </div>
</div>
