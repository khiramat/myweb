<?php
require_once '/var/www/html/inc/inc_init.php';
$DivingLogID = $_REQUEST["DivingLogID"];
require_once '/var/www/html/diving/inc/inc_all_data.php';
require_once '/var/www/html/diving/inc/inc_master_data.php';
?>
<!-- コンテンツ開始 -->
<div class="card">
  <div class="card-header">
	<h3 class="card-title">Tank List</h3>
	<div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="collapse">
		<i class="fas fa-minus"></i>
	  </button>
	  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i>
	  </button>
	</div>
  </div>
  <div class="card-body">
	<h2>ダイビングデータ詳細</h2>
	<ul>
	  <li>日付：<?= $DiveDate ?></li>
	  <li>サイト名：<?= $Site ?></li>
	  <li>ポイント名：<?= $Point ?></li>
	  <li>水域：<?= $Water ?></li>
	  <li>エントリ：<?= $Kind ?></li>
	  <li>海抜：<?= $High ?>m</li>
	  <li>種類：<?= $Style ?></li>
	</ul>
	<h2>気象情報</h2>
	<ul>
	  <li>天候：<?= $Weather ?></li>
	  <li>気温：<?= $Temperature ?></li>
	  <li>風向き：<?= $Wind ?></li>
	  <li>風力：<?= $VelocityWind ?></li>
	</ul>
	<h2>海洋情報</h2>
	<ul>
	  <li>波高：<?= $Wave ?></li>
	  <li>流れ：<?= $Current ?></li>
	  <li>うねり：<?= $Undulation ?></li>
	  <li>水温：<?= $WaterTemperature ?>&deg;</li>
	  <li>透明度：<?= $Transparency ?>m</li>
	</ul>
	<h2>テクニカルデータ</h2>
	<ul>
	  <li>エントリー：<?= $EntryTime ?> / エグジット：<?= $ExitTime ?></li>
	  <li>最大深度：<?= $MaximumDepth ?>m / 平均深度：<?= $AvarageDepth ?>m</li>
	  <li>初圧：<?= $StartPressure ?>bar / 残圧：<?= $EndPressure ?>bar</li>
	</ul>
	<h2>機材データ</h2>
	<ul>
	  <li>スーツ：<?= $Suit ?> / ウエイト：<?= $Weight ?>kg</li>
	  <li>タンク種別：<?= $Tank ?></li>
	  <li>容量：<?= $Tankage ?>L</li>
	  <li>酸素率：<?= $Oxygen ?>%</li>
	  <li>サービス：<?= $Service ?></li>
	  <li>ガイド：<?= $Guide ?></li>
	  <li>ナビ：<?= $Navigation ?></li>
	  <li>バディ：<?= $Buddy ?></li>
	  <li>メンバー：<?= $Member ?></li>
	  <li>生き物：<?= $Creature ?></li>
	  <li>コメント：<?= $Comment ?></li>
	</ul>
	<!-- サイドバー終了 -->
  </div>
  <hr class="clear">
</div>
<!-- コンテンツ終了 --> 
