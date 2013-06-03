
<?php
$conn = mysql_connect("localhost","root","") or die("Không thể kết nối database");
mysql_select_db("bestcar") or die("Không thể kết nối database");
mysql_query("SET NAMES 'utf8'");
function check_exist($query){
	$result = mysql_query($query);
	$rows = mysql_fetch_array($result,MYSQL_NUM);
	return $rows[0];
}
?>
