<?php
require_once '/var/www/kh/inc/inc_init.php';

$year_st = $_REQUEST["year_st"];
$month_st = $_REQUEST["month_st"];
$where = " AND date like '" . $year_st . "-" . $month_st . "%'";
?>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">編集用リスト</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="edit_data">
			<table class="table table-sm">
				<tr class="table-info" style="text-align: center">
					<th>編集</th>
					<th>決済日</th>
					<th>決済項目</th>
					<th>決済詳細</th>
					<th>備考</th>
					<th>出金</th>
					<th>入金</th>
				</tr>
				<?php
				$sql = "
			  SELECT
			    bankbook.id,
			    date,
			    accounts_id,
			    item_name,
			    description_id,
			    detail_name,
			    withdrawal,
			    deposit,
			    etc
			  FROM
			    bankbook,
			    accounts,
			    account_descriptions
			  WHERE
			    accounts_id = accounts.id
			    AND description_id = account_descriptions.id
			" . $where . "
			  ORDER BY
			    date,
			    withdrawal,
			    deposit
			 ";
				//echo nl2br($sql);
				$result = mysqli_query($link_gmo, $sql);
				if (!$result) {
					echo mysqli_error();
				}
				$i = 0;
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row["id"];
					$date = $row["date"];
					$accounts_id = $row["accounts_id"];
					$item_name = $row["item_name"];
					$description_id = $row["description_id"];
					$detail_name = $row["detail_name"];
					$withdrawal = number_format($row["withdrawal"]);
					$deposit = number_format($row["deposit"]);
					$etc = $row["etc"];
					echo <<<EOF
 <tr>
  <td style="text-align: center"><a href="GMO/edit_bankbook.php?id=$id">⇒</a>
  <td style="text-align: left">$date</td>
  <td style="text-align: left">$item_name</td>
  <td style="text-align: left">$detail_name</td>
  <td style="text-align: left">$etc</td>
  <td style="text-align: right">$withdrawal</td>
  <td style="text-align: right">$deposit</td>
</td>
 </tr>
EOF;
				}
				?>
			</table>
		</div>
	</div>
</div>


<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content2 = $('#edit_area');
		//ボタンをクリックした時の処理
		$(document).on('click', '.edit_data a', function (event) {
			event.preventDefault();
			//.edit_data aのhrefにあるリンク先を保存
			var link = $(this).attr("href");
			$content2.fadeOut(10, function () {
				getPage(link);
			});
		});
		
		//ページを取得してくる
		function getPage(elm) {
			$.ajax({
				type: 'GET',
				url: elm,
				dataType: 'html',
				success: function (data1) {
					$content2.html(data1).fadeIn(10);
				},
				error: function () {
					alert('問題がありました。');
				}
			});
		}
	});
</script>