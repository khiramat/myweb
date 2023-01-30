<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "ゲストブック";
@$id_num_comment = $_REQUEST["id_num_comment"];
@$date = $_REQUEST["date"];
@$domain = $_SERVER["REMOTE_HOST"];
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
			<img src="images/spacer.gif" alt="space" width="185" height="20" border="0"/>
		</td>
		<td width="100%" valign="top">
			<div align="center" class="title">Show all Guestbook</div>
			<div>
				<form action="diary_send_guest.php" method="post" name="form1" id="form1">
					<div class="Guestbook-showall">* Message Board</div>
					<div class="Guestbook-showall">お名前　　：　
						<input name="name" type="text" size="15"/>
					</div>
					<div class="Guestbook-showall">パスワード　　：　
						<input name="passwd" type="password" id="passwd" size="36"/>後で編集・削除するためのパスワードです。半角で36文字までです。
					</div>
					<div class="Guestbook-showall">メッセージ ：　
						<textarea name="comment" cols="80" rows="3"></textarea>
					</div>
					<div class="Guestbook-showall">
						<input name="id_num" type="hidden" value="<?php echo @$id_num_comment; ?>"/>
						<input name="date" type="hidden" value="<?php echo @$date; ?>"/>
						<input name="domain" type="hidden" value="<?php echo @$domain; ?>"/>
						<input name="submit" type="submit" value="Fill in"/>
						　パスワードは忘れないようにね！
					</div>
				</form>
				<hr size="1" noshade="noshade"/>
			</div>
			<?php
			include("inc_diary_cont_comment.php");
			?>
			<?php
			$sql = "
select 
	* 
from 
	DiaryComments 
order by 
	comment_id desc
";
			$result = mysqli_query($link, $sql);
			echo <<<TITLE
<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">\n
TITLE;

			while ($row = mysqli_fetch_array($result)) {
				$comment_id = $row["comment_id"];
				$input_date = $row["input_date"];
				$name = $row["name"];
				$comment = $row["comment"];
				echo <<<CONTENTS
	<tr>
		<td class="td-title2" nowrap="nowrap">$input_date</td>
		<td class="td-title1" nowrap="nowrap">$name</td>
		<td class="td-title2">$comment</td>
		<td class="td-title2" nowrap="nowrap">
			<form action="diary_1word_edit.php" method="post" target="_self">
				password -> <input name="passwd2" type="password" id="passwd" size="24" />
				<input name="comment_id" type="hidden" value="$comment_id" />
				<input name="date" type="hidden" value="$date" />
				<input name="submit" type="submit" value="edit" />
			</form>
		</td>
	</tr>\n
CONTENTS;
			}
			echo "</table>\n";
			?>
			<div class="copyright">
				<?= $copyright ?>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
