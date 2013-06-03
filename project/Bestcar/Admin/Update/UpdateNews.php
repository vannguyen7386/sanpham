<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Tin tức</title>
</head>
<body>
<?php 
include("../../Connect.php");
$err ="";
$flag=true;
$success = "Update thành công";		
if(isset($_POST['NewsHeading']) and !empty($_POST['NewsHeading'])){//Kiểm tra trường tiêu dề nhập vào rỗng. Nếu rỗng không update
	$query = "UPDATE tintuc SET Tieude = '".$_POST['NewsHeading']."' WHERE MaTT = '".$_POST['NewsID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");		
}

if(isset($_POST['NewsSummary']) and !empty($_POST['NewsSummary'])){//Kiểm tra trường tóm tắt nhập vào rỗng.
	$query = "UPDATE tintuc SET Tomtat = '".nl2br($_POST['NewsSummary'])."' WHERE MaTT = '".$_POST['NewsID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}

if(isset($_POST['NewsContent'])){
	$query = "UPDATE tintuc SET Noidung = '".nl2br($_POST['NewsContent'])."' WHERE MaTT = '".$_POST['NewsID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}
if(isset($_POST['Copyright'])){
	$query = "UPDATE tintuc SET Copyright = '".$_POST['Copyright']."' WHERE MaTT = '".$_POST['NewsID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}
$NewsType="";
if(isset($_POST['NewsType']) and !empty($_POST['NewsType'])){
	$NewsType = $_POST['NewsType'];
}
if(isset($_POST['newTypeofNews']) and !empty($_POST['newTypeofNews'])){
	//Kiểm tra loại tin tức tồn tại trong CSDL:
	$check_query = "SELECT COUNT(TenLTT) FROM loaitt WHERE TenLTT LIKE '".$_POST['newTypeofNews']."'";
	if(!check_exist($check_query)){
		$NewsType = $_POST['newTypeofNews'];
		$query = "INSERT INTO loaitt VALUES (Null,'".$NewsType ."')";	
		mysql_query($query) or die ("Không thể kết nối dữ liệu");
	}else{
		$NewsType = $_POST['newTypeofNews'];
		$err .= "Loại tin này đã tồn tại<br>";
	}	
	
}	
if(!empty($NewsType)){
	$getID_query = mysql_query("SELECT MaLTT FROM loaitt WHERE TenLTT LIKE '".$NewsType."'");	
	$result = mysql_fetch_array($getID_query);
	if($result){
		$news_query = mysql_query("UPDATE tintuc SET MaLTT = ".$result['MaLTT']."  WHERE MaTT = '".$_POST['NewsID']."'") or die ("Không thể kết nối dữ liệu");	
	}	
}
			
//Upload file

if(($_FILES['file']['type']=='image/gif') or 
	($_FILES['file']['type']=='image/jpeg') or 
	($_FILES['file']['type']=='image/pjpeg') and
	($_FILES['file']['size'] < 25000)){
	if($_FILES['file']['error'] > 0){
		$err .= "Lỗi upload ảnh";
		$flag=false;
		
	}else{
		if(file_exists("../../Image/News/".$_FILES['file']['name'])){
			$err .= "File ảnh đã tồn tại";
		}else{
			move_uploaded_file($_FILES['file']['tmp_name'],"../../Image/News/".$_FILES['file']['name']);
		}
	}	
}else{
	if($_FILES['file']['type']!="")
		$err.="Không đúng định dạng<br>";
	$flag = false;
}	
if($flag){
	$query = "UPDATE tintuc SET Picture = '".$_FILES['file']['name']."' WHERE MaTT = '".$_POST['NewsID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");		
}
if($err !=""){
	header("location:../index.php?page=NewsMan&err=$err");
}else{
	header("location:../index.php?page=NewsMan&success=$success");
}	
?>
</body>
</html>
