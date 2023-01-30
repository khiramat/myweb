<?php
require_once('/var/www/html/inc/inc_define.php');
require_once('/var/www/html/inc/inc_db_connect.php');
@$htid = htmlspecialchars($_REQUEST["htid"]);
@$htpass = htmlspecialchars($_REQUEST["htpass"]);
//echo $htid. " / ". $htpass;
if($htid == C_EMAIL && $htpass == C_DB_PASSWD){
// セッション開始
    session_cache_limiter('none');
    session_start();
    $_SESSION["usr_name"] = C_EMAIL;
    $usr_name = $_SESSION["usr_name"];

    header("Location: index.php");
} else {
    echo "<div>ID かパスワードが間違っています。もう一度ログインしな美味してください</div>";
    echo '<div><a href="login.php">login</a></div>';

}
