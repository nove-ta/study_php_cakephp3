<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->item_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->item_id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->item_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($item->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($item->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $item->has('category') ? $this->Html->link($item->category->name, ['controller' => 'Categories', 'action' => 'view', $item->category->category_id]) : '' ?></td>
        </tr>
        <?php if($item->category->is_width){ ?>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($item->width) ?></td>
        </tr>
        <?php } ?>
        <?php if($item->category->is_depth){ ?>
        <tr>
            <th scope="row"><?= __('Depth') ?></th>
            <td><?= $this->Number->format($item->depth) ?></td>
        </tr>
        <?php } ?>
        <?php if($item->category->is_height){ ?>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($item->height) ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th scope="row"><?= __('Num') ?></th>
            <td><?= $this->Number->format($item->num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($item->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($item->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <b><?= __('Memo') ?></b>
        <?= $this->Text->autoParagraph(h($item->memo)); ?>
    </div>
    <h3>マッチしたアイテム</h3>
    <table class="vertical-table">
        <?php foreach ($wants as $want): ?>
        <tr>
            <th scope="row"><?= $this->Html->link($want->name, ['controller' => 'wants', 'action' => 'view', $want->want_id]) ?></th>
            <td><?= $want->is_match ? 'マッチ' : 'ミスマッチ' ?></td>
            <td><?= $want->is_best_match ? 'ベストマッチ' : $this->Html->link('これがベストマッチ', ['controller' => 'items', 'action' => 'match', $item->item_id, $want->want_id]) ?></td>
        </tr>
        <br/>
        <?php endforeach ?>
    </table>
    <?= $this->element('footer_common'); ?>
</div>
