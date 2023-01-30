<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "カテゴリ別";
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
			<div align="center" class="title">Category</div>
			<?php
			$icon_id = $_GET["icon_id"];
			$icon_id = strip_tags($icon_id);
			$sql = "
select
	* 
from 
	DiaryContent 
where
	icon_id = '$icon_id' 
order by
	date desc
";

			$result = mysqli_query($link, $sql);
			while ($row = mysqli_fetch_array($result)) {
				$id_num = $row["id_num"];
				$date = $row["date"];
				$icon_id = $row["icon_id"];
				$head = $row["head"];
				$paragraph = nl2br($row["paragraph"]);

				$get_ts = strtotime($date);

				$week = date("D", $get_ts);
				echo <<<EOF
<table width="98%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td width="50"><a href="diary_icon_result.php?icon_id=$icon_id"><img src="images/$icon_id.gif" alt="$icon_id" width="50" height="40" border="0" align="absmiddle" /></a></td>
		<td width="80%" class="bold">$head</td>
		<td nowrap="nowrap" class="bold">$date $week
			<a href="query/diary_edit.php?id_num=$id_num">
			<img src="images/edit.gif" alt="Edit" width="20" height="20" border="0" align="absmiddle" /></a>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="padding1">$paragraph</td>
	</tr>
</table>
<hr size="1" /> 
EOF;
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
