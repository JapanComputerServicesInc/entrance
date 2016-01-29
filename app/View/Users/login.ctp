<div class="page-header">
    <h3><?php echo $title_for_layout; ?></h3>
</div>

<?php //echo $this->html->link('新規登録', array('controller'=>'Users','action'=>'add')); ?>

<?php

    echo $this->Session->flash();
    /**
     * AppControllerで設定したsessionの呼び出し
     */
    echo $this->Session->flash('Auth');
    
    /**
     * FormHelperの宣言
     */
        echo $this->Form->create('User', array(
        'inputDefaults' => array(
        //'class'=> 'form-control'
        ),
    ));

    /**
     * 表示項目名：ユーザー名
     * DB項目名　：username
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('username', array('label' => 'ユーザー名','required' => false))."";
    echo '</p>';
    
    /**
     * 表示項目名：パスワード
     * DB項目名　：password
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('password', array('label' => 'パスワード','required' => false))."";
    echo '</p>';
    
    /**
     * 表示項目名：ログイン
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：ログイン
     */
//    echo $this->Form->submit('ログイン');

    echo '<p style="margin-top:20px;">';
    echo $this->Form->button('<span class="glyphicon glyphicon-user"></span>　ログイン　', array('class' => 'btn btn-success'));
    echo '</p>';

    
    /**
     * FormHelperの終了
     */
    echo $this->Form->end();
    
?>
