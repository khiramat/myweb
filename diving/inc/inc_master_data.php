<?php

$sql = "select Water from DivingWater where WaterMaster = $WaterMaster  order by WaterMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Water = $row_data["Water"];

$sql = "select Kind from DivingKind where KindMaster = $KindMaster order by KindMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Kind = $row_data["Kind"];

$sql = "select Style from DivingStyle where StyleMaster = $StyleMaster order by StyleMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Style = $row_data["Style"];

@$sql = "select Site from DivingSite where SiteMaster = $SiteMaster order by CountryMaster, PrefectureMaster";
$result = mysqli_query($link_diving, $sql);
@$row_data = mysqli_fetch_assoc($result);
$Site = $row_data["Site"];

$sql = "select Weather from DivingWeather where WeatherMaster = $WeatherMaster order by WeatherMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Weather = $row_data["Weather"];

$sql = "select Wind from DivingWind where WindMaster = $WindMaster order by WindMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Wind = $row_data["Wind"];

$sql = "select VelocityWind from DivingVelocityWind where VelocityWindMaster = $VelocityWindMaster order by VelocityWindMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$VelocityWind = $row_data["VelocityWind"];

$sql = "select Wave from DivingWave where WaveMaster = $WaveMaster order by WaveMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Wave = $row_data["Wave"];


$sql = "select Suit from DivingSuit where SuitMaster = $SuitMaster order by SuitMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Suit = $row_data["Suit"];

$sql = "select Tank from DivingTank where TankMaster = $TankMaster order by TankMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Tank = $row_data["Tank"];

$sql = "select Tankage from DivingTankage where TankageMaster = $TankageMaster order by TankageMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Tankage = $row_data["Tankage"];

$sql = "select Oxygen from DivingOxygen where OxygenMaster = $OxygenMaster order by OxygenMaster";
$result = mysqli_query($link_diving, $sql);
$row_data = mysqli_fetch_assoc($result);
$Oxygen = $row_data["Oxygen"];

if (@$Current) {
  @$Current_last = @$Current;
}
if (@$Undulation) {
  $Undulation_last = $Undulation;
}

switch(@$Current_last){
 case 1;
  $Current = "なし";
  break;

 case 2;
  $Current = "弱い";
  break;

 case 3;
  $Current = "強い";
  break;
}

switch(@$Undulation_last){
 case 1;
  $Undulation= "なし";
  break;

 case 2;
  $Undulation= "弱い";
  break;

 case 3;
  $Undulation= "強い";
  break;
}
?>