<?php
$path = $_SERVER["DOCUMENT_ROOT"]."/diary/inc";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("inc_init.php");
$date = date("Y-m-d") ;
$refer = gethostbyaddr($_SERVER["REMOTE_ADDR"]);

//$robo = strpos($domain, "googlebot.com");

$robo = strpos($domain, "crawl");
$robos = strpos($domain, "msnbot");

//if ($robo == false && $robos == false){
	$sql = "
	insert into 
		DiaryOutFrame 
	(
		date, 
		domain
	) 
	values
	(
		'$date', 
		'$refer'
	)
	";
	$result = mysqli_query( $link, $sql ) ;
	if (!$result){
		echo mysqli_error($link);
		echo "<br>". $sql;
	} else{ /*
		echo <<<EOF
<meta http-equiv="Refresh" content="0;URL=index.php" />
EOF;
 */

	}
//}
?>
