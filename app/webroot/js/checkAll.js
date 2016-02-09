$(function () {
    //設定したId(all_check)のボタンをクリックすると処理が実行
    $('#all_check').click(function(){
        //チェックボックスがチェックされているかの判断    
        if($("input:checkbox[class='leavecheck'],[class='leavecheck form-error']").prop('checked') == false){
            //「全て選択」ボタンをクリックした場合、全てのチェックボックスがチェックされる
            $("input:checkbox[class='leavecheck'],[class='leavecheck form-error']").prop({'checked':true});
        }else{
            //再度「全て選択」ボタンをクリックした場合、全てのチェックボタンのチェックが外される
            $("input:checkbox[class='leavecheck'],[class='leavecheck form-error']").prop({'checked':false});
        }
    });
});