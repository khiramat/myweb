<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "日々精進";

$id = 1;
$sql = "select count from counter where id = '$id'";
$result = mysqli_query($sql);
$row = mysqli_fetch_array($result);
$count = $row["count"];
$count++;
$sql = "update counter set count = '$count' where id = '$id'";
mysqli_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
	<title>レコーディングダイエット</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<meta name="author" content="Kiyoshi Hiramatsu"/>
	<meta name="Reply-to" content="kiyoshi@hiramatsu.be"/>
	<meta name="Description" content="Kiyoshi Hiramatsu's Diary"/>
	<meta name="copyright" content="Copyright(C)2008 hiramatsu.be"/>
	<link rel="stylesheet" href="record.css" type="text/css" media="all"/>
	<link rel="Shortcut icon" href="../favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="http://hiramatsu.be/diary/diary.xml">
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="../js/lightbox/prototype.js"></script>
	<script type="text/javascript" src="../js/lightbox/scriptaculous.js?load=effects,builder"></script>
	<script type="text/javascript" src="../js/lightbox/lightbox.js"></script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-25509634-1']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>
</head>
<body bgcolor="#ffffff" text="#000000">
<?php
mysqli_query("set names utf8");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" valign="top" class="title">Recording Results</td>
	</tr>
	<tr>
		<td width="185" valign="top">
			<div>
				<?php include("inc_record_menu.php"); ?>
			</div>
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/></td>
		<td width="100%" valign="top">
			<?php
			$sql = "select max(id) from main";
			$result_num = mysqli_query($link, $sql);
			$row_max_id = mysqli_fetch_array($result_num);
			$max_id = $row_max_id["max(id)"];
			$max_id_end = $max_id - 31;
			$sql = "
select 
	* 
from 
	main 
where 
	id between '$max_id_end' and '$max_id' 
order by 
	id desc
";
			$detail_name = "";
			$calorie = 0;
			$result_main = mysqli_query($link, $sql);
			while ($row_main = mysqli_fetch_array($result_main)) {
				$id = $row_main["id"];
				$date = $row_main["date"];
				$bf = $row_main["bf"];
				$lnc = $row_main["lnc"];
				$dnr = $row_main["dnr"];
				$wt = $row_main["wt"];
				$fat = $row_main["fat"];
				$cal = $row_main["cal"];
				$get_ts = strtotime($date);
				$week = date("D", $get_ts);

				$detail_name = "";
				$calorie_total = 0;


				include("inc_record_cont.php");
			}
			?>
			<div class="copyright"><?php include("../copyrights.txt") ?></div>
		</td>
	</tr>
</table>
<script type="text/javascript" src="http://i.yimg.jp/images/analytics/js/ywa.js"></script>
<script type="text/javascript">
	var YWATracker = YWA.getTracker("1000210685304");
	YWATracker.addExcludeProtocol("file:");
	YWATracker.submit();
</script>
<noscript>
	<div><img src="http://by.analytics.yahoo.co.jp/p.pl?a=1000210685304&js=no" width="1" height="1" alt=""/></div>
</noscript>
</body>
</html>
