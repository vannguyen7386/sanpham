
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="float-Right">
<?php 
	if(isset($_SESSION['username'])){
		if($_SESSION['Quyen'] == '0')
			echo "Chào bạn: <a href='index.php?page=MemDoc' style='font-weight:600;'>". $_SESSION['username']." </a> / <a href= 'logout.php'>Thoát</a>";
		if($_SESSION['Quyen'] == '1')
			echo "Chào bạn: <a href='Admin/index.php?page=AdmDocument' style='font-weight:600;'>". $_SESSION['username']." </a> / <a href= 'logout.php'>Thoát</a>";		
	}else{
?>
		<a href="index.php?page=signup">Đăng kí</a>
		|<a href="index.php?page=login">Đăng nhập</a>
		
<?php }?>		
</div>

		<a href="index.php?page=Default">Trang chủ</a>
		|<a href="index.php?page=help">Trợ giúp</a>
		|<a href="index.php?page=Sitemap">Site Map</a>
