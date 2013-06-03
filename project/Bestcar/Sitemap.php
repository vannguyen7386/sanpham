
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#double_column{
		width:380px;
		float:left;
		margin-left:10px;
		margin-top:20px;
	}
	#left{
		width:150px;
		float:left;
		padding-left:25px;
	}
	#middle{
		width:160px;
		margin-left:190px;
	}
	#right{
		width:330px;
		float:right;
		margin-top:20px;
	}
	#right1{
		width:170px;
		float:right;
	}
	#right2{
		width:160xp;
		margin-right:170xp;
	}
	#double_column a,#right a{
		display:block;
		line-height:30px;
		color:#FFFFFF;
		font-size:14px;
		background:url(Image/Arrow_Yellow.gif) 3px no-repeat;
		padding-left:20px;
		text-decoration:none;
	}
	#double_column a:hover,#right a:hover{
		text-decoration:underline;
		color:lightgreen;
	}
</style>
<div id="wrap">
<div class="top">
	Site Map
</div>
<div id="double_column">
	<div id="left">
		<a href="index.php">Trang chủ</a>
		<a href="index.php?page=Intro">Giới thiệu</a>
		<a href="index.php?page=Product">Sản phẩm</a>
		<a href="index.php?page=help">Trợ giúp</a>
		<a href="index.php?page=New">Tin tức</a>
		<a href="index.php?page=Contact">Liên hệ</a>
		<a href="index.php?page=Shopcart">Giỏ hàng</a>
		<a href="index.php?page=Download">Download</a>
		<a href="index.php?page=login">Đăng nhập</a>
		<a href="index.php?page=signup">Đăng kí</a>
		<a href="index.php?page=MemDoc">Hồ sơ</a>
		
	</div>
	<div id="middle">
		<a href="index.php?page=Product&VipCar">Xe Vip</a>
		<a href="index.php?page=Gallery">Gallery</a>
		<a href="index.php?page=Product&bestbuy">Xe bán chạy</a>
		<a href="index.php?page=Product&NewCar"">Xe mới nhập</a>
	<?php 
			$query = mysql_query("SELECT TenLTT FROM loaitt");
			while($rows=mysql_fetch_array($query)){
			?>
			<a href="index.php?page=News&TenLTT=<?php echo $rows['TenLTT'] ?>"><?php echo $rows['TenLTT'] ?></a>
	<?php }?>		
	</div>	
</div>
<div id="right">
	<div id="right1">
<?php 
	$query = mysql_query("SELECT * FROM nhacc ORDER BY TenNCC ASC");
	while($rows=mysql_fetch_array($query)){
?>
	<a href="index.php?page=Product&TenNCC=<?php echo $rows['TenNCC'] ?>"><?php echo $rows['TenNCC'] ?></a>
<?php 
}
?>	
	</div>
	<div id="right2">
<?php 
	$query2 = mysql_query("SELECT * FROM loaisp ORDER BY TenLSP ASC");
	while($rows2=mysql_fetch_array($query2)){
?>
	<a href="index.php?page=Product&TenLSP=<?php echo $rows2['TenLSP']?>"><?php echo $rows2['TenLSP'] ?></a>
<?php 
}
?>		
	</div>
</div>
</div>