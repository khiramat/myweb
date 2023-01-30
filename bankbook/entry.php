<?php
require_once '/var/www/html/inc/inc_init.php';
require_once '/var/www/html/bankbook/inc/account_select.php';
?>

<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">SMBC 記帳</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<form action="javascript:void(0);" id="account0_form">
					<!-- Date range -->
					<div class="form-group row">
						<label class="col-sm-1 col-form-label">日付</label>
						<div class="col-sm-5">
							<div class="input-group">
								<div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
								</div>
								<input type="text" class="form-control float-right" id="reservation" name="reservation">
							</div>
						</div>
						<label for="Amount" class="col-sm-1 col-form-label">金額</label>
						<div class="col-sm-5">
							<input name="Amount" type="text" id="Amount" class="form-control form-control-sm">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-1 col-form-label">項目</label>
						<div class="col-sm-5">
							<select name="account" id="parent" class="form-control form-control-sm">
								<option value="0" selected="selected">▼ 収支項目</option>
								<?php
								foreach ($lv1 AS $k => $v) {
									echo '<option value = "' . $k . '">' . $v['label'] . '</option>';
								} ?>
							</select>
						</div>
						<label class="col-sm-1 col-form-label">詳細</label>
						<div class="col-sm-5">
							<select name="account_detail" id="children" class="form-control form-control-sm" disabled>
								<option value="0" selected="selected">▼ 収支項目詳細</option>
								<?php
								foreach ($lv2 AS $k2 => $v2) {
									echo '<option value = "' . $k2 . '" data-val = "' . $v2['parent'] . '">' . $v2['label'] . '</option>';
								} ?>
							</select>
						</div>
					</div>
						<div class="form-group row">
							<label class="col-sm-1 col-form-label">備考</label>
							<div class="col-sm-8">
								<input type="text" name="etc" class="form-control form-control-sm">
							</div>
							<div class="col-sm-3">
								<button type="submit" id="account0" class="btn btn-default btn-sm">記帳</button>
							</div>
						</div>
				</form>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="result"></div>
	</div>
</div>

<script>
	$(function () {
		$('button#account0').click(function () {
			$('div#result').empty();
			// 一括してフォームデータを取得
			var formData = $('#account0_form').serialize();
			console.log(formData);
			$.ajax({
				url: "bankbook/entry_query.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#result').append(data);
				})
			});
		});
	});
</script>

<script>
	var $children = $('#children'); //都道府県の要素を変数に入れます。
	var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
	
	//地方側のselect要素が変更になるとイベントが発生
	$('#parent').change(function () {
		
		//選択された地方のvalueを取得し変数に入れる
		var val1 = $(this).val();
		
		//削除された要素をもとに戻すため.html(original)を入れておく
		$children.html(original).find('option').each(function () {
			var val2 = $(this).data('val'); //data-valの値を取得
			
			//valueと異なるdata-valを持つ要素を削除
			if (val1 != val2) {
				$(this).not(':first-child').remove();
			}
			
		});
		
		//地方側のselect要素が未選択の場合、都道府県をdisabledにする
		if ($(this).val() == "") {
			$children.attr('disabled', 'disabled');
		} else {
			$children.removeAttr('disabled');
		}
		
	});
</script>