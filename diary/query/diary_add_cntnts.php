<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "日記追加";
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
		<td colspan="2" valign="top" class="title">A rolling stone gathers no moss</td>
	</tr>
	<tr>
		<td width="185" valign="top">
			<div>
				<?php include("inc_diary_menu.php"); ?>
			</div>
			<img src="/diary/images/spacer.gif" alt="space" width="185" height="20" border="0"/>
		</td>
		<td valign="top">
			<form action="diary_add_query.php" method="post" name="add_data" id="add_data">
				<table width="98%" border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td>日付：
							<input type="text" name="date" size="20" maxlength="20" value="<?= $_REQUEST["date"] ?>"/>
						</td>
					</tr>
					<tr>
						<td>Icon :
							<select name="icon_id">
								<option value="1" selected="selected">Private</option>
								<option value="2">hobby</option>
								<option value="3">Interest</option>
								<option value="4">Audio</option>
								<option value="5">Work</option>
								<option value="6">Document</option>
								<option value="7">Memory</option>
								<option value="8">Suopirise</option>
								<option value="9">PC</option>
								<option value="10">Info</option>
								<option value="11">server</option>
								<option value="12">Gomi</option>
								<option value="13">mac</option>
								<option value="14">Diving</option>
								<option value="15">Cooking</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Head :
							<input name="head" type="text" id="head2" size="80"/>
							<input type="submit" value="Add" name="submit"/>
						</td>
					</tr>
					<tr>
						<td>
							<textarea style="font-size: 18px" name="paragraph" cols="100" rows="30"></textarea>
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
</body>
</html>
