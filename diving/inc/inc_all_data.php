<?php

$sql = "select * from DivingLog where DivingLogID = $DivingLogID";
$result = mysqli_query($link_diving, $sql);
$row_alldata = mysqli_fetch_assoc($result);

$DiveDate = $row_alldata["DiveDate"];
$SiteMaster = $row_alldata["Site"];
$Point = $row_alldata["Point"];
$WaterMaster = $row_alldata["Water"];
$KindMaster = $row_alldata["Kind"];
$High = $row_alldata["High"];
$StyleMaster = $row_alldata["Style"];
$WeatherMaster = $row_alldata["Weather"];
$Temperature = $row_alldata["Temperature"];
$WindMaster = $row_alldata["Wind"];
$VelocityWindMaster = $row_alldata["VelocityWind"];
$WaveMaster = $row_alldata["Wave"];
$Current = $row_alldata["Current"];
$Undulation = $row_alldata["Undulation"];
$WaterTemperature = $row_alldata["WaterTemperature"];
$Transparency = $row_alldata["Transparency"];
$EntryTime = $row_alldata["EntryTime"];
$ExitTime = $row_alldata["ExitTime"];
$MaximumDepth = $row_alldata["MaximumDepth"];
$AvarageDepth = $row_alldata["AvarageDepth"];
$SuitMaster = $row_alldata["Suit"];
$Weight = $row_alldata["Weight"];
$TankMaster = $row_alldata["Tank"];
$TankageMaster = $row_alldata["Tankage"];
$OxygenMaster = $row_alldata["OxygenLaw"];
$StartPressure = $row_alldata["StartPressure"];
$EndPressure = $row_alldata["EndPressure"];
$Comment = $row_alldata["Comment"];
$Creature = $row_alldata["Creature"];
$Service = $row_alldata["Service"];
$Buddy = $row_alldata["Buddy"];
$Member = $row_alldata["Member"];
$Guide = $row_alldata["Guide"];
$Navigation = $row_alldata["Navigation"];

?>