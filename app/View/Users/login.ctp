<h1>ログイン画面</h1>
<?php //echo $this->html->link('新規登録', array('controller'=>'Users','action'=>'add')); ?>

<?php
    
    /**
     * AppControllerで設定したsessionの呼び出し
     */
    echo $this->Session->flash('Auth');
    
    /**
     * FormHelperの宣言とコントローラーとアクションの指定
     */
    echo $this->Form->create('User');
    echo "<br />";
    
    /**
     * 表示項目名：ユーザー名
     * DB項目名　：username
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('username', array('label' => 'ユーザー名','required' => false))."<br />";
    
    /**
     * 表示項目名：パスワード
     * DB項目名　：password
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('password', array('label' => 'パスワード','required' => false))."<br />";
    
    /**
     * 表示項目名：ログイン
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：ログイン
     */
    echo $this->Form->submit('ログイン');
    
    /**
     * FormHelperの終了
     */
    echo $this->Form->end();
    
?>