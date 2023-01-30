<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");

$date = $_POST["date"];
$time = date("H:i:s");
$icon_id = $_POST["icon_id"];
$head = addslashes($_POST["head"]);
$paragraph = addslashes($_POST["paragraph"]);
// echo $paragraph;

$sql = "INSERT INTO DiaryContent
(date, time, icon_id, head, paragraph)
VALUES
('$date', '$time', '$icon_id', '$head', '$paragraph')
";

$result_insert = mysqli_query($link, $sql);

if ($result_insert) {
	@$lmodified = gmdate("D, d M Y H:i:s");
	$fd = fopen("/var/www/html/diary/modified.html", "w");
	fwrite($fd,
			"<html>
	<head>
	<title>modified</title>
	<meta http-equiv=\"Last-Modified\" content=\"$lmodified GMT\">
	</head>
	<body>
	Last-modified: $lmodified GMT
	</body>
	</html>");
	fclose($fd);

	include_once("inc_rss_feed.php");
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=../management.php\">";

} else {
	echo mysqli_error($link);
	echo $date . "<br />" . $time . "<br />" . $content_id . "<br />" . $icon_id . "<br />" . $head . "<br />" . $paragraph . "<br />";
	echo "fail insert";
}

?>
