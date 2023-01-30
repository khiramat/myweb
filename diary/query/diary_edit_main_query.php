<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "OutFrame Page Edit Query";

@$id = $_POST["id"];
@$wt = $_POST["wt"];
@$date = $_POST["date"];
@$fat = $_POST["fat"];
$sql = "
update 
	DiaryOutFrame
set 
	wt = '$wt', 
	fat = '$fat', 
	date= '$date'  
where 
	id = '$id'
";
$result = mysqli_query($link, $sql);
?>
<meta http-equiv="Refresh" content="0;URL=../management.php"/>
