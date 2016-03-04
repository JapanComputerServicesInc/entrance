<?php

class CommonComponent extends Component {

    /*
     * 関数名：getWeek
     * 概要：7日分（当日～当日マイナス6日分）の日付を取得する
     * 引数：なし
     * 戻り値：7日分の日付（array型）
     */
    public function getWeek() {

        //変数宣言
        $keyWeek = array();
        $valWeek = array();
        $wday = Configure::read('wday');

        //当日の日付を取得
        $today = date("Y-m-d");

        //当日日付をUNIXタイムスタンプ型に変換する
        $day = strtotime($today);

        //7日分(当日～当日マイナス6日分)の日付を取得する為に7回ループする
        for ($i=0; $i<7; $i++) {

            //当日からループ回数の日付をマイナスした値を取得する
            $loopdate = strtotime('-' . $i . 'day', $day);

            //先程取得した値($loopdate)を「Y/m/d」形式に変換して配列に格納
            $keyWeek[] = date("Y-m-d",$loopdate);

            //$wに対象の曜日を取得
            $w = $wday[date("w", $loopdate)];

            //先程取得した値($loopdate)を「Y年m月d日()」形式に変換し、曜日も付与して配列に格納
            $valWeek[] = date("Y年m月d日",$loopdate). "(" . $w . ")";

        }

        //7日分の日付を格納した2つの配列($keyWeek、$valWeek)を結合する
        $aryWeek = array_combine($keyWeek, $valWeek);

        //7日分の日付を戻り値として返す
        return $aryWeek;

    }

    /*
     * 関数名：getYear
     * 概要：3年分（当年～当年マイナス2年分）の日付を取得する
     * 引数：なし
     * 戻り値：3年分の年（array型）
     */
    public function getYear() {

        //変数宣言
        $keyYear = array();
        $valYear = array();

        //当年を取得
        $thisyear = date("Y");

        //当年をUNIXタイムスタンプ型に変換する
        $year = strtotime($thisyear);

        //3年分(当年～当年マイナス2年分)の年を取得する為に3回ループする
        for ($i=0; $i<3; $i++) {

            //当年からループ回数の年をマイナスした値を取得する
            $keyY = strtotime('-' . $i . 'year', $year);
            //先程取得した値($keyY)を「Y」形式に変換して配列に格納
            $keyYear[] = date("Y",$keyY);

            //当年からループ回数の年をマイナスした値を取得する
            $valY = strtotime('-' . $i . 'year', $year);
            //先程取得した値($keyDate)を「Y年」形式に変換して配列に格納
            $valYear[] = date("Y年",$valY);

        }

        //3年分を格納した2つの配列($keyYear、$valYear)を結合する
        $aryYear = array_combine($keyYear, $valYear);

        //3年分を戻り値として返す
        return array($aryYear);

    }

    /* 関数名：emptyResultValue
     * 概要：指定キーの値が空以外、且つ、データソースの結果セットに含まれるかどうかを判定する
     * 引数：$result - データソースの結果セット、$keyName - 判定するキー名称
     * 戻り値：True(存在しない、または、空データ)/False(値が空以外で存在する)
     */
    public function emptyResultValue($result, $keyName)
    {
        if ( !is_array($result) || empty($keyName) ) return true;

        // 結果配列の1階層目がモデル名かどうかの判定
        $existsModelName = true;
        $modelName = array_keys($result);
        if ( count($modelName) == 0 ||  !is_array($result[$modelName[0]]) ) {
            $existsModelName = false;
        }

        // 結果配列の1階層目がモデル名の場合
        if ( $existsModelName
            && (!array_key_exists($keyName, $result[$modelName[0]])
                    || empty($result[$modelName[0]][$keyName])) ) {
                return true;
            }
        // 結果配列の1階層目がモデル名以外の場合
        elseif ( !$existsModelName
            && (!array_key_exists($keyName, $result)
                    || empty($result[$keyName])) ) {
                return true;
        }

        return false;
    }
}
