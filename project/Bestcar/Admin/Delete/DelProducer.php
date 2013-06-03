<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkProducer'])){
	$err ="";
	$DelNCC = $_POST['checkProducer'];
	for($i=0;$i < count($DelNCC);$i++){
		$check_query = "SELECT MaNCC FROM sanpham WHERE MaNCC = '".$DelNCC[$i]."'";
		if(check_exist($check_query)){
			$err .= $DelNCC[$i].", ";
		}else{
			$Delquery = mysql_query("DELETE FROM nhacc WHERE MaNCC = '".$DelNCC[$i]."'");
		}	
	}	
	$err = substr($err,0,-2);
	if(!empty($err)){
		header("location:../index.php?page=ProducerMan&err=Không xóa được nhà sản xuất $err");
	}else{
		header("location:../index.php?page=ProducerMan&success=Xóa nhà sản xuất thành công");
	}
}else{
	$err = "Bạn chưa chọn nhà sản xuất cần xóa";
	header("location:index.php?page=ProducerMan&err=$err");	
}
if(isset($_REQUEST['MaNCC'])){
	$f_query = "SELECT MaNCC FROM nhacc WHERE MaNCC ='".$_REQUEST['MaNCC']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	$se_query = "SELECT MaNCC FROM sanpham WHERE MaNCC = '".$_REQUEST['MaNCC']."'";
	if(check_exist($se_query)){
		header("location:../index.php?page=ProducerMan&err=Nhà sản xuất này có trong danh mục sản phẩm, bạn không thể xóa");
	}else{
		if(!$result){
			header("location:../index.php?page=ProducerMan&err=Nhà sản xuất này không tồn tại");
		}else{
			$del_query = mysql_query("DELETE FROM nhacc WHERE MaNCC = '".$_REQUEST['MaNCC']."'");
			header("location:../index.php?page=ProducerMan&success=Xóa nhà sản xuất thành công");
		}
	}		
}
?>