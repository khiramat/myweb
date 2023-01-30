<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "OutFrame Page Edit";

$id = $_REQUEST["id"];
$result = mysqli_query("SELECT * FROM DiaryOutFrame WHERE id='$id'");
$row = mysqli_fetch_array($result);
$date = $row["date"];
$wt = $row["wt"];
$fat = $row["fat"];
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
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td width="200">　　　　　</td>
		<td>
			<table border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td>
						<h1>Edit Mailn Contents</h1>
						<form action="diary_edit_main_query.php" method="post">
							<table border="1" cellspacing="0" cellpadding="2">
								<tr>
									<td width="80">日付：</td>
									<td><input name="date" type="text" value="<?php echo $date; ?>" size="12" maxlength="10"/></td>
									<td width="80">体重：</td>
									<td><input name="wt" type="text" id="wt" value="<?php echo $wt; ?>" size="4" maxlength="4"/></td>
									<td width="80"> Fat：</td>
									<td><input name="fat" type="text" id="fat" value="<?php echo $fat; ?>" size="4" maxlength="4"/></td>
									<td><input type="hidden" name="id" value="<?= $id ?>"/>
										<input type="submit" value="Edit" name="submit"/></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
			<hr/>
			<table border="0" cellspacing="0" cellpadding="2">
				<tr>
					<td>
						<h1>Meal Regist</h1>
						<form action="recording_input.php" method="post">
							<table border="1" cellspacing="0" cellpadding="2">
								<tr>
									<td width="80">食事入力
										<input type="hidden" name="main_id" value="<?= $id ?>"/>
									</td>
									<td>
										<input type="submit" value="Input" name="submit"/>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>