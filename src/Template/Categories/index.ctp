<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li>ようこそ<?= $login_user_name ?>さん</li>
        <li class="heading"><?= __('Actions') ?></li>
        <ul>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
    <?= $this->element('side_common'); ?>
    </ul>
</nav>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_depth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->category_id) ?></td>
                <td><?= h($category->name) ?></td>
                <td><?= $this->Number->format($category->is_width) ?></td>
                <td><?= $this->Number->format($category->is_depth) ?></td>
                <td><?= $this->Number->format($category->is_height) ?></td>
                <td><?= h($category->created) ?></td>
                <td><?= h($category->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->category_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->category_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->category_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
