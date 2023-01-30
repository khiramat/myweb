<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$date = date("Y-m-d");
$refer = gethostbyaddr($_SERVER["REMOTE_ADDR"]);

//$robo = strpos($domain, "googlebot.com");

//$robo = strpos($refer, "crawl");
//$robos = strpos($refer, "msnbot");

//if ($robo === false && $robos === false){
$sql = "
	INSERT INTO DiaryOutFrame
	(date, domain)
	VALUES('$date', '$refer')
	";
$result = mysqli_query($link, $sql);
//}
echo <<<EOF
<meta http-equiv="Refresh" content="0;URL=../management.php" />
EOF;
?>
