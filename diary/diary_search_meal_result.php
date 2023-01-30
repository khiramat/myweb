<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "食べ物サーチ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	include_once("inc_head.php");
	?>
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="185" valign="top">
			<div><?php include("inc_diary_menu.php"); ?></div>
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/></td>
		<td width="100%" valign="top">
			<div align="center" class="title">Search Results</div>
			<?php
			$searchword_meal = strip_tags($_REQUEST["searchword_meal"]);
			if ($searchword_meal == "") {
				echo "何か入れて検索してください";
			} else {
				$sql = "
select
	*
from
	DiaryOutFrame
where
	bf like '%$searchword_meal%'
	or lnc like '%$searchword_meal%'
	or dnr like '%$searchword_meal%'
order by
	date desc
";
				$result = mysqli_query($link, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$date = $row["date"];
					$bf = $row["bf"];
					$lnc = $row["lnc"];
					$dnr = $row["dnr"];

					$get_ts = strtotime($date);

					$week = date("D", $get_ts);
					echo "
	<div class=\"date\" lang=\"en\" xml:lang=\"en\">$date  &nbsp; $week </div>
	<table width=\"98%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
		<tr>
			<td width=\"30%\" class=\"td-title1-meal\" lang=\"en\">Breakfast</td>
			<td width=\"30%\" class=\"td-title1-meal\" lang=\"en\">Lunch</td>
			<td width=\"30%\" class=\"td-title1-meal\" lang=\"en\">Dinner</td>
		</tr>
		<tr>
			<td class=\"td-title2-meal\">$bf</td>
			<td class=\"td-title2-meal\">$lnc</td>
			<td class=\"td-title2-meal\">$dnr</td>
		</tr>
	</table>";
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
