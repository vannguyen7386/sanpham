<?php ob_start();
include("../../Connect.php");
if(isset($_POST['checkSug'])){
	$err ="";
	$DelSug = $_POST['checkSug'];
	for($i=0;$i < count($DelSug);$i++){
		$Delquery = mysql_query("DELETE FROM ykien WHERE MaYK = '".$DelSug[$i]."'");	
	}	
	header("location:../index.php?page=SuggestMan&success=Xóa ý kiến thành công");
}else{
	$err = "Bạn chưa chọn ý kiến cần xóa";
	header("location:../index.php?page=SuggestMan&err=$err");	
}
if(isset($_REQUEST['MaYK'])){
	$f_query = "SELECT MaYK FROM ykien WHERE MaYK ='".$_REQUEST['MaYK']."'";
	$query = mysql_query($f_query);
	$result = mysql_fetch_array($query);
	if(!$result){
		header("location:../index.php?page=SuggestMan&err=Không tồn tại ý kiến này");
	}else{
		$del_query = mysql_query("DELETE FROM ykien WHERE MaYK = '".$_REQUEST['MaYK']."'");
		header("location:../index.php?page=SuggestMan&success=Xóa ý kiến thành công");
	}		
}	
?>

