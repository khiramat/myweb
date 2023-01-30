
<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");


$year = "2009";
$month = "06";
$EndDate = date("Y-m");
$i = 0;
while ($EndDate > @$CalcDate){
	$CalcDate = date("Y-m", mktime(0, 0, 0, $month + $i, 1, $year));
	$GraphDate =  date("Ym", mktime(0, 0, 0, $month + $i, 1, $year));
	$GraphDate =  mktime(0, 0, 0, $month + $i, 1, $year);
	@$XAxis .= "'". $CalcDate. "',";
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
		and DiveDate like '$CalcDate%'
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
		$AirMin = round($AirMin, 2);
		if ($AirMin < 20 && $AirMin > 8 ){
				@$GraphData .= "[". $GraphDate. ", ". $AirMin. "],";
		}
	}
	$i ++;
}
$GraphData = substr($GraphData, 0, -1);

?>
<script type="text/javascript">

(function($){ // encapsulate jQuery

var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
			type: 'scatter'
		},
		title: {
			text: 'Air Consumption Trend'
		},
		subtitle: {
			text: 'Source: Kiyoshi Hiramatsu Diving Record'
		},
		xAxis: {
			title: {
				enabled: true,
				text: 'Unix Time'
			},
			startOnTick: true,
			endOnTick: true,
			showLastLabel: true
		},
		yAxis: {
			title: {
				text: 'Air Consumption (lit/min)'
			}
		},
		tooltip: {
			formatter: function() {
					return ''+
					this.x +', '+ this.y +'  lit/min';
			}
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			verticalAlign: 'top',
			x: 10,
			y: 10,
			floating: true,
			backgroundColor: '#FFFFFF',
			borderWidth: 1
		},
		plotOptions: {
			scatter: {
				marker: {
					radius: 5,
					states: {
						hover: {
							enabled: true,
							lineColor: 'rgb(100,100,100)'
						}
					}
				},
				states: {
					hover: {
						marker: {
							enabled: false
						}
					}
				}
			}
		},
		series: [{
			name: 'Air Consumption',
			color: 'rgba(223, 0, 223, .5)',
			data: [<?=$GraphData?>]
		}]
	});
});

})(jQuery);

</script>
<div id="container" style="width: 900px; height: 600px; margin: 0 auto"></div>
