<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkProductType'])){
	$err="";
	$DelLSP = $_POST['checkProductType'];
	for($i=0;$i < count($DelLSP);$i++){
		$check_query = "SELECT MaLSP FROM sanpham WHERE MaLSP = '".$DelLSP[$i]."'";
		if(check_exist($check_query)){
			$err .= $DelLSP[$i].", ";
		}else{
			$Delquery = mysql_query("DELETE FROM loaisp WHERE MaLSP = '".$DelLSP[$i]."'");
		}	
	}	
	if(!empty($err)){
		header("location:../index.php?page=ProductTypeMan&err=Không xóa được loại sản phẩm $err");
	}else{
		header("location:../index.php?page=ProductTypeMan&success=Xóa loại sản phẩm thành công");
	}
}else{
	$err = "Bạn chưa chọn loại sản phẩm cần xóa";
	header("location:index.php?page=ProductTypeMan&err=$err");	
}
if(isset($_REQUEST['MaLSP'])){
	$f_query = "SELECT MaLSP FROM loaisp WHERE MaLSP ='".$_REQUEST['MaLSP']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	$se_query = "SELECT COUNT(MaLSP) FROM sanpham WHERE MaLSP = '".$_REQUEST['MaLSP']."'";
	if(check_exist($se_query)){
		header("location:../index.php?page=ProductTypeMan&err=Loại sản phẩm này có trong danh mục sản phẩm, bạn không thể xóa");
	}else{
		if(!$result){
			header("location:../index.php?page=ProductTypeMan&err=Loại sản phẩm này không tồn tại");
		}else{
			$del_query = mysql_query("DELETE FROM loaisp WHERE MaLSP = '".$_REQUEST['MaLSP']."'");
			header("location:../index.php?page=ProductTypeMan&success=Xóa loại sản phẩm thành công");
		}
	}		
}
?>
