<?php
require_once '/var/www/html/inc/inc_init.php';

$name = $_REQUEST["name"];
$account = $_REQUEST["account"];
$pass = $_REQUEST["pass"];
$com = $_REQUEST["com"];
if ($name && $account && $pass) {
$sql = "INSERT INTO
idpass ( name, account, pass, com, dlt_flg)
VALUES ( '$name', '$account', '$pass', '$com', 0)";
$result = mysqli_query($link_account, $sql);
if (!$result) {
	echo mysqli_error($link_account) . "<br>
    <h2>Insert failed</h2>";
} else {
$id = mysqli_insert_id($link_account);

$sql = "SELECT *
FROM idpass
WHERE id = $id
ORDER BY dlt_flg, name
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
		
		<h2><?= $name ?> Added</h2>
		<table border="0" cellspacing="2" cellpadding="2">
			</tr>
			<tr>
				<td colspan="3" class="td-title2">Name : <?= nl2br($name) ?></td>
			</tr>
			<tr>
				<td colspan="3" class="td-title2">Account : <?= $account ?></td>
			</tr>
			<tr>
				<td colspan="3" class="td-title2">Password : <?= $pass ?></td>
			</tr>
			<tr>
				<td colspan="3" class="td-title2">FLG : <?= $dlt_flg ?></td>
			</tr>
			<tr>
				<td colspan="3" class="td-title2">Detail : <?= nl2br($com) ?></td>
			</tr>
		</table>
		<?php
		}
		} else { ?>
			<H2>Name, Account, Password required!</H2>
			<h3><a href="add.php">Back</a></h3>
		<?php } ?>
	</div>
</div>

<script>
	$(function () {
		//ページを表示させる箇所の設定
		var $content_side = $('#acount_list');
		$('div#acount_list').empty();
		setTimeout(function () {
			getPage("accounts/account_list.php");
			
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
		}, 1500);
	});
</script>

