<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
$title = "解析グラフ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("inc_head.php"); ?>

<script type="text/javascript">
$(function() {
    $('#Where_culum').change(function(){
        var Where_culum = $(this).val();
        $("#data_display").load(
            Where_culum
          );
    });
});
</script>

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
						<h2>
							<img src="image/analysis.jpg" alt="Analysis" width="30"
								height="42" border="0" align="absmiddle" /> 分析グラフ
						</h2>
						<table>
							<tr>
								<td>グラフ選択</td>
								<td><img src="image/go.gif" alt="Go Button" width="41"
									height="25" border="0" align="absmiddle" />
								</td>
								<td><select name="Where_culum" id="Where_culum">
										<option>下記から選択</option>
										<option value="graph_year.php">年間潜水数</option>
										<option value="graph_geer.php">スーツ別潜水数</option>
										<option value="graph_air.php">エア消費量推移</option>
										<option value="graph_depth_air.php">最大深度とエア消費量</option>
										<option value="graph_avedepth_air.php">平均深度とエア消費量</option>
										<option value="graph_temp_air.php">水温とエア消費量</option>
										<option value="graph_suit_air.php">スーツとエア消費量</option>
								</select>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!-- サイドバー終了 -->
		</div>
		<hr class="clear">
	<!-- コンテンツ終了 -->
	</div>
	<div id="data_display" class="graph"></div>
	<!-- フッタ開始 -->
	<?php
require_once("inc_footer.php");
?>

	<!-- フッタ終了 -->
</body>
</html>
