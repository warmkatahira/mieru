// 更新ボタンが押下されたら
$('#user_update_enter').on("click",function(){
    // 処理を実行するか確認
    const result = window.confirm("ユーザーを更新しますか？");
    // 「はい」が押下されたらsubmit、「いいえ」が押下されたら処理キャンセル
    if(result == true) {
        $("#user_update_form").submit();
    }
});