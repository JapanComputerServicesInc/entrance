<?php
App::uses('AppController', 'Controller');

class EntranceDatasController extends AppController {
    public $scaffold;
    
    /* 
     * アクション名：beforeFilter
     * 概要：login処理の設定
     */
    public function beforeFilter(){
        //ログインしないでアクセス出来るアクションを登録する
        $this->Auth->allow('index','entrance','leave');
        $this->set('auth',$this->Auth);
    }
    
    /* 
     * アクション名：index
     * 概要：TOP画面の処理
     */
    public function index() {

    }
    
    /* 
     * アクション名：entrance
     * 概要：出社情報登録画面の処理
     */
    public function entrance() {
        
        //ページ名
        $this->set('title_for_layout', '出社情報登録');   
 
        //当日の日付を取得
        $today = date("Y-m-d");
        
        //ビューで設定した変数の宣言
        $selectedDay = null;
        $enttime = '';
        $errFlg = '0';
        
        //submit処理の分岐
        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->data)){
                //前画面で選択された日付を変数に格納
                $selectedDay = $this->request->data('EntranceData.RECORD_DATE');
                
                //保存ボタンの場合の処理("正"の場合はif以下の文、"負"の場合はelse以下の文を実行)
                if(isset($this->request->data['save'])){
                    
                    //退社のバリデーションエラーを除いている
                    $this->EntranceData->validator()->remove('LEAVE_NAME');
                    $this->EntranceData->validator()->remove('LEAVE_TIME');
                    $this->EntranceData->validator()->remove('LEAVE_CLEAR');
                    $this->EntranceData->validator()->remove('LEAVE_WINDOW');
                    $this->EntranceData->validator()->remove('LEAVE_PRINTER');
                    $this->EntranceData->validator()->remove('LEAVE_HUMID');
                    $this->EntranceData->validator()->remove('LEAVE_FAX');
                    $this->EntranceData->validator()->remove('LEAVE_AIRCON');
                    $this->EntranceData->validator()->remove('LEAVE_SEAIRCON');
                    $this->EntranceData->validator()->remove('LEAVE_LIGHT');
                    $this->EntranceData->validator()->remove('LEAVE_KEY');
                    $this->EntranceData->validator()->remove('LEAVE_COMMENT');
                    
                    //データの保存処理を実行
                    if ($this->EntranceData->saveAll($this->request->data)){
                        //完了メッセージを表示
                        $this->Session->setFlash(__('データを保存しました。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-success'
                        ));
                        
                        
                    } else {
                        //バリデーションエラーの場合
                        //エラーフラグを1に設定
                        $errFlg = '1';

                        //エラーメッセージを表示
                        $this->Session->setFlash(__('入力に誤りがあります。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-danger'
                        ));
                        
                    }
                }
            }
        
        //上記のどれにも当てはまらない場合は下記のelse文が実行される   
        }else {
            
            //TOP画面から遷移してきた場合は当日日付を取得
            $selectedDay = $today;
        
        }
        
        //管理者チェックの有無を確認し、完了していれば編集不可、未完了であれば編集可にする
        $managerCheck = $this->_checkManagerCheck($selectedDay);
        
        If ($managerCheck) {
            //管理者チェック済みの場合、注記を表示
            $this->Session->setFlash(__('管理者確認済みのため、データを変更することはできません。'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));
        }

        //エラーフラグが0の場合(バリデーションエラーが発生した場合、エラーフラグは1になる)
        //(バリデーションエラーの場合は、DBのデータではなくリクエストデータを表示させるため、以下のDB読み込みを行わない)
        If ($errFlg == '0'){
            
            //特定の日付($selectedDay)を条件に、ENTRANCE_DATASテーブルの情報を検索する
            //検索した結果、データが存在する場合は「request->data」に値を入れて、ビューできるようにする
            If(!$this->request->data = $this->EntranceData->findByRecord_date($selectedDay)) {
                //検索した結果、データが見つからない場合、出社時間の初期値を設定
                $enttime = ENT_TIME;
            }
        }
        
        //7日分(当日～当日マイナス6日分)の日付を取得する(共通関数を使用)
        $options = $this->Common->getWeek(); 
        
        //ビューで使用する変数(week)に上記で日付を格納した変数($options)をセットする
        $this->set('week', $options);
        
        //ビューで使用する変数をセットする
        $this->set('selectedDay', $selectedDay);   
        $this->set('enttime', $enttime);   
        $this->set('managerCheck', $managerCheck);
    
    }
    
    
    /* 
     * アクション名：leave
     * 概要：退社情報登録画面の処理
     */
    public function leave() {
        
        //ページ名
        $this->set('title_for_layout', '退社情報登録');   

        //当日の日付を取得
        $today = date("Y-m-d");
        
        //ビューで設定した変数の宣言
        $selectedDay = null;
        $leavetime = '';
        $errFlg = '0';
        
        //submit処理の分岐
        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->data)){
                //前画面で選択された日付を変数に格納
                $selectedDay = $this->request->data('EntranceData.RECORD_DATE');
                
                //保存ボタンの場合の処理("正"の場合はif以下の文、"負"の場合はelse以下の文を実行)
                if(isset($this->request->data['save'])){
                    
                    //出社のバリデーションエラーを除いている
                    $this->EntranceData->validator()->remove('ENT_NAME');
                    $this->EntranceData->validator()->remove('ENT_TIME');
                    $this->EntranceData->validator()->remove('ENT_COMMENT');               
                    
                    //リクエストデータ「使用した鍵」の値を変数に格納
                    $used_key = $this->request->data('EntranceData.LEAVE_KEY');
                    //上の変数が「その他」以外の場合
                    if($used_key != "3") {
                        //「自分用」または「最終退室用」を選択した場合は「その他」のテキストボックスの入力チェックを行わない
                        $this->EntranceData->validator()->remove('LEAVE_COMMENT');
                    }
                    
                    //データの保存処理を実行
                    if ($this->EntranceData->saveAll($this->request->data)){
                        $this->Session->setFlash(__('データを保存しました。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-success'
                        ));    
                    } else {    
                        //バリデーションエラーの場合はエラーフラグを1に設定
                        $errFlg = '1';
                        //エラーメッセージを表示
                        $this->Session->setFlash(__('入力に誤りがあります。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-danger'
                        ));
                    }    
                }
            }
        
        //上記のどれにも当てはまらない場合は下記のelse文が実行される   
        }else {
            
            //TOP画面から遷移してきた場合は当日日付を取得
            $selectedDay = $today;
        
        }
        
        //管理者チェックの有無を確認し、完了していれば編集不可、未完了であれば編集可にする
        $managerCheck = $this->_checkManagerCheck($selectedDay);
        
        If ($managerCheck) {
            //管理者チェック済みの場合、注記を表示
            $this->Session->setFlash(__('管理者確認済みのため、データを変更することはできません。'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));
        }
        
        //エラーフラグが0の場合(バリデーションエラーが発生した場合、エラーフラグは1になる)
        //(バリデーションエラーの場合は、DBのデータではなくリクエストデータを表示させるため、以下のDB読み込みを行わない)
        If ($errFlg == '0'){
            //特定の日付($selectedDay)を条件に、ENTRANCE_DATASテーブルの情報を検索する
            //検索した結果、データが存在する場合は「request->data」に値を入れて、ビュー側で使えるようにする
            If(!$this->request->data = $this->EntranceData->findByRecord_date($selectedDay)) {
                //検索した結果、データが見つからない場合、退社時間の初期値を設定
                $leavetime = LEAVE_TIME;
            }
        }
        
        //7日分(当日～当日マイナス6日分)の日付を取得する(共通関数を使用)
        $options = $this->Common->getWeek();
        
        //ビューで使用する変数(week)に上記で日付を格納した変数($options)をセットする
        $this->set('week', $options);
        
        //ビューで使用する変数をセットする
        $this->set('selectedDay', $selectedDay);   
        $this->set('leavetime', $leavetime);
        $this->set('managerCheck', $managerCheck);
        
    }
    
    
    /* 関数名：_checkManagerCheck
     * 概要：特定の日付の、管理者チェックが完了しているかどうかを確認する
     * 引数：$selectedDay-検索対象の日付
     * 戻り値：True/False
     */
    public function _checkManagerCheck($selectedDay) {
        
        //特定の日付($selectedDay)の情報が入力されていて、
        //なおかつ管理者チェックが完了している("MANAGER_CHECK"が"1")という条件を変数($opt)に設定
        $opt = array("AND" => array(
            "EntranceData.RECORD_DATE" => $selectedDay,
            "EntranceData.MANAGER_CHECK" => '1'
            )
        );
        
        //上記で設定した条件で、DB検索
        If($this->EntranceData->find('all',array('conditions' => $opt))) { 
            //データが存在する場合（管理者チェックが完了していれば）チェックが完了していれば情報の編集は不可能
            $managerCheck = true;
            
        } else {
            //データが存在しない場合(管理者チェックが完了していない場合)チェックが完了していない場合は情報の編集が可能
            $managerCheck = false;
        }
        
        return $managerCheck;
    
    }
    
    
    /*
     * アクション名：detail
     * 概要：詳細画面の処理
     */
    public function detail() {
//chi

        //ページ名
        $this->set('title_for_layout', '出退情報詳細');

        //当日の日付を取得
        $today = date("Y-m-d");
        
        $selectedDay = $today;
        $enttime = '';
        $leavetime = '';
        $errFlg = '0';
        $select_btn ='1';
        
        //submit処理の分岐
        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->data)){
                //前画面で選択された日付を変数に格納
                $selectedDay = $this->request->data('EntranceData.RECORD_DATE');
                
                //保存ボタンの場合の処理("正"の場合はif以下の文、"負"の場合はelse以下の文を実行)
                if(isset($this->request->data['save'])){
                    
                    //リクエストデータ「使用した鍵」の値を変数に格納
                    $used_key = $this->request->data('EntranceData.LEAVE_KEY');
                    //上の変数が「その他」以外の場合
                    if($used_key != "3") {
                        //「自分用」または「最終退室用」を選択した場合は「その他」のテキストボックスの入力チェックを行わない
                        $this->EntranceData->validator()->remove('LEAVE_COMMENT');
                    }
                    
                    //データの保存処理を実行
                    if ($this->EntranceData->saveAll($this->request->data)){
                        //保存したときのメッセージ
                        $this->Session->setFlash(__('データを保存しました。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-success'
                        ));
                        
                        //保存処理実行後のリンク「一覧へ」に前画面で選択されていたラジオボタンの値を渡す
                        if(!empty($this->request->query['select_btn'])){
                            //選択したラジオボタンの値を取得する(詳細⇒一覧へ遷移‐URLで渡された値を取得)
                            $select_btn = $this->request->query['select_btn'];
                        }
                    
                    } else {
                        //バリデーションエラーの場合はエラーフラグを1に設定
                        $errFlg = '1';
                        //エラーメッセージを表示
                        $this->Session->setFlash(__('入力に誤りがあります。'), 'alert', array(
                            'plugin' => 'BoostCake',
                            'class' => 'alert-danger'
                        ));
                    }
                
                }
            }
        
        //getの場合(詳細から遷移してきた場合)の処理
        } else if ($this->request->is('get')) {
            if(!empty($this->request->query['selectedDay'])){
                //選択した日付を取得する(詳細⇒一覧へ遷移‐URLで渡された値を取得)
                $selectedDay = $this->request->query['selectedDay'];
            }
            
            if(!empty($this->request->query['select_btn'])){
                //選択したラジオボタンの値を取得する(詳細⇒一覧へ遷移‐URLで渡された値を取得)
                $select_btn = $this->request->query['select_btn'];
            }
        
        }
        
        //エラーフラグが0の場合(バリデーションエラーが発生した場合、エラーフラグは1になる)
        //(バリデーションエラーの場合は、DBのデータではなくリクエストデータを表示させるため、以下のDB読み込みを行わない)
        If ($errFlg == '0'){
            
            //特定の日付($selectedDay)を条件に、ENTRANCE_DATASテーブルの情報を検索する
            //検索した結果、データが存在する場合は「request->data」に値を入れて、ビューできるようにする
            If(!$this->request->data = $this->EntranceData->findByRecord_date($selectedDay)) {
                //検索した結果、データが見つからない場合、出社時間の初期値を設定
                $enttime = ENT_TIME;
            }
            
            //特定の日付($selectedDay)を条件に、ENTRANCE_DATASテーブルの情報を検索する
            //検索した結果、データが存在する場合は「request->data」に値を入れて、ビュー側で使えるようにする
            If(!$this->request->data = $this->EntranceData->findByRecord_date($selectedDay)) {
                //検索した結果、データが見つからない場合、退社時間の初期値を設定
                $leavetime = LEAVE_TIME;
            }
        }
        
        
        //ビューで使用する変数をセットする
        $this->set('selectedDay', $selectedDay);
        $this->set('enttime', $enttime);
        $this->set('leavetime', $leavetime);
        $this->set('select_btn', $select_btn);
        
        //$displaydateに詳細画面で表示する日付を設定、view-set
        $displaydate = date("Y年m月d日", strtotime($selectedDay));
        $this->set('displaydate', $displaydate);
        
        //詳細で表示する曜日を設定、view-set
        $wday = Configure::read('wday');
        $w = $wday[date("w", strtotime($selectedDay))];
        $this->set('w', $w);
        
        //詳細⇒一覧へ遷移する場合の表示($selectedDayで年や月を個別で取得出来る)
        $y = date("Y", strtotime($selectedDay));
        $m = date("m", strtotime($selectedDay));
        
        //view-set[選択された年月]
        $this->set('y', $y);
        $this->set('m', $m);
        
        //詳細画面にて前日の情報を取得、view-set[前日の情報]
        $previousday  = date('Y-m-d', strtotime('-1 day', strtotime($selectedDay)));
        $this->set('previousday', $previousday);
        
        //詳細画面にて翌日の情報を取得、view-set[翌日の情報]
        $nextday  = date('Y-m-d', strtotime('+1 day', strtotime($selectedDay)));
        $this->set('nextday', $nextday);
    
    }
    
    
    /*
     * アクション名：adminlist
     * 概要：一覧画面の処理
     */
    public function adminlist() {

        //ページ名
        $this->set('title_for_layout', '出退情報一覧');
        
        //当年・当月を取得
        $y = date('Y');
        $m = date('m');
        
        //変数の設定
        $wday = Configure::read('wday');
        $resultset = '';
        $select_btn ='1';
        
        //submit処理の分岐
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if(!empty($this->data)){
                //前画面で選択された年月、ラジオボタンを変数に格納(一覧⇒詳細へ)
                $y = $this->request->data('EntranceData.select1');
                $m = $this->request->data('EntranceData.select2');
                $select_btn = $this->request->data('EntranceData.selectbutton');
            }
        
        //上記のどれにも当てはまらない場合は下記のelse文が実行される
        } else if ($this->request->is('get')) {
            
            //前画面で表示されていた年を変数に格納
            if(!empty($this->request->query['year'])){
                $y = $this->request->query['year'];   
            }
            
            //前画面で表示されていた月を変数に格納
            if(!empty($this->request->query['month'])){
                $m = $this->request->query['month'];
            }
            
            //前画面で選択されたラジオボタンの値を格納
            if(!empty($this->request->query['select_btn'])){
                $select_btn = $this->request->query['select_btn'];
            }
        
        }
        
        //選択したラジオボタンの値を取得する
        //$select_btn = $this->request->data('EntranceData.selectbutton');
        
        //3年分(当年～当年マイナス2年分)の日付を取得する(共通関数を使用)
        $years = $this->Common->getYear();
        
        //ビューで使用する変数(year)に$yearsをセットする
        $this->set('year', $years);
        
        //view-set
        $this->set("thisyear", $y);
        $this->set("thismonth", $m);
        $this->set("select_btn", $select_btn);
        
        //末日を取得
        $lastday = date("t", mktime(0,0,0,$m,1,$y));
        
        //1ヶ月分のデータを表示するループ処理
        for($d=1;($d <= $lastday);$d++){
            
            //表示フラグ(表示する場合は"0"、表示しない場合は"1")
            //ループ処理を行うので最後の処理が完了後、$hyoujiFlgは初期化される
            $hyoujiFlg = '0';       
            
            //$timestampに対象の日付を取得
            $timestamp = mktime(0,0,0,$m,$d,$y);
            
            //$wに対象の曜日を取得
            $w = $wday[date("w", $timestamp)];
            
            //入力状況を確認する為の検索条件を変数に格納
            $input_check = array(
                'RECORD_DATE' => date("Y-m-d", $timestamp)
                ,array('NOT' => array('ENT_NAME' => ''))
                ,array('NOT' => array('LEAVE_NAME' => ''))
                ,'LEAVE_CLEAR' => '1'
                ,'LEAVE_WINDOW' => '1'
                ,'LEAVE_PRINTER' => '1'
                ,'LEAVE_HUMID' => '1'
                ,'LEAVE_FAX' => '1'
                ,'LEAVE_AIRCON' => '1'
                ,'LEAVE_SEAIRCON' => '1'
                ,'LEAVE_LIGHT' => '1'
            );
            
            //上記で設定した条件で検索を行う
            if ($this->EntranceData->hasAny($input_check)) {
            //条件に合致するデータが存在する場合、入力済みとみなし、変数($input_ck)に結果のメッセージを格納
                $input_ck = '入力済';
                
                if($select_btn == "2"){
                    //表示フラグを1（非表示）に設定
                    $hyoujiFlg = '1';       
                }                
            
            } else {
                $input_ck = '';
            }
            
            //変数($mng_check)に対象日の「MANAGER_CHECK」を検索して格納
            $mng_check = $this->EntranceData->findByRecord_date(date("Y-m-d", $timestamp),'MANAGER_CHECK');
            
            //上記で検索した値を変数($check)に格納
            $check = Hash::get($mng_check, 'EntranceData.MANAGER_CHECK'); 
            
            //取得結果が1（管理者チェック済）の場合は変数($manager_ck)に結果のメッセージを格納
            if ($check == 1){
                $manager_ck = "確認済"; 
                
                if($select_btn == "3"){
                //表示フラグを1（非表示）に設定
                    $hyoujiFlg = '1';     
                }
            } else {
                $manager_ck = "";
            }

            //土日の場合は背景色を変更
            $tdcolor = '';
            if ($w == '土' || $w == '日'){$tdcolor = 'class = "active"';}
            
            if ($hyoujiFlg == "0") {
                 //一覧⇒詳細へ遷移する場合の表示("～EntranceDatas/detail?selectedDay=20XX-XX-XX"となる)
                 $resultset = $resultset ."<tr><td ". $tdcolor ."><a href='../EntranceDatas/detail?selectedDay="
                    .date("Y-m-d", $timestamp) ."&select_btn="."$select_btn'>".date("Y/m/d", $timestamp) ."({$w})" 
                    ."</a></td><td ". $tdcolor .">$input_ck</td><td ". $tdcolor .">$manager_ck</td></tr>\n";
            }
        
        }     
        
        //view-set
        $this->set("resultset", $resultset);
    }

}