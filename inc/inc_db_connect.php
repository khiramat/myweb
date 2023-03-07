<?php
set_time_limit(60);

$link = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME) or die("MySQLへの接続に失敗しました。 link");
$link_account = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME_ACCOUNT) or die("MySQLへの接続に失敗しました。 link_account");
$link_fin = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME_FIN) or die("MySQLへの接続に失敗しました。 link_fin");
$link_diving = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME_DIVING) or die("MySQLへの接続に失敗しました。 link_dive");
$link_health = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME_HEALTH) or die("MySQLへの接続に失敗しました。 link_health");
$link_gmo = mysqli_connect(C_DB_HOST, C_DB_USER, C_DB_PASSWD, C_DB_NAME_GMO) or die("MySQLへの接続に失敗しました。 link_health");

$sql = "set names utf8;";
mysqli_query($link, $sql);
mysqli_query($link_account, $sql);
mysqli_query($link_fin, $sql);
mysqli_query($link_health, $sql);
mysqli_query($link_diving, $sql);
mysqli_query($link_gmo, $sql);
