
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa sản phẩm?"))
		document.FormProductMan.submit();
}
</script>

<div class="title">Quản lý sản phẩm</div>
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
<?php if(!isset($_REQUEST['MaSP']) and !isset($_REQUEST['MaNCC'])){?>
<div class="select">
<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên</option>	
				<option value="Id" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Id'){?> selected="selected" <?php }?>>Theo mã sản phẩm</option>
				<option value="NewProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Sản phẩm mới</option>
				<option value="SaleProduct" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='SaleProduct'){?> selected="selected" <?php }?>>Sản phẩm KM</option>
				<option value="OkStatus" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='OkStatus'){?> selected="selected" <?php }?>>Còn hàng</option>
				<option value="NoStatus" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NoStatus'){?> selected="selected" <?php }?>>Hết hàng</option>
			</select>
</form>
</div>
<?php }?>
<form action="Delete/DelProduct.php" method="post" name="FormProductMan">
<table width="655" height="78" border="1">
  <tr class="background">
    <td width="43" height="33">Check</td>
    <td width="42">Mã SP </td>
    <td width="154"><div align="center">Tên sản phẩm </div></td>
    <td width="94"><div align="center">Nhà sản xuất </div></td>
    <td width="84"><div align="center">Giá</div></td>
    <td width="63">Trạng thái </td>
    <td width="37"><div align="center">Sửa</div></td>
    <td width="35"><div align="center">Xóa</div></td>
    <td width="45">Chi tiết </td>
  </tr>
  <?php 
  	$display = 12;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaSP) FROM sanpham";
		$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$record = $row[0];
		if($record < $display){
			$pageNum = 1;
		}else{
			$pageNum = ceil($record/$display);
		}
	}
	$start = (isset($_REQUEST['start']) and (int)$_REQUEST['start'] >=0)?$_REQUEST['start']:0;
  ?>
  <?php 
  	$se_query = "SELECT * FROM sanpham,nhacc WHERE sanpham.MaNCC=nhacc.MaNCC ORDER BY MaSP ASC LIMIT $start,$display";
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select * from sanpham,nhacc 
			where sanpham.MaNCC = nhacc.MaNCC ORDER BY TenSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='Id'){
			$se_query = "Select * from sanpham,nhacc 
			where sanpham.MaNCC = nhacc.MaNCC ORDER BY MaSP ASC LIMIT $start,$display";	
		}elseif($dpProduct=='NewProduct'){
			$se_query = "Select * from sanpham,nhacc 
			where  sanpham.MaNCC = nhacc.MaNCC and isNew='1'";
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isNew = '1'";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}	
		}elseif($dpProduct=='SaleProduct'){
			$se_query = "Select * from sanpham,loaisp,nhacc 
			WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and isSale='1'";	
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE isSale='1'";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}
		}elseif($dpProduct=='OkStatus'){
			$se_query = "Select * from sanpham,nhacc 
			WHERE sanpham.MaNCC = nhacc.MaNCC and Trangthai='1'";
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE Trangthai='1'";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}	
		}elseif($dpProduct=='NoStatus'){
			$se_query = "Select * from sanpham,nhacc 
			WHERE sanpham.MaNCC = nhacc.MaNCC and Trangthai='0'";	
			$f_query = "SELECT COUNT(MaSP) FROM sanpham WHERE Trangthai='0'";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}	
		}
	}
	if(isset($_REQUEST['MaNCC']) and !empty($_REQUEST['MaNCC'])){
		$se_query = "Select * from sanpham,nhacc 
			where  sanpham.MaNCC = nhacc.MaNCC and sanpham.MaNCC='".$_REQUEST['MaNCC']."'";	
	}
	if(isset($_REQUEST['MaSP']) and !empty($_REQUEST['MaSP'])){
		$se_query = "Select * from sanpham,nhacc 
			where  sanpham.MaNCC = nhacc.MaNCC and MaSP ='".$_REQUEST['MaSP']."'";	
	}
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr <?php if(isset($_REQUEST['MaSP']) and $_REQUEST['MaSP'] == $rows['MaSP']){?> bgcolor="#00FF99"<?php }?>>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkProduct[]" value="<?php echo $rows['MaSP']?>">
    </div></td>
    <td><?php echo $rows['MaSP']?></td>
    <td><?php echo $rows['TenSP']?></td>
    <td><a href="index.php?page=ProductMan&MaNCC=<?php echo $rows['MaNCC'] ?>"><?php echo $rows['TenNCC']?></a></td>
    <td><?php
		 if($rows['isSale']==1){
		 	$Gia = $rows['Gia']-$rows['Gia']*$rows['GiaKM'];
		 	echo"<span style='color:green'>$".number_format($Gia,2,',','.')."</span>";
		 }else{
			echo "<span style='color:red'>$".number_format($rows['Gia'],2,',','.')."</span>";
		}?></td>
    <td><div align="center"><?php if($rows['Trangthai']==1){?><img src="Images/ok.gif" width="20" height="20"><?php }else{echo"<img src='Images/thunderbird-delete.gif' width='20' height='20'>";}?></div></td>
    <td><div align="center"><a href="index.php?page=EditProduct&MaSP=<?php echo $rows['MaSP']?>"><img src="Images/Text Edit Icon.gif" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="Delete/DelProduct.php?MaSP=<?php echo $rows['MaSP']?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="index.php?page=DetailProduct&MaSP=<?php echo $rows['MaSP']?>"><img src="Images/RouteDetailIcon.gif" width="35" height="15"></a></div></td>
  </tr>
 <?php 
 }
 ?>  
</table>
<div class="pageNum">
<?php
if($pageNum > 1){
	$prev = $start-$display;
	$next = $start+$display;
	$current = ceil($start/$display)+1;	
		
		if(!isset($_REQUEST['MaSP']) and !isset($_REQUEST['MaNCC'])){
			if($current > 1){//Hien thi Preview neu khong phai trang 1
				echo"<a href='index.php?page=ProductMan&start=$prev&pageNum=$pageNum'>Preview</a>";
			}		
			//Hien thi so trang
			for($i=1;$i<=$pageNum;$i++){
				if($current==$i){
					echo "<span>".$i."</span>";
				}else{
					echo"<a href='index.php?page=ProductMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
				}
			}
			//Hien thi Next neu ko phai trang cuoi
			if($current < $pageNum){
				echo"<a href='index.php?page=ProductMan&start=$next&pageNum=$pageNum'>Next</a>";
			}
		}	
}
?>	
</div>
<a href="index.php?page=AddProduct" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm sản phẩm</strong><span class="bt_green_r"></span></a>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa các sản phẩm</strong><span class="bt_red_r"></span></a> 
</form>
</div><!--end#Wrap-->

