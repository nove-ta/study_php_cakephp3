<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php echo $this->element('side_common'); ?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Samples') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ばらけ具合</th>
                <th scope="col">例</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>mt_rand()</td>
                <td><?= count($rand_same_list) ?>/1000</td>
                <td><?=implode(',', array_slice($rand_list,0,10)) ?></td>
            </tr>
            <tr>
                <td>random_int()</td>
                <td><?= count($new_rand_same_list) ?>/1000</td>
                <td><?= implode(',', array_slice($new_rand_list,0,10)) ?></td>
            </tr>
        </tbody>
    </table>
</div>
