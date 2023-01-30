<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>無題ドキュメント</title>
</head>

<body>

<?php
$refer = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
//$refer = $_SERVER["REMOTE_HOST"];
$uri = $_SERVER["REQUEST_URI"];
$addr = $_SERVER["REMOTE_ADDR"];
$usr_agent = $_SERVER["HTTP_USER_AGENT"];
echo $refer . "<br>" . $uri . "<br>" . $addr . "<br>" . $usr_agent . "<br>" . $_SERVER["DOCUMENT_ROOT"] . "/diary/inc";

?>

</body>
</html>