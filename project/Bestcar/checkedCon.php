<?php session_start();
	ob_start();
	include("Connect.php");
	$flag = true;
	$name = NULL;
	$email= NULL;
	$mobile = $_POST['mobile'];
	$address = NULL;
	$noidung = NULL;
	
	if(isset($_POST['name']) and !empty($_POST['name'])){
		$name =	$_POST['name'];
	}else{
		$err .= "Không được để trống họ tên<br>";
		$flag = false;	
	}
	
	if(isset($_POST['email']) and !empty($_POST['email'])){
		$email = $_POST['email'];
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
	
	
	if(isset($_POST['noidung']) and !empty($_POST['noidung'])){
		$noidung =	$_POST['noidung'];
	}else{
		$err .= "Không được để trống nội dung<br>";
		$flag = false;	
	}
	
	if($flag){
		$query = "INSERT INTO ykien VALUES(NULL,'".$name."','".$email."','".$noidung."',CURDATE(),'".$address."','".$mobile."')";
		mysql_query($query) or die ("Không thể kết nối dữ liệu");
		header("location:index.php?page=Contact&success=Cám ơn bạn đã cho ý kiến");
	}else{
		if(isset($err)){
			header("location:index.php?page=Contact&err=$err");
		}
	}
?>	
	