
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="wrap">
<?php 
if(isset($_REQUEST['All'])){
	$display = 10;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaTT) FROM tintuc";
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
	$se_query = "Select *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao from tintuc,loaitt
	where tintuc.MaLTT = loaitt.MaLTT ORDER BY ngaytao DESC LIMIT $start,$display";
	$query = mysql_query($se_query);	
?>
	<div class="top">
		Tin tức 
	</div>
<?php
	while($rows_News = mysql_fetch_array($query)){
?>
	<div class="wideNews">
		<h3><?php echo "<a href='index.php?page=News&MaTT=".$rows_News['MaTT']."'>".$rows_News['Tieude']."</a>"; ?></h3>
		<div class="date"><?php echo "Cập nhật: ".$rows_News['ngay_tao']; ?></div>
		<a href="index.php?page=News&MaTT=<?php echo $rows_News['MaTT'] ?>"><img src="Image/News/<?php echo $rows_News['Picture']; ?>" width="150" height="100"/></a>
		<div align="justify"><?php echo $rows_News['Tomtat'] ?></div>
	</div>
<?php 
	}
?>
<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=News&All&start=$prev&pageNum=$pageNum'>Trang trước</a>";
			}	
			if($current <$pageNum){
				echo"<a href='index.php?page=News&All&start=$next&pageNum=$pageNum'>Trang sau</a>";
			}
		}	
?>
	</div>	
<?php	
}elseif(isset($_REQUEST['MaTT']) and !empty($_REQUEST['MaTT'])){
	$NewsID = $_REQUEST['MaTT'];
	$news_query = "SELECT *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao FROM tintuc,loaitt 
					WHERE tintuc.MaLTT = loaitt.MaLTT and MaTT = '".$NewsID."'";
	$query = mysql_query($news_query) or die ('Không thể kết nối dữ liệu');							
	$rows = mysql_fetch_array($query);
	if($rows){
?>
	<div class="top">
		Tin tức 
	</div>
	<div class="fullNews">
		<h3><?php echo $rows['Tieude']; ?></h3>
		<div class="date"><?php echo "Đăng ngày: ".$rows['ngay_tao']; ?></div>
		<img src="Image/News/<?php echo $rows['Picture']; ?>" align="title" style="float:right"/>
		<div align="justify" style="line-height:17px; font-family:Verdana, Arial, Helvetica, sans-serif"><span style="font-weight:bold"><?php echo $rows['Tomtat'] ?></span><br>
		<?php echo $rows['Noidung'] ?></div>
		
		<div style="clear:both"></div>	
		<?php
			$query_picCount = mysql_query("SELECT DISTINCT(TenAnh) FROM picture WHERE MaTT = '".$NewsID."'");
			while($result = mysql_fetch_array($query_picCount)){
		?>
			<img src="Image/News/<?php echo $result['TenAnh'] ?>" />
		<?php	
			}	
		 ?>
		 <div class="Copyright"><p>(Tác giả / Nguồn)</p><a href="http://<?php echo $rows['Copyright']  ?>" style="color:lightgreen"><?php echo $rows['Copyright'] ?> </a></div>
	</div>
	
<?php				
	}else{
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại bản tin này</div>";
	}
}elseif(isset($_REQUEST['TenLTT']) and !empty($_REQUEST['TenLTT'])){
	$NewsType = $_REQUEST['TenLTT'];
	$queryId = mysql_query("SELECT * FROM loaitt WHERE TenLTT ='".$NewsType."'");
	$result = mysql_fetch_array($queryId);
	if($result){
		$NewsTypeId = $result['MaLTT'];
		$display = 10;//So ban ghi trong 1 trang
		if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
			$pageNum = $_REQUEST['pageNum'];//So trang
		}else{
			$f_query = "SELECT COUNT(MaTT) FROM tintuc WHERE MaLTT = $NewsTypeId";
			$sql = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($sql,MYSQL_NUM);
			$record = $row[0];//So ban ghi trong DB
			if($record > $display){
				$pageNum = ceil($record/$display);
			}else{
				$pageNum = 1;
			}
			
		}
		$start = (isset($_REQUEST['start']) and (int)$_REQUEST['start'] >=0 )? $_REQUEST['start']:0;//Tim ban ghi dau tien cua 1 trang
		$se_query = "Select *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao from tintuc,loaitt
		where tintuc.MaLTT = loaitt.MaLTT and tintuc.MaLTT = ".$NewsTypeId." ORDER BY ngaytao DESC LIMIT $start,$display";
		$query = mysql_query($se_query);	
?>
		<div class="top">
			<?php echo $_REQUEST['TenLTT'] ?> 
		</div>
<?php
		if($row[0] <= 0){
			echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại bản tin nào trong mục này</div>";	
		}
		while($rows_News = mysql_fetch_array($query)){
	?>
		<div class="wideNews">
			<h3><?php echo "<a href='index.php?page=News&MaTT=".$rows_News['MaTT']."'>".$rows_News['Tieude']."</a>"; ?></h3>
			<div class="date"><?php echo "Cập nhật: ".$rows_News['ngay_tao']; ?></div>
			<a href="#"><img src="Image/News/<?php echo $rows_News['Picture']; ?>" width="150" height="100"/></a>
			<div align="justify"><?php echo $rows_News['Tomtat'] ?></div>
		</div>
<?php 
		}
?>
		<div id="pageNum">
<?php 
			if($pageNum > 1){
				$next =$start + $display;
				$prev =$start - $display;
				$current = ceil($start/$display)+1;	
				if($current > 1){
					echo"<a href='index.php?page=News&start=$prev&pageNum=$pageNum&TenLTT=".$_REQUEST['TenLTT']."'>Trang trước</a>";
				}	
				if($current <$pageNum){
					echo"<a href='index.php?page=News&start=$next&pageNum=$pageNum&TenLTT=".$_REQUEST['TenLTT']."'>Trang sau</a>";
				}
			}	
?>
		</div>	
<?php
	}else{
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại loại tin này</div>";
	}	
}elseif(isset($_REQUEST['Tieude']) and !empty($_REQUEST['Tieude'])){
	$NewsHeading = $_REQUEST['Tieude'];
	$news_query = "SELECT *,DATE_FORMAT(ngaytao,'%d/%m/%Y') as ngay_tao FROM tintuc,loaitt 
					WHERE tintuc.MaLTT = loaitt.MaLTT and Tieude = '".$NewsHeading."'";
	$query = mysql_query($news_query) or die ('Không thể kết nối dữ liệu');	
	$count=0;						
	while($rows = mysql_fetch_array($query)){
		$count++;
?>
		<div class="top">
			Tin tức 
		</div>
		<div class="fullNews">
			<h3><?php echo $rows['Tieude']; ?></h3>
			<div class="date"><?php echo "Đăng ngày: ".$rows['ngay_tao']; ?></div>
			<img src="Image/News/<?php echo $rows['Picture']; ?>" align="title" style="float:right"/>
			<div align="justify" style="line-height:17px; font-family:Verdana, Arial, Helvetica, sans-serif"><span style="font-weight:bold"><?php echo $rows['Tomtat'] ?></span><br>
			<?php echo $rows['Noidung'] ?></div>
			
			<div style="clear:both"></div>	
			<?php
				$getID_query = mysql_query("SELECT MaTT FROM Tintuc WHERE Tieude ='".$rows['Tieude']."'");
				$Result_query = mysql_fetch_array($getID_query);
				$query_picCount = mysql_query("SELECT DISTINCT(TenAnh) FROM picture WHERE MaTT = '".$Result_query['MaTT']."'");
				while($result = mysql_fetch_array($query_picCount)){
			?>
				<img src="Image/News/<?php echo $result['TenAnh'] ?>" />
			<?php	
				}	
			 ?>
			 <div class="Copyright"><p>(Tác giả / Nguồn)</p><a href="http://<?php echo $rows['Copyright']  ?>" style="color:lightgreen"><?php echo $rows['Copyright'] ?> </a></div>
		</div>
<?php				
	}
	if($count==0){
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại tin này</div>";	
	}
}else{
	header("location:index.php?page=News&All");
}	
?>
</div>