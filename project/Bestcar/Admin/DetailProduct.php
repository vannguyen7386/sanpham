
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#DetailProduct{
		width:520px;
		overflow:hidden;
		border:1px solid #333333;
		-moz-border-radius:5px;
		margin:15px auto;
	}
	#DetailProduct h3{
		margin-top:0;
		color:#FFFFFF;
		background:url(Images/menu_bg.jpg) 0 -5px;
		line-height:30px;
	}
	#DetailProduct .bold{
		font-weight:bold;
	}
	.back{
		text-align:right;
		margin:15px;
	}
	.back a{
		color:#0000FF;
		font-size:14px;
		text-decoration:none;
	}
	.back a:hover,active{
		text-decoration:underline;
	}
</style>
<?php 
if(isset($_REQUEST['MaSP'])){
	$f_query =  "Select MaSP,TenSP,Gia,Trangthai,isVip,isNew,isSale,isBestBuy,GiaKM,Mausac,Mota,Picture,TenLSP,TenNCC,DATE_FORMAT(Ngaynhap,'%d/%m/%Y') AS ngay_nhap 
	from sanpham,loaisp,nhacc 
	where sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and MaSP = '".$_REQUEST['MaSP']."'";	
	$result = mysql_query($f_query);
	$rows = mysql_fetch_array($result);
	if($rows){
				
?>
<div class="title">Chi tiết sản phẩm</div>
<div id="DetailProduct">
	<h3 align="center"><?php echo $rows['TenSP'] ?></h3>
    <table width="478" border="0" align="center">
      <tr>
        <td width="191" rowspan="13" valign="top"><img src="../Image/Product/<?php echo $rows['Picture'] ?>" width="172" height="108" alt="" /></td>
        <td width="133" height="26" class="bold">Mã sản phẩm: </td>
        <td width="140"><?php echo $rows['MaSP']; ?></td>
      </tr>
      <tr>
        <td class="bold">Tên sản phẩm: </td>
        <td><?php echo $rows['TenSP'] ?></td>
      </tr>
      <tr>
        <td class="bold">Loại sản phẩm: </td>
        <td><?php echo $rows['TenLSP'] ?></td>
      </tr>
      <tr>
        <td class="bold">Giá:</td>
        <td><?php 
			if($rows['isSale']==1){
		 		$Gia = $rows['Gia']-$rows['Gia']*$rows['GiaKM'];
		 		echo"<span style='color:green'>$".number_format($Gia,2,',','.')."</span>";
		 	}else{
				echo "<span style='color:red'>$".number_format($rows['Gia'],2,',','.')."</span>";
			}?></td>
      </tr>
      <tr>
        <td class="bold">Nhà sản xuất </td>
        <td><?php echo $rows['TenNCC'] ?></td>
      </tr>
      <tr>
        <td class="bold">Trạng thái: </td>
        <td><?php 
		echo ($rows['Trangthai']==1)?"<span style='color:green'>Còn hàng</span>":"<span style='color:red'>Hết hàng</span>";
		?>        </td>
      </tr>
      <tr>
        <td class="bold">Màu sắc </td>
        <td><?php echo $rows['Mausac'] ?></td>
      </tr>
      <tr>
        <td class="bold">Sản phẩm bán chạy: </td>
        <td><?php 
		echo ($rows['isBestBuy']==1)?"<span style='color:green'>Yes</span>":"<span style='color:red'>No</span>";
		?></td>
      </tr>
      <tr>
        <td class="bold">Sản phẩm mới: </td>
        <td><?php 
		echo ($rows['isNew']==1)?"<span style='color:green'>Yes</span>":"<span style='color:red'>No</span>";
		?></td>
      </tr>
      <tr>
        <td class="bold">Sản phẩm Vip: </td>
        <td><?php 
		echo ($rows['isVip']==1)?"<span style='color:green'>Yes</span>":"<span style='color:red'>No</span>";
		?></td>
      </tr>
      <tr>
        <td class="bold">Sản phẩm khuyến mãi: </td>
        <td><?php 
		echo ($rows['isSale']==1)?"<span style='color:green'>Yes</span><span style='margin-left:15px;color:green'>".($rows['GiaKM']*100)."%</span>":"<span style='color:red'>No</span>";
		?></td>
      <tr>
        <td height="24" valign="top" class="bold">Ngày nhâp: </td>
        <td><?php echo $rows['ngay_nhap'];?></td>
      </tr>
      <tr>
        <td height="24" colspan="2" valign="top" class="bold">Mô tả:<div align="justify"><?php echo $rows['Mota'] ?></div> </td>
      </tr>
    </table>
    <?php
	}
}
?>
	<div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay về</a></div>
</div>
