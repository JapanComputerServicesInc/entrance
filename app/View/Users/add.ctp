<h1>新規ユーザー登録画面</h1>
<br>
<?php
    
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
    echo $this->Form->input('username',array('label'=>'ユーザー名','required' => false))."<br />";
    
    /**
     * 表示項目名：パスワード
     * DB項目名　：password
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('password',array('label'=>'パスワード','required' => false))."<br />";
    
    /**
     * 表示項目名：新規ユーザを作成する
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：新規ユーザを作成する
     */
    echo $this->Form->submit('新規ユーザを作成する');
    
    /**
     * FormHelperの終了
     */
    echo $this->Form->end();
    
?>
<br>
<a href="../Users/login" id="switch2" class="label btn-primary">ログイン画面へ</a>