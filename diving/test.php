
<?php
$path = "/var/www/kh/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>エア消費量推移</title>
<link href="css/base.css" rel="stylesheet" type="text/css" />
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
					<h2>エア消費量推移</h2>
					<div>
						<table width="300" border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th>年月</th>
								<th>タンク数</th>
								<th>平均消費量</th>
							</tr>
							<?php
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
		and DiveDate like '2010-12%'
	";
		
	$resultAir = mysqli_query($link_diving, $sql);
	$Total = mysqli_num_rows($resultAir);
	
	while ($RowAir = mysqli_fetch_assoc($resultAir)){
		$EntryTime = $RowAir["EntryTime"];
		$ExitTime = $RowAir["ExitTime"];
		$StartPressure = $RowAir["StartPressure"];
		$EndPressure = $RowAir["EndPressure"];
		$Tankage = $RowAir["Tankage"];
		$AvarageDepth = $RowAir["AvarageDepth"];
		
		$DiveTime = strtotime($ExitTime) - strtotime($EntryTime);
		$DiveTime = date("i", $DiveTime);		
		$AirMin = ($StartPressure - $EndPressure) * $Tankage / ($AvarageDepth / 10 + 1) / $DiveTime;
		$AirMinTotal = $AirMinTotal + $AirMin;
	}

	$AirAve = round(($AirMinTotal / $Total), 2);
	echo <<<EOF
							<tr>
								<td>$CalcDate</td>
								<td>$Total</td>
								<td>$AirAve</td>
							</tr>
EOF;
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
<div id="footer">
	<div class="container"> 
		<address>
		<strong>This site</strong> <br>
		神奈川県茅ヶ崎市矢畑 531-10 TEL 090-6028-7942 <br>
		Copyright (C) 2011 hiramatsu.be. All Rights Reserved.
		</address>
	</div>
</div>
<!-- フッタ終了 -->
</body>
</html>