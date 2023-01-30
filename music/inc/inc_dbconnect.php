<?php
//******************************************************************************
// Data Base Connect
//******************************************************************************
$link = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME) or die("MySQLへの接続に失敗しました。");
//$link = mysqli_connect("サーバー名", "ユーザ名", "パスワード","データベース", ポート番号)
//$db = mysqli_select_db(C_DB_NAME, $link) or die("データベースの選択に失敗しました。");

$sql = "set names utf8;";
mysqli_query($link, $sql);
?>