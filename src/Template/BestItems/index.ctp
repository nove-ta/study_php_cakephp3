<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BestItem[]|\Cake\Collection\CollectionInterface $bestItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li>ようこそ<?= $login_user_name ?>さん</li>
        <li class="heading"><?= __('Actions') ?></li>
        <ul>
        <li><?= $this->Html->link(__('New Best Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        </ul>
        <?= $this->element('side_common'); ?>
    </ul>
</nav>
<div class="bestItems index large-9 medium-8 columns content">
    <h3><?= __('Best Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('want_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bestItems as $bestItem): ?>
            <tr>
                <td><?= $bestItem->has('user') ? $this->Html->link($bestItem->user->name, ['controller' => 'Users', 'action' => 'view', $bestItem->user->user_id]) : '' ?></td>
                <td><?= $bestItem->has('item') ? $this->Html->link($bestItem->item->name, ['controller' => 'Items', 'action' => 'view', $bestItem->item->item_id]) : '' ?></td>
                <td><?= $bestItem->has('want') ? $this->Html->link($bestItem->want->name, ['controller' => 'Wants', 'action' => 'view', $bestItem->want->want_id]) : '' ?></td>
                <td><?= h($bestItem->created) ?></td>
                <td><?= h($bestItem->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bestItem->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bestItem->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bestItem->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bestItem->user_id)]) ?>
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
