<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "コメント送信";

$submit = strip_tags($_POST["submit"]);
$id_num = strip_tags($_POST["id_num"]);
$comment_id_edit = strip_tags($_POST["comment_id_edit"]);
$name = strip_tags($_POST["name"]);
$comment = strip_tags($_POST["comment"]);
$comment_edit = strip_tags($_POST["comment_edit"]);
$passwd = strip_tags($_POST["passwd"]);
$comment_id = strip_tags($_POST["comment_id"]);
$date = strip_tags($_POST["date"]);
$domain = strip_tags($_POST["domain"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once 'inc_head.php'; ?>
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">

<?php
/*if ($submit == "Fill in") {
	if (!$comment || !$name || !$passwd) {
		echo <<<ERROR
	<a href="diary_1word.php">お名前､コメント、パスワードは必ず入力してくださいね。 </a>
ERROR;
	} else {
		$sql = "insert into
			DiaryComments
		(
		 	id_num, 
			input_date,
			name, 
			comment, 
			passwd,
			domain
		)
		values
		(
		 	'$id_num', 
			now(), 
			'$name', 
			'$comment', 
			'$passwd',
			'$domain'
		)";

		$result = mysqli_query($link, $sql);
		header("Location:diary_old.php?date_old=$date");
		echo "<meta http-equiv=\"refresh\" content=\"0; URL=diary_old.php?date_old=$date\">";
	}


} else if ($submit == "Edit") {
	$sql = "
		update 
			DiaryComments
		set 
			comment = '$comment_edit'
		where 
			comment_id = '$comment_id'
		";
	$result = mysqli_query($link, $sql);
	header("Location:diary_old.php?date_old=$date");
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=diary_old.php?date_old=$date\">";
} else if ($submit == "Delete") {
	$sql = "
		delete from 
			DiaryComments
		where 
			comment_id = '$comment_id'
		";
	$result = mysqli_query($link, $sql);
	header("Location:diary_old.php?date_old=$date");
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=diary_old.php?date_old=$date\">";
}*/
?>
</body>
</html>