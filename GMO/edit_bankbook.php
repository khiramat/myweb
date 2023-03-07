<?php
require_once '/var/www/kh/inc/inc_init.php';
$id = $_REQUEST["id"];
$sql = "
	SELECT 
	bankbook.date, 
	bankbook.deposit, 
	bankbook.withdrawal, 
	bankbook.etc, 
	accounts.item_name, 
	account_descriptions.detail_name, 
	accounts.id AS account_id, 
	account_descriptions.id AS description_id
	FROM bankbook, accounts, account_descriptions
	WHERE bankbook.accounts_id = accounts.id
	AND	bankbook.description_id = account_descriptions.id
	AND bankbook.id = $id
	";
//echo nl2br($sql);

$result = mysqli_query($link_gmo, $sql);
if (!$result) {
	echo mysqli_error();
}
$row = mysqli_fetch_assoc($result);

$date = $row["date"];
$deposit = $row["deposit"];
$withdrawal = $row["withdrawal"];
$etc = $row["etc"];
$account_id = $row["account_id"];
$item_name = $row["item_name"];
$description_id = $row["description_id"];
$detail_name = $row["detail_name"];
?>
<div class="card-info">
	<div class="card-header">
		<h3 class="card-title">変更</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
		</div>
	</div>
	<div class="card-body">
		<form action="javascript:void(0);" id="query_MoneyBalance">
			<input type="hidden" name="bankbook_id" id="bankbook_id" value="<?= $id ?>"/>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="LaunchDate">日付</label>
						<div class="col-sm-8">
							<input type="text" name="date" id="LaunchDate" class="form-control form-control-sm"
							       value="<?= $date ?>">
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="MethodID">項目</label>
						<div class="col-sm-8">
							<select name="account_id" id="MethodID" class="form-control form-control-sm">
								<option value="<?= $account_id ?>"><?= $item_name ?></option>
								<?php
								$sql = "
										SELECT
											id, item_name
										FROM
											accounts
										ORDER BY
											sort_num
										";
								$result = mysqli_query($link_gmo, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$account_id = $row["id"];
									$item_name = $row["item_name"];
									echo "<option value=\"$account_id\">$account_id $item_name</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="ClassificationID">項目詳細</label>
						<div class="col-sm-8">
							<select name="description_id" id="description_id" class="form-control form-control-sm">
								<option value="<?= $description_id ?>"><?= $detail_name ?></option>
								<?php
								$sql = "
									SELECT
										id, detail_name, account_id
									FROM
										account_descriptions
									ORDER BY
										account_id, id
									";
								$result = mysqli_query($link_gmo, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$description_id = $row["id"];
									$detail_name = $row["detail_name"];
									$account_id_detail = $row["account_id"];
									echo "<option value=\"$description_id\">$account_id_detail $detail_name</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label" for="etc">備考</label>
						<div class="col-sm-8">
							<textarea name="etc" id="etc" rows="1"
							          class="form-control form-control-sm"><?= $etc ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="withdrawal">出金</label>
						<div class="col-sm-4">
							<input type="text" name="withdrawal" id="withdrawal" class="form-control form-control-sm"
							       value="<?= $withdrawal ?>"/>
						</div>
						<label class="col-sm-2 col-form-label" for="deposit">入金</label>
						<div class="col-sm-4">
							<input type="text" name="deposit" id="deposit" class="form-control form-control-sm"
							       value="<?= $deposit ?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<button type="button" class="btn btn-info btn-sm" id="edit_money_balance">変更</button>
				</div>
		</form>
		<div class="col-sm-6" style="text-align: right">
			<form action="javascript:void(0);" id="delete_MoneyBalance">
				<input type="hidden" name="bankbook_id" id="bankbook_id" value="<?= $id ?>"/>
				<input type="hidden" name="date" id="bankbook_id" value="<?= $date ?>"/>
				<button type="button" class="btn btn-danger btn-sm" id="delete_money_balance">削除</button>
			</form>
		</div>
	</div>
</div>
</div>

<script>
	$(function () {
		$('button#edit_money_balance').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#query_MoneyBalance').serialize();
			console.log(formData);
			$.ajax({
				url: "GMO/edit_query_bankbook.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#edit_area').empty();
					$('div#edit_area').append(data);
				})
			});
		});
	});
</script>

<script>
	$(function () {
		$('button#delete_money_balance').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#query_MoneyBalance').serialize();
			console.log(formData);
			$.ajax({
				url: "GMO/delete_query_bankbook.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#edit_area').empty();
					$('div#edit_area').append(data);
				})
			});
		});
	});
</script>