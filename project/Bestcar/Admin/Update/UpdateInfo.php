<?php session_start();
	ob_start(); 
	include("../../Connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	if (isset($_POST['ChangePass'])){
		$query = "SELECT * FROM thanhvien WHERE TenDN LIKE'".$_SESSION['username']."' and Matkhau LIKE '".$_POST['Pass']."'";
		$sql = mysql_query($query) or die ("Không thể kết nối dữ liệu");
		$result = mysql_fetch_array($sql);
		if($result){
			if(isset($_POST['NewPass']) and strlen($_POST['NewPass']) > 4 ){
				$query_up = mysql_query("UPDATE thanhvien SET Matkhau = '".$_POST['NewPass']."' WHERE TenDN='".$_SESSION['username']."'") or die ("Không thể kết nối dữ liệu");
				header("location:../index.php?page=AdmDocument&success=Đổi mật khẩu thành công");
			}else{
				header("location:../index.php?page=Change&field=pass&err=Mật khẩu không phù hợp<br>Mật khẩu phải lớn hơn 4 kí tự");
			}
		}else{
			header("location:../index.php?page=Change&field=pass&err=Mật khẩu không đúng");	
		}
	}elseif(isset($_POST['ChangeEmail'])){
		$query = "SELECT * FROM thanhvien WHERE TenDN LIKE'".$_SESSION['username']."' and Matkhau LIKE '".$_POST['Pass']."' and Email LIKE '".$_POST['Email']."'";
		$sql = mysql_query($query) or die ("Không thể kết nối dữ liệu");
		$result = mysql_fetch_array($sql);
		if($result){
			if(isset($_POST['NewEmail'])){
				$query_up = mysql_query("UPDATE thanhvien SET Email = '".$_POST['NewEmail']."'
										 WHERE TenDN='".$_SESSION['username']."' and Matkhau LIKE '".$_POST['Pass']."'") or die ("Không thể kết nối dữ liệu");
				header("location:../index.php?page=AdmDocument&success=Đổi email thành công");
			}else{
				header("location:../index.php?page=Change&field=email&err=Email không đúng");
			}
		}else{
			header("location:../index.php?page=Change&field=pass&err=Email hoặc mật khẩu không đúng");	
		}
	
	}elseif(isset($_POST['Submit'])){
		$name =NULL;
		$err=NULL;
		$address = NULL;
	
		if(isset($_POST['name']) and !empty($_POST['name'])){
			$name = $_POST['name'];
			$qr_up = mysql_query("UPDATE thanhvien SET Hoten = '".$name."' WHERE TenDN='".$_SESSION['username']."'") or die("Không thể kết nối dữ liệu");
		}
		$gender = $_POST['gender'];
		$ngaysinh = $_POST['Nam']."-".$_POST['Thang']."-".$_POST['Ngay'];
		if(isset($_POST['Address']) and !empty($_POST['Address'])){
			$address = $_POST['Address'];
			$qr_up = mysql_query("UPDATE thanhvien SET Diachi = '".$address."' WHERE TenDN='".$_SESSION['username']."'") or die("Không thể kết nối dữ liệu");
		}
		if(isset($_POST['Phone']) and !empty($_POST['Phone'])){
			$qr_up = mysql_query("UPDATE thanhvien SET Phone = '".$_POST['Phone']."' WHERE TenDN='".$_SESSION['username']."'") or die("Không thể kết nối dữ liệu");
		}		
		$qr_up = mysql_query("UPDATE thanhvien SET Gioitinh = '".$gender."',Ngaysinh='".$ngaysinh."' WHERE TenDN='".$_SESSION['username']."'") or die("Không thể kết nối dữ liệu");
		header("location:../index.php?page=AdmDocument&success=Cập nhật thành công");
	
	}else{
		echo"<h2 align='center'>Không tồn tại trang này</h2>";
	} 
?>
</body>
</html>
