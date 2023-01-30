<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once("inc_init.php");
$title = "タンク数サマリ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require_once("inc_head.php"); ?>
</head>

<body>
<!-- ヘッダ開始 -->
<?php
require_once("inc_header.php");
$sql = "
select 
	DivingLogID
from 
	DivingLog
";
$Result = mysqli_query($link_diving, $sql);
$Total = mysqli_num_rows($Result);

?>
<!-- ヘッダ終了 -->

<!-- コンテンツ開始 -->
<div id="content">
  <div class="container">
	<!-- サイドバー開始 -->
	<div id="nav">
	  <div class="section emphasis">
		<div class="inner">
		  <h2>タンク数サマリ 合計<?= $Total ?>本</h2>
		  <div>
			<table border="0" cellspacing="2" cellpadding="2">
			  <tr>
				<td valign="top">
				  <table border="1" cellspacing="0" cellpadding="2" width="250">
                      <?php
                      $StartYear = "2009";
                      $StartMonth = "06";

                      $EndYear = date("Y");
                      $i = 0;
                      $Raw = 0;

                      while ($EndYear > @$CalcYear) {
                          $CalcYear = date("Y", mktime(0, 0, 0, 1, 1, $StartYear + $i));

                          $sql = "
	select 
		DiveDate
	from 
		DivingLog
	where
		DiveDate like '$CalcYear%'
	";

                          $ResultYear = mysqli_query($link_diving, $sql);
                          $YearTotal = mysqli_num_rows($ResultYear);

                          $e = 0;

                          if ($CalcYear == "2009") {
                              $MKMonth = $StartMonth;
                              $Raw = 8;
                          } else {
                              $MKMonth = "01";
                              $Raw = 13;
                          }

                          echo "<tr><td rowspan=\"" . $Raw . "\">" . $CalcYear . "年<br />合計" . $YearTotal . "本</td><th>月</th><th>タンク数</th></tr>";

                          $CalcMonthCalc = 1;

                          while ($CalcMonthCalc < "12") {
                              $CalcMonthCalc = date("n", mktime(0, 0, 0, $MKMonth + $e, 1, $CalcYear));
                              $CalcMonth = date("m", mktime(0, 0, 0, $MKMonth + $e, 1, $CalcYear));
                              $CalcDate = $CalcYear . "-" . $CalcMonth;

                              $sql = "
		select 
			DiveDate
		from 
			DivingLog
		where
			DiveDate like '$CalcDate%'
		";

                              $ResultMonth = mysqli_query($link_diving, $sql);
                              $MonthTotal = mysqli_num_rows($ResultMonth);

                              echo <<<EOF
									<tr>
									<td align="right">$CalcMonthCalc</td>
									<td align="right">$MonthTotal</td>
									</tr>
EOF;

                              $e++;
                          }

                          $i++;


                      }
                      ?>
				  </table>
				</td>
				<td valign="top">
				  <table width="200" border="1" cellspacing="0" cellpadding="2">
					<tr>
					  <th>サイト名</th>
					  <th>タンク数</th>
					</tr>
                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingSite.Site as Site
from 
	DivingLog,
	DivingSite
where
	DivingLog.Site = DivingSite.SiteMaster
group by 
	DivingLog.Site, DivingSite.Site
order by
	CountryMaster,
	PrefectureMaster
";

                      $resultSite = mysqli_query($link_diving, $sql);
                      while ($rowSite = mysqli_fetch_assoc($resultSite)) {
                          $Site = $rowSite["Site"];
                          $divenum = $rowSite["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$Site</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }

                      ?>
				  </table>
				</td>
				<td valign="top">
				  <table width="200" border="1" cellspacing="0" cellpadding="2">
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

                      $resultCountry = mysqli_query($link_diving, $sql);
                      while ($rowCountry = mysqli_fetch_assoc($resultCountry)) {
                          $Country = $rowCountry["Country"];
                          $divenum = $rowCountry["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$Country</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>ダイビングスタイル</th>
					  <th>タンク数</th>
					</tr>
                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingStyle.Style as StyleName
from 
	DivingLog,
	DivingStyle
where
	DivingLog.Style = DivingStyle.StyleMaster
group by 
	DivingLog.Style, DivingStyle.Style
order by
	DivingLog.Style
";

                      $resultStyle = mysqli_query($link_diving, $sql);
                      while ($rowStyle = mysqli_fetch_assoc($resultStyle)) {
                          $StyleName = $rowStyle["StyleName"];
                          $divenum = $rowStyle["divenum"];
                          echo <<<EOF
						<tr>
							<td>$StyleName</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>

					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>エントリー方</th>
					  <th>タンク数</th>
					</tr>
                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingKind.Kind as Kind
from 
	DivingLog,
	DivingKind
where
	DivingLog.Kind = DivingKind.KindMaster
group by 
	DivingKind.KindMaster, DivingKind.Kind
order by
	DivingKind.KindMaster
";

                      $resultKind = mysqli_query($link_diving, $sql);
                      while ($rowKind = mysqli_fetch_assoc($resultKind)) {
                          $Kind = $rowKind["Kind"];
                          $divenum = $rowKind["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$Kind</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>酸素濃度</th>
					  <th>タンク数</th>
					</tr>
                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingOxygen.Oxygen as Oxygen
from 
	DivingLog,
	DivingOxygen
where
	DivingLog.Oxygenlaw = DivingOxygen.OxygenMaster
group by 
	DivingOxygen.OxygenMaster
order by
	DivingOxygen.OxygenMaster
";

                      $resultOxygen = mysqli_query($link_diving, $sql);
                      while ($rowOxygen = mysqli_fetch_assoc($resultOxygen)) {
                          $Oxygen = $rowOxygen["Oxygen"];
                          $divenum = $rowOxygen["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$Oxygen%</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>水域</th>
					  <th>タンク数</th>
					</tr>

                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingWater.Water as Water 
from 
	DivingLog,
	DivingWater
where
	DivingLog.Water = DivingWater.WaterMaster
group by 
	DivingWater.WaterMaster, DivingWater.Water
order by
	WaterMaster
";

                      $resultWater = mysqli_query($link_diving, $sql);
                      while ($rowWater = mysqli_fetch_assoc($resultWater)) {
                          $Water = $rowWater["Water"];
                          $divenum = $rowWater["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$Water</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>海抜</th>
					  <th>タンク数</th>
					</tr>

                      <?php


                      $sql = "
select 
	count(DivingLogID) as divenum,
High
from 
	DivingLog
group by 
	 High
order by
	High
";

                      $resultHigh = mysqli_query($link_diving, $sql);
                      while ($rowHigh = mysqli_fetch_assoc($resultHigh)) {
                          $High = $rowHigh["High"];
                          $divenum = $rowHigh["divenum"];
//	$Total = $Total + $divenum;
                          echo <<<EOF
						<tr>
							<td>$High m</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>スーツ</th>
					  <th>タンク数</th>
					</tr>

                      <?php


                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingSuit.Suit as Suit
from 
	DivingLog,
	DivingSuit
where
	DivingLog.Suit = DivingSuit.SuitMaster
group by 
	DivingSuit.SuitMaster
order by
	DivingSuit.SuitMaster
";
                      $resultSuit = mysqli_query($link_diving, $sql);
                      while ($rowSuit = mysqli_fetch_assoc($resultSuit)) {
                          $Suit = $rowSuit ["Suit"];
                          $divenum = $rowSuit ["divenum"];
                          echo <<<EOF
						<tr>
							<td>$Suit</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
					<tr>
					  <td colspan="2" height="15"></td>
					</tr>
					<tr>
					  <th>ナビゲーション</th>
					  <th>タンク数</th>
					</tr>

                      <?php
                      $sql = "
select 
	count(DivingLogID) as divenum,
	DivingSite.Site as Site
from 
	DivingLog,
	DivingSite
where
	DivingLog.Site = DivingSite.SiteMaster
	and DivingLog.Navigation = 1
group by 
	DivingSite.SiteMaster
order by
	DivingSite.SiteMaster
";
                      $resultNavi = mysqli_query($link_diving, $sql);
                      while ($rowNavi = mysqli_fetch_assoc($resultNavi)) {
                          $Site = $rowNavi ["Site"];
                          $divenum = $rowNavi ["divenum"];
                          echo <<<EOF
						<tr>
							<td>$Site</td>
							<td align="right">$divenum</td>
						</tr>
EOF;
                      }
                      ?>
				  </table>
				</td>
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
<?php
require_once("inc_footer.php");
?>

<!-- フッタ終了 -->
</body>
</html>