<li class="heading"><?= __('Commons') ?></li>
<ul>
<li><?= $this->Html->link(__('欲しいものリスト'), ['controller'=>'wants','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('見つけたアイテム'), ['controller'=>'items','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('カテゴリ'), ['controller'=>'categories','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('ユーザ一覧'), ['controller'=>'users','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Sample'), ['controller'=>'samples','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('ログアウト'), ['controller'=>'users','action' => 'logout']) ?></li>
</ul>