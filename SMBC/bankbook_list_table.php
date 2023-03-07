<?php
require_once '/var/www/kh/inc/inc_init.php';

$start_date = $_REQUEST["start_date"];
if(!$start_date){
	$start_date = date("Y-m-d");
}
//$start_date = '2020-09-01';
$sql = "
	SELECT (SUM(deposit)-SUM(withdrawal)) AS base_amount
	FROM bankbook
	WHERE date < '$start_date'
";
$result = mysqli_query($link_fin, $sql);
$row = mysqli_fetch_assoc($result);
$base_amount = $row["base_amount"];
//echo nl2br($sql);
//echo $base_amount;
?>
<table class="table table-bordered table-sm">
	<thead>
	<tr class="table-info" style="text-align: center">
		<th>日付</th>
		<th>出金</th>
		<th>入金</th>
		<th>内容</th>
		<th>残高</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql = "
	SELECT bankbook.date, bankbook.deposit, bankbook.withdrawal, bankbook.etc, accounts.item_name, account_descriptions.detail_name
	FROM bankbook, accounts, account_descriptions
	WHERE bankbook.accounts_id = accounts.id
	AND	bankbook.description_id = account_descriptions.id
	AND bankbook.date >= '$start_date'
	ORDER BY bankbook.date, bankbook.accounts_id DESC, bankbook.description_id
	";
	//echo nl2br($sql);
	$result = mysqli_query($link_fin, $sql);
	$tr_row = null;
	$tr_row_total = null;
	$balance = $base_amount;
	while ($row = mysqli_fetch_assoc($result)) {
		$date = $row["date"];
		$deposit = $row["deposit"];
		$withdrawal = $row["withdrawal"];
		$etc = $row["etc"];
		$item_name = $row["item_name"];
		$detail_name = $row["detail_name"];
		$total_deposit += $deposit;
		$total_withdrawal += $withdrawal;
		$balance_one_record = $deposit - $withdrawal;
		$balance += $balance_one_record;
		$tr_row .= "<tr><td>". $date. "</td>". "<td style='text-align: right'>". number_format($withdrawal). "</td>". "<td style='text-align: right'>". number_format($deposit). "</td>". "<td>". $detail_name. "  ". $etc. "</td>". "<td style='text-align: right'>". number_format($balance). "</td></tr>";
		}
	$tr_row_total = "<tr></tr><td colspan='2' style='text-align: right'>". number_format($total_withdrawal). "</td>". "<td style='text-align: right'>". number_format($total_deposit). "</td>". "<td colspan='2'></td></tr>";
	?>
	<?=$tr_row?>
	<?=$tr_row_total?>
	</tbody>
</table>
