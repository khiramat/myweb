<div class="date">
	<?php
	echo $date . " " . @$week;
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
	id_num = '$id_num_comment' 
";

			$result2 = mysqli_query($link, $sql);
			$row2 = mysqli_fetch_array($result2);
			$id_num = $row2["id_num"];
			$icon_id = $row2["icon_id"];
			$content_id = $row2["id_num"];
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
	</tr>
	<tr>
		<td colspan="4" class="padding1">
		$paragraph
		</td>
	</tr>
</table>
EOF;
			?>
		</td>
		<td valign="top">
			<div class="diettitle">Results</div>
			<div class="diet">
				<table border="1" cellspacing="0" cellpadding="1">

					<?php
					$sql = "
	select 
		sum(calorie * quantity) as calorie_total
	from 
		DiaryMeal 
	where 
		date = '$date' 
	";
					$result_calorie = mysqli_query($link, $sql);
					@$row_calorie = mysqli_fetch_array($result_calorie);
					$calorie_total = round($row_calorie["calorie_total"], 0);


					//			  echo $bf. $lnc. $dnr. $detail_name;
					?>
					<tr>
						<td align="left">cal 合計 (kcal)</td>
						<td align="right"><?php echo @$calorie_total ?></td>
					</tr>
					<tr>
						<td align="left">体重 (kg)</td>
						<td align="right"><?php echo @$wt ?></td>
					</tr>
					<tr>
						<td align="left">体脂肪率 (%)</td>
						<td align="right" s><?php echo @$fat ?></td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			/*
			$sql = "
			select
				*
			from
				DiaryComments
			order by
				comment_id desc
			";
			$result = mysqli_query($link, $sql);
			echo <<<TITLE
			<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">\n
			TITLE;

			while ( $row = mysqli_fetch_array( $result )) {
				$comment_id = $row["comment_id"];
				$date = $row["date"];
				$name = $row["name"];
				$comment = $row["comment"];
				echo <<<CONTENTS
				<tr>
					<td nowrap="nowrap">$name</td>
					<td aligne="right" nowrap="nowrap">$date</td>
				</tr>
				<tr>
					<td colspan="2">$comment</td>
				</tr>\n
				<tr>
					<td colspan="2">
						<hr />
					</td>
				</tr>
			CONTENTS;
			}
			echo "</table>\n";
			*/
			?>

		</td>
	</tr>
</table>
