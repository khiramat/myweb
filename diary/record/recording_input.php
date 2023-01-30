<?php
$link = mysqli_connect("mysql204.db.sakura.ne.jp", "hiramatsu", "freenap");
$db = mysqli_select_db(hiramatsu, $link);
mysqli_query("set names utf8");

$self = strip_tags($_SERVER['PHP_SELF']);
$detail_id = strip_tags($_POST['detail_id']);
$detail_name = strip_tags($_POST['detail_name']);
$main_id = strip_tags($_REQUEST['main_id']);
$quantity = strip_tags($_POST['quantity1']) . "." . strip_tags($_POST['quantity2']);
$submit = strip_tags($_REQUEST['submit']);
$calorie = strip_tags($_POST['calorie']);
$qnt = strip_tags($_POST['qnt']);

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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
	<title>食事入力</title>
	<link rel="stylesheet" href="stylesheets/iphone.css"/>
	<script type="text/javascript">
		function clickclear(thisfield, defaulttext) {
			if (thisfield.value == defaulttext) {
				thisfield.value = "";
			}
		}
		function clickrecall(thisfield, defaulttext) {
			if (thisfield.value == "") {
				thisfield.value = defaulttext;
			}
		}
	</script>
	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-25509634-1']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>
</head>

<body>
<div id="header">
	<h1>Data Input</h1>
	<a href="index.html" id="backButton" class="nav">Back</a>
</div>

<?php
if ($submit == "Input") {
	?>
	<div>
		<form action="<?php echo $self ?>" method="post" name="frm" id="frm">
			<ul class="form">
				<li>
					<select name="main_id">

						<?php
						$sql = "select max(id) from main";
						$result_num = mysqli_query($link, $sql);
						$row_max_id = mysqli_fetch_array($result_num);
						$max_id = $row_max_id["max(id)"];
						$max_id_end = $max_id - 5;
						$sql = "
	select 
		* 
	from 
		main 
	where 
		id between '$max_id_end' and '$max_id' 
	order by 
		id desc
	";
						$result_main = mysqli_query($link, $sql);
						while ($row_main = mysqli_fetch_array($result_main)) {
							$main_id = $row_main["id"];
							$date = $row_main["date"];

							echo <<<DATE
<option value="$main_id">$date</option>
DATE;
						}
						?>
					</select>

				</li>
				<li><input name="submit" type="submit" value="Send"/></li>
			</ul>
		</form>
	</div>
	<ul class="form">
		<li><a href="../index.php">Home</a></li>
	</ul>
	<?php
} else if ($submit == "Send") {
	?>

	<h1>入力</h1>
	<form action="<?php echo $self ?>" method="post" name="frm" id="frm">

		<ul class="form">
			<li>
				<input type="text" name="detail_name" value="Search" id="detail_name" onclick="clickclear(this, 'Search')"
				       onblur="clickrecall(this,'Search')"/>
				<input type="hidden" name="main_id" value="<?php echo $main_id; ?>"/>

			</li>
			<li>
				<input name="submit" type="submit" value="Search"/>
			</li>
		</ul>
	</form>

	<hr/>

	<h1>よく食べるメニュー</h1>

	<?php
	$sql = "
select
	detail_id,
	detail_name,
	calorie,
	qnt
from
	food_detail
where
	qnt >20
order by
	qnt desc
";

	$result_fav = mysqli_query($sql, $link);

	echo "<table border=1>";

	while ($row_fav = mysqli_fetch_array($result_fav)) {
		$detail_id = $row_fav["detail_id"];
		$detail_name = $row_fav["detail_name"];
		$calorie = $row_fav["calorie"];
		$qnt = $row_fav["qnt"];

		echo <<<EOF
	<tr>
		<form action="$self" method="post">
		<td>$detail_name</td>
		<td align="right">$calorie</td>
		<td nowrap="nowrap">
		<select name="quantity1">
		<option value="0">0</option>
		<option value="1" selected="selected">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select>
.
<select name="quantity2">
		<option value="0" selected="selected">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select>
		</td>
		<td>
		<input type="hidden" name="detail_id" value="$detail_id" />
			<input type="hidden" name="detail_name" value="$detail_name" />
			<input type="hidden" name="main_id" value="$main_id" />
			<input type="hidden" name="calorie" value="$calorie" />
			<input type="hidden" name="qnt" value="$qnt" />
			<input type="submit" value="OK" name="submit" />
		</td>
		</form>
	</tr>
EOF;
	}
	echo "</table>";
	?>


	<?php
} else if ($submit == "Search") {

	echo <<<TOP
	<h1>検索結果一覧</h1>
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
			calorie,
			qnt
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
			$qnt = $row_search["qnt"];
//			$count_id = $row_search["count_id"];


			echo <<<EOF
	<tr>
		<form action="$self" method="post">
		<td>$detail_name</td>
		<td align="right">$calorie</td>
		<td nowrap="nowrap">
		<select name="quantity1">
		<option value="0">0</option>
		<option value="1" selected="selected">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select>
.
<select name="quantity2">
		<option value="0" selected="selected">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		</select>
		</td>
		<td>
		<input type="hidden" name="detail_id" value="$detail_id" />
			<input type="hidden" name="detail_name" value="$detail_name" />
			<input type="hidden" name="main_id" value="$main_id" />
			<input type="hidden" name="calorie" value="$calorie" />
			<input type="hidden" name="qnt" value="$qnt" />
			<input type="submit" value="OK" name="submit" />
		</td>
		</form>
	</tr>
EOF;
		}
	}

	echo <<<END
			</table>
END;

} else if ($submit == "OK") {

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

	$qnt++;

	$sql = "
	update  food_detail
	set
		qnt = '$qnt'
	where
		detail_id = '$detail_id'
	";
	$result_update = mysqli_query($sql, $link);

	if (!$result_update) {
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
<hr/>
<p><strong>Calorie Management</strong><br/>
	copyright (c) hiramtsu.be all rights reserved.</p>

</body>
</html>