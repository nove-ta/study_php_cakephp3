<style type="text/css">
    /*アコーディオンメニュー*/
    .accbox {
        margin: 2em 0;
        padding: 0;
        max-width: 400px;/*最大幅*/
    }

    /*ラベル*/
    .accbox label {
        display: block;
        margin: 1.5px 0;
        padding : 11px 12px;
        color :#2398A4;
        font-weight: bold;
        /* background :#a4cbf3; */
        cursor :pointer;
        transition: all 0.5s;
    }

    /*ラベルホバー時*/
    .accbox label:hover {
        background :#85baef;
    }

    /*チェックは隠す*/
    .accbox input {
        display: none;
    }

    /*中身を非表示にしておく*/
    .accbox .accshow {
        height: 0;
        padding: 0;
        overflow: hidden;
        opacity: 0;
        transition: 0.8s;
    }

    /*クリックで中身表示*/
    .cssacc:checked + .accshow {
        height: auto;
        padding: 5px;
        background: #eaeaea;
        opacity: 1;
    }
</style>

<div class="accbox">
    <label for="label1"><?= __('Commons') ?></label>
    <input type="checkbox" id="label1" class="cssacc" />
    <div class="accshow">
        <ul>
        <li><?= $this->Html->link(__('欲しいものリスト'), ['controller'=>'wants','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('見つけたアイテム'), ['controller'=>'items','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('カテゴリ'), ['controller'=>'categories','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('ユーザ一覧'), ['controller'=>'users','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Sample'), ['controller'=>'samples','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('ログアウト'), ['controller'=>'users','action' => 'logout']) ?></li>
        </ul>
    </div>
</div><!--//.accbox-->