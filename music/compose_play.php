<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
$link = mysql_connect("mysql204.db.sakura.ne.jp","hiramatsu","freenap");
$db = mysql_select_db(hiramatsu, $link);
mysql_query("set names utf8");
$product_id = $_GET["product_id"];
?>
<title>
<?
$result = mysql_query("select * from music where product_id='$product_id'");
$row = mysql_fetch_array($result);
// 内容の表示
   printf("%s -- %s\n", $row["client"],$row["cm_name"]);
?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="general.css" type="text/css" />
</head>
<body leftmargin="0" topmargin="0">
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="185" valign="top" nowrap="nowrap" class="bgc_gray2"> <? include("inc_compose_menu.php"); ?> </td>
	<td width="535" valign="top"> 
	  <?
// 内容の表示
$result = mysql_query("select * from music where product_id='$product_id'");
$row = mysql_fetch_array($result);
?>
	  <table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
		<tr> 
		  <td colspan="3">&nbsp; </td>
		</tr>
		<tr> 
		  <td class="play-title" colspan="3"> <? printf("%s\n", $row["cm_name"]); ?> 
		  </td>
		</tr>
		<tr> 
		  <td class="bold_white" colspan="3"> <hr size="1" noshade="noshade" /> 
		  </td>
		</tr>
		<tr> 
		  <td class="play-mcin" colspan="3">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="250" height="20">
			  <param name="movie" value="sound/m_<? echo $product_id; ?>.swf" />
			  <param name="quality" value="high" />
			  <param name="LOOP" value="false" />
			  <embed src="sound/m_<? echo $product_id; ?>.swf" quality="high" pluginspage="http://www.macromedia.com/jp/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="250" height="20" loop="False"> 
			  </embed> </object></td>
		</tr>
		<tr> 
		  <td class="bold_white" colspan="3"> <hr size="1" noshade="noshade" /> 
		  </td>
		</tr>
		<tr> 
		  <td class="play" width="100">クライアント</td>
		  <td width="10">：</td>
		  <td width="290" class="play"> <? printf("%s\n", $row["client"]); ?> 
		  </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td nowrap="nowrap" class="play">音楽プロダクション</td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["sound_pro"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td class="play">制作日</td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["production_date"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td> <p class="play">作曲者</p></td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["comporser"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td class="play">演奏者</td>
		  <td>：</td>
		  <td class="play"> <? printf("%s\n", $row["player_name"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td nowrap="nowrap" class="play">データプログラミング</td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["programer"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td class="play">録音エンジニア</td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["enginerr"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"> <hr size="1" noshade="noshade" /> </td>
		</tr>
		<tr> 
		  <td class="play">録音スタジオ</td>
		  <td>： </td>
		  <td class="play"> <? printf("%s\n", $row["studio_name"]); ?> </td>
		</tr>
		<tr> 
		  <td colspan="3"><hr size="1" noshade="noshade" /></td>
		</tr>
		<tr> 
		  <td colspan="3" class="copyright"> 
			<? include("../copyrights.txt") ?> </td>
		</tr>
	  </table></td>
  </tr>
</table>
</body>
</html>
