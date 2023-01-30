<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Page Edit</title>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<link rel="stylesheet" href="general.css" type="text/css" />
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">
<?
mysql_connect(localhost,root,freenap);
mysql_select_db(hp);
mysql_query("update contents set page_name = '$page_name', link_name = '$link_name', page_title = '$page_title', page_cont = '$page_cont' where page_id = '$page_id'");
?>
<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="250" class="bgc_gray2" valign="top" nowrap="nowrap"> 
<? include("inc_server_menu.php"); ?>
	</td>
	<td width="100%" valign="top"> 
	  <h1>Edit Contents Result</h1>
<p>page_id : <? echo $page_id; ?></p>
<p>page_name : <? echo $page_name; ?></p>
<p>link_name : <? echo $link_name; ?></p>
<p>page_title : <? echo $page_title; ?></p>
<p>page_cont : <? echo $page_cont; ?></p>
	</td>
  </tr>
  <tr align="center"> 
	<td class="size_10_b" width="250" height="10"><img src="../images/spacer.gif" alt="space" width="250" height="10" /></td>
	<td class="size_10_b" height="10">&nbsp;</td>
  </tr>
  <tr align="center"> 
	<td colspan="2" class="copyright" height="25"> 
	  <? include("../copyrights.txt") ?>
	</td>
  </tr>
</table>
</body>
</html>
