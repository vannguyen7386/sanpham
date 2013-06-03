<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkProduct'])){
	$err ="";
	$DelSP = $_POST['checkProduct'];
	for($i=0;$i < count($DelSP);$i++){
		$check_query = "SELECT MaSP FROM chitiethoadon WHERE MaSP = '".$DelSP[$i]."'";
		if(check_exist($check_query)){
			$err .= $DelSP[$i].", ";
		}else{
			$Delquery = mysql_query("DELETE FROM sanpham WHERE MaSP = '".$DelSP[$i]."'");
		}	
	}	
	$err = substr($err,0,-2);
	if(!empty($err)){
		header("location:../index.php?page=ProductMan&err=Không xóa được sản phẩm $err");
	}else{
		header("location:../index.php?page=ProductMan&success=Xóa sản phẩm thành công");
	}
}else{
	$err = "Bạn chưa chọn sản phẩm cần xóa";
	header("location:../index.php?page=ProductMan&err=$err");	
}
if(isset($_REQUEST['MaSP'])){
	$f_query = "SELECT MaSP FROM sanpham WHERE MaSP ='".$_REQUEST['MaSP']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	$se_query = "SELECT MaSP FROM chitiethoadon WHERE MaSP = '".$_REQUEST['MaSP']."'";
	if(check_exist($se_query)){
		header("location:../index.php?page=ProductMan&err=Sản phẩm này có trong đơn hàng, bạn không thể xóa");
	}else{
		if(!$result){
			header("location:../index.php?page=ProductMan&err=Sản phẩm này không tồn tại");
		}else{
			$del_query = mysql_query("DELETE FROM sanpham WHERE MaSP = '".$_REQUEST['MaSP']."'");
			header("location:../index.php?page=ProductMan&success=Xóa sản phẩm thành công");
		}
	}		
}	
?>

