//※「使用した鍵」が"1"あるいは"2"を選択した場合は、"LEAVE_COMMENT"欄の入力が不可能となり、
//"3"を選択した場合のみ入力が可能となる
function changeDisabled() {
    //「その他」のラジオボタンをクリックした場合
    if ( document.forms.usedKey.EntranceDataLEAVEKEY3.checked ) {
        //「その他」のラジオボタンのテキスト入力欄を有効化
        document.forms.usedKey.EntranceDataLEAVECOMMENT.disabled = false;
    } else { 
        //「その他」のラジオボタン以外をクリックした場合は、「その他」のラジオボタンのテキスト入力欄を無効化
        document.forms.usedKey.EntranceDataLEAVECOMMENT.disabled = true;
    }
}