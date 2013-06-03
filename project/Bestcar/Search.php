
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#wrap_search p{
		text-align:left;
		line-height:13px;
		margin:20px;
	}
	#wrap_search .top{
		width:auto;
		height:31px;
		background:url(Image/bullet.gif) no-repeat left top;
		margin:45px 0 5px 10px;
		color:#FFFFFF;
		border-bottom:2px solid #1172e1;
		font-size:18px;
		height:31px;
		padding-left:35px;
		padding-top:3px;
	}

	#wrap_search p a{
		color:#FFFFFF;
		text-decoration:none;
	}
	#wrap_search p a:hover,active{
		text-decoration:underline;
	}
</style>
<div id="wrap_search">
	<div class="top">
		Kết quả tìm được:
	</div>
<?php 
if(isset($_POST['SearchValue'])){
	if(!empty($_POST['SearchValue'])){
		$value = $_POST['SearchValue'];
		$count=0;
		$query = mysql_query("SELECT DISTINCT(TenSP) FROM sanpham WHERE TenSP LIKE '%".$value."%'");
		while($rows=mysql_fetch_array($query)){
				echo"<p><a href='index.php?page=Product&TenSP=".$rows['TenSP']."' style='color:#FFFFFF;'>".$rows['TenSP']."</a></p>";
				$count++;				
		}
		$se_query = mysql_query("SELECT  DISTINCT(Tieude) FROM tintuc WHERE Tieude LIKE '%".$value."%'");
		while($se_rows=mysql_fetch_array($se_query)){
				echo"<p><a href='index.php?page=News&Tieude=".$se_rows['Tieude']."' style='color:#FFFFFF;'>".$se_rows['Tieude']."</a></p>";
				$count++;				
		}
		if($count==0)
			echo"<div style='color:#FFFFFF;margin:20px;font-size:14px'>Không có kết quả</div>";
	}else{
		echo"<div style='color:#FFFFFF;margin:20px;font-size:14px'>Không có kết quả</div>";
	}	
}

?>
</div>