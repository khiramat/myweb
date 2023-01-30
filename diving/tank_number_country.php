<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once("inc_head.php"); ?>
<title>サイト別タンク数</title>
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
					<h2>国別タンク数</h2>
					<div>
						<table width="200" border="1" cellspacing="2" cellpadding="2">
							<tr>
								<th>国名</th>
								<th>タンク数</th>
							</tr>
							<?php
$sql = "
select 
	count(DivingLogID) as divenum,
	DivingCountry.Country as Country
from 
	DivingLog,
	DivingSite,
	DivingCountry
where
	DivingLog.Site = DivingSite.SiteMaster
	and DivingSite.CountryMaster = DivingCountry.CountryMaster
group by 
	DivingCountry.CountryMaster
order by
	DivingCountry.CountryMaster
";
	
$result = mysqli_query($link_diving, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$Country = $row["Country"];
	$divenum = $row["divenum"];
//	$Total = $Total + $divenum;
echo <<<EOF
						<tr>
							<td>$Country</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
}

$sql = "
select 
	DiveDate
from 
	DivingLog
";
	
$resultTotal = mysqli_query($link_diving, $sql);
$Total = mysqli_num_rows($resultTotal);
?>
							<tr>
								<th>タンク合計</th>
								<th><?=$Total?></th>
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