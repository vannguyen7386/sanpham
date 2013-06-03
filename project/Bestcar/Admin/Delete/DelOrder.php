<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkOrder'])){
	$err="";
	$DelOD = $_POST['checkOrder'];
	for($i=0;$i < count($DelOD);$i++){
		$Delquery = mysql_query("DELETE FROM hoadon WHERE MaHD = '".$DelOD[$i]."'");
		$Delquery2=	 mysql_query("DELETE FROM chitiethoadon WHERE MaHD = '".$DelOD[$i]."'");
	}	
	header("location:../index.php?page=OrderMan&success=Xóa đơn hàng thành công");
}else{
	$err = "Bạn chưa chọn đơn hàng cần xóa";
	header("location:index.php?page=OrderMan&err=$err");	
}
if(isset($_REQUEST['MaHD'])){
	$f_query = "SELECT MaHD FROM hoadon WHERE MaHD ='".$_REQUEST['MaHD']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);

	if(!$result){
		header("location:../index.php?page=OrderMan&err=Đơn hàng này không tồn tại");
	}else{
		$del_query = mysql_query("DELETE FROM hoadon WHERE MaHD = '".$_REQUEST['MaHD']."'");
		$del_query2 = mysql_query("DELETE FROM chitiethoadon WHERE MaHD = '".$_REQUEST['MaHD']."'");
		header("location:../index.php?page=OrderMan&success=Xóa đơn hàng thành công");
	}		
}
?>

