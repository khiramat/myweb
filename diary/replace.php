<p>&lt;br /&gt;</p><p>&lt;p&gt;&lt;/p&gt;</p>
<?php
mysqli_connect("mysql204.db.sakura.ne.jp", "hiramatsu", "freenap");
mysqli_select_db(hiramatsu);
$sql = "select max(id_num) from content";
$result = mysqli_query($sql);
$max_id = mysqli_result($result, 0, 0);
echo $max_id;
$id = 1;
while ($max_id > $id) {
	$sql = "select paragraph from content where id_num='$id'";
	$result = mysqli_query($sql);
	$row = mysqli_fetch_array($result);
	$paragraph = $row["paragraph"];
	$br = "</p>";
	$wo_br = "";
	$paragraph_wo_br = str_replace($br, $wo_br, $paragraph);
	$sql = "update content set paragraph = '$paragraph_wo_br' where id_num='$id'";
	mysqli_query($sql);
	$id++;
	echo $paragraph_wo_br;
}
?>
