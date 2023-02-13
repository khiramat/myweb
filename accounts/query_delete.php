<?php
require_once '/var/www/kh/inc/inc_init.php';
$id = $_REQUEST["id"];

$sql = "SELECT *
FROM idpass
WHERE id = $id
ORDER BY dlt_flg, name
";
$result = mysqli_query($link_account, $sql);
$row = mysqli_fetch_array($result);
$name = $row["name"];

$sql = "DELETE
FROM idpass
WHERE id = $id
";
$result = mysqli_query($link_account, $sql);
?>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">レコード削除</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">

<h3><?=$name?> Delete Successful</h3>
	</div>
</div>

<script>
	$(function(){
		//ページを表示させる箇所の設定
		var $content_side = $('#acount_list');
		$('div#acount_list').empty();
		getPage("accounts/account_list.php");
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

