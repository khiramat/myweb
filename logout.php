<?php
/**
 * Created by PhpStorm.
 * User: khiramat
 * Date: 2018/01/22
 * Time: 12:10
 */
/*
$path = '/var/www/pic/inc/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
*/
require_once ('/var/www/html/inc/inc_define.php');
require_once ('/var/www/html/inc/inc_db_connect.php');

// セッション開始
session_start();

if (isset($_SESSION["usr_name"])) {
	$errorMessage = "ログアウトしました。";
} else {
	$errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>
	<section>
		<h1>Logout</h1>
		<div style="margin-bottom: 10px"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
		<ul>
			<li><a href="login.php" class="btn">Back to Index page</a></li>
		</ul>
	</section>
<?php
require_once ("/var/www/html/inc/inc_footer.php");
?>