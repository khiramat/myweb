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
                                <button name="submit" type="submit" class="btn btn-default btn-sm"
                                        id="account_search_btn">Go!
                                </button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        <div>
            <a href="#A">A</a> <a href="#B">B</a> <a href="#C">C</a> <a href="#D">D</a> <a href="#E">E</a> <a href="#F">F</a>
            <a href="#G">G</a> <a href="#H">H</a> <a href="#I">I</a> <a href="#J">J</a> <a href="#K">K</a> <a href="#L">L</a>
            <a href="#M">M</a> <a href="#N">N</a> <a href="#O">O</a> <a href="#P">P</a> <a href="#Q">Q</a> <a href="#R">R</a>
            <a href="#S">S</a> <a href="#T">T</a> <a href="#U">U</a> <a href="#V">V</a> <a href="#W">W</a> <a href="#X">X</a>
            <a href="#Y">Y</a> <a href="#Z">Z</a> <a href="#あ">あ</a> <a href="#か">か</a> <a href="#さ">さ</a> <a href="#た">た</a>
            <a href="#な">な</a> <a href="#は">は</a> <a href="#ま">ま</a> <a href="#や">や</a> <a href="#ら">ら</a> <a href="#わ">わ</a>
            <a href="#ア">ア</a> <a href="#カ">カ</a> <a href="#サ">サ</a> <a href="#タ">タ</a> <a href="#ナ">ナ</a> <a href="#ハ">ハ</a>
            <a href="#マ">マ</a> <a href="#ヤ">ヤ</a> <a href="#ラ">ラ</a> <a href="#ワ">ワ</a> <a href="#漢字">その他</a>
        </div>
        <div class="account_detail_ajax">
            <table class="table table-bordered table-sm" style="width: 50%">
                <tr>
                    <th style="white-space: nowrap; padding: 5px">Name</th>
                    <th style="white-space: nowrap; padding: 5px">Account</th>
                    <th style="white-space: nowrap; padding: 5px">Password</th>
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
                    $name_tag = strtoupper(mb_substr($row["name"], 0, 1));
                    if ($name_tag != $name_tag_new) {
                        if (!preg_match("/^[a-zA-Z0-9]+$/", $name_tag)) {
                            if ($name_tag == 'あ' || $name_tag == 'い' || $name_tag == 'う' || $name_tag == 'え' || $name_tag == 'お') {
                                $name_tag = 'あ';
                            } elseif ($name_tag == 'か' || $name_tag == 'き' || $name_tag == 'く' || $name_tag == 'け' || $name_tag == 'こ' || $name_tag == 'が' || $name_tag == 'ぎ' || $name_tag == 'ぐ' || $name_tag == 'げ' || $name_tag == 'ご') {
                                $name_tag = 'か';
                            } elseif ($name_tag == 'さ' || $name_tag == 'し' || $name_tag == 'す' || $name_tag == 'せ' || $name_tag == 'そ' || $name_tag == 'ざ' || $name_tag == 'じ' || $name_tag == 'ず' || $name_tag == 'ぜ' || $name_tag == 'ぞ') {
                                $name_tag = 'さ';
                            } elseif ($name_tag == 'た' || $name_tag == 'ち' || $name_tag == 'つ' || $name_tag == 'て' || $name_tag == 'と' || $name_tag == 'だ' || $name_tag == 'ぢ' || $name_tag == 'づ' || $name_tag == 'で' || $name_tag == 'ど') {
                                $name_tag = 'た';
                            } elseif ($name_tag == 'な' || $name_tag == 'に' || $name_tag == 'ぬ' || $name_tag == 'ね' || $name_tag == 'の') {
                                $name_tag = 'な';
                            } elseif ($name_tag == 'は' || $name_tag == 'ひ' || $name_tag == 'ふ' || $name_tag == 'へ' || $name_tag == 'ほ' || $name_tag == 'ば' || $name_tag == 'び' || $name_tag == 'ぶ' || $name_tag == 'べ' || $name_tag == 'ぼ' || $name_tag == 'ぱ' || $name_tag == 'ぴ' || $name_tag == 'ぷ' || $name_tag == 'ぺ' || $name_tag == 'ぽ' ) {
                                $name_tag = 'は';
                            } elseif ($name_tag == 'ま' || $name_tag == 'み' || $name_tag == 'む' || $name_tag == 'め' || $name_tag == 'も') {
                                $name_tag = 'ま';
                            } elseif ($name_tag == 'や' || $name_tag == 'ゆ' || $name_tag == 'よ') {
                                $name_tag = 'や';
                            } elseif ($name_tag == 'ら' || $name_tag == 'り' || $name_tag == 'る' || $name_tag == 'れ' || $name_tag == 'ろ') {
                                $name_tag = 'ら';
                            } elseif ($name_tag == 'ア' || $name_tag == 'イ' || $name_tag == 'ウ' || $name_tag == 'エ' || $name_tag == 'オ') {
                                $name_tag = 'ア';
                            } elseif ($name_tag == 'ガ' || $name_tag == 'ギ' || $name_tag == 'グ' || $name_tag == 'ゲ' || $name_tag == 'ゴ' || $name_tag == 'カ' || $name_tag == 'キ' || $name_tag == 'ク' || $name_tag == 'ケ' || $name_tag == 'コ') {
                                $name_tag = 'カ';
                            } elseif ($name_tag == 'サ' || $name_tag == 'シ' || $name_tag == 'ス' || $name_tag == 'セ' || $name_tag == 'ソ' || $name_tag == 'ザ' || $name_tag == 'ジ' || $name_tag == 'ズ' || $name_tag == 'ゼ' || $name_tag == 'ゾ') {
                                $name_tag = 'サ';
                            } elseif ($name_tag == 'タ' || $name_tag == 'チ' || $name_tag == 'ツ' || $name_tag == 'テ' || $name_tag == 'ト' || $name_tag == 'ダ' || $name_tag == 'ヂ' || $name_tag == 'ヅ' || $name_tag == 'デ' || $name_tag == 'ド') {
                                $name_tag = 'タ';
                            } elseif ($name_tag == 'ナ' || $name_tag == 'ニ' || $name_tag == 'ヌ' || $name_tag == 'ネ' || $name_tag == 'ノ') {
                                $name_tag = 'ナ';
                            } elseif ($name_tag == 'ハ' || $name_tag == 'ヒ' || $name_tag == 'フ' || $name_tag == 'ヘ' || $name_tag == 'ホ' || $name_tag == 'バ' || $name_tag == 'ビ' || $name_tag == 'ブ' || $name_tag == 'ベ' || $name_tag == 'ボ' || $name_tag == 'パ' || $name_tag == 'ピ' || $name_tag == 'プ' || $name_tag == 'ペ' || $name_tag == 'ポ') {
                                $name_tag = 'ハ';
                            } elseif ($name_tag == 'マ' || $name_tag == 'ミ' || $name_tag == 'ム' || $name_tag == 'メ' || $name_tag == 'モ') {
                                $name_tag = 'マ';
                            } elseif ($name_tag == 'ヤ' || $name_tag == 'ユ' || $name_tag == 'ヨ') {
                                $name_tag = 'ヤ';
                            } elseif ($name_tag == 'ラ' || $name_tag == 'リ' || $name_tag == 'ル' || $name_tag == 'レ' || $name_tag == 'ロ') {
                                $name_tag = 'ラ';
                            } else {
                                $name_tag = '漢字';
                            }
                        }
                        $ancer = ' id="' . $name_tag . '"';
                    } else {
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
                        <td class="td-title2" style="white-space: nowrap; padding: 5px"><a
                                    href="accounts/detail.php?id=<?= $id ?>"<?= $ancer ?>><?= $name ?></a></td>
                        <td class="td-title2" style="white-space: nowrap; padding: 5px"> <?= $account ?></td>
                        <td class="td-title2" style="white-space: nowrap; padding: 5px"> <?= $pass ?></td>
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
