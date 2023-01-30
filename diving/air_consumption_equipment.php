
<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
$title = "装備別エア消費量";
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
			<div class="section emphasis">
				<div class="inner">
					<h2>装備別エア消費量</h2>
					<div>
						<table width="300" border="1" cellspacing="0" cellpadding="2">
							<tr>
								<th>装備</th>
								<th>タンク数</th>
								<th>平均消費量</th>
							</tr>
		<?php
$sql = "
select 
	SuitMaster,
	Suit
from
	DivingSuit
order by
	SuitMaster
";
$resultSuit = mysqli_query($link_diving, $sql);
while ($RowSuit = mysqli_fetch_assoc($resultSuit)){
	$SuitMaster = $RowSuit["SuitMaster"];
	$Suit = $RowSuit["Suit"];


	$sql = "
	select 
		EntryTime,
		ExitTime,
		StartPressure,
		EndPressure,
		DivingTankage.Tankage as Tankage,
		AvarageDepth
	from 
		DivingLog,
		DivingTankage
	where
		DivingLog.Tankage = DivingTankage.TankageMaster
		and DivingLog.Suit = '$SuitMaster'
	";
		
	$resultAir = mysqli_query($link_diving, $sql);
	$Total = mysqli_num_rows($resultAir);
	$AirMinTotal = 0;
	
	while ($RowAir = mysqli_fetch_assoc($resultAir)){
		$EntryTime = $RowAir["EntryTime"];
		$ExitTime = $RowAir["ExitTime"];
		$StartPressure = $RowAir["StartPressure"];
		$EndPressure = $RowAir["EndPressure"];
		$Tankage = $RowAir["Tankage"];
		$AvarageDepth = $RowAir["AvarageDepth"];

		$StartHour = substr($EntryTime , 0, 2);
		$StartMin = substr($EntryTime , 3, 2);
		$EndHour = substr($ExitTime , 0, 2);
		$EndMin = substr($ExitTime , 3, 2);

		$DiveMKTime = mktime($EndHour, $EndMin, 0, 1, 1, 2000) - mktime($StartHour, $StartMin, 0, 1, 1, 2000);
		
		$DiveTime = $DiveMKTime / 60;
		
		$AirMin = ($StartPressure - $EndPressure) * $Tankage / ($AvarageDepth / 10 + 1) / $DiveTime;
		$AirMinTotal = $AirMinTotal + $AirMin;
	}

	$AirAve = round(($AirMinTotal / $Total), 2);
	echo <<<EOF
							<tr>
								<td>$Suit</td>
								<td align="right">$Total</td>
								<td align="right">$AirAve</td>
							</tr>
EOF;
}
?>
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