<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "日記編集";
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
<div><h1>Edit Contents</h1></div>
<?php

$id_num = $_REQUEST["id_num"];
$sql = "
select
	* 
from
	DiaryContent 
where
	id_num = '$id_num'
";

$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$date = $row["date"];
$icon_id = $row["icon_id"];
$time = $row["time"];
$head = $row["head"];
$paragraph = $row["paragraph"];
?>
<form action="diary_edit_contents_query.php" method="post">
	<table border="1" cellspacing="2" cellpadding="2">
		<tr>
			<td>日付：
				<input type="text" name="date" size="20" maxlength="20" value="<?= $date ?>"/>
				<input type="hidden" name="id_num" value="<?= $id_num ?>"/>
			</td>
			<td>ID : <?= $id_num ?>
			</td>
		</tr>
		<tr>
			<td>Icon :
				<input name="icon_id" type="text" value="<?= $icon_id ?>"/>
			</td>
			<td>Time :
				<input name="time" type="text" id="time" value="<?= $time ?>" size="20" maxlength="20"/>
			</td>
		</tr>
		<tr>
			<td>Head :
				<input name="head" type="text" value="<?= $head ?>" size="60"/>
			</td>
			<td>
				<input type="submit" value="Edit" name="submit"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h5>
					<textarea style="font-size: 18px" name="paragraph" cols="100" rows="30"><?php echo $paragraph; ?></textarea>
				</h5></td>

		</tr>
	</table>
</form>
<table border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
	<tr class="align_center">
		<td width="33%"><a href="../diary_icon_result.php?icon_id=1"><img src="../images/1.gif" alt="Private" width="50"
		                                                                  height="40" border="0"/></a></td>
		<td width="34%"><a href="../diary_icon_result.php?icon_id=2"><img src="../images/2.gif" alt="hobby" width="50"
		                                                                  height="40" border="0"/></a></td>
		<td width="33%"><a href="../diary_icon_result.php?icon_id=3"><img src="../images/3.gif" alt="Interest" width="50"
		                                                                  height="40" border="0"/></a></td>
	</tr>
	<tr class="align_center">
		<td>1.Private</td>
		<td>2.hobby</td>
		<td>3.Interest</td>
	</tr>
	<tr class="align_center">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr class="align_center">
		<td><a href="../diary_icon_result.php?icon_id=4"><img src="../images/4.gif" alt="Audio" width="50" height="40"
		                                                      border="0"/></a></td>
		<td><a href="../diary_icon_result.php?icon_id=5"><img src="../images/5.gif" alt="Work" width="50" height="40"
		                                                      border="0"/></a></td>
		<td><a href="../diary_icon_result.php?icon_id=6"><img src="../images/6.gif" alt="Document" width="50" height="40"
		                                                      border="0"/></a></td>
	</tr>
	<tr class="align_center">
		<td>4.Audio</td>
		<td>5.Work</td>
		<td>6.Document</td>
	</tr>
	<tr class="align_center">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr class="align_center">
		<td><a href="../diary_icon_result.php?icon_id=7"><img src="../images/7.gif" alt="Memory" width="50" height="40"
		                                                      border="0"/></a></td>
		<td><a href="../diary_icon_result.php?icon_id=8"><img src="../images/8.gif" alt="Surprise" width="50" height="40"
		                                                      border="0"/></a></td>
		<td><a href="../diary_icon_result.php?icon_id=9"><img src="../images/9.gif" alt="PC" width="50" height="40"
		                                                      border="0"/></a></td>
	</tr>
	<tr class="align_center">
		<td>7.Memory</td>
		<td>8.Surprise</td>
		<td>9.PC</td>
	</tr>
	<tr class="align_center">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr class="align_center">
		<td><a href="../diary_icon_result.php?icon_id=10"><img src="../images/10.gif" alt="Info" width="50" height="40"
		                                                       border="0"/></a></td>
		<td><a href="../diary_icon_result.php?icon_id=11"><img src="../images/11.gif" alt="server" width="50" height="40"
		                                                       border="0"/></a></td>
		<td><img src="../images/13.gif" alt="mac" width="50" height="40"/></td>
	</tr>
	<tr class="align_center">
		<td>10.Info</td>
		<td>11.Server</td>
		<td>13.mac</td>
	</tr>
	<tr class="align_center">
		<td><a href="../diary_icon_result.php?icon_id=12"><img src="../images/12.gif" alt="Gomi" width="50" height="40"
		                                                       border="0"/></a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr class="align_center">
		<td>12.Gomi</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
</body>
</html>
