
<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");

$sql = "
select 
	EntryTime,
	ExitTime,
	StartPressure,
	EndPressure,
	DivingTankage.Tankage as Tankage,
	AvarageDepth,
	AvarageDepth
from 
	DivingLog,
	DivingTankage
where
	DivingLog.Tankage = DivingTankage.TankageMaster
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
	if ($AirMin < 18 && $AirMin > 9 ){
		@$GraphData .= "[". $AirMin. ", ". $AvarageDepth. "],";
	}
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
			type: 'scatter',
			zoomType: 'xy'
		},
		title: {
			text: 'Average Depth and Air Consumption'
		},
		subtitle: {
			text: 'Source: Kiyoshi Hiramatsu Diving Record'
		},
		xAxis: {
			title: {
				enabled: true,
				text: 'Air Consumption (lit/min)'
			},
			startOnTick: true,
			endOnTick: true,
			showLastLabel: true
		},
		yAxis: {
			title: {
				text: 'Average Depth (m)'
			}
		},
		tooltip: {
			formatter: function() {
					return ''+
					this.x +' lit/min, '+ this.y +' m';
			}
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			verticalAlign: 'top',
			x: 100,
			y: 70,
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
			color: 'rgba(223, 83, 83, .5)',
			data: [<?=$GraphData?>]
		}]
	});
});

})(jQuery);

</script>
<!-- <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"> -->
<div id="container" style="width: 900px; height: 600px; margin: 0 auto"></div>