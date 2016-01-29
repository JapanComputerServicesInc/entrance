<div class="page-header">
    <h3><?php echo $title_for_layout; ?></h3>
</div>

<?php
    
    /**
     * FormHelperの宣言
     */
    echo $this->Form->create('EntranceData');
    
    /**
     * 表示項目名：なし
     * DB項目名　：ID
     * 表示する値：なし
     * 初期表示値：なし
     */
    echo $this->Form->input('ID');
    
    
    /**
     * 表示項目名：なし
     * DB項目名　：なし
     * 表示する値：3年分のデータ
     * 初期表示値：$thisyear
     */  
    echo '<p>';
    echo $this->Form->select('select1', array($year), array(
        'value' => $thisyear
        ,'empty' => false 
        ,'class'=> 'form-control'
    ));
    echo '</p>';
    
    /**
     * 表示項目名：なし
     * DB項目名　：なし
     * 表示する値：12ヶ月分のデータ
     * 初期表示値：$thismonth
     */
    echo '<p>';
    echo $this->Form->select('select2',array(
             "01" => '1月'
            ,"02" => '2月'
            ,"03" => '3月'
            ,"04" => '4月'
            ,"05" => '5月'
            ,"06" => '6月'
            ,"07" => '7月'
            ,"08" => '8月'
            ,"09" => '9月'
            ,"10" => '10月'
            ,"11" => '11月'
            ,"12" => '12月'
        ),array(
            'empty' => false
            ,'value' => $thismonth
            ,'class'=> 'form-control'
    ));
    echo '</p>';
    
    /**
     * 表示項目名：全ての日付を表示、入力されていない日付のみ表示、管理者確認がされていない日付のみ表示
     * DB項目名　：なし
     * 表示する値：ラジオボタン
     * 初期表示値：全ての日付を表示
     */
    echo '<pre>';
    echo '<div class = "input radio">';
    $options = array('1' => '全ての日付を表示', '2' => '入力されていない日付のみ表示', '3' => '管理者確認がされていない日付のみ表示');
    $attributes = array('legend' => false, 'value' => $select_btn, 'class' => false, 'separator'=>'<br>');
    echo $this->Form->radio('selectbutton', $options, $attributes);
    echo '</div>';
    echo '</pre>';
    
    
    /**
     * 表示項目名：表示
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：表示
     */
    echo '<p>';
    echo $this->Form->button('<span class="glyphicon glyphicon-glass"></span>　表示　', array('name' => 'display', 'class' => 'btn btn-primary btn-block'));
    echo '</p>';
    
    
    /**
     * 結果一覧の表示
     */
    echo "<div style='margin-top:30px;text-align:center;'>";
    echo "<table class='table table-bordered table-hover'>";
    echo "<tr>";
    echo "<th class='active'><div class='text-center''>日付</div></th>";
    echo "<th class='active'><div class='text-center''>入力状況</div></th>";
    echo "<th class='active'><div class='text-center''>確認状況</div></th>";
    echo "</tr>";
    echo $resultset;
    echo "</table>";
    
    
    /**
     * FormHelperの終了
     */
    echo $this->Form->end(); 

?>