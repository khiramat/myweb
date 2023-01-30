<?php
$path = $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$title = "体重変化";
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
			<div align="center" class="title" lang="en">Health Parameter</div>

			<?php
			$sql = "
select
	*
from
	DiaryOutFrame
";
			$result = mysqli_query($link, $sql);
			$id_fat = mysqli_num_rows($result);
			$check = $id_fat - 200;
			$check_avg = $id_fat - 7;
			$result_weight_avg = mysqli_query($link, "select avg(wt) from DiaryOutFrame where id>'$check_avg'");
			$row_weight_avg = mysqli_fetch_array($result_weight_avg);
			$weight_avg = $row_weight_avg["avg(wt)"];
			?>

			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="graph_title">Date</td>
					<td class="graph_title">Weight</td>
					<td class="graph_title">-</td>
					<td class="graph_title">+</td>
				</tr>
				<?php
				$result_fat = mysqli_query($link, "select * from DiaryOutFrame order by date desc");
				while ($row = mysqli_fetch_array($result_fat)) {
					$ts_fat = strtotime($row["date"]);
					$day_fat = date("Y-m-d", $ts_fat);
					$weight = $row["wt"];
					if ($weight) {
						$sub_wt = $weight - 65;
						if ($sub_wt >= 0) {
							$weight_p = $sub_wt;
							$graph_wt_p = $weight_p * 45;
							?>

							<tr>
								<td class="graph" lang="en" nowrap="nowrap"><?php echo $day_fat; ?></td>
								<td class="graph" lang="en" nowrap="nowrap"><?php echo $weight; ?> kg</td>
								<td class="graph_bar" align="right"></td>
								<td class="graph_bar" align="left">
									<img src="images/graph.gif" width="<?php echo $graph_wt_p; ?>" height="10">
								</td>
							</tr>
							<?php
						} else {
							$weight_m = 65 - $weight;
							$graph_wt_m = $weight_m * 45;
							?>
							<tr>
								<td class="graph" lang="en" nowrap="nowrap"><?php echo $day_fat; ?></td>
								<td class="graph" lang="en" nowrap="nowrap"><?php echo $weight; ?> kg</td>
								<td class="graph_bar" align="right">
									<img src="images/graph2.gif" width="<?php echo $graph_wt_m; ?>" height="10">
								</td>
								<td class="graph_bar" align="left"></td>
							</tr>
							<?php
						}
					}
				}
				?>
				<tr>
					<td><img src="images/spacer.gif" width="60" height="5"/></td>
					<td><img src="images/spacer.gif" width="60" height="5"/></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<hr/>

			<?php
			/*
			$id_fat = mysqli_num_rows($result);
			$check = $id_fat -21;

			echo "
					<table width=\"176\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\" width=\"100%\">
						<tr>
							<td colspan=\"2\" class=\"graphtitle\" lang=\"en\">Fat and Cal</td>
							<td><img src=\"images/spacer.gif\" width=\"150\" height=\"5\" /></td>
							<td></td>
						</tr>
						<tr>
							<td class=\"graph\" lang=\"en\" width=\"10%\">Date</td>
							<td class=\"graph\" lang=\"en\" width=\"10%\">Fat</td>
							<td class=\"graph\" lang=\"en\" width=\"40%\">-</td>
							<td class=\"graph\" lang=\"en\" width=\"40%\">+</td>
						</tr>";
			do{
				$result_fat = mysqli_query("select * from main where id='$id_fat'");
				$row = mysqli_fetch_array($result_fat);
				$ts_fat = strtotime($row["date"]);
				$day_fat = date('m-d',$ts_fat);
				$fat = $row["fat"];
				$sub_fat = $row["fat"] - 20;
				$cal = $row["cal"];
				$graph_cal = $cal / 7;
				if ($sub_fat > 0) {
					$fat_p = $sub_fat;
					$graph_fat_p = $fat_p * 40;

					echo "
						<tr>
							<td class=\"graph\" lang=\"en\" rowspan=\"2\" nowrap=\"nowrap\">$day_fat</td>
							<td class=\"graph\" lang=\"en\" nowrap=\"nowrap\">$fat%</td>
							<td align=\"right\"></td>
							<td><img src=\"images/graph3.gif\" width=\"$graph_fat_p\" height=\"10\"></td>
						</tr>
						<tr>
							<td class=\"graph\" lang=\"en\" nowrap=\"nowrap\">$cal kcal</td>
							<td align=\"right\"></td>
							<td><img src=\"images/graph4.gif\" width=\"$graph_cal\" height=\"10\"></td>
						</tr>";

				}else {
					$fat_m = 20 - $row["fat"];
					$graph_fat_m = $fat_m * 40;
					echo "
						<tr>
							<td class=\"graph\" lang=\"en\" rowspan=\"2\" nowrap=\"nowrap\">$day_fat</td>
							<td class=\"graph\" lang=\"en\" nowrap=\"nowrap\">$fat%</td>
							<td align=\"right\"><img src=\"images/graph2.gif\" width=\"$graph_fat_m\" height=\"10\"></td>
							<td></td>
						</tr>
						<tr>
							<td class=\"graph\" lang=\"en\" nowrap=\"nowrap\">$cal kcal</td>
							<td align=\"right\"></td>
							<td><img src=\"images/graph4.gif\" width=\"$graph_cal\" height=\"10\"></td>
						</tr>";
				}
				$id_fat--;
			}
			while ($id_fat > $check);
			echo "
						<tr>
							<td><img src=\"images/spacer.gif\" width=\"60\" height=\"5\" /></td>
							<td><img src=\"images/spacer.gif\" width=\"60\" height=\"5\" /></td>
							<td ><img src=\"images/spacer.gif\" width=\"150\" height=\"5\" /></td>
							<td></td>
						</tr>
					</table>
			<hr />\n";
			*/
			?>
			<div class="copyright">
				<?= $copyright ?>
			</div>
		</td>
	</tr>
</table>
</body>
</html>
