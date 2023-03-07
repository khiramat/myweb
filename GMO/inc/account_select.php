<?php
require_once '/var/www/kh/inc/inc_init.php';

$sql = "
SELECT *
FROM
	accounts
ORDER BY
	sort_num
";
$result = mysqli_query($link_gmo, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	$account_id = $row["id"];
	$account_id_vl1 = $row["id"]."-".$row["deposit_flg"];
	$item_name = $row["item_name"];
	$lv1[$account_id_vl1] = array('label' => $item_name, 'parent' => '');
	
	$sql_detail = "
	SELECT *
	FROM
		account_descriptions
	WHERE account_id = $account_id
		";
	$result_balance = mysqli_query($link_gmo, $sql_detail);
	while ($row_balance = mysqli_fetch_assoc($result_balance)) {
		$detail_id = $row_balance["id"];
		$detail_name = $row_balance["detail_name"];
		$lv2[$detail_id] = array('label' => $detail_name, 'parent' => $account_id_vl1);
	}
}
