<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "日付指定表示";
$date_old = strip_tags($_GET["date_old"]);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	include_once("inc_head.php");
	?>
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" valign="top" class="title">Live in the past - <?= $date_old ?></td>
	</tr>
	<tr>
		<td width="185" valign="top">
			<div>
				<?php include_once("inc_diary_menu.php"); ?>
			</div>
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/></td>
		<td width="100%" valign="top">
			<?php
			if ($date_old == "") {
				echo "データが見つかりません";
			} else {
				$sql = "
	select 
		* 
	from 
		DiaryOutFrame
	where 
		date like '$date_old%' 
	order by date
	";
				$result = mysqli_query($link, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$id = $row["id"];
					$date = $row["date"];
					$bf = $row["bf"];
					$lnc = $row["lnc"];
					$dnr = $row["dnr"];
					$wt = $row["wt"];
					$fat = $row["fat"];
					$cal = $row["cal"];

					$get_ts = strtotime($date); //検索されたデータの日付からタイムスタンプを算出
					$week = date("D", $get_ts); //タイムスタンプから曜日を算出
					include("inc_diary_cont_oneday.php");
				}
			}

			?>
			<div class="copyright">
				<?= $copyright ?>
			</div>
		</td>
	</tr>
</table>
</body>
</html>