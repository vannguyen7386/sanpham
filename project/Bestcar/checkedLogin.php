<?php session_start();
ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập</title>
</head>

<body>
<?php 
	if(isset($_POST['username']) && isset($_POST['password'])){
	$name = $_POST['username'];
	$pass = $_POST['password'];
	$permission=NULL;//Quyền quản trị
		include("Connect.php");
		$query = mysql_query("SELECT * FROM thanhvien WHERE TenDN = '$name' AND Matkhau = '$pass'");
		$result = mysql_fetch_array($query);
		$permission = $result['Quyen'];						
		
		if(!$result){
			if(isset($_REQUEST['cart'])){
				header("location:index.php?Error=Tên hoặc mật khẩu không tồn tại & page=BuyCart");
			}else{
				header("location:index.php?Error=Tên hoặc mật khẩu không tồn tại & page=login");
			}		
		}
		else{
			//thiết lập session khi đăng nhập thành công. 
			$_SESSION['username'] = $name; //Lưu tên đăng nhập trong toàn bộ trang web. khi tắt trình duyệt thì mất
			$_SESSION['Quyen'] = $permission; // Lưu quyền hạn
			if(isset($_POST['save_user'])){ //khi click vào ghi nhớ đăng nhập
				setcookie("username",$_SESSION['username'],time()+3600); //setcookie ghi nhớ tên và mật khẩu. Lưu vào text box trong form. 
				setcookie("password",$result['Matkhau'],time()+3600);
			}
			if(isset($_REQUEST['cart'])){
				header("location:index.php?page=Shopcart");
			}else{
				header("location:thankForLogin.php");
			}	
		}
	}
	
?>
</body>
</html>
