
<?php
$path = "/var/www/kh/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("inc_head.php"); ?>
<title>エア消費量推移</title>
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
						<table border="1" cellspacing="2" cellpadding="2">
							<tr>
								<td>ID</td>
								<td>Date</td>
								<td>Time(min)</td>
								<td>Depth(m)</td>
								<td>Tankage(L)</td>
								<td>Start(bar)</td>
								<td>End(bar)</td>
								<td>Consumption(L)</td>
								<td>Consumption/Min(L)</td>
							</tr>
							<?php
	$sql = "
	select 
		EntryTime,
		ExitTime,
		StartPressure,
		EndPressure,
		DivingTankage.Tankage as Tankage,
		AvarageDepth,
		DivingLogID,
		DiveDate
	from 
		DivingLog,
		DivingTankage
	where
		DivingLog.Tankage = DivingTankage.TankageMaster
		and DiveDate like '2011-05%'
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
		$DivingLogID= $RowAir["DivingLogID"];
		$DiveDate= $RowAir["DiveDate"];

		$DaveDateYear = substr($DiveDate, 0, 4);
		$DaveDateMonth = substr($DiveDate, 5, 2);
		$DaveDateDay = substr($DiveDate, 8, 2);

		$StartHour = substr($EntryTime , 0, 2);
		$StartMin = substr($EntryTime , 3, 2);
		$EndHour = substr($ExitTime , 0, 2);
		$EndMin = substr($ExitTime , 3, 2);

		$DiveMKTime = mktime($EndHour, $EndMin, 0, $DaveDateMonth, $DaveDateDay, $DaveDateYear) - mktime($StartHour, $StartMin, 0, $DaveDateMonth, $DaveDateDay, $DaveDateYear);
		
		$DiveTime = $DiveMKTime / 60;
		$Air = $StartPressure - $EndPressure;
		$AirMin = $Air * $Tankage / ($AvarageDepth / 10 + 1) / $DiveTime;

	echo <<<EOF
							<tr>
								<td>$DivingLogID</td>
								<td>$DiveDate</td>
								<td>$DiveTime</td>
								<td>$AvarageDepth</td>
								<td>$Tankage</td>
								<td>$StartPressure </td>
								<td>$EndPressure</td>
								<td>$Air</td>
								<td>$AirMin</td>
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
<div id="footer">
	<div class="container"> 
		<!--
<ul class="nl">
<li><a href="type2_design1_top.html">ホーム</a></li>
<li><a href="type2_design1_low.html">サービス内容</a></li>
<li><a href="#">制作実績</a></li>
<li><a href="#">料金表</a></li>
<li><a href="#">会社案内</a></li>
</ul>
<ul class="nl guide">
<li><a href="#">FAQ</a></li>
<li><a href="#">プライバシーポリシー</a></li>
<li><a href="#">アクセス</a></li>
<li><a href="#">サイトマップ</a></li>
</ul>
-->
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