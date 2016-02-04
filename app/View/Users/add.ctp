<div class="page-header">
    <h3><?php echo $title_for_layout; ?></h3>
</div>

<?php

    echo $this->Session->flash();
    /**
     * AppControllerで設定したsessionの呼び出し
     */
    echo $this->Session->flash('Auth');
        
    /**
     * FormHelperの宣言とコントローラーとアクションの指定
     */
    echo $this->Form->create('User', array('action' => 'add'));
    
    /**
     * 表示項目名：ユーザー名
     * DB項目名　：username
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('username',array('label'=>'ユーザー名','required' => false));
    echo '</p>';
    
    /**
     * 表示項目名：パスワード
     * DB項目名　：password
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('password',array('label'=>'パスワード','required' => false));
    echo '</p>';
    
    /**
     * 表示項目名：ユーザー作成ボタン
     */
    echo '<p style="margin-top:20px;">';
    echo $this->Form->button('<span class="glyphicon glyphicon-user"></span>　ユーザーを作成する　', array('class' => 'btn btn-success'));
    echo '</p>';


    /**
     * FormHelperの終了
     */
    echo $this->Form->end();
    
?>
