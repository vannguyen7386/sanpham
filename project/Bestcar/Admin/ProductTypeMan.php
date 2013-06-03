<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {font-size: 14px;color:#FFFFFF}
-->
</style>
<?php  	
if(isset($_POST['ProductTypeName']) and !empty($_POST['ProductTypeName'])){//Kiểm tra trường tên nhà sản xuất nhập vào rỗng. Nếu rỗng không update
	$check_query = "SELECT COUNT(*) FROM loaisp WHERE TenLSP = '".$_POST['ProductTypeName']."'";
	if(check_exist($check_query)){
		header("location:index.php?page=ProductTypeMan&err=Trùng tên loại sản phẩm");
	}else{
		$query = "UPDATE loaisp SET TenLSP = '".$_POST['ProductTypeName']."' WHERE MaLSP = '".$_POST['ProductTypeID']."'";
		mysql_query($query) or die ("Không thể kết nối dữ liệu");	
		header("location:index.php?page=ProductTypeMan&success=Update thành công");
	}	
}
?>
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa loại sản phẩm này?"))
		document.FormProductTypeMan.submit();
}
</script>
<style>
.display{
	margin:auto;
	margin-top:50px;
	clear:both;
	width:382px;
	border:1px solid #000000;
	-moz-border-radius:5px;
}
</style>
<form action="Delete/DelProductType.php" method="post" name="FormProductTypeMan">
<div class="title">Quản lý loại sản phẩm</div>
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
<table width="655" height="78" border="1">
  <tr class="background">
    <td width="74" height="33"><div align="center">Check</div></td>
    <td width="108"><div align="center">Mã LSP </div></td>
    <td width="293"><div align="center">Tên loại sản phẩm </div></td>
    <td width="74"><div align="center">Sửa</div></td>
    <td width="72"><div align="center">Xóa</div></td>
    </tr>
  <?php 
  	$display = 6;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaLSP) FROM loaisp";
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
  	$query = mysql_query("SELECT * FROM loaisp ORDER BY MaLSP LIMIT $start,$display");
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkProductType[]" value="<?php echo $rows['MaLSP']?>">
    </div></td>
    <td><?php echo "<span style='margin-left:25px;'>".$rows['MaLSP']."</span>";?></td>
    <td><?php echo "<span style='margin-left:100px;'>".$rows['TenLSP']."</span>";?></td>
    <td><div align="center"><a href="index.php?page=ProductTypeMan&MaLSP=<?php echo $rows['MaLSP']?>"><img src="Images/Text Edit Icon.gif" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="Delete/DelProductType.php?MaLSP=<?php echo $rows['MaLSP']?>" onclick="return confirm('Bạn có chắc muốn xóa loại sản phẩm này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
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
		if($current > 1){//Hien thi Preview neu khong phai trang 1
			echo"<a href='index.php?page=ProductTypeMan&start=$prev&pageNum=$pageNum'>Preview</a>";
		}		
		//Hien thi so trang
		for($i=1;$i<=$pageNum;$i++){
			if($current==$i){
				echo "<span>".$i."</span>";
			}else{
				echo"<a href='index.php?page=ProductTypeMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
		}
		//Hien thi Next neu ko phai trang cuoi
		if($current < $pageNum){
			echo"<a href='index.php?page=ProductTypeMan&start=$next&pageNum=$pageNum'>Next</a>";
		}
}
?>	
</div>
<a href="index.php?page=ProductTypeMan&AddProductType" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm loại sản phẩm </strong><span class="bt_green_r"></span></a>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa loại sản phẩm </strong><span class="bt_red_r"></span></a> 
</form>
<?php if(isset($_REQUEST['MaLSP'])){
?>
<div class="display">
<form name="Edit_productType" action="index.php?page=ProductTypeMan" method="post">	
	
<table width="381" align="center" style="margin:0">
	<?php 
		$edit_query = mysql_query("SELECT * FROM loaisp WHERE MaLSP='".$_REQUEST['MaLSP']."'") or die ("Không thể kết nối dữ liệu");
		$result = mysql_fetch_array($edit_query);
		if(!$result){
			header("location:index.php?page=ProductTypeMan&err=Không tìm thấy dữ liệu");
		}else{
	?>	
	<tr>
		<td height="24" colspan="2" align="center" bgcolor="#20A7D4"><span class="style1"><?php echo $result['TenLSP'] ?></span></td>
	</tr>
	<tr>
		<td width height="32">Mã loại sản phẩm:</td>
		<td width="240" ><input name="ProductTypeID" type="text" value="<?php echo $result['MaLSP'] ?>" size="40" readonly="readonly"/></td>
	</tr>
	<tr>
		<td height="40">Tên nhà sản xuất:</td>
		<td><input name="ProductTypeName" type="text" value="<?php echo $result['TenLSP'] ?>" size="40" /></td>
	</tr>
	<tr>
	  <td colspan="2"><div align="center">
	    <input type="submit" name="Submit" value="Sửa thông tin" />
	    </div></td>
	  </tr>
	<?php	
		}	
	?>
</table>
</form>	
</div>					
<?php
}elseif(isset($_REQUEST['AddProductType'])){
?>
<div class="display">
<form name="Add_productType" action="Update/UpdateNewProductType.php" method="post">		
<table width="382" align="center" style="margin:0">
	<tr>
		<td height="24" colspan="2" align="center" bgcolor="#20A7D4"><span class="style1">Thêm loại sản phẩm</span></td>
	</tr>
	<tr>
		<td width height="32">Mã loại sản phẩm:</td>
		<td width="240" ><input name="ProductTypeID" type="text" value="Mã loại sản phẩm" size="40" onfocus="this.value=''"/></td>
	</tr>
	<tr>
		<td height="40">Tên nhà sản xuất:</td>
		<td><input name="ProductTypeName" type="text" value="Tên loại sản phẩm" onfocus="this.value=''" size="40" /></td>
	</tr>
	<tr>
	  <td colspan="2"><div align="center">
	    <input type="submit" name="Submit" value="Nhập dữ liệu" />
	    </div></td>
	  </tr>
</table>
</form>	
</div>	
<?php	
}
?>
</div><!--end#Wrap-->

