<? $page = $_GET["page"]; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Server Fittings <?php echo $page; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<link rel="stylesheet" href="general.css" type="text/css" />
<link rel="Shortcut icon" href="../favicon.ico">
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="185" valign="top"> <? include("inc_server_menu.php"); ?> </td>
	<td width="100%" valign="top"> 
	  <? include("contents/$page.html"); ?>
	  <p>&nbsp;</p></td>
  </tr>
  <tr align="center"> 
	<td colspan="2" class="copyright"> <hr noshade="noshade" />
	  <? include("../copyrights.txt") ?> </td>
  </tr>
</table>
</body>
</html>
