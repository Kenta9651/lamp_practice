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
$user = get_login_user($db);

if($user['name'] === 'admin'){
    $admin_historys = get_admin_historys($db);
}else{
    $user_historys = get_user_historys($db,$user['user_id']);
}

include_once VIEW_PATH . 'history_view.php';