<?php session_start();
	ob_start();
	include("Connect.php");
	$err=NULL;
	$username=NULL;
	$flag = true;
	$pass=NULL;
	$name = NULL;
	$email=NULL;
	$address = NULL;
	$Gender = $_POST['gioitinh'];
	$mobile = $_POST['mobile'];
	$ngaysinh =  $_POST['Nam']."-".$_POST['Thang']."-".$_POST['Ngay'];	
	
	if(isset($_POST['username']) and !empty($_POST['username'])){
		$username = $_POST['username'];
		$query = "SELECT COUNT(TenDN) FROM thanhvien WHERE TenDN='".$username."'";
		if(check_exist($query)){
			$err .= "Tài khoản đã tồn tại<br>";
			$flag = false;	
		}	
	}else{
		$err .= "Không được để trống tên truy cập<br>";
		$flag = false;	
	}
	
	if(isset($_POST['password']) and !empty($_POST['password'])){
		$pass =	$_POST['password'];
	}else{
		$err .= "Không được để trống mật khẩu<br>";
		$flag = false;	
	}	
	
	if(isset($_POST['name']) and !empty($_POST['name'])){
		$name =	$_POST['name'];
	}else{
		$err .= "Không được để trống họ tên<br>";
		$flag = false;	
	}
	
	if(isset($_POST['email']) and !empty($_POST['email'])){
		$email = $_POST['email'];
		$query = "SELECT COUNT(Email) FROM thanhvien WHERE Email='".$email."'";
		if(check_exist($query)){
			$err .= "Email đã tồn tại<br>";
			$flag = false;	
		}	
	}else{
		$err .= "Không được để trống email<br>";
		$flag = false;	
	}	
	
	if(isset($_POST['address']) and !empty($_POST['address'])){
		$address =	$_POST['address'];
	}else{
		$err .= "Không được để trống địa chỉ<br>";
		$flag = false;	
	}	
	
	if($flag){
		$query = "INSERT INTO thanhvien VALUES(NULL,'".$username."','".$pass."','".$name."','".$email."','".$address."','".$mobile."','".$Gender."','".$ngaysinh."','0',CURDATE())";
		mysql_query($query) or die ("Không thể kết nối dữ liệu");
		header("location:ThankForReg.php");
	}else{
		if(isset($err)){
			header("location:index.php?page=signup&err=$err");
		}
	}
	
			
?>
