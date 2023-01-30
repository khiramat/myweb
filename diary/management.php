<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "日々精進 データ入力";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<head>
	<?php
	require_once("inc_head.php");
	?>
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" valign="top" class="title">A rolling stone gathers no moss</td>
	</tr>
	<tr>
		<td width="185" valign="top">
			<div>
				<?php include("inc_diary_menu_manage.php"); ?>
			</div>
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/></td>
		<td width="100%" valign="top">
			<?php
			$sql = "
select 
	* 
from 
	DiaryOutFrame 
order by 
	date desc
limit 0, 30
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


				include("inc_diary_cont_mng.php");
			}
			?>
			<div class="copyright"><?= $copyright ?></div>
		</td>
	</tr>
</table>
</body>
</html>
