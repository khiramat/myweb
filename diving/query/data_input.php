<?php
$path = "/var/www/html/DivingLog/inc";
set_include_path(get_include_path() .PATH_SEPARATOR. $path);
require_once("inc_init.php");
@$copy = htmlspecialchars($_POST["copy"]);
@$htid = htmlspecialchars($_REQUEST["htid"]);
@$htpass = htmlspecialchars($_REQUEST["htpass"]);

if($copy){
	require_once("inc_last_data.php");
    $htid = C_DB_USER;
    $htpass = C_DB_PASSWD;
} else {
	require_once("inc_default_data.php");
}
require_once("inc_master_data.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Diving Data 入力</title>
<link href="../css/base.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- ヘッダ開始 -->
<?php
require_once("inc_header.php");
?>
<!-- ヘッダ終了 -->
<?php
if($htid == C_DB_USER && $htpass == C_DB_PASSWD){
?>

<!-- コンテンツ開始 -->
<div id="content">
  <div class="container"> 
  <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
  <input name="copy" type="submit" value="直近のデータをロードする" />
  </form>
    
    <!-- サイドバー開始 -->
    <div id="nav">
      <form id="form1" name="form1" method="post" action="data_input_query.php">
        <div class="section emphasis">
          <div class="inner">
            <h2>地理・ダイビングデータ</h2>
            日付
            <select name="year" id="year">
	            <option value="<?=$year?>" selected="selected"><?=$year?></option>
	            <option value="<?=$year-1?>"><?=$year-1?></option>
	            <option value="<?=$year-2?>"><?=$year-2?></option>
	            <option value="<?=$year-3?>"><?=$year-3?></option>
	            <option value="<?=$year-4?>"><?=$year-4?></option>
	            <option value="<?=$year-5?>"><?=$year-5?></option>
	            <option value="<?=$year-6?>"><?=$year-6?></option>
	            <option value="<?=$year-7?>"><?=$year-7?></option>
	            <option value="<?=$year-8?>"><?=$year-8?></option>
            </select>
            .
            <select name="month" id="month">
              <option value="<?=$month?>" selected="selected">
              <?=$month?>
              </option>
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            .
            <select name="day" id="day">
              <option value="<?=$day?>" selected="selected">
              <?=$day?>
              </option>
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
            <img src="../image/space.png" width="20" height="10" align="absmiddle" alt="space"  />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />サイト名
            <select name="Site" id="Site">
              <option value="<?=@$SiteMaster?>" selected="selected">
              <?=@$Site?>
              </option>
              <?
						$sql = "select * from DivingSite order by CountryMaster, PrefectureMaster, SiteMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$SiteMaster = $row["SiteMaster"];
							$Site = $row["Site"];
							echo "<option value=\"$SiteMaster\">$Site</option>\n";
						}
						?>
            </select>
            <img src="../image/space.png" alt="space"  width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />ポイント名
            <input name="Point" type="text" id="Point" size="20" maxlength="20" value="<?=@$Point_last?>" />
            <br />
            水質
            <select name="Water" id="Water">
              <option value="<?=@$WaterMaster?>" selected="selected">
              <?=@$Water?>
              </option>
              <?
						$sql = "select * from DivingWater order by WaterMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$WaterMaster = $row["WaterMaster"];
							$Water = $row["Water"];
							echo "<option value=\"$WaterMaster\">$Water</option>\n";
						}
						?>
            </select>
            <img src="../image/space.png" width="20" height="10" align="absmiddle" alt="space"  />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
            エントリ
            <select name="Kind" id="Kind">
              <option value="<?=@$KindMaster?>" selected="selected">
              <?=@$Kind?>
              </option>
              <?
						$sql = "select * from DivingKind order by KindMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$KindMaster = $row["KindMaster"];
							$Kind = $row["Kind"];
							echo "<option value=\"$KindMaster\">$Kind</option>\n";
						}
						?>
            </select>
            <img src="../image/space.png" width="20" height="10" align="absmiddle" alt="space"  />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
            海抜
            <input name="High" type="text" id="High" size="4" maxlength="4" value="<?=@$High_last?>" />m 
            <img src="../image/space.png" width="20" height="10" align="absmiddle" alt="space"  />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
            種類
            <select name="Style" id="Style">
              <option value="<?=@$StyleMaster?>" selected="selected">
              <?=@$Style?>
              </option>
              <?
						$sql = "select * from DivingStyle order by StyleMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$StyleMaster = $row["StyleMaster"];
							$Style = $row["Style"];
							echo "<option value=\"$StyleMaster\">$Style</option>\n";
						}
						?>
            </select>
          </div>
        </div>
        <div class="section strong">
          <div class="inner">
            <h2>気象情報</h2>
            天候
            <select name="Weather" id="Weather">
              <option value="<?=@$WeatherMaster?>" selected="selected">
              <?=@$Weather?>
              </option>
              <?
						$sql = "select * from DivingWeather order by WeatherMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$WeatherMaster = $row["WeatherMaster"];
							$Weather = $row["Weather"];
							echo "<option value=\"$WeatherMaster\">$Weather</option>\n";
						}
						?>
            </select>
            <img src="../image/space.png" alt="space"  width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />気温
            <input name="Temperature" type="text" id="Temperature" size="4" maxlength="4" value="<?=@$Temperature_last?>" />
            &deg; <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />風向き
            <select name="Wind" id="Wind">
              <option value="<?=@$WindMaster?>" selected="selected">
              <?=@$Wind?>
              </option>
              <?
						$sql = "select * from DivingWind order by WindMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$WindMaster = $row["WindMaster"];
							$Wind = $row["Wind"];
							echo "<option value=\"$WindMaster\">$Wind</option>\n";
						}
						?>
            </select>
            <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />風力
            <select name="VelocityWind" id="VelocityWind">
              <option value="<?=@$VelocityWindMaster?>" selected="selected">
              <?=@$VelocityWind?>
              </option>
              <?
						$sql = "select * from DivingVelocityWind order by VelocityWindMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$VelocityWindMaster = $row["VelocityWindMaster"];
							$VelocityWind = $row["VelocityWind"];
							echo "<option value=\"$VelocityWindMaster\">$VelocityWind</option>\n";
						}
						?>
            </select>
          </div>
        </div>
        <div class="section emphasis">
          <div class="inner">
            <h2>海洋情報</h2>
            波高
            <select name="Wave" id="Wave">
              <option value="<?=@$WaveMaster?>" selected="selected">
              <?=@$Wave?>
              </option>
              <?
						$sql = "select * from DivingWave order by WaveMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$WaveMaster = $row["WaveMaster"];
							$Wave = $row["Wave"];
							echo "<option value=\"$WaveMaster\">$Wave</option>\n";
						}
						?>
            </select>
            / 流れ
            <select name="Current" id="Current">
              </option>
              <option value="<?=@$Current_last?>" selected="selected"><?=@$Current?></option>
              <option value="1">なし</option>
              <option value="2">弱い</option>
              <option value="3">強い</option>
            </select>
            / うねり
            <select name="Undulation" id="Undulation">
              <option value="<?=@$Undulation_last?>" selected="selected"><?=@$Undulation?></option>
              <option value="1">なし</option>
              <option value="2">小さい</option>
              <option value="3">大きい</option>
            </select>
            <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" /> 水温
            <input name="WaterTemperature" type="text" id="WaterTemperature" size="4" maxlength="4" value="<?=@$WaterTemperature_last?>" />
            &deg; <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />透明度
            <input name="Transparency" type="text" id="Transparency" size="3" maxlength="3" value="<?=@$Transparency_last?>" />
            m </div>
        </div>
        <div class="section strong">
          <div class="inner">
            <h2>テクニカルデータ</h2>
            エントリー
            <input name="entry_hour" type="text" id="entry_hour" size="2" maxlength="2" />
            :
            <input name="entry_minit" type="text" id="entry_minit" size="2" maxlength="2" />
            / エグジット
            <input name="exit_hour" type="text" id="exit_hour" size="2" maxlength="2" />
            :
            <input name="exit_minit" type="text" id="exit_minit" size="2" maxlength="2" />
						<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
            最大深度
            <input name="MaximumDepth" type="text" id="MaximumDepth" size="4" maxlength="4" />
            / 平均深度
            <input name="AvarageDepth" type="text" id="AvarageDepth" size="4" maxlength="4" />
            m <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
						初圧
            <input name="StartPressure" type="text" id="StartPressure" size="3" maxlength="3" value="200" />
            / 残圧
            <input name="EndPressure" type="text" id="EndPressure" size="3" maxlength="3" />
            bar </div>
        </div>
        <div class="section emphasis">
          <div class="inner">
            <h2>機材データ</h2>
            スーツ
            <select name="Suit" id="Suit">
              <option value="<?=@$SuitMaster?>" selected="selected">
              <?=@$Suit?>
              </option>
              <?
						$sql = "select * from DivingSuit order by SuitMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$SuitMaster = $row["SuitMaster"];
							$Suit = $row["Suit"];
							echo "<option value=\"$SuitMaster\">$Suit</option>\n";
						}
						?>
            </select>
            / ウエイト
            <input name="Weight" type="text" id="Weight" size="2" maxlength="2" value="<?=@$Weight_last?>" />
            kg <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|<img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />タンク種別
            <select name="Tank" id="Tank">
              <option value="<?=@$TankMaster?>" selected="selected">
              <?=@$Tank?>
              </option>
              <?
						$sql = "select * from DivingTank order by TankMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$TankMaster = $row["TankMaster"];
							$Tank = $row["Tank"];
							echo "<option value=\"$TankMaster\">$Tank</option>\n";
						}
						?>
            </select>
            / 容量
            <select name="Tankage" id="Tankage">
              <option value="<?=@$TankageMaster?>" selected="selected">
              <?=@$Tankage?>L
              </option>
              <?
						$sql = "select * from DivingTankage order by TankageMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$TankageMaster = $row["TankageMaster"];
							$Tankage = $row["Tankage"];
							echo "<option value=\"$TankageMaster\">$Tankage". "L</option>\n";
						}
						?>
            </select>
            / 酸素率
            <select name="OxygenLaw" id="OxygenLaw">
              <option value="<?=@$OxygenMaster?>" selected="selected">
              <?=@$Oxygen?>%
              </option>
              <?
						$sql = "select * from DivingOxygen order by OxygenMaster";
						$result = mysqli_query($link_diving, $sql);
						while ($row = mysqli_fetch_assoc($result)){
							$OxygenMaster = $row["OxygenMaster"];
							$Oxygen = $row["Oxygen"];
							echo "<option value=\"$OxygenMaster\">$Oxygen". "%</option>\n";
						}
						?>
            </select>
          </div>
        </div>
        <div class="section normal">
          <h2>ダイビングデータ</h2>
          サービス
          <input name="Service" type="text" id="Service" size="32" value="<?=@$Service_last?>" />
          <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|
          <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
          ガイド
          <input name="Guide" type="text" id="Guide" size="20" value="<?=@$Guide_last?>" />|
          <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
          ナビ
          <input name="Navigation" type="checkbox" id="Navigation" value="1" <?php  if (@$Navigation){ echo "checked=\"checked\"";} ?>/>
          <br />
          バディ
          <input name="Buddy" type="text" id="Buddy" size="20" value="<?=@$Buddy_last?>" />
          <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />|
          <img src="../image/space.png" alt="space" width="20" height="10" align="absmiddle" />
          メンバー
          <input name="Member" type="text" id="Member" size="60" value="<?=@$Member_last?>" />
          <br />
          生き物
          <textarea name="Creature" cols="80" rows="5" id="Creature"><?=@$Creature_last?>
</textarea>
          <br />
          コメント
          <textarea name="Comment" cols="80" rows="5" id="Comment"><?=@$Comment_last?>
</textarea>
        </div>
        <div class="section normal">
          <input name="" type="submit" value="Go" />
        </div>
      </form>
    </div>
    <!-- サイドバー終了 --> 
  </div>
  <hr class="clear">
</div>
<!-- コンテンツ終了 -->
<?php } else { ?>
    <form action="data_input.php" method="post">
        ID: <input name="htid" type="text" size="10" style="ime-mode: disabled;"/><br>
        PassWD: <input name="htpass" type="password" size="10"/>
        <input type="submit" name="submit" value="Next"/>
    </form>
<?php }?>

<!-- フッタ開始 -->
<div id="footer">
  <div class="container"> 
    <!--
<ul class="nl">
<li><a href="type2_design1_top.html">ホーム</a></li>
<li><a href="type2_design1_low.html">サービス内容</a></li>
<li><a href="#">制作実績</a></li>
<li><a href="#">料金表</a></li>
<li><a href="#">会社案内</a></li>
</ul>
<ul class="nl guide">
<li><a href="#">FAQ</a></li>
<li><a href="#">プライバシーポリシー</a></li>
<li><a href="#">アクセス</a></li>
<li><a href="#">サイトマップ</a></li>
</ul>
-->
      <?php
      require_once("inc_footer.php");
      ?>
  </div>
</div>
<!-- フッタ終了 -->
</body>
</html>