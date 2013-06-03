<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Cám ơn</title>
<link rel="shortcut icon" href="Image/favicon.ico" type="image/x-icon" />
<style>
	#content{
		margin:8em auto;
		width:700px;
		height:200px;
		background:url(Image/Khung.gif) no-repeat;
		text-align:center;
	}
	#content p{
		line-height:25px;
		font-size:20px;
	}
	#content a{
		color:#0000CC;
		font-style:italic;
		font-size:13.5px;
	}
	body{
		background:url(Image/bg.jpg) 20px;
	}
	#menu{
		width:694px;
		height:29px;
		background:url(Image/menu.gif);
		color:#FFFFFF;
		font-weight:bold;
		margin-bottom:40px;
		line-height:25px;
        font-size:16px;
		text-shadow:#333333 1px 2px;
	}
</style>
</head>
<body>
<h2 align="center">&nbsp;</h2>
<div id="content">
	<div id="menu">Thanks for Login</div>
	<p>Cám ơn bạn <?php if(isset($_SESSION['username']))echo "<i>".$_SESSION['username']."</i>";?> đã đăng nhập Website</p>
	<a href="index.php">Click vào đây nếu trình duyệt không tự động chuyển</a>			
</div>
<script language="javascript">
setTimeout("window.location = 'index.php'",3000);//Tự chuyển về trang chủ trong 3s
</script>
</body>
</html>
