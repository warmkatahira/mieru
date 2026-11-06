$(document).ready(function() {
    // selectタグが変更された時のイベント処理
    $('#search_base_id').change(function() {
        $('#base_select_form').submit();
    });
});