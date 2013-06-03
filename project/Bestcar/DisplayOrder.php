
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div id="wrap">
	<div class="top">
		Đơn hàng của bạn
	</div>	
	<?php
	$_SESSION['CartId']=NULL;
	$_SESSION['CartQty']=NULL;
	if(!isset($_SESSION['username'])){
		header('location:index.php?page=Default');
	} 

		$getId = mysql_query("SELECT MaTV FROM thanhvien WHERE TenDN='".$_SESSION['username']."'") or die("Không thể kết nối dữ liệu");
		$resultId = mysql_fetch_array($getId);
		$query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') as ngay_dat,DATE_FORMAT(Ngaygiao,'%d/%m/%Y') as ngay_giao FROM hoadon 
		WHERE MaTV='".$resultId['MaTV']."' ORDER BY MaHD DESC  LIMIT 1";
		$sql = mysql_query($query) or die ("Không thể kết nối dữ liệu");
		$rows = mysql_fetch_array($sql);
		if(!$rows[0]){
			header('location:index.php?page=Product');
		}
	?>
	<h2 align="center" style="color:#FFFFFF; margin-top:25px;">Hóa đơn</h2>
	<div style="color:#FFFFFF;width:225px;float:left; margin:0 10px 0 20px">
		<p>Họ và tên khách hàng: <span style="font-weight:bold"><?php echo $rows['HotenKH'] ?></span></p>	
		<p>Địa chỉ giao nhận: <span style="font-weight:bold"><?php echo $rows['DiachiGH'] ?></span></p>
		<p>Điện thoại: <span style="font-weight:bold"><?php echo $rows['Dienthoai'] ?></span></p>
		<p>Email: <span style="font-weight:bold"><?php echo $rows['Email'] ?></span></p>
	</div>
	<div style="color:#FFFFFF;width:225px;float:right; margin:0 10px 20px 20px">
		<p>Mã hóa đơn: <span style="font-weight:bold"><?php echo $rows['MaHD'] ?></span> </p>	
		<p>Ngày đặt hàng: <span style="font-weight:bold"><?php echo $rows['ngay_dat'] ?></span></p>
		<p>Ngày nhận hàng: <span style="font-weight:bold"><?php echo $rows['ngay_giao'] ?></span></p>
		<p>Tình trạng: <span style="font-weight:bold"><?php if($rows['TrangthaiGH'] == 0){
																echo"Chưa giao hàng";	
															}else{echo"Đã giao hàng";}?></span></p>
		<p>Phương thức giao hàng: <span style="font-weight:bold"><?php if($rows['PTTT'] == 'style1'){
											echo"Nhân viên công ty giao hàng";	
										}else{echo"Khách hàng đến công ty nhận hàng";}?></span></p>
	</div>
	<?php 
		$De_query = "SELECT * FROM chitiethoadon WHERE MaHD=".$rows['MaHD'];
		$De_sql = mysql_query($De_query);
		
	
	?>
    <table width="716" border="0" style="color:#FFFFFF">
      <tr style="background:#1172E1; font-weight:bold; text-align:center">
        <td width="32" height="27">STT</td>
        <td width="291">Tên sản phẩm </td>
        <td width="108">Đơn giá </td>
        <td width="84">Số lượng </td>
        <td width="177">Thành tiền </td>
      </tr>
<?php
	$i = 1;  
	$sumprice = 0; 
	$Gia = 0;
	while($result = mysql_fetch_array($De_sql)){
		$Product_qr = mysql_query("SELECT * FROM sanpham WHERE MaSP ='".$result['MaSP']."'");
		$Name_rs = mysql_fetch_array($Product_qr);
?>
      <tr bgcolor="#FFFFFF">
        <td height="26" align="center"><?php echo"<span style='color:#000000;'>".$i."</span>"; ?></td>
        <td style="color:#000000"><?php echo $Name_rs['TenSP'] ?></td>
        <td style="color:#000000"><?php if($Name_rs['isSale'] == 1){
										$Gia = $Name_rs['Gia']*(1-$Name_rs['GiaKM']);
									 echo "$".number_format($Gia,2,',','.'); 
								}else{
									$Gia = $Name_rs['Gia'];
									 echo "$".number_format($Gia,2,',','.'); 
								}?></td>
        <td style="color:#000000" align="center"><?php echo $result['Soluong']?></td>
        <td style="color:#000000" align="right"><?php echo "$".number_format(($Gia*$result['Soluong']),2,',','.') ?></td>
      </tr>
	  
<?php
	$sumprice += ($Gia*$result['Soluong']);
	$i++;
 }
 for($j=$i;$j<=15;$j++){
 	echo"<tr bgcolor='#FFFFFF'>
        <td height='26'>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		";
 }	
 ?>	  
      <tr>
        <td height="26">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><span style="font-weight:bold;margin-right:30px;">Tổng tiền: </span><?php echo "$".number_format($sumprice,2,',','.')?></td>
      </tr>
    </table>
	
</div>	
</body>
</html>
