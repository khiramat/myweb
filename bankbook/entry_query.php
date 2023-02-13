<?php
require_once '/var/www/kh/inc/inc_init.php';

$LaunchDate_ary = explode("/", htmlspecialchars($_POST["reservation"]));
$year_ary = explode(" ", $LaunchDate_ary[2]);
$year = $year_ary[0];
$month = $LaunchDate_ary[0];
$day = $LaunchDate_ary[1];
$LaunchDate = $year . "-" . $month . "-" . $day;
$start_date = $year . "-" . $month . "-01";

$Amount = str_replace(",", "", htmlspecialchars($_POST["Amount"]));
$account_ary = explode("-", htmlspecialchars($_POST["account"]));
$account_id = $account_ary[0];
$deposit_flg = $account_ary[1];
$account_description_id = htmlspecialchars($_POST["account_detail"]);
$etc = $_POST["etc"];

if (!$Amount || htmlspecialchars($_POST["account"] == 0)) {
	?>
	
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">エラー</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					必須項目が抜けています
				</div>
			</div>
		</div>
	</div>
	
	
	<?php
} else {
	
	if (!$account_description_id) {
		$account_description_id = "null";
	}
	if ($deposit_flg == 0) {
		$deposit = "null";
		$withdrawal = $Amount;
	} else if ($deposit_flg == 1) {
		$deposit = $Amount;
		$withdrawal = "null";
	}
	
	$sql = "
INSERT INTO bankbook
(date, accounts_id, description_id, deposit, withdrawal, etc)
values ('$LaunchDate', $account_id, $account_description_id, $deposit, $withdrawal, '$etc')
";
	$result = mysqli_query($link_fin, $sql);
	if (!$result) {
		echo "$sql";
	}
	?>
	
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">入力完了</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					決済金額：<?= $Amount ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					決済日：<?= $LaunchDate ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_side = $('#balance_list_area');
		$('div#balance_list_area').empty();
		getPage("bankbook/bankbook_list_table.php?start_date=<?=$start_date?>");
		console.log(getPage);
		
		//ページを取得してくる
		function getPage(elm) {
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function (data) {
					$content_side.html(data).fadeIn(0);
				},
				error: function () {
					alert('問題がありました。');
				}
			});
		}
	});
</script>
