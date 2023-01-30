<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");

$self = strip_tags($_SERVER['PHP_SELF']);
$detail_id = strip_tags($_POST['detail_id']);
$detail_name = strip_tags($_POST['detail_name']);
$main_id = strip_tags($_REQUEST['main_id']);
$quantity = strip_tags($_POST['quantity']);
$submit = strip_tags($_REQUEST['submit']);
$calorie = strip_tags($_POST['calorie']);

/*
echo "self - - ". $self. "<br />";
echo "detail_id - - ". $detail_id. "<br />";
echo "detail_name - - ". $detail_name. "<br />";
echo "main_id - - ". $main_id. "<br />";
echo "quantity - - ". $quantity. "<br />";
echo "submit - - ". $submit. "<br />";
echo "calorie - - ". $calorie. "<br />";
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>食事入力</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" ;/>
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<meta name="author" content="Kiyoshi Hiramatsu"/>
	<meta name="Reply-to" content="kyo@hiramatsu.be"/>
	<meta name="Description" content="Kiyoshi Hiramatsu's Diary"/>
	<meta name="copyright" content="Copyright(C)2002 hiramatsu.be"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Cache-Control" content="no-cache"/>
	<link rel="stylesheet" href="../general.css" type="text/css"/>
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">

<?php
if ($submit == "Input") {
	?>

	<form action="<?php echo $self ?>" method="post">
		<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td width="185"><?php include("../inc_diary_menu.php"); ?></td>
				<td valign="top"><h2>検索</h2>
					<table border="1" cellspacing="0" cellpadding="2">
						<tr>
							<td>メニューから検索　</td>
							<td>
								<input type="text" name="detail_name"/>
								<input type="hidden" name="main_id" value="<?php echo $main_id; ?>"/>
							</td>
							<td><input type="submit" value="Search" name="submit"/></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>

	<?php
} else if ($submit == "Search") {

	echo <<<TOP
	<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td width="185">　</td>
		<td valilgn="top"><h2>検索結果一覧</h2>
			<table border="1" cellspacing="0" cellpadding="2">
TOP;

	$sql = "
	select
		count(*) as count_id
	from
		food_detail
	where
		detail_name like '%$detail_name%'
	";

	$result_search_count = mysqli_query($sql, $link);

	$row_search_count = mysqli_fetch_array($result_search_count);
	$count_id = $row_search_count["count_id"];

	if ($count_id == 0) {
		echo "<tr><td>一致するデータがありません。</td></tr>";
	} else {

		$sql = "
		select
			detail_id,
			detail_name,
			calorie
		from
			food_detail
		where
			detail_name like '%$detail_name%'
		";

		$result_search = mysqli_query($sql, $link);

		while ($row_search = mysqli_fetch_array($result_search)) {
			$detail_id = $row_search["detail_id"];
			$detail_name = $row_search["detail_name"];
			$calorie = $row_search["calorie"];
			$count_id = $row_search["count_id"];


			echo <<<EOF
	<tr>
		<form action="$self" method="post">
		<td>$detail_name</td>
		<td align="right">$calorie kcal</td>
		<td>　量：<input type="text" name="quantity" size="4" />　</td>
		<td>
			<input type="hidden" name="detail_id" value="$detail_id" />
			<input type="hidden" name="detail_name" value="$detail_name" />
			<input type="hidden" name="main_id" value="$main_id" />
			<input type="hidden" name="calorie" value="$calorie" />
			<input type="submit" value="Select" name="submit" />
		</td>
		</form>
	</tr>
EOF;
		}
	}

	echo <<<END
			</table>
		</td>
	</tr>
</table>
END;

} else if ($submit == "Select") {

	$sql = "
	insert into
		meal
	(
		main_id,
		detail_id,
		detail_name,
		calorie,
		quantity
	)
	values
	(
		'$main_id',
		'$detail_id',
		'$detail_name',
		'$calorie',
		'$quantity'
	)
	";
	$result_insert = mysqli_query($sql, $link);

	if (!$result_insert) {
		$message = 'Invalid query: ' . mysqli_error() . "\n";
		$message .= 'Whole query: ' . $sql;
		die($message);
	}

	$refresh = $self . "?submit=Input& main_id=" . $main_id;
	echo <<<REFRESH
	<meta http-equiv="refresh" content="0; URL=$refresh">
REFRESH;
}
?>
</body>
</html>