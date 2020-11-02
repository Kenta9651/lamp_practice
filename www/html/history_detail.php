<?php
//ファイルの読み込み
//セッションスタート
//ログインチェック
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'history.php';

session_start();

if(is_logined() === false){
    redirect_to(HOME_URL);
}

$db = get_db_connect();

$order_id = get_post('order_id');

$details = get_history_details($db,$order_id);

$historys = get_order_data($db,$order_id);



include_once VIEW_PATH . 'detail_view.php';