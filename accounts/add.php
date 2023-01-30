<?php
require_once '/var/www/html/inc/inc_init.php';
?>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">新規データ入力</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<form action="javascript:void(0);" id="account_add">
			<div class="form-group row">
				<label class="col-sm-1 col-form-label">サイト名</label>
				<div class="col-sm-11">
					<input type="text" name="name" class="form-control form-control-sm">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-1 col-form-label">ID</label>
						<div class="col-sm-10">
							<input type="text" name="account" class="form-control form-control-sm">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Password</label>
						<div class="col-sm-9">
							<input type="text" name="pass" class="form-control form-control-sm">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-1 col-form-label">内容</label>
				<div class="col-sm-11">
					<textarea name="com" class="form-control form-control-sm"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-default btn-sm" id="account_add_btn">Add</button>
		</form>
	</div>
</div>


<script>
	$(function () {
		$('button#account_add_btn').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#account_add').serialize();
			console.log(formData);
			$.ajax({
				url: "accounts/query_add.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#acount_edit_area').empty();
					$('div#acount_edit_area').append(data);
				})
			});
		});
	});
</script>

