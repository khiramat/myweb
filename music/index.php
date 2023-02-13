<?php
// include_path 自動設定
$path = $_SERVER["DOCUMENT_ROOT"] . "/music/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$keyword = $_REQUEST["keyword"];
// require_once("/var/www/kh/common/digest.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CM作品集</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="general.css" type="text/css" />
<link rel="Shortcut icon" href="../favicon.ico">
</head>
<body leftmargin="0" topmargin="0">
<table width="720" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="195" valign="top" nowrap="NOWRAP"> 
	  <? include("inc_compose_menu.php"); ?> </td>
	<td width="525" valign="top"> 
	  <?
$result = mysqli_query("select * from music");
echo "
<table width=\"600\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
	<tr><td colspan=\"3\" class=\"main-head\">TV Commercial Music Works</td></tr>
	<td class=\"title\">Company Name</td><td class=\"title\">Product Name</td><td class=\"title\">Production Date</tr>";
while ($row = mysqli_fetch_array($result)) {
 printf("<tr><td class=\"name\"><a href=\"compose_play.php?product_id=%s\">%s</a></td><td class=\"name\">%s</td><td class=\"date\">%s</td></tr>\n", $row["product_id"], $row["client"], $row["cm_name"],$row["production_date"]);	
} 
echo "</table>\n";

?>
	  <hr size="1" noshade="noshade" /> </td>
  </tr>
  <tr align="center"> 
	<td height="10"><img src="../images/spacer.gif" width="195" height="10" alt="" /></td>
	<td height="10">&nbsp;</td>
  </tr>
  <tr align="center"> 
	<td colspan="2" class="copyright"> <? include("../copyrights.txt") ?> </td>
  </tr>
</table>
</body>
</html>
