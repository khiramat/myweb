<div class="date">
	<?php
	echo <<<EOF
<a href="query/diary_add_cntnts.php?date=$date" class="date">$date</a>  &nbsp; $week
EOF;
	?>
</div>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td width="90%" valign="top">
			<?php
			$sql = "
select 
	* 
from 
	DiaryContent
where 
	date = '$date' 
order by 
	id_num desc
";

			$result2 = mysqli_query($link, $sql);
			while ($row2 = mysqli_fetch_array($result2)) {
				$id_num = $row2["id_num"];
				$icon_id = $row2["icon_id"];
				$time = $row2["time"];
				$head = $row2["head"];
				$paragraph = nl2br($row2["paragraph"]);
				echo <<<EOF
	<table width="98%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td width="50">
		<a href="diary_icon_result.php?icon_id=$icon_id"><img src="images/$icon_id.gif" alt="$icon_id" width="50" height="40" border="0" align="absmiddle" /></a>
		</td>
		<td width="100%" class="bold">$head</td>
		<td align="right" class="time">$time</td>
		<td>
		<a href="query/diary_edit_contents.php?id_num=$id_num">
		<img src="images/edit.gif" alt="Edit" width="20" height="20" border="0" align="absmiddle" /></a>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="padding1">
		$paragraph
		</td>
	</tr>
</table>
EOF;
			}
			?>
		</td>
		<td valign="top">
			<div class="diettitle">Results
			</div>
			<div class="diet">
				<table border="1" cellspacing="0" cellpadding="1">

					<?php
					$sql = "
	select 
		sum(calorie * quantity) as calorie_total
	from 
		DiaryMeal 
	where 
		main_id = '$id' 
	";
					$result_calorie = mysqli_query($link, $sql);
					$row_calorie = mysqli_fetch_array($result_calorie);
					$calorie_total = round($row_calorie["calorie_total"], 0);


					//			  echo $bf. $lnc. $dnr. $detail_name;
					?>
					<tr>
						<td align="left">cal 合計 (kcal)</td>
						<td align="right"><?php echo $calorie_total ?></td>
					</tr>
					<tr>
						<td align="left">体重 (kg)</td>
						<td align="right"><?php echo $wt ?></td>
					</tr>
					<tr>
						<td align="left">体脂肪率 (%)</td>
						<td align="right" s><?php echo $fat ?></td>
					</tr>
				</table>
				<div>
					<br/>
					<a href="query/diary_edit_main.php?id=<?php echo $id; ?>">
						<img src="images/edit.gif" alt="Edit" width="20" height="20" border="0" align="absmiddle"/>
					</a>
				</div>
				<div align="center"><img src="images/spacer.gif" alt="space" width="120" height="5"/></div>
				<div align="center"></div>
		</td>
	</tr>
</table>
