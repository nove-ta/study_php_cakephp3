<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Want[]|\Cake\Collection\CollectionInterface $wants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php echo $this->element('side_common'); ?>
        <li><?= $this->Html->link(__('New Want'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="wants index large-9 medium-8 columns content">
    <h3><?= __('Wants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('want_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width_min') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width_max') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_depth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_depth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wants as $want): ?>
            <tr>
                <td><?= $this->Number->format($want->want_id) ?></td>
                <td><?= h($want->name) ?></td>
                <td><?= $this->Number->format($want->category_id) ?></td>
                <td><?= $this->Number->format($want->width_min) ?></td>
                <td><?= $this->Number->format($want->width_max) ?></td>
                <td><?= $this->Number->format($want->min_depth) ?></td>
                <td><?= $this->Number->format($want->max_depth) ?></td>
                <td><?= $this->Number->format($want->min_height) ?></td>
                <td><?= $this->Number->format($want->max_height) ?></td>
                <td><?= $this->Number->format($want->num) ?></td>
                <td><?= h($want->created) ?></td>
                <td><?= h($want->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $want->want_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $want->want_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $want->want_id], ['confirm' => __('Are you sure you want to delete # {0}?', $want->want_id)]) ?>
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