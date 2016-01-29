<?php echo $this->Html->script( '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>
<?php echo $this->Html->script('changeDisabled.js'); ?>
<?php echo $this->Html->script('checkAll.js'); ?>

<script type="text/javascript">
<!--
// ページを表示したとき、changeDisabled() を呼び出す
//※退社情報登録画面にアクセスした時、「その他」が選択されていたらテキストを入力出来るようにする為
window.onload = changeDisabled;

// -->
</script>

<div class="page-header">
    <h3><?php echo $title_for_layout; ?></h3>
</div>

<?php
    
    echo $this->Session->flash();
    
    echo $this->Form->create('EntranceData', 
        array(
            'name' => 'usedKey',
            'inputDefaults' => array(
                'disabled' => $managerCheck
                ,'class' => 'form-control'
            )
        )
    ); 
    
    /**
     * 表示項目名：なし
     * DB項目名　：ID
     * 表示する値：なし
     * 初期表示値：なし
     */
    echo $this->Form->input('ID');
    
    /**
     * 表示項目名：なし
     * DB項目名　：RECORD_DATE
     * 表示する値：7日分のデータ
     * 初期表示値：$selectedDay
     */
    echo '<p>';
    echo $this->Form->select('RECORD_DATE', array($week), array(
        'value' => $selectedDay 
        ,'empty' => false
        ,'onChange'=>'this.form.submit()'
        ,'class'=> 'form-control'
    ));
    echo '</p>';
    
    /**
     * 表示項目名：退社時間
     * DB項目名　：LEAVE_TIME
     * 表示する値：時間(24時間形式)
     * 初期表示値：20:00
     */
    echo '<p>';
    echo $this->Form->input('LEAVE_TIME', array(
        'type' => 'time' 
        ,'label' => '退社時間' 
        ,'timeFormat' => '24'
        ,'selected' => $leavetime
    ));
    echo '</p>';
    
    /**
     * 表示項目名：最後に退社した人
     * DB項目名　：LEAVE_NAME
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('LEAVE_NAME', array(
        'type' => 'textbox' 
        ,'label' => '最後に退社した人' 
        ,'required' => false 
        ,'default' => ''
        ,'maxLength' => 40
    ));
    echo '</p>'; 
    echo '<p>';
    echo '<label>チェック項目&nbsp;&nbsp;</label>';
    /**
     * JQueryで設定したアクションを実行する為のボタン
     */
    echo $this->Form->button('全て選択', array(
        'type' => 'button'
       ,'id' => 'all_check'
       ,'disabled'=>$managerCheck 
       ,'class' => 'btn btn-primary '
    ));
    echo '</p>';    
    
    /**
     * 表示項目名：クリアデスク
     * DB項目名　：LEAVE_CLEAR
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_CLEAR', array( 
        'type' => 'checkbox' 
        ,'label' => 'クリアデスク'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：室内の窓を施錠
     * DB項目名　：LEAVE_WINDOW
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_WINDOW', array( 
        'type' => 'checkbox' 
        ,'label' => '室内の窓を施錠'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：プリンタの電源OFF
     * DB項目名　：LEAVE_PRINTER
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_PRINTER', array( 
        'type' => 'checkbox' 
        ,'label' => 'プリンタの電源OFF'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：加湿器(冬期)電源OFF
     * DB項目名　：LEAVE_HUMID
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_HUMID', array( 
        'type' => 'checkbox' 
        ,'label' => '加湿器(冬期)電源OFF'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：FAX・コピー確認(紙は残っていないか)
     * DB項目名　：LEAVE_FAX
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_FAX', array( 
        'type' => 'checkbox' 
        ,'label' => 'FAX・コピー確認(紙は残っていないか)'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：エアコンの電源OFF
     * DB項目名　：LEAVE_AIRCON
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_AIRCON', array( 
        'type' => 'checkbox' 
        ,'label' => 'エアコンの電源OFF'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：サーバー室のエアコンの電源ON
     * DB項目名　：LEAVE_SEAIRCON
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_SEAIRCON', array( 
        'type' => 'checkbox' 
        ,'label' => 'サーバー室のエアコンの電源ON'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：全室内の消灯
     * DB項目名　：LEAVE_LIGHT
     * 表示する値：チェックボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('LEAVE_LIGHT', array( 
        'type' => 'checkbox' 
        ,'label' => '全室内の消灯'
        ,'default' => ''
        ,'class' => 'leavecheck'
    ));
    
    /**
     * 表示項目名：自分用、最終退室用、その他
     * DB項目名　：LEAVE_KEY
     * 表示する値：ラジオボタン
     * 初期表示値：(1)最終退室用
     */
    echo '<p style="margin-top:15px;"><label>使用した鍵</label>';
    echo '<div class = "input radio">';
    $options = array('1' => '最終退室用', '2' => '自分用', '3' => 'その他');
    $attributes = array('legend' => false 
                        ,'onClick' => 'changeDisabled()', 'default' => 1,'class' => false, 'separator'=>'<br>'
                        ,'required' => false, 'disabled'=>$managerCheck);
    echo $this->Form->radio('LEAVE_KEY', $options, $attributes);
    echo $this->Form->error('LEAVE_KEY', '必ず選択してください。');
    echo '</div>';
    
    /**
     * 表示項目名：なし
     * DB項目名　：LEAVE_COMMENT
     * 表示する値：テキストエリア
     * 初期表示値：空白
     */
    echo '';
    echo $this->Form->input('LEAVE_COMMENT', array(
        'type'=>'textbox'
        ,'label'=>false
        ,'disabled'=>true
        ,'required' => false
        ,'maxLength' => 100
    ));
    echo '</p>';
        
    echo '<pre>';
    echo '<label>最終退出時の注意</label>';
    echo '<p>*出入り口の施錠は確実に行うこと<br />';
    echo '*エントランスのカード操作で監視体制にすること<br />';
    echo '*エレベーターホールの消灯をすること</p>';
    echo'</pre>';

    /**
     * 表示項目名：保存
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：保存
     */
 
    echo '<p style="margin-bottom:30px;">';
    echo $this->Form->button('<span class="glyphicon glyphicon-send"></span>　保存　', array('name' => 'save', 'class' => 'btn btn-success btn-block btn-lg',  'disabled'=>$managerCheck));
    echo '</p>';

    /**
     * FormHelperの終了
     */
    echo $this->Form->end(); 

?>