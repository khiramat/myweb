<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "ゲストブック Edit";
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
			<div align="center" class="title">Edit Guestbook</div>
			<div>
				<?php
				$comment_id = strip_tags($_POST["comment_id"]);
				$passwd = strip_tags($_POST["passwd2"]);
				$date = strip_tags($_POST["date"]);

				$sql = "
select 
	* 
from 
	DiaryComments
where 
	comment_id = '$comment_id'
";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_array($result);
				$id_num = $row["id_num"];
				$comment_id_edit = $row["comment_id"];
				$name_edit = $row["name"];
				$comment_edit = $row["comment"];
				$passwd_edit = $row["passwd"];

				if ($passwd && $passwd == $passwd_edit) {
					?>
					<form action="diary_send_guest.php" method="post" name="form1" id="form1">
						<div class="Guestbook-showall">* Edit Message</div>
						<div class="Guestbook-showall">お名前　　：　<?php echo $name_edit; ?></div>
						<div class="Guestbook-showall">メッセージ ：　
							<textarea name="comment_edit" cols="40" rows="10"><?php echo $comment_edit; ?></textarea>
						</div>
						<div class="Guestbook-showall" style="">
							<input name="date" type="hidden" value="<?php echo $date; ?>"/>
							<input name="id_num" type="hidden" value="<?php echo $id_num; ?>"/>
							<input name="comment_id" type="hidden" value="<?php echo $comment_id; ?>"/>
							<input name="submit" type="submit" value="Edit"/>
						</div>
						<div class="Guestbook-showall">
							<div align="right">
								<input name="submit" type="submit" value="Delete"/>
							</div>
						</div>
					</form>

					<?php
				} else {
					echo <<<ERROR
	<div class="Guestbook-showall">*  <a href="diary_1word.php?id_num=$id_num">パスワードが間違っています</a></div>
ERROR;
				}
				?>
				<hr size="1" noshade="noshade"/>
			</div>
			<div class="copyright">
				<?= $copyright ?>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
