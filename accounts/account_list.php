<?php
require_once '/var/www/kh/inc/inc_init.php';
$keyword = $_POST["keyword"];
if ($keyword) {
	$where_key = "WHERE name LIKE '%" . $keyword . "%'";
}
?>

<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">サイトアカウント一覧</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered table-sm">
			<tr>
				<th>
					<div class="account_add_ajax"><a href="accounts/add.php">Add new data</a></div>
				</th>
				<td colspan="3">
					<form action="javascript:void(0);" id="account_search">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Keyword</label>
							<div class="col-sm-6">
								<input type="text" name="keyword" class="form-control form-control-sm">
							</div>
							<div class="col-sm-2">
								<button name="submit" type="submit" class="btn btn-default btn-sm" id="account_search_btn">Go!</button>
							</div>
						</div>
					</form>
				</td>
			</tr>
		</table>
        <div>
            <a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a href="#E">E</a> <a href="#F">F</a> <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a> <a href="#J">J</a> <a href="#K">K</a> <a href="#L">L</a> <a href="#M">M</a> <a href="#N">N</a> <a href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a> <a href="#R">R</a> <a href="#S">S</a> <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a> <a href="#Y">Y</a> <a href="#Z">Z</a>
        </div>
		<div class="account_detail_ajax">
			<table class="table table-bordered table-sm">
                <tr>
                    <th>Act</th>
                    <th>Name</th>
                    <th>Account</th>
                    <th>Password</th>
				</tr>
				<?php
                $name_tag_new = 'initial';
				$sql = "SELECT *
				FROM idpass
				$where_key
				ORDER BY dlt_flg, name
				";
				$result = mysqli_query($link_account, $sql);
				while ($row = mysqli_fetch_array($result)) {
                    $name_tag = strtoupper(substr($row["name"],0,1));
                    if($name_tag != $name_tag_new){
                        $ancer = ' id="'.$name_tag.'"';
                    }else{
                        $ancer = null;
                    }
					$id = $row["id"];
					$name = $row["name"];
					$account = $row["account"];
					$pass = $row["pass"];
					$com = $row["com"];
					$dlt_flg = $row["dlt_flg"];
					?>
					<tr>
                        <td class="td-title2">
                            <a href="accounts/detail.php?id=<?= $id ?>"<?=$ancer?>>Go</a>
                        </td>
						<td class="td-title2"> <?= $name ?></td>
						<td class="td-title2"> <?= $account ?></td>
						<td class="td-title2"> <?= $pass ?></td>
					</tr>
					<?php
                    $name_tag_new = $name_tag;
				}
				?>
			</table>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('button#account_search_btn').click(function () {
			// 一括してフォームデータを取得
			var formData = $('#account_search').serialize();
			console.log(formData);
			$.ajax({
				url: "accounts/account_list.php",  //POST送信を行うファイル名を指定
				type: "POST",
				data: formData,  //POST送信するデータを指定（{ 'hoge': 'hoge' }のように連想配列で直接書いてもOK）
				success: (function (data) {
					$('div#acount_list').empty();
					$('div#acount_list').append(data);
				})
			});
		});
	});
</script>
