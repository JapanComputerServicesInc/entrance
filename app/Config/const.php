<?php

//ユーザ定義定数を定義

////定義例
//呼び出し方:    echo HOGE;
//define("HOGE","テスト");

//配列の定義例
//呼び出し方:    $fuga = Configure::read("fuga");
//$config['fuga'] = array("a","b","c");

//連想配列の定義例
//呼び出し方:    $hoge = Configure::read("hoge");
//$config['hoge'] = array(
//  "A"=>"あ",
//  "B"=>"い",
//  "C"=>"う",
//);

//本番サーバーURL
define("HONBAN_URL","180.37.180.193");

//本社IP
define("JCS_IP","122.220.242.186");

//本社IPその2
define("JCS_IP2","202.171.151.27");

//曜日の配列
$config['wday']=array("日","月","火","水","木","金","土");

//出社時間の初期値
define("ENT_TIME","08:00:00");

//退社時間の初期値
define("LEAVE_TIME","20:00:00");

