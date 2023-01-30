<?php
set_time_limit(60);

//******************************************************************************
// TIME ZONE
//******************************************************************************
date_default_timezone_set('Asia/Tokyo');

require_once ('/var/www/html/inc/inc_define.php');
require_once ('/var/www/html/inc/inc_db_connect.php');

// セッション開始
session_cache_limiter('none');
session_start();

// ログイン状態チェック
/*if (!$_SESSION["usr_name"]) {
    header("Location: login.php");
    exit;
} else {
    $usr_name = $_SESSION["usr_name"];
}*/

//******************************************************************************
// コード整形
//******************************************************************************
function nl() {
    echo "<br/> \n";
}

