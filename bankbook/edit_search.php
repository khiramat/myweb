<?php
require_once '/var/www/kh/inc/inc_init.php';
?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">編集月選択</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<form action="javascript:void(0);" id="data_edit_form">
			<?php require("/var/www/kh/bankbook/inc/inc_period_select.php"); ?>
		</form>
	</div>
</div>

<div id="edit_area"></div>
<div id="money_balance_table"></div>

<script>
	$(function () {
		$('button#data_edit_btn').click(function () {
			$('div#money_balance_table').empty();
			// 一括してフォームデータを取得
			var formData = $('#data_edit_form').serialize();
			console.log(formData);
			$.ajax({
				url: "bankbook/edit_bankbook_list.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#money_balance_table').append(data);
					$('div#edit_area').empty();
				})
			});
		});
	});
</script>