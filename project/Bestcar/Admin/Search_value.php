
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="title">Kết quả tìm kiếm</div>
<style>
	a{
		color:#0033CC;
		text-decoration:none;
	}
	a:hover{
		text-decoration:underline;
	}
</style>
<?php 
if(isset($_POST['SearchValue'])){
	if(!empty($_POST['SearchValue'])){
		$value = $_POST['SearchValue'];
		$count=0;
		$query = mysql_query("SELECT * FROM sanpham WHERE TenSP LIKE '%".$value."%' OR MaSP LIKE '".$value."'");
		while($rows=mysql_fetch_array($query)){
			echo"<p>Mã sản phẩm:<b>'".$rows['MaSP']."'</b> - Tên sản phẩm: <a href='index.php?page=ProductMan&MaSP=".$rows['MaSP']."'>".$rows['TenSP']."</a></p>";
				$count++;				
		}
		$Newsquery = mysql_query("SELECT * FROM tintuc WHERE Tieude LIKE '%".$value."%' OR MaTT LIKE '".$value."'");
		while($rowsNews=mysql_fetch_array($Newsquery)){
			echo"<p>Mã tin tức:<b>'".$rowsNews['MaTT']."'</b> - Tiêu đề: <a href='index.php?page=NewsMan&MaTT=".$rowsNews['MaTT']."'>".$rowsNews['Tieude']."</a></p>";
				$count++;				
		}
		$Mem_query = mysql_query("SELECT * FROM thanhvien WHERE TenDN LIKE '%".$value."%'");
		while($tr_rows=mysql_fetch_array($Mem_query)){
			echo"<p>Mã thành viên:".$tr_rows['MaTV']." - Tên đăng nhập:<a href='index.php?page=MemberMan&MaTV=".$tr_rows['MaTV']."'>".$tr_rows['TenDN']."</a></p>";
				$count++;				
		}
		$OD_query = mysql_query("SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
								FROM hoadon WHERE MaHD LIKE '".$value."'");
		while($OD_rows=mysql_fetch_array($OD_query)){
			echo"<p>Mã hóa đơn:<a href='index.php?page=OrderMan&MaHD=".$OD_rows['MaHD']."&Detail'>".$OD_rows['MaHD']."
				</a> - Ngày đặt:".$OD_rows['ngay_dat']." - Ngày giao:".$OD_rows['ngay_giao']."</p>";
				$count++;				
		}
		if($count==0)
			echo"<div style='margin:20px;font-size:14px'>Không có kết quả</div>";
	}else{
		echo"<div style='margin:20px;font-size:14px'>Không có kết quả</div>";
	}	
}
?>
