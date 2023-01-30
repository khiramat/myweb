<?php
require_once("inc_init.php");
$date_day_top = date('D, d M Y H:i:s');
$date_top = $date_day_top . " +0900";

$output = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<rss version=\"2.0\">
	<channel>
		<title>A rolling stone gathers no moss</title>
		<link>http://kiyoshi.me/diary/</link>
		<description>Diary of Kiyoshi Hiramatsu</description>
		<language>ja</language>
		<pubDate>$date_top</pubDate>
		<webMaster>me@kiyoshi.me(Kiyoshi Hiramatsu)</webMaster>";

$sql = "
SELECT *
FROM DiaryContent
ORDER BY date desc
LIMIT 0, 9
";
$result = mysqli_query($link, $sql);


while ($line = mysqli_fetch_assoc($result)) {
	$id_num = $line["id_num"];
	$date_link = $line["date"];
	$date_stmp = strtotime($line["date"] . " " . $line["time"]);
	$date_day = date('D, d M Y H:i:s', $date_stmp);
	$date = $date_day . " +0900";
	$head = $line["head"];
	$paragraph = nl2br($line["paragraph"]);
	$http_link = "http://kiyoshi.me/diary/diary_old.php?date_old=$date_link";
	$guid = "http://kiyoshi.me/diary/diary_old.php?id_num=" . $id_num;

	$output .= "
		<item>
			<title>" . $head . "</title>
			<link>" . $http_link . "</link>
			<description>
			<![CDATA[
			" . $paragraph . "
			]]>
			</description>
			<pubDate>" . $date . "</pubDate>
			<guid>" . $http_link . "</guid>
		</item>";
}

$output .= "
	</channel>
</rss>
";
//echo $output;
$rdf = fopen("/var/www/html/diary/diary.xml", "w");
fwrite($rdf, $output);
fclose($rdf);
?>
