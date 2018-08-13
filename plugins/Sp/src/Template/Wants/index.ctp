<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Want[]|\Cake\Collection\CollectionInterface $wants
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li>ようこそ<?= $login_user_name ?>さん</li>
        <?= $this->element('side_common'); ?>
    </ul>
</nav>
<div class="wants index large-9 medium-8 columns content">
    <h3><?= __('Wants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wants as $want): ?>
            <tr>
                <td><?= h($want->name) ?></td>
                <td><?= $this->Number->format($want->category_id) ?></td>
                <td><?= $this->Number->format($want->num) ?></td>
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
