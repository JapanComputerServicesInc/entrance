<h1>出社情報登録</h1>
<br>

<?php
    
    /**
     * FormHelperの宣言
     */
    echo $this->Form->create('EntranceData', array(
        'inputDefaults' => array(
        'disabled'=>$managerCheck
        )
    ));
    
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
    echo $this->Form->select('RECORD_DATE', array($week),array(
        'value' => $selectedDay 
        ,'empty' => false 
        ,'onChange'=>'this.form.submit()'
    ));
    
    /**
     * 表示項目名：出社時間
     * DB項目名　：ENT_TIME
     * 表示する値：時間(24時間形式)
     * 初期表示値：08:00
     */
    echo $this->Form->input('ENT_TIME', array(
        'type' => 'time'
        ,'label' => "<br />".'出社時間：'."<br />"
        ,'timeFormat' => '24' 
        ,'selected' => $enttime
    ));
    
    /**
     * 表示項目名：最初に出社した人
     * DB項目名　：ENT_NAME
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo $this->Form->input('ENT_NAME', array(
        'type' => 'textbox' 
        ,'label' => "<br />".'最初に出社した人：'."<br />"
        ,'required' => false
        ,'default' => ''
        ,'maxLength' => 40
    ));
    
    /**
     * 表示項目名：コメント(気がついたこと)
     * DB項目名　：ENT_COMMENT
     * 表示する値：テキストエリア
     * 初期表示値：空白
     */
    echo $this->Form->input('ENT_COMMENT', array(
        'type'=>'textarea', 
        'label'=>"<br />".'コメント(気がついたこと)：'."<br />" 
        ,'default' => ''
        ,'maxLength' => 400
        ,'required' => false
    ))."<br />";
    
    /**
     * 表示項目名：保存
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：保存
     */
    echo $this->Form->submit('　保　存　', array('name' => 'save', 'disabled'=>$managerCheck))."<br />";
    
    /**
     * 表示項目名：TOPページに戻る
     * DB項目名　：なし
     * 表示する値：リンク
     * 初期表示値：TOPページに戻る
     */
    echo $this->Html->link('TOPページに戻る', array('controller' => 'EntranceDatas', 'action' => 'index'));
    
    /**
     * FormHelperの終了
     */
    echo $this->Form->end(); 
    
?>