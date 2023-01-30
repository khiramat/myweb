
<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");

$GraphData = "{name: 'Tunk Number',data: [";

	$sql = "
	select 
		count(DivingLogID) as DivingLog,
		substring(DiveDate, 1, 4) as DiveYear
	from 
		DivingLog
	group by
		substring(DiveDate, 1, 4)
	order by
		substring(DiveDate, 1, 4)
	";
		
	$result = mysqli_query($link_diving, $sql);
	while ($Row = mysqli_fetch_assoc($result)){
		$DivingLog = $Row["DivingLog"];
		$DiveYear = $Row ["DiveYear"];
		@$GraphData .= $DivingLog. ",";
		@$XAxis .= "'". $DiveYear. "',";
	}


$XAxis = substr($XAxis, 0, -1);
$GraphData = substr($GraphData, 0, -1);
$GraphData .= "]}";

?>
<script type="text/javascript">

(function($){ // encapsulate jQuery

var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
			type: 'column'
		},
		title: {
			text: 'Tunk Number Summary by Year'
		},
		subtitle: {
			text: 'Source: kiyoshi hiramatsu'
		},
		xAxis: {
			categories: [<?=$XAxis?>]
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Tunk Number'
			}
		},
		legend: {
			layout: 'vertical',
			backgroundColor: '#FFFFFF',
			align: 'left',
			verticalAlign: 'top',
			x: 100,
			y: 70,
			floating: true,
			shadow: true
		},
		tooltip: {
			formatter: function() {
				return ''+
					this.x +': '+ this.y +' ';
			}
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
			series: [<?=$GraphData?>]
	});
});

})(jQuery);


</script>
<div id="container" style="width: 900px; height: 600px; margin: 0 auto"></div>
