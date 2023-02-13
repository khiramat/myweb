<?php
require_once '/var/www/kh/inc/inc_init.php';

$bankbook_id = htmlspecialchars($_POST["bankbook_id"]);

$date_ary = explode("-",$date);
$year_st = $date_ary[0];
$month_st = $date_ary[1];
$start_date = $year_st. "-". $month_st. "-01";

$sql = "
DELETE
FROM
  bankbook
WHERE
	id = '$bankbook_id'
";
$result = mysqli_query($link_fin, $sql);
if ($result) {
	?>
	
	<div class="card-warning">
		<div class="card-header">
			<h3 class="card-title">削除完了</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
				<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
			</div>
		</div>
		<div class="card-body">
			該当のレコードを削除しました。
		</div>
	</div>
	

<?php } else {
	echo "データの削除に失敗しました。";
}
?>


<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_side = $('#money_balance_table');
		$('div#money_balance_table').empty();
		getPage("bankbook/edit_bankbook_list.php?year_st=<?=$year_st?>&month_st=<?=$month_st?>");
		
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

