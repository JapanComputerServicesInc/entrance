<h1>ラジオボタン処理</h1>
<br>

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
    echo $this->Form->select('select1', array($year), array(
        'empty' => false 
    ));
   
    /**
     * 表示項目名：なし
     * DB項目名　：なし
     * 表示する値：12ヶ月分のデータ
     * 初期表示値：$thismonth
     */
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
    ))."<br /><br />";
    
    
    
    /**
     * 表示項目名：全ての日付を表示、入力されていない日付のみ表示、管理者確認がされていない日付のみ表示
     * DB項目名　：なし
     * 表示する値：ラジオボタン
     * 初期表示値：全ての日付を表示
     */
    $options = array('1' => '全ての日付を表示', '2' => '入力されていない日付のみ表示', '3' => '管理者確認がされていない日付のみ表示');
    $attributes = array('legend' => false, 'separator' => '<br>', 
                        'default' => 1);
    echo $this->Form->radio('selectbutton', $options, $attributes);
    echo "<br /><br />";
    
    /**
     * 表示項目名：表示
     * DB項目名　：なし
     * 表示する値：ボタン
     * 初期表示値：表示
     */
    echo $this->Form->submit('表示', array('name' => 'display'))."<br /><br />";    

/**
     * 結果一覧の表示
     */
    echo "一覧<br /><br />";
    echo "<table><tr><th>日付</th><th>入力状況</th><th>確認状況</th></tr>";
    echo $resultset;
    echo "</table>";

    /**
     * FormHelperの終了
     */
    echo $this->Form->end();

?>    