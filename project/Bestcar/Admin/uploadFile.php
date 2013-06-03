<?php ob_start(); 
	include('../Connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
if(isset($_REQUEST['MaAnh']) and !empty($_REQUEST['MaAnh'])){
		$flag=true;
		$err="";
		if(($_FILES['file']['type']=='image/gif') or 
		($_FILES['file']['type']=='image/jpeg') or 
		($_FILES['file']['type']=='image/pjpeg') and
		($_FILES['file']['size'] < 25000)){
		if($_FILES['file']['error'] > 0){
			$err .= "Lỗi upload ảnh";
			$flag=false;
			
		}else{
			if(file_exists("../Image/News/".$_FILES['file']['name'])){
				$err .= "File ảnh đã tồn tại";
			}else{
				move_uploaded_file($_FILES['file']['tmp_name'],"../Image/News/".$_FILES['file']['name']);
			}
		}	
	}else{
		if($_FILES['file']['type']!="")
			$err.="Không đúng định dạng<br>";
		$flag = false;
	}	
	if($flag){
		$query = "UPDATE picture SET TenAnh = '".$_FILES['file']['name']."' WHERE MaAnh = '".$_REQUEST['MaAnh']."'";
		mysql_query($query) or die ("Không thể kết nối dữ liệu");	
		echo"<p align='center' style='color:green'>Update thành công.<br>Nhấn F5 refresh lại</p>"
	?>
		<script language="JavaScript" type="text/javascript">
			setTimeout('window.close()',1000);
		</script>
	<?php		
	}else{
		header("location:upload_form.php?err=".$err."&MaAnh=".$_REQUEST['MaAnh']);
	}
}	
?>

</body>
</html>
