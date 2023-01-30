<?php
require_once '/var/www/html/inc/inc_init.php';
//$jump_year = date("Y",strtotime("-1 year"));
$jump_year = date("Y");
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">SMBC</h3>
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
			<div class="col-sm-12">
				<div class="balance_list_link">
					<?= $jump_year ?> :
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-01-01" class="form-control-sm">Jan</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-02-01" class="form-control-sm">Feb</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-03-01" class="form-control-sm">Mar</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-04-01" class="form-control-sm">Apr</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-05-01" class="form-control-sm">May</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-06-01" class="form-control-sm">Jun</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-07-01" class="form-control-sm">Jul</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-08-01" class="form-control-sm">Aug</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-09-01" class="form-control-sm">Sep</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-10-01" class="form-control-sm">Oct</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-11-01" class="form-control-sm">Nov</a>
					<a href="bankbook/bankbook_list_table.php?start_date=<?= $jump_year ?>-12-01" class="form-control-sm">Dec</a>
				</div>
				<div id="balance_list_area">
					<?php require_once '/var/www/html/bankbook/bankbook_list_table.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_balance_list_area = $('#balance_list_area');
		//ボタンをクリックした時の処理
		$(document).on('click', '.balance_list_link a', function (event) {
			event.preventDefault();
			//.balance_list_link aのhrefにあるリンク先を保存
			var link = $(this).attr("href");
			$content_balance_list_area.fadeOut(10, function () {
				getPage(link);
			});
		});
		
		//ページを取得してくる
		function getPage(elm) {
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function (data_balance_list_area) {
					$content_balance_list_area.html(data_balance_list_area).fadeIn(10);
				},
				error: function () {
					alert('問題がありました。');
				}
			});
		}
	});
</script>