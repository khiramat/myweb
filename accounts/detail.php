<?php
require_once '/var/www/html/inc/inc_init.php';

$id = $_REQUEST["id"];
$sql = "SELECT *
FROM idpass
WHERE id = $id
";
$result = mysqli_query($link_account, $sql);
$row = mysqli_fetch_array($result);
$name = $row["name"];
$account = $row["account"];
$pass = $row["pass"];
$com = $row["com"];
$dlt_flg = $row["dlt_flg"];
?>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">詳細</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<form action="javascript:void(0);" id="account_update">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">site name</label>
			<div class="col-sm-4">
				<input type="text" name="name" class="form-control form-control-sm" value="<?= $name ?>">
			</div>
			<label class="col-sm-2 col-form-label">account</label>
			<div class="col-sm-4">
				<input type="text" name="account" class="form-control form-control-sm" value="<?= $account ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">password</label>
			<div class="col-sm-4">
				<input type="text" name="pass" class="form-control form-control-sm" value="<?= $pass ?>">
			</div>
			<label class="col-sm-2 col-form-label">delete flag</label>
			<div class="col-sm-4">
				<input type="text" name="dlt_flg" class="form-control form-control-sm" value="<?= $dlt_flg ?>">
			</div>
		</div>
		<div class="form-group">
			<label>詳細</label>
			<textarea name="com" class="form-control form-control-sm" style="height: calc(1.3em * 20); line-height: 1.3;"><?= $com ?></textarea>
		</div>
		<div class="form-group row">
			<div class="col-sm-6">
				
					<input type="hidden" name="id" value="<?= $id ?>">
					<button type="submit" name="submit" class="btn badge-primary btn-sm" id="account_update_btn">Update</button>
				</form>
			</div>
			<div class="col-sm-6">
				<form action="javascript:void(0);" id="account_delete">
					<input type="hidden" name="id" value="<?= $id ?>">
					<button type="submit" class="btn btn-danger btn-sm" id="account_delete_btn">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('button#account_update_btn').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#account_update').serialize();
			console.log(formData);
			$.ajax({
				url: "accounts/query_update.php",  //POST送信を行うファイル名を指定
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

<script>
	$(function () {
		$('button#account_delete_btn').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#account_delete').serialize();
			console.log(formData);
			$.ajax({
				url: "accounts/query_delete.php",  //POST送信を行うファイル名を指定
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