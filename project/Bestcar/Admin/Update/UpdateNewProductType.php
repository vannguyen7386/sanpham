<?php ob_start();
include("../../Connect.php");

$err="";
$ProductTypeID ="";
$ProductTypeName="";
$flag=true;
if(isset($_POST['ProductTypeID']) and !empty($_POST['ProductTypeID'])){
	$se_query = "SELECT COUNT(MaLSP) FROM loaisp WHERE MaLSP = '".$_POST['ProductTypeID']."'";
	if(check_exist($se_query)){
		$err = "Trùng mã loại sản phẩm<br>";
		$flag=false;
	}else{
		$ProductTypeID = $_POST['ProductTypeID'];
	}
}else{
	$err="Không được để trống Mã loại sản phẩm<br>";
	$flag = false;
}
if(isset($_POST['ProductTypeName']) and !empty($_POST['ProductTypeName'])){
	$se_query = "SELECT COUNT(TenLSP) FROM loaisp WHERE TenLSP = '".$_POST['ProductTypeName']."'";
	if(check_exist($se_query)){
		$err .= "Trùng tên loại sản phẩm";
		$flag=false;
	}else{
		$ProductTypeName = $_POST['ProductTypeName'];
	}
}else{
	$err.="Không được để trống Tên loại sản phẩm";
	$flag = false;
}
if($flag){
	$query = "INSERT INTO loaisp VALUES('".$ProductTypeID."','".$ProductTypeName."')";
	mysql_query($query) or die("Không thể kết nối dữ liệu");
	header("location:../index.php?page=ProductTypeMan&success=Thêm loại sản phẩm thành công");
}else{
	header("location:../index.php?page=ProductTypeMan&AddProductType&err=$err");
}

?>
