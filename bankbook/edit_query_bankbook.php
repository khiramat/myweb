<?php
require_once '/var/www/html/inc/inc_init.php';

$bankbook_id = htmlspecialchars($_POST["bankbook_id"]);
$date = htmlspecialchars($_POST["date"]);
$withdrawal = str_replace(",", "", htmlspecialchars($_POST["withdrawal"]));
if(!$withdrawal){
	$withdrawal = "null";
}
$deposit = str_replace(",", "", htmlspecialchars($_POST["deposit"]));
if(!$deposit){
	$deposit = "null";
}

$account_id = htmlspecialchars($_POST["account_id"]);
$description_id = htmlspecialchars($_POST["description_id"]);
$etc = htmlspecialchars($_POST["etc"]);

$date_ary = explode("-",$date);
$year_st = $date_ary[0];
$month_st = $date_ary[1];
$start_date = $year_st. "-". $month_st. "-01";

$sql = "
UPDATE
  bankbook
set
	date =  '$date',
	accounts_id = $account_id,
	description_id = $description_id,
	withdrawal =  $withdrawal,
	deposit = $deposit,
	etc = '$etc'
WHERE
	id = $bankbook_id
";
$result = mysqli_query($link_fin, $sql);
//echo nl2br($sql);
if($result){
?>

<div class="card-teal">
	<div class="card-header">
		<h3 class="card-title">変更完了</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<thead>
			<tr>
				<th>日付</th>
				<th>項目ID</th>
				<th>項目詳細ID</th>
				<th>備考</th>
				<th>出金</th>
				<th>入金</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td style="text-align: left"><?= $date ?></td>
				<td style="text-align: right"><?= $account_id ?></td>
				<td style="text-align: right"><?= $description_id ?></td>
				<td><?= $etc ?></td>
				<td style="text-align: right"><?= $withdrawal ?></td>
				<td style="text-align: right"><?= $deposit ?></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
<?php } else {
	echo "データの更新に失敗しました。";
}
?>

<script>
	$(function(){
		//ページを表示させる箇所の設定
		var $content_side = $('#money_balance_table');
		$('div#money_balance_table').empty();
		getPage("bankbook/edit_bankbook_list.php?year_st=<?=$year_st?>&month_st=<?=$month_st?>");
		//ページを取得してくる
		function getPage(elm){
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function(data){
					$content_side.html(data).fadeIn(0);
				},
				error:function() {
					alert('問題がありました。');
				}
			});
		}
	});
</script>


<script>
	$(function(){
		//ページを表示させる箇所の設定
		var $content_side = $('#balance_list_area');
		$('div#balance_list_area').empty();
		getPage("bankbook/bankbook_list_table.php?start_date=<?=$start_date?>");
		//ページを取得してくる
		function getPage(elm){
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function(data){
					$content_side.html(data).fadeIn(0);
				},
				error:function() {
					alert('問題がありました。');
				}
			});
		}
	});
</script>
