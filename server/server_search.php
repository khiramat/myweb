<?
 // 変数 $PHP_AUTH_USER にすでに情報が含まれていることを確認する。
 if (!isset($PHP_AUTH_USER)) {
  // 中身が空なら、ダイアログボックスを表示させるヘッダーを送る。
  header('WWW-Authenticate: Basic realm="My Private Stuff"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'ユーザーの認証が必要です。';
  exit;

 } else if (isset($PHP_AUTH_USER)) {

  if (($PHP_AUTH_USER != "kyo") || ($PHP_AUTH_PW != "freenap")) {
   header('WWW-Authenticate: Basic realm="My Private Stuff"');
   header('HTTP/1.0 401 Unauthorized');
   echo 'ユーザーの認証が必要です。';
   exit;

  } else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>データ更新</title>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<link rel="stylesheet" href="general.css" type="text/css" />
</head>
<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0">
<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
	<td width="250" class="bgc_gray2" valign="top" nowrap="nowrap"> 
	  <? include("inc_server_menu.php"); ?>
	</td>
	<td width="100%" valign="top"> 
	  <h1>Search for Page Edit</h1>
	  <form action="server_edit.php" method="get" name="serach_page_id" id="serach_page_id">
		<table width="50%" border="0" cellspacing="5" cellpadding="5">
		<tr>
		    <td>Page_id =</td>
		  <td>
			  <input type="text" name="page_id" />
		  </td>
		</tr>
		<tr> 
		  <td>&nbsp;</td>
		  <td>
			  <input type="submit" value="検索" />
			</td>
		</tr>
	  </table>
	</form>
	  <p>&nbsp;</p>
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
<?
  }
 }
?>