
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="wrap">
<?php 
if(isset($_REQUEST['All'])){
	$display = 8;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham";
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
	$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
	where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC  LIMIT $start,$display";	
?>
	
		<div class="top">
			<div class="float-Right">
			<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên</option>
				<option value="DesPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='DesPrice'){?> selected="selected" <?php }?>>Theo giá giảm dần</option>	
				<option value="AscPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='AscPrice'){?> selected="selected" <?php }?>>Theo giá tăng dần</option>
				<option value="NewProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Theo sản phẩm mới</option>
			</select>
			</form>
			</div>
			Sản phẩm 
		</div>
		<ul>
		
<?php 
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC ORDER BY TenSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='DesPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC ORDER BY Gia DESC LIMIT $start,$display";	
		}elseif($dpProduct=='AscPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC ORDER BY Gia ASC LIMIT $start,$display";	
		}elseif($dpProduct=='NewProduct'){
			$se_query = "Select * from sanpham,loaisp,nhacc 
			WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC ORDER BY Ngaynhap DESC LIMIT $start,$display";	
		}
	}
	  
?>		
<?php 
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
		include("DisplayProduct.php"); 
	}
?>
		</ul>
		<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=Product&All&start=$prev&pageNum=$pageNum'>Preview</a>";
			}	
			for($i=1;$i<=$pageNum;$i++){
				if($current !=$i){
					echo"<a href='index.php?page=Product&All&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
				}
				else{
					echo "<span>".$i."</span>";
				}	
			}
			if($current <$pageNum){
				echo"<a href='index.php?page=Product&All&start=$next&pageNum=$pageNum'>Next</a>";
			}
		}	
?>
	</div>	
<?php
}elseif(isset($_REQUEST['TenSP'])){
	$check_query = "SELECT COUNT(*) FROM sanpham WHERE TenSP = '".$_REQUEST['TenSP']."'";
	if(check_exist($check_query)){
		$query = mysql_query("Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
		where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and TenSP = '".$_REQUEST['TenSP']."'");	
?>
			<div class="top">
				<?php echo "Sản phẩm" ?> 
			</div>
		<ul>
<?php 
			while($rows = mysql_fetch_array($query)){
				include("DisplayProduct.php"); 
			}
?>
		</ul>
<?php
	}else{
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại sản phẩm</div>";
	}
}elseif(isset($_REQUEST['TenLSP'])){
	$getId_query = mysql_query("SELECT MaLSP FROM loaisp WHERE TenLSP='".$_REQUEST['TenLSP']."'");
	$resultId = mysql_fetch_array($getId_query);
	if($resultId){
		$display = 8;//So ban ghi trong 1 trang
		if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
			$pageNum = $_REQUEST['pageNum'];//So trang
		}else{
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE MaLSP='".$resultId['MaLSP']."'";
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
		$query = mysql_query("Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
		where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and sanpham.MaLSP='".$resultId['MaLSP']."'LIMIT $start,$display");	
?>
		
		<div class="top">
			<?php echo $_REQUEST['TenLSP']  ?>
		</div>
		<ul>
<?php 
		while($rows = mysql_fetch_array($query)){
			include("DisplayProduct.php"); 
		}
?>
		</ul>
		<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=Product&TenLSP=".$_REQUEST['TenLSP']."&start=$prev&pageNum=$pageNum'>Preview</a>";
		}	
		for($i=1;$i<=$pageNum;$i++){
			if($current !=$i){
				echo"<a href='index.php?page=Product&TenLSP=".$_REQUEST['TenLSP']."&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
			else{
				echo "<span>".$i."</span>";
			}	
		}
		if($current <$pageNum){
			echo"<a href='index.php?page=Product&TenLSP=".$_REQUEST['TenLSP']."&start=$next&pageNum=$pageNum'>Next</a>";
		}
	}	
?>
	</div>	
<?php			
	}else{
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại loại sản phẩm này</div>";
	}
}elseif(isset($_REQUEST['TenNCC'])){
	$getId_query = mysql_query("SELECT MaNCC FROM nhacc WHERE TenNCC='".$_REQUEST['TenNCC']."'");
	$resultId = mysql_fetch_array($getId_query);
	if($resultId){
		$display = 8;//So ban ghi trong 1 trang
		if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
			$pageNum = $_REQUEST['pageNum'];//So trang
		}else{
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE MaNCC='".$resultId['MaNCC']."'";
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
		$query = mysql_query("Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
		where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and sanpham.MaNCC='".$resultId['MaNCC']."'LIMIT $start,$display");	
?>
		
		<div class="top">
			<?php echo $_REQUEST['TenNCC'] ?>
		</div>
		<ul>
<?php 
		while($rows = mysql_fetch_array($query)){
			include("DisplayProduct.php"); 
		}
?>
		</ul>
		<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=Product&TenNCC=".$_REQUEST['TenNCC']."&start=$prev&pageNum=$pageNum'>Preview</a>";
		}	
		for($i=1;$i<=$pageNum;$i++){
			if($current !=$i){
				echo"<a href='index.php?page=Product&TenNCC=".$_REQUEST['TenNCC']."&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
			else{
				echo "<span>".$i."</span>";
			}	
		}
		if($current <$pageNum){
			echo"<a href='index.php?page=Product&TenNCC=".$_REQUEST['TenNCC']."&start=$next&pageNum=$pageNum'>Next</a>";
		}
	}	
?>
	</div>	
<?php			
	}else{
		echo"<div style='color:#FFFFFF; margin: 50px 0 50px 0; font-size:14px' align='center'>Không tồn tại nhà cung cấp này</div>";
	}
}elseif(isset($_REQUEST['NewCar'])){
	$display = 8;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isNew = 1";
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
	$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
	where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 LIMIT $start,$display";	
?>
	
		<div class="top">
			<div class="float-Right">
			<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên</option>
				<option value="DesPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='DesPrice'){?> selected="selected" <?php }?>>Theo giá giảm dần</option>	
				<option value="AscPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='AscPrice'){?> selected="selected" <?php }?>>Theo giá tăng dần</option>
				<option value="NewProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Theo sản phẩm mới</option>
			</select>
			</form>
			</div>
			Sản phẩm 
		</div>
		<ul>
		
<?php 
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 ORDER BY TenSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='DesPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 ORDER BY Gia DESC LIMIT $start,$display";	
		}elseif($dpProduct=='AscPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 ORDER BY Gia ASC LIMIT $start,$display";	
		}elseif($dpProduct=='NewProduct'){
			$se_query = "Select * from sanpham,loaisp,nhacc 
			WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isNew = 1 ORDER BY Ngaynhap DESC LIMIT $start,$display";	
		}
	}
	  
?>		
<?php 
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
		include("DisplayProduct.php"); 
	}
?>
		</ul>
		<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=Product&NewCar&start=$prev&pageNum=$pageNum'>Preview</a>";
		}	
		for($i=1;$i<=$pageNum;$i++){
			if($current !=$i){
				echo"<a href='index.php?page=Product&NewCar&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
			else{
				echo "<span>".$i."</span>";
			}	
		}
		if($current <$pageNum){
			echo"<a href='index.php?page=Product&NewCar&start=$next&pageNum=$pageNum'>Next</a>";
		}
	}	
?>
	</div>	
<?php	
}elseif(isset($_REQUEST['VipCar'])){
	$display = 8;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isVip = 1";
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
	$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
	where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isVip = 1 LIMIT $start,$display";	
?>
	
		<div class="top">
			<div class="float-Right">
			<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên</option>
				<option value="DesPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='DesPrice'){?> selected="selected" <?php }?>>Theo giá giảm dần</option>	
				<option value="AscPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='AscPrice'){?> selected="selected" <?php }?>>Theo giá tăng dần</option>
				<option value="NewProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Theo sản phẩm mới</option>
			</select>
			</form>
			</div>
			Sản phẩm 
		</div>
		<ul>
		
<?php 
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isVip = 1 ORDER BY TenSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='DesPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isVip = 1 ORDER BY Gia DESC LIMIT $start,$display";	
		}elseif($dpProduct=='AscPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isVip = 1 ORDER BY Gia ASC LIMIT $start,$display";	
		}elseif($dpProduct=='NewProduct'){
			$se_query = "Select * from sanpham,loaisp,nhacc 
			WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isVip = 1 ORDER BY Ngaynhap DESC LIMIT $start,$display";	
		}
	}
	  
?>		
<?php 
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
		include("DisplayProduct.php"); 
	}
?>
		</ul>
		<div id="pageNum">
<?php 
		if($pageNum > 1){
			$next =$start + $display;
			$prev =$start - $display;
			$current = ceil($start/$display)+1;	
			if($current > 1){
				echo"<a href='index.php?page=Product&VipCar&start=$prev&pageNum=$pageNum'>Preview</a>";
		}	
		for($i=1;$i<=$pageNum;$i++){
			if($current !=$i){
				echo"<a href='index.php?page=Product&VipCar&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
			else{
				echo "<span>".$i."</span>";
			}	
		}
		if($current <$pageNum){
			echo"<a href='index.php?page=Product&VipCar&start=$next&pageNum=$pageNum'>Next</a>";
		}
	}	
?>
	</div>	
<?php	
}elseif(isset($_REQUEST['bestbuy'])){
	$display = 8;//So ban ghi trong 1 trang
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];//So trang
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isBestBuy = 1";
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
	$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
	where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isBestBuy = 1 LIMIT $start,$display";	
?>
	
		<div class="top">
			<div class="float-Right">
			<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên</option>
				<option value="DesPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='DesPrice'){?> selected="selected" <?php }?>>Theo giá giảm dần</option>	
				<option value="AscPrice" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='AscPrice'){?> selected="selected" <?php }?>>Theo giá tăng dần</option>
				<option value="NewProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Theo sản phẩm mới</option>
			</select>
			</form>
			</div>
			Sản phẩm 
		</div>
	<ul>	
<?php 
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isBestBuy = 1 ORDER BY TenSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='DesPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isBestBuy = 1 ORDER BY Gia DESC LIMIT $start,$display";	
		}elseif($dpProduct=='AscPrice'){
			$se_query = "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC from sanpham,loaisp,nhacc 
			where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isBestBuy = 1 ORDER BY Gia ASC LIMIT $start,$display";	
		}elseif($dpProduct=='NewProduct'){
			$se_query = "Select * from sanpham,loaisp,nhacc 
			WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isBestBuy = 1 ORDER BY Ngaynhap DESC LIMIT $start,$display";	
		}
	}
	  
?>		
<?php 
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
		include("DisplayProduct.php"); 
	}
?>
	</ul>
	<div id="pageNum">
<?php 
	if($pageNum > 1){
		$next =$start + $display;
		$prev =$start - $display;
		$current = ceil($start/$display)+1;	
		if($current > 1){
			echo"<a href='index.php?page=Product&bestbuy&start=$prev&pageNum=$pageNum'>Preview</a>";
	}	
	for($i=1;$i<=$pageNum;$i++){
		if($current !=$i){
			echo"<a href='index.php?page=Product&bestbuy&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
		}
		else{
			echo "<span>".$i."</span>";
		}	
	}
	if($current <$pageNum){
		echo"<a href='index.php?page=Product&bestbuy&start=$next&pageNum=$pageNum'>Next</a>";
	}
}	
?>
	</div>	
<?php	
}elseif(isset($_REQUEST['Search'])){
?>
	<div class="top">
			Sản phẩm
		</div>
<?php
	if($_POST['ProviValue'] == '[Hãng xe]'
		and $_POST['TypeValue'] == '[Dòng xe]'
		and ($_POST['MinPrice'] == '[Thấp nhất]'
		and $_POST['MaxPrice'] == '[Cao nhất]')
		and $_POST['TypeCar'] == '[Loại xe]'
	){
		header('location:index.php?page=Product');
	}else{
		$query = "";
		if($_POST['ProviValue'] != '[Hãng xe]'){
			$query .= " and TenNCC='".$_POST['ProviValue']."'";
		}
		if($_POST['TypeValue'] != '[Dòng xe]'){
			$query .= " and TenLSP='".$_POST['TypeValue'] ."'";
		}
		if($_POST['MinPrice'] !='[Thấp nhất]'){
			$query .=" and Gia >=".$_POST['MinPrice'];
		}
		if($_POST['MaxPrice'] !='[Cao nhất]'){
			$query .=" and Gia <=".$_POST['MaxPrice'];
		}
		if($_POST['TypeCar'] !='[Loại xe]'){
			$query .=" and ".$_POST['TypeCar']."=1";
		}
		/*echo "<p align='center' style='margin:20px'> SELECT * FROM sanpham,nhacc,loaisp WHERE sanpham.MaLSP=loaisp.MaLSP and sanpham.MaNCC=nhacc.MaNCC ".$query."</p>";*/
		$sql = mysql_query("SELECT * FROM sanpham,nhacc,loaisp WHERE sanpham.MaLSP=loaisp.MaLSP and sanpham.MaNCC=nhacc.MaNCC ".$query) or die ("không thể kết nối dữ liệu");
		$count = 0;
		echo"<ul>";
		while($rows = mysql_fetch_array($sql)){
			include("DisplayProduct.php"); 	
			$count++;
		}
		echo"</ul>";
		if($count == 0){
			echo"<p align='center' style='margin-top:20px; font-size:14px'>Không có sản phẩm phù hợp</p>";
		}
	}	
}else{
		header('location:index.php?page=Product&All');
}
?>
</div>