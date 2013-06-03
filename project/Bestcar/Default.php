
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<?php 
	$display = 4;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isNew = 1 ";
		$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$record = $row[0];//So ban ghi trong DB
		if($record > $display){
			$pageNum = ceil($record/$display);
		}else{
			$pageNum = 1;
		}
	}
	$start = (isset($_REQUEST['start']) and (int)$_REQUEST['start'] >=0 )? $_REQUEST['start']:0;//Tim ban ghi dau tien cua 1 trang
	$query = mysql_query("Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC,Ngaynhap from sanpham,loaisp,nhacc 
where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 ORDER BY Ngaynhap DESC LIMIT $start,$display");	
?>
<div id="wrap">
	<div class="top">
		Sản phẩm mới
	</div>
	<ul style="overflow:hidden">
	<?php 
	while($rows = mysql_fetch_array($query)){
		include("DisplayProduct.php"); 
	}
	?>
	</ul>
	
	<div class="top">
		Tin mới
	</div>
	<?php 
	$News_query = mysql_query("SELECT *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao FROM tintuc ORDER BY ngaytao DESC LIMIT 2 ");
	?>
	<ul>
	<?php
		while($rows_News = mysql_fetch_array($News_query)){
	?>
	<li class="News">
	<h3><?php echo "<a href='index.php?page=News&MaTT=".$rows_News['MaTT']."'>".$rows_News['Tieude']."</a>"; ?></h3>
	<div class="date"><?php echo "Cập nhật: ".$rows_News['ngay_tao']; ?></div>
	<a href="index.php?page=News&MaTT=<?php echo $rows_News['MaTT'] ?>"><img src="Image/News/<?php echo $rows_News['Picture']; ?>" width="150" height="100"/></a>
	<div align="justify"><?php echo $rows_News['Tomtat'] ?></div>
	</li>
	<?php }?>
	</ul>
	<div class="top" style="clear:both">
		Thế giới xe
	</div>
	<?php 
	$News_query = mysql_query("SELECT *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao FROM tintuc WHERE MaLTT = 2 ORDER BY ngaytao DESC  LIMIT 2 ");
	?>
	<ul>
	<?php
		while($rows_News = mysql_fetch_array($News_query)){
	?>
	<li class="News">
	<h3><?php echo "<a href='index.php?page=News&MaTT=".$rows_News['MaTT']."'>".$rows_News['Tieude']."</a>"; ?></h3>
	<div class="date"><?php echo "Cập nhật: ".$rows_News['ngay_tao']; ?></div>
	<a href="index.php?page=News&MaTT=<?php echo $rows_News['MaTT'] ?>"><img src="Image/News/<?php echo $rows_News['Picture']; ?>" width="150" height="100"/></a>
	<div align="justify"><?php echo $rows_News['Tomtat'] ?></div>
	</li>
	<?php }?>
	</ul>
</div>

