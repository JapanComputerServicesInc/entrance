$(function () {
    $('#changetime').click(function(){
        // 現在時刻取得
        var current = new Date();
        var hour_val = current.getHours();
        var minute_val = current.getMinutes();

        //分が1桁の場合は頭に0を付与
        if (String(minute_val).length == 1) {
            minute_val = '0' + String(minute_val);
        }
        
        // selected設定
        $('select[id=selecttimeHour] option[value=' + hour_val + ']').prop('selected', true);  
        $('select[id=selecttimeMinute] option[value=' + minute_val + ']').prop('selected', true);  
    });
});
