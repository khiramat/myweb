
<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");

$sql = "
select
	SuitMaster,
	Suit
from
	DivingSuit
order by
	SuitMaster

";

$result = mysqli_query($link_diving, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$SuitMaster = $row["SuitMaster"];
	$Suit = $row["Suit"];
	@$GraphData .= "{name: '$Suit',data: [";

	$sql = "
	select
		substring(DiveDate, 1, 4) as DiveYear
	from
		DivingLog
	group by
		substring(DiveDate, 1, 4)
	order by
		substring(DiveDate, 1, 4)
	";
	$resultDate = mysqli_query($link_diving, $sql);
	while ($rowDate = mysqli_fetch_assoc($resultDate)){
		$DiveYear = $rowDate["DiveYear"];

		$sql = "
		select 
			count(DivingLogID) as DivingLog
		from 
			DivingLog
		where
			Suit = '$SuitMaster'
			and substring(DiveDate, 1, 4) = $DiveYear
		";
		
		$resultSuit = mysqli_query($link_diving, $sql);
		$RowSuit = mysqli_fetch_assoc($resultSuit);
		$DivingLog = $RowSuit["DivingLog"];
		@$GraphData .= $DivingLog. ",";
		
	}
	$GraphData = substr($GraphData, 0, -1);
	@$GraphData .= "]},";
}

$XAxis = "'2009','2010','2011','2012'";
//$XAxis = substr($XAxis, 0, -1);
$GraphData = substr($GraphData, 0, -1);


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
			text: 'Diving Geer'
		},
		xAxis: {
			categories: [<?=$XAxis?>]
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total fruit consumption'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
				}
			}
		},
		legend: {
			align: 'right',
			x: -100,
			verticalAlign: 'top',
			y: 20,
			floating: true,
			backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
			borderColor: '#CCC',
			borderWidth: 1,
			shadow: false
		},
		tooltip: {
			formatter: function() {
				return '<b>'+ this.x +'</b><br/>'+
					this.series.name +': '+ this.y +'<br/>'+
					'Total: '+ this.point.stackTotal;
			}
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true,
					color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
				}
			}
		},
		series: [<?=$GraphData?>]
	});
});

})(jQuery);



</script>
<div id="container" style="width: 900px; height: 600px; margin: 0 auto"></div>
