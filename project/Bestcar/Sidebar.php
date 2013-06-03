f
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<dl><?php 
			if(isset($_SESSION['Quyen']) && $_SESSION['Quyen'] == 1){
		?>		
		<dt><a href="#">Admin</a></dt>
		<dd>
		<ul>
			<li><a href="Admin/index.php">Trang chủ Admin</a></li>
		</ul>
		</dd>	
		<?php }?>
	<dt><a href="#">BestCar</a></dt>
	<dd>
		<ul>
			<li><a href="index.php?page=Default">Trang chủ</a></li>
			<li><a href="index.php?page=Shopcart">Giỏ hàng</a></li>
			<li><a href="index.php?page=help">Trợ giúp</a></li>
			<li><a href="index.php?page=Download">Download</a></li>
		<?php 
			if(isset($_SESSION['Quyen']) && $_SESSION['Quyen'] == 0){
		?>		
			<li><a href="index.php?page=MemDoc">Hồ sơ</a></li>
		<?php
		}
		if(!isset($_SESSION['Quyen'])){
			echo"<li><a href='index.php?page=signup'>Đăng kí thành viên</a></li>";
		}
		?>	
		</ul>
	</dd>
	<dt><a href="#">Showroom</a></dt>
	<dd>
		<ul>
			<li><a href="#">Dòng xe<span></span></a>
				<ul>
					<?php 
				$query = mysql_query("SELECT TenLSP FROM loaisp ORDER BY TenLSP");
					while($rows=mysql_fetch_array($query)){
				?>
					<li><a href="index.php?page=Product&TenLSP=<?php echo $rows['TenLSP'] ?>"><?php echo $rows['TenLSP'] ?></a></li>
				<?php 
				}
				?>	
				</ul>
			</li>
			<li><a href="#">Hãng xe<span></span></a>
				<ul>
				<?php 
				$query = mysql_query("SELECT TenNCC FROM nhacc ORDER BY TenNCC");
					while($rows=mysql_fetch_array($query)){
				?>
					<li><a href="index.php?page=Product&TenNCC=<?php echo $rows['TenNCC'] ?>"><?php echo $rows['TenNCC'] ?></a></li>
				<?php 
				}
				?>	
				</ul>
			
			</li>
		</ul>
	</dd>
	<dt><a href="#">Tin tức</a></dt>
	<dd>
		<ul><?php 
			$query = mysql_query("SELECT TenLTT FROM loaitt");
			while($rows=mysql_fetch_array($query)){
			?>
			<li><a href="index.php?page=News&TenLTT=<?php echo $rows['TenLTT'] ?>"><?php echo $rows['TenLTT'] ?></a></li>
			<?php }?>
		</ul>
	</dd>
	<dt><a href="#">Góc tư vấn</a></dt>
	<dd>
		<ul>
			<?php 
			$TVquery = mysql_query("SELECT * FROM tintuc WHERE MaLTT = 10 ORDER BY Ngaytao DESC LIMIT 5") or die("Không thể kết nối dữ liệu");
			while($rowsTV=mysql_fetch_array($TVquery)){
				$str = "";
				$temp = "";
				$str = $rowsTV['Tieude'];
				$arr = explode(" ",$str);
				for($i=0;$i<count($arr)-1;$i++){
					if($i<3)
						$temp.=$arr[$i]." ";
				}
				$str = $temp."...";
			?>
				<li><a href="index.php?page=News&MaTT=<?php echo $rowsTV['MaTT']; ?>"><?php echo $str; ?></a><div><?php echo $rowsTV['Tieude'] ?></div></li>
			<?php }?>
		</ul>
	</dd>
</dl>
<div class="HelpOnline">
<h3 align="center">Hỗ trợ trực tuyến</h3>
<a href="ymsgr:sendim?huyvan73"><img src="http://opi.yahoo.com/online?u=huyvan73&m=g&t=2" /></a>
<a href="ymsgr:sendim?hhoangtubanggia86"><img src="http://opi.yahoo.com/online?u=hhoangtubanggia86&m=g&t=2" /></a>
<a href="ymsgr:sendim?superman_st1"><img src="http://opi.yahoo.com/online?u=superman_st1&m=g&t=2" /></a>
<a href="ymsgr:sendim?manh_279"><img src="http://opi.yahoo.com/online?u=manh_279&m=g&t=2" /></a>
</div>
<div class="HelpOnline">
<h3 align="center">Tìm kiếm nâng cao</h3>

<form action="index.php?page=Product&Search" method="post" name="CheckForm"> 
<p><span>Hãng xe:</span>
	<select name="ProviValue" onchange="CheckForm.action='index.php?page=Default';CheckForm.submit();">
		<option>[Hãng xe]</option>
	<?php 
		$query = mysql_query("SELECT * FROM nhacc ORDER BY TenNCC");
		while($rows = mysql_fetch_array($query)){
			if(isset($_POST['ProviValue']) and $_POST['ProviValue'] == $rows['TenNCC']){
				echo"<option value='".$rows['TenNCC']."' selected='selected'>".$rows['TenNCC']."</option>";
			}else{
				echo"<option value='".$rows['TenNCC']."'>".$rows['TenNCC']."</option>";
			}		
		}
	?>
	</select>
</p>
<p><span>Dòng xe:</span>
	<select name="TypeValue">
		<option>[Dòng xe]</option>
		<?php 
		if(isset($_POST['ProviValue']) and $_POST['ProviValue'] !='[Hãng xe]'){
			$query = mysql_query("SELECT DISTINCT(TenLSP) FROM loaisp,sanpham,nhacc 
								WHERE sanpham.MaLSP=loaisp.MaLSP and sanpham.MaNCC=nhacc.MaNCC and TenNCC='".$_POST['ProviValue']."'");
			while($rows = mysql_fetch_array($query)){
				if(isset($_POST['TypeValue']) and $_POST['TypeValue'] == $rows['TenLSP']){
					echo"<option value='".$rows['TenLSP']."' selected='selected'>".$rows['TenLSP']."</option>";
				}else{
					echo"<option value='".$rows['TenLSP']."'>".$rows['TenLSP']."</option>";
				}		
			}
		}
		?>	
	</select>
</p>
<p><span>Giá:</span>
	<select name="MinPrice">
		<option>[Thấp nhất]</option>
		<option value="0">$0</option>
		<?php 
		$i=10000;
		while($i<=5000000){
			if(isset($_POST['MinPrice']) and $_POST['MinPrice'] == $i){
				echo "<option value=".$i." selected='selected'>$".number_format($i,'0','.',',')."</option>";
			}else{
				echo "<option value=".$i." >$".number_format($i,'0','.',',')."</option>";
			}	
			if($i>=10000 and $i<=90000){
				$i+=10000;
			}elseif($i>=100000 and $i<500000){
				$i+=50000;
			}elseif($i>=500000 and $i<1000000){
				$i+=100000;
			}else{
				$i+=500000;
			}
		}
		?>	
	</select>
</p>
<p><span>Giá:</span>
	<select name="MaxPrice">
		<option>[Cao nhất]</option>
		<?php 
		$i=10000;
		while($i<=5000000){
			if(isset($_POST['MinPrice']) and $_POST['MaxPrice'] == $i){
				echo "<option value=".$i." selected='selected'>$".number_format($i,'0','.',',')."</option>";
			}else{
				echo "<option value=".$i." >$".number_format($i,'0','.',',')."</option>";
			}	
			if($i>=10000 and $i<=90000){
				$i+=10000;
			}elseif($i>=100000 and $i<500000){
				$i+=50000;
			}elseif($i>=500000 and $i<1000000){
				$i+=100000;
			}else{
				$i+=500000;
			}
		}
		?>		
	</select>
</p>
<p><span>Loại xe:</span>
	<select name="TypeCar">
		<option>[Loại xe]</option>
		<option value="isNew" <?php if(isset($_POST['TypeCar']) and $_POST['TypeCar'] == 'isNew'){ echo"selected='selected'"; }?>>Xe mới</option>
		<option value="isVip" <?php if(isset($_POST['TypeCar']) and $_POST['TypeCar'] == 'isVip'){ echo"selected='selected'"; }?>>Xe Vip</option>
		<option value="isBestBuy" <?php if(isset($_POST['TypeCar']) and $_POST['TypeCar'] == 'isBestBuy'){ echo"selected='selected'"; }?>>Xe bán chạy</option>
		<option value="isSale" <?php if(isset($_POST['TypeCar']) and $_POST['TypeCar'] == 'isSale'){ echo"selected='selected'"; }?>>Xe giảm giá</option>
	</select>
</p>
<p><input type="submit" value="Tìm kiếm" /></p>
</form>
</div>
<a href="#"><img src="Image/iphone_ad.jpg" width="174px" height="174px" border="0" /></a>	
<a href="#"><img src="Image/n55734153108_1453.jpg" width="174px" height="174px" border="0"/></a>
<a href="#"><img src="Image/58.gif" border="0" /></a>
