<?php
require_once '/var/www/kh/inc/inc_init.php';
?>
<!-- コンテンツ開始 -->
<!-- Content Wrapper. Contains page content -->
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title">Tank List</h3>
			<div class="card-tools">
			  <button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			  </button>
			  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			  </button>
			</div>
		  </div>
		  <div class="card-body">
			<!-- サイドバー開始 -->
			<table id="example2" class="table table-bordered table-hover">
			  <thead>
			  <tr>
				<th>No</th>
				<th nowrap="nowrap">Date</th>
				<th>Site</th>
				<th>Point</th>
				<th>Entry Time</th>
				<th>Diving<br/>Time<br/>(min)</th>
				<th>Tankage<br/>(L)</th>
				<th>Air<br/>Consumption<br/>(L)</th>
				<th>Avarage<br/>Depth(m)</th>
				<th>Air <br/>Consumption<br/>/min(L)</th>
				<th>Style</th>
				<th>Action</th>
			  </tr>
			  </thead>
			  <tbody>

			  <?php

                $sql = "
select 
	DivingLogID,
	DiveDate,
	DivingSite.Site,
	Point,
	EntryTime,
	ExitTime,
	StartPressure,
	EndPressure,
	DivingTankage.Tankage,
	DivingStyle.Style,
	AvarageDepth
from 
	DivingLog,
	DivingSite,
	DivingTankage,
	DivingStyle
where
	DivingLog.Site = DivingSite.SiteMaster
	and DivingLog.Tankage = DivingTankage.TankageMaster
	and DivingLog.Style = DivingStyle.StyleMaster
order by
	DiveDate desc,
	EntryTime desc
";

                $result = mysqli_query($link_diving, $sql);
                $total_tank = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $DivingLogID = $row["DivingLogID"];
                    $DiveDate = $row["DiveDate"];
                    $Site = $row["Site"];
                    $Point = $row["Point"];
                    $EntryTime = $row["EntryTime"];
                    $ExitTime = $row["ExitTime"];
                    $AvarageDepth = $row["AvarageDepth"];
                    $Tankage = $row["Tankage"];
                    $Style = $row["Style"];
                    $StartPressure = $row["StartPressure"];
                    $EndPressure = $row["EndPressure"];

                    $DaveDateYear = substr($DiveDate, 0, 4);
                    $DaveDateMonth = substr($DiveDate, 5, 2);
                    $DaveDateDay = substr($DiveDate, 8, 2);

                    $StartHour = substr($EntryTime, 0, 2);
                    $StartMin = substr($EntryTime, 3, 2);
                    $EndHour = substr($ExitTime, 0, 2);
                    $EndMin = substr($ExitTime, 3, 2);
                    $EntryTime = $StartHour . ":" . $StartMin;

                    $DiveMKTime = mktime($EndHour, $EndMin, 0, $DaveDateMonth, $DaveDateDay, $DaveDateYear) - mktime($StartHour, $StartMin, 0, $DaveDateMonth, $DaveDateDay, $DaveDateYear);
                    $DiveTime = $DiveMKTime / 60;
                    $Air = $StartPressure - $EndPressure;
                    @$AirMin = round((($StartPressure - $EndPressure) * $Tankage / ($AvarageDepth / 10 + 1) / $DiveTime), 2);

                    echo <<<EOF
						<tr>
							<td nowrap="nowrap"><div class="menu_nav_ajax"><a href="diving/data_detail.php?DivingLogID=$DivingLogID">$total_tank</a></div></td>
							<td nowrap="nowrap">$DiveDate</td>
							<td nowrap="nowrap">$Site</td>
							<td nowrap="nowrap">$Point</td>
							<td nowrap="nowrap">$EntryTime</td>
							
							<td align="right" nowrap="nowrap">$DiveTime</td>
							<td align="right" nowrap="nowrap">$Tankage</td>
							<td align="right" nowrap="nowrap">$Air</td>
							
							<td align="right" nowrap="nowrap">$AvarageDepth</td>
							<td align="right" nowrap="nowrap">$AirMin</td>
							<td align="right" nowrap="nowrap">$Style</td>
							<td align="right" nowrap="nowrap"><form action="diving/query/data_edit.php" method="post">
<input type="hidden" name="DivingLogID" value="$DivingLogID" /><input name="" type="submit" value="edit" /></form></td>
						</tr>
EOF;

                    $total_tank--;
                }
                ?>
			  </tbody>
			</table>
		  </div>
		</div>
  <hr class="clear">
<!-- コンテンツ終了 -->
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>