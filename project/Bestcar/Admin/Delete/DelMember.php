<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkMember'])){
	$err ="";
	$DelMB = $_POST['checkMember'];
	for($i=0;$i < count($DelMB);$i++){
		$check_query = "SELECT MaTV FROM hoadon WHERE MaTV = ".$DelMB[$i];
		if(check_exist($check_query) or $DelMB[$i] == 1){
			$err .= $DelMB[$i].", ";
		}else{
			$Delquery = mysql_query("DELETE FROM thanhvien WHERE MaTV = '".$DelMB[$i]."'");
		}	
	}	
	$err = substr($err,0,-2);
	if(!empty($err)){
		header("location:../index.php?page=MemberMan&err=Không xóa được thành viên $err");
	}else{
		header("location:../index.php?page=MemberMan&success=Xóa thành viên thành công");
	}
}else{
	$err = "Bạn chưa chọn thành viên cần xóa";
	header("location:../index.php?page=MemberMan&err=$err");	
}
if(isset($_REQUEST['MaTV'])){
	$f_query = "SELECT MaTV FROM thanhvien WHERE MaTV ='".$_REQUEST['MaTV']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	$se_query = "SELECT MaTV FROM hoadon WHERE MaTV = '".$_REQUEST['MaTV']."'";
	if(check_exist($se_query) or $_REQUEST['MaTV'] == 1){
		header("location:../index.php?page=MemberMan&err=Bạn không thể xóa thành viên này");
	}else{
		if(!$result){
			header("location:../index.php?page=MemberMan&err=Thành viên này không tồn tại");
		}else{
			$del_query = mysql_query("DELETE FROM thanhvien WHERE MaTV = '".$_REQUEST['MaTV']."'");
			header("location:../index.php?page=MemberMan&success=Xóa thành viên thành công");
		}
	}		
}	
?>

