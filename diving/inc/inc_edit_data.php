<?php
$sql = "select * from DivingLog where DivingLogID = $DivingLogID";
$result = mysqli_query($link_diving, $sql);
$row_lastdata = mysqli_fetch_assoc($result);

$DiveDate = $row_lastdata["DiveDate"];
$SiteMaster = $row_lastdata["Site"];
$Point_last = $row_lastdata["Point"];
$WaterMaster = $row_lastdata["Water"];
$KindMaster = $row_lastdata["Kind"];
$High_last = $row_lastdata["High"];
$StyleMaster = $row_lastdata["Style"];
$WeatherMaster = $row_lastdata["Weather"];
$Temperature_last = $row_lastdata["Temperature"];
$WindMaster = $row_lastdata["Wind"];
$VelocityWindMaster = $row_lastdata["VelocityWind"];
$WaveMaster = $row_lastdata["Wave"];
$Current_last = $row_lastdata["Current"];
$Undulation_last = $row_lastdata["Undulation"];
$WaterTemperature_last = $row_lastdata["WaterTemperature"];
$Transparency_last = $row_lastdata["Transparency"];
$EntryTimetime_last = $row_lastdata["EntryTime"];
$ExitTimetime_last = $row_lastdata["ExitTime"];
$MaximumDepth_last = $row_lastdata["MaximumDepth"];
$AvarageDepth_last = $row_lastdata["AvarageDepth"];
$SuitMaster = $row_lastdata["Suit"];
$Weight_last = $row_lastdata["Weight"];
$TankMaster = $row_lastdata["Tank"];
$TankageMaster = $row_lastdata["Tankage"];
$OxygenMaster = $row_lastdata["OxygenLaw"];
$StartPressure_last = $row_lastdata["StartPressure"];
$EndPressure_last = $row_lastdata["EndPressure"];
$Comment_last = $row_lastdata["Comment"];
$Creature_last = $row_lastdata["Creature"];
$Service_last = $row_lastdata["Service"];
$Buddy_last = $row_lastdata["Buddy"];
$Member_last = $row_lastdata["Member"];
$Guide_last = $row_lastdata["Guide"];
$Navigation = $row_lastdata["Navigation"];

list($year, $month, $day) = explode("-", $DiveDate);
list($EntryTimetime_hour, $EntryTimetime_minites) = explode(":", $EntryTimetime_last);
list($ExitTimetime_hour, $ExitTimetime_minites) = explode(":", $ExitTimetime_last);

?>