<div class="date">
	<?php
	echo <<<EOF
<a href="query/diary_add_cntnts.php?date=$date" class="date">$date</a>  &nbsp; $week
EOF;
	?>
</div>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td valign="top">
			<div class="diettitle"><a href="query/diary_edit_main.php?id=<?php echo $id; ?>">Today's Result</a></div>
			<div class="diet">
				<table width="500" border="1" cellspacing="0" cellpadding="1">
					<tr>
						<th>Menu</th>
						<th>qnt</th>
						<th>kcal</th>
					</tr>

					<?php
					$sql = "
	select 
		detail_name,
		calorie,
		quantity
	from 
		DiaryMeal
	where 
		main_id = '$id' 
	";
					$result_meal = mysqli_query($link, $sql);
					while ($row_meal = mysqli_fetch_array($result_meal)) {
						$detail_name = $row_meal["detail_name"];
						$calorie_top = $row_meal["calorie"] * $row_meal["quantity"];
						$quantity_top = $row_meal["quantity"];
						echo <<<EOF
		<tr>
			<td align="left">$detail_name</td>
			<td align="right">$quantity_top</td>
			<td align="right">$calorie_top</td>
		</tr>	
EOF;
					}
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
						<td align="right" colspan="3"><?php echo $calorie_total ?></td>
					</tr>
					<tr>
						<td align="left">体重 (kg)</td>
						<td align="right" colspan="2"><?php echo $wt ?></td>
					</tr>
					<tr>
						<td align="left">体脂肪率 (%)</td>
						<td align="right" colspan="2"><?php echo $fat ?></td>
					</tr>

				</table>
			</div>
			<div align="center"><img src="images/spacer.gif" alt="space" width="120" height="5"/></div>
			<div align="center"></div>
		</td>
	</tr>
</table>
