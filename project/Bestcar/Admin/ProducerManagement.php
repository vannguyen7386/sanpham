
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {font-size: 14px;color:#FFFFFF}
-->
</style>
<?php  	
if(isset($_POST['ProducerName']) and !empty($_POST['ProducerName'])){//Kiểm tra trường tên nhà sản xuất nhập vào rỗng. Nếu rỗng không update
	$check_query = "SELECT COUNT(*) FROM nhacc WHERE TenNCC = '".$_POST['ProducerName']."'";
	if(check_exist($check_query)){
		header("location:index.php?page=ProducerMan&err=Trùng tên nhà sản xuất");
	}else{
		$query = "UPDATE nhacc SET TenNCC = '".$_POST['ProducerName']."' WHERE MaNCC = '".$_POST['ProducerID']."'";
		mysql_query($query) or die ("Không thể kết nối dữ liệu");	
		header("location:index.php?page=ProducerMan&success=Update thành công");
	}	
}
?>
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa nhà sản xuất?"))
		document.FormProducerMan.submit();
}
</script>
<style>
.display{
	margin:auto;
	margin-top:50px;
	clear:both;
	width:376px;
	border:1px solid #000000;
	-moz-border-radius:5px;
}
</style>
<form action="Delete/DelProducer.php" method="post" name="FormProducerMan">
<div class="title">Quản lý nhà sản xuất</div>
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
    <td width="108"><div align="center">Mã NSX </div></td>
    <td width="293"><div align="center">Tên nhà sản xuất </div></td>
    <td width="74"><div align="center">Sửa</div></td>
    <td width="72"><div align="center">Xóa</div></td>
    </tr>
  <?php 
  	$display = 6;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaNCC) FROM nhacc";
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
  	$query = mysql_query("SELECT * FROM nhacc ORDER BY MaNCC LIMIT $start,$display");
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkProducer[]" value="<?php echo $rows['MaNCC']?>">
    </div></td>
    <td><?php echo "<span style='margin-left:25px;'>".$rows['MaNCC']."</span>";?></td>
    <td><?php echo "<span style='margin-left:100px;'>".$rows['TenNCC']."</span>";?></td>
    <td><div align="center"><a href="index.php?page=ProducerMan&MaNCC=<?php echo $rows['MaNCC']?>"><img src="Images/Text Edit Icon.gif" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="Delete/DelProducer.php?MaNCC=<?php echo $rows['MaNCC']?>" onclick="return confirm('Bạn có chắc muốn xóa nhà sản xuất này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
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
			echo"<a href='index.php?page=ProducerMan&start=$prev&pageNum=$pageNum'>Preview</a>";
		}		
		//Hien thi so trang
		for($i=1;$i<=$pageNum;$i++){
			if($current==$i){
				echo "<span>".$i."</span>";
			}else{
				echo"<a href='index.php?page=ProducerMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
		}
		//Hien thi Next neu ko phai trang cuoi
		if($current < $pageNum){
			echo"<a href='index.php?page=ProducerMan&start=$next&pageNum=$pageNum'>Next</a>";
		}
}
?>	
</div>
<a href="index.php?page=ProducerMan&AddProducer" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm nhà sản xuất </strong><span class="bt_green_r"></span></a>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa nhà sản xuất </strong><span class="bt_red_r"></span></a> 
</form>
<?php if(isset($_REQUEST['MaNCC'])){
?>
<div class="display">
<form name="Edit_producer" action="index.php?page=ProducerMan" method="post">	
	
<table width="376" align="center" style="margin:0">
	<?php 
		$edit_query = mysql_query("SELECT * FROM nhacc WHERE MaNCC='".$_REQUEST['MaNCC']."'") or die ("Không thể kết nối dữ liệu");
		$result = mysql_fetch_array($edit_query);
		if(!$result){
			header("location:index.php?page=ProducerMan&err=Không tìm thấy dữ liệu");
		}else{
	?>	
	<tr>
		<td height="24" colspan="2" align="center" bgcolor="#20A7D4"><span class="style1"><?php echo $result['TenNCC'] ?></span></td>
	</tr>
	<tr>
		<td width height="32">Mã nhà sản xuất:</td>
		<td width="241" ><input name="ProducerID" type="text" value="<?php echo $result['MaNCC'] ?>" size="40" readonly="readonly"/></td>
	</tr>
	<tr>
		<td height="40">Tên nhà sản xuất:</td>
		<td><input name="ProducerName" type="text" value="<?php echo $result['TenNCC'] ?>" size="40" /></td>
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
}elseif(isset($_REQUEST['AddProducer'])){
?>
<div class="display">
<form name="Add_producer" action="Update/UpdateNewProducer.php" method="post">		
<table width="376" align="center" style="margin:0">
	<tr>
		<td height="24" colspan="2" align="center" bgcolor="#20A7D4"><span class="style1">Thêm nhà sản xuất</span></td>
	</tr>
	<tr>
		<td width height="32">Mã nhà sản xuất:</td>
		<td width="241" ><input name="ProducerID" type="text" value="Mã nhà sản xuất" size="40" onfocus="this.value=''"/></td>
	</tr>
	<tr>
		<td height="40">Tên nhà sản xuất:</td>
		<td><input name="ProducerName" type="text" value="Tên nhà sản xuất" onfocus="this.value=''" size="40" /></td>
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

