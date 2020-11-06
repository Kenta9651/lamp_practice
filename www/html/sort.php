<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
    redirect_to(HOME_URL);
}
$new = array();

$db = get_db_connect();
$user = get_login_user($db);

$sort = get_get('sort');

if($sort === 'new'){
    $new = get_sort_new($db);
}else if($sort === 'cheap'){
    $new = get_sort_cheap($db);
}else if($sort === 'expensive'){
    $new = get_sort_expensive($db);
}else{
    $new = get_open_items($db);
}

$token = get_csrf_token();
include_once VIEW_PATH . 'sort_view.php';