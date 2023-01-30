<?
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);

require_once("inc_init.php");

$DivingLogID = htmlspecialchars($_POST["DivingLogID"]);

$year = htmlspecialchars($_POST["year"]);
$month = htmlspecialchars($_POST["month"]);
$day = htmlspecialchars($_POST["day"]);

$DiveDate = $year. "-". $month. "-". $day;

$Site = htmlspecialchars($_POST["Site"]);
$Point = htmlspecialchars($_POST["Point"]);
$Water = htmlspecialchars($_POST["Water"]);
$Kind = htmlspecialchars($_POST["Kind"]);
$High = htmlspecialchars($_POST["High"]);
$Style = htmlspecialchars($_POST["Style"]);
$Weather = htmlspecialchars($_POST["Weather"]);
$Temperature = htmlspecialchars($_POST["Temperature"]);
$Wind = htmlspecialchars($_POST["Wind"]);
$VelocityWind = htmlspecialchars($_POST["VelocityWind"]);
$Wave = htmlspecialchars($_POST["Wave"]);
$Current = htmlspecialchars($_POST["Current"]);
$Undulation = htmlspecialchars($_POST["Undulation"]);
$WaterTemperature = htmlspecialchars($_POST["WaterTemperature"]);
$Transparency = htmlspecialchars($_POST["Transparency"]);

$entry_hour = htmlspecialchars($_POST["entry_hour"]);
$entry_minit = htmlspecialchars($_POST["entry_minit"]);
$exit_hour = htmlspecialchars($_POST["exit_hour"]);
$exit_minit = htmlspecialchars($_POST["exit_minit"]);

$EntryTime = $entry_hour. ":". $entry_minit. ":00";
$ExitTime = $exit_hour. ":". $exit_minit. ":00";

$MaximumDepth = htmlspecialchars($_POST["MaximumDepth"]);
$AvarageDepth = htmlspecialchars($_POST["AvarageDepth"]);
$Suit = htmlspecialchars($_POST["Suit"]);
$Weight = htmlspecialchars($_POST["Weight"]);
$Tank = htmlspecialchars($_POST["Tank"]);
$Tankage = htmlspecialchars($_POST["Tankage"]);
$OxygenLaw = htmlspecialchars($_POST["OxygenLaw"]);
$StartPressure = htmlspecialchars($_POST["StartPressure"]);
$EndPressure = htmlspecialchars($_POST["EndPressure"]);
$Comment = htmlspecialchars($_POST["Comment"]);
$Creature = htmlspecialchars($_POST["Creature"]);
$Service = htmlspecialchars($_POST["Service"]);
$Buddy = htmlspecialchars($_POST["Buddy"]);
$Member = htmlspecialchars($_POST["Member"]);
$Guide = htmlspecialchars($_POST["Guide"]);
$Navigation= htmlspecialchars($_POST["Navigation"]);
if (!$Navigation){
$Navigation = 0;
}



$sql = "
update
	DivingLog
set
	DiveDate = '$DiveDate',
	Site = '$Site',
	Point = '$Point',
	Water = '$Water',
	Kind = '$Kind',
	High = '$High',
	Style = '$Style',
	Weather = '$Weather',
	Temperature = '$Temperature',
	Wind = '$Wind',
	VelocityWind = '$VelocityWind',
	Wave = '$Wave',
	Current = '$Current',
	Undulation = '$Undulation',
	WaterTemperature = '$WaterTemperature',
	Transparency = '$Transparency',
	EntryTime = '$EntryTime',
	ExitTime = '$ExitTime',
	MaximumDepth = '$MaximumDepth',
	AvarageDepth = '$AvarageDepth',
	Suit = '$Suit',
	Weight = '$Weight',
	Tank = '$Tank',
	Tankage = '$Tankage',
	OxygenLaw = '$OxygenLaw',
	StartPressure = '$StartPressure',
	EndPressure = '$EndPressure',
	Comment = '$Comment',
	Creature = '$Creature',
	Service = '$Service',
	Buddy = '$Buddy',
	Member = '$Member',
	Guide = '$Guide',
	Navigation = '$Navigation'
where
	DivingLogID = $DivingLogID
";

$result = mysqli_query($link_diving, $sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Diving Log</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
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
<?php
if ($result){
	echo "データを入力しました。<br/ ><br/ ><a href=\"../tank_list.php\">ログ一覧に戻る</a>";
}
?>  
  
  
	</div>
</div>
</body>
</html>