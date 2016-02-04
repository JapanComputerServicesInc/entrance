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
     * FormHelperの宣言
     */
        echo $this->Form->create('User', array(
        'inputDefaults' => array(
        //'class'=> 'form-control'
        ),
    ));


    /**
     * 項目名：ID
     * DB項目名　：id
     * 表示する値：なし
     * 初期表示値：-
     */
    echo $this->Form->input('id',array('type' => 'hidden'));
        
    /**
     * 項目名：ユーザー名
     * DB項目名　：username
     * 表示する値：なし
     * 初期表示値：-
     */
    echo $this->Form->input('username',array('type' => 'hidden'));
    
    /**
     * 表示項目名：パスワード
     * DB項目名　：password
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('password',array('label'=>'新しいパスワード', 'required' => false, 'value'=>''));
    echo '</p>';
    
    /**
     * 表示項目名：パスワード変更ボタン
     */
    echo '<p style="margin-top:20px;">';
    echo $this->Form->button('<span class="glyphicon glyphicon-user"></span>　変更する　', array('class' => 'btn btn-success'));
    echo '</p>';
        

?>



