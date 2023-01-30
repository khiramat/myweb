<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
$title = "ログ解析";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("inc_head.php"); ?>
</head>

<body>
<!-- ヘッダ開始 -->
<?php
require_once("inc_header.php");
?>
<!-- ヘッダ終了 --> 

<!-- コンテンツ開始 -->
<div id="content">
	<div class="container"> 
		<!-- サイドバー開始 -->
		<div id="nav">
			<div class="section strong">
				<div class="inner">
					<h2><img src="image/analysis.jpg" alt="Analysis" width="30" height="42" border="0" align="absmiddle" /> ログ解析</h2>
					<table>
						<tr>
							<td>ダイビングログ一覧</td>
							<td><a href="tank_list.php"><img src="image/go.gif" alt="Go Button" width="41" height="25" border="0" align="absmiddle" /></a></td>
						</tr>
						<tr>
							<td>タンク数サマリ</td>
							<td><a href="tank_number.php"><img src="image/go.gif" alt="Go Button" width="41" height="25" border="0" align="absmiddle" /></a></td>
						</tr>
						<tr>
							<td>装備別エア消費量</td>
							<td><a href="air_consumption_equipment.php"><img src="image/go.gif" alt="Go Button" width="41" height="25" border="0" align="absmiddle" /></a></td>
						</tr>
						<tr>
							<td>エア消費量推移</td>
							<td><a href="air_consumption.php"><img src="image/go.gif" alt="Go Button" width="41" height="25" border="0" align="absmiddle" /></a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- サイドバー終了 --> 
	</div>
	<hr class="clear">
</div>
<!-- コンテンツ終了 -->
</div>
<!-- フッタ開始 -->
	<!-- フッタ開始 -->
	<?php
require_once("inc_footer.php");
?>

	<!-- フッタ終了 -->
<!-- フッタ終了 -->
</body>
</html>