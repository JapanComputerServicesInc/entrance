<div class="page-header">
    <h3><?php echo $title_for_layout; ?></h3>
</div>

<?php
    
    echo $this->Session->flash();
    
    /**
     * FormHelperの宣言
     */
    echo $this->Form->create('EntranceData', array(
        'inputDefaults' => array(
        'disabled'=>$managerCheck
        ,'class'=> 'form-control'
        ),
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
    echo '<p>';
    echo $this->Form->select('RECORD_DATE', array($week),array(
        'value' => $selectedDay 
        ,'empty' => false 
        ,'onChange'=>'this.form.submit()'
        ,'class'=> 'form-control'
    ));
    echo '</p>';
    
    /**
     * 表示項目名：出社時間
     * DB項目名　：ENT_TIME
     * 表示する値：時間(24時間形式)
     * 初期表示値：08:00
     */
    echo '<p>';
    echo $this->Form->input('ENT_TIME', array(
        'type' => 'time'
        ,'label' => '出社時間'
        ,'timeFormat' => '24' 
        ,'selected' => $enttime
    ));
    echo '</p>';
    
    /**
     * 表示項目名：最初に出社した人
     * DB項目名　：ENT_NAME
     * 表示する値：テキストボックス
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('ENT_NAME', array(
        'type' => 'textbox' 
        ,'label' => '最初に出社した人'
        ,'required' => false
        ,'default' => ''
        ,'maxLength' => 40
    ));
    echo '</p>';
    
    /**
     * 表示項目名：コメント(気がついたこと)
     * DB項目名　：ENT_COMMENT
     * 表示する値：テキストエリア
     * 初期表示値：空白
     */
    echo '<p>';
    echo $this->Form->input('ENT_COMMENT', array(
        'type'=>'textarea', 
        'label'=>'コメント(気がついたこと)' 
        ,'default' => ''
        ,'maxLength' => 400
        ,'required' => false
    ));
    echo '</p>';
    
    /**
     * 表示項目名：保存
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：保存
     */
    echo '<p style="margin-bottom:30px;">';
    echo $this->Form->button('<span class="glyphicon glyphicon-pencil"></span>　保存　', array('name' => 'save', 'class' => 'btn btn-success btn-block btn-lg',  'disabled'=>$managerCheck));
    echo '</p>';

    /**
     * FormHelperの終了
     */
    echo $this->Form->end(); 
   
    
?>