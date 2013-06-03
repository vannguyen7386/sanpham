<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkNews'])){
	$DelNews = $_POST['checkNews'];
	for($i=0;$i < count($DelNews);$i++){
		$Delquery = mysql_query("DELETE FROM tintuc WHERE MaTT = '".$DelNews[$i]."'");	
	}	
	header("location:../index.php?page=NewsMan&success=Xóa tin tức thành công");
}else{
	$err = "Bạn chưa chọn tin tức cần xóa";
	header("location:../index.php?page=ProductMan&err=$err");	
}
if(isset($_REQUEST['MaTT'])){
	$f_query = "SELECT MaTT FROM tintuc WHERE MaTT ='".$_REQUEST['MaTT']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	if(!$result){
		header("location:../index.php?page=NewsMan&err=Bản tin này không tồn tại");
	}else{
		$del_query = mysql_query("DELETE FROM tintuc WHERE MaTT = '".$_REQUEST['MaTT']."'");
		header("location:../index.php?page=NewsMan&success=Xóa tin tức thành công");
	}
			
}	
?>

