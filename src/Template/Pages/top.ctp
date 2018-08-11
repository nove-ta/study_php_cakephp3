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
    </ul>
</nav>
<div class="wants index large-9 medium-8 columns content">
    <h3><?= __('Top') ?></h3>
</div>
