<?php
//******************************************************************************
// TIME ZONE
//******************************************************************************

date_default_timezone_set('Asia/Tokyo');
set_time_limit(60);
ini_set('display_errors', 1);

require_once 'inc_define.php';
require_once 'inc_dbconnect.php';
//require_once 'inc_functions.php';

//******************************************************************************
// Access Log
//******************************************************************************

@$refer = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
//$refer = $_SERVER["REMOTE_HOST"];
@$uri = $_SERVER["REQUEST_URI"];
@$addr = $_SERVER["REMOTE_ADDR"];
@$usr_agent = $_SERVER["HTTP_USER_AGENT"];


$sql = "
INSERT INTO DiaryCounter
(refer, uri, addr, usr_agent)
VALUES
('$refer', '$uri', '$addr', '$usr_agent')
";
mysqli_query($link, $sql);
?>