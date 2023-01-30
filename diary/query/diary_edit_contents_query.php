<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");

$id_num = $_REQUEST["id_num"];
$time = $_REQUEST["time"];
$paragraph = addslashes($_REQUEST["paragraph"]);
$icon_id = $_REQUEST["icon_id"];
$head = addslashes($_REQUEST["head"]);
$date = $_REQUEST["date"];


$sql = "
UPDATE
	DiaryContent 
SET
	date = '$date', 
	time = '$time', 
	paragraph = '$paragraph', 
	icon_id = '$icon_id', 
	head = '$head'  
WHERE
	id_num = '$id_num'
";

$result = mysqli_query($link, $sql);

if ($result) {
	include("inc_rss_feed.php");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../management.php\">";
} else {
	echo "fail insert";
}
?>
