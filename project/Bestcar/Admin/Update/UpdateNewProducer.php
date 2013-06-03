<?php ob_start();
include("../../Connect.php");

$err="";
$ProducerID ="";
$ProducerName="";
$flag=true;
if(isset($_POST['ProducerID']) and !empty($_POST['ProducerID'])){
	$se_query = "SELECT COUNT(MaNCC) FROM nhacc WHERE MaNCC = '".$_POST['ProducerID']."'";
	if(check_exist($se_query)){
		$err = "Trùng mã nhà sản xuất <br>";
		$flag=false;
	}else{
		$ProducerID = $_POST['ProducerID'];
	}
}else{
	$err="Không được để trống Mã nhà sản xuất<br>";
	$flag = false;
}
if(isset($_POST['ProducerName']) and !empty($_POST['ProducerName'])){
	$se_query = "SELECT COUNT(TenNCC) FROM nhacc WHERE TenNCC = '".$_POST['ProducerName']."'";
	if(check_exist($se_query)){
		$err .= "Trùng tên nhà sản xuất";
		$flag=false;
	}else{
		$ProducerName = $_POST['ProducerName'];
	}
}else{
	$err.="Không được để trống Tên nhà sản xuất<br>";
	$flag = false;
}
if($flag){
	$query = "INSERT INTO nhacc VALUES('".$ProducerID."','".$ProducerName."')";
	mysql_query($query) or die("Không thể kết nối dữ liệu");
	header("location:../index.php?page=ProducerMan&success=Thêm nhà sản xuất thành công");
}else{
	header("location:../index.php?page=ProducerMan&AddProducer&err=$err");
}

?>
