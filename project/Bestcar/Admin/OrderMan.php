
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa các đơn hàng?"))
		document.FormOrderMan.submit();
}
</script>
<?php 
	if(isset($_REQUEST['MaHD']) and isset($_REQUEST['status'])){
		$queryTT = mysql_query("SELECT TrangthaiGH FROM hoadon WHERE MaHD=".$_REQUEST['MaHD']) or die ("Không thể kết nối dữ liệu");	
		$result = mysql_fetch_array($queryTT);
		if($result){
			if($result['TrangthaiGH'] == '0'){
				$queryUp = mysql_query("UPDATE hoadon SET TrangthaiGH='1' WHERE MaHD=".$_REQUEST['MaHD']);
			}else{
				$queryUp = mysql_query("UPDATE hoadon SET TrangthaiGH='0' WHERE MaHD=".$_REQUEST['MaHD']);
			}
		}	
	}
?>
<div class="title">Quản lý đơn hàng </div>
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
<?php if(!isset($_REQUEST['Detail'])){?>
<div class="select">
<form action="index.php?page=OrderMan" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên khách hàng</option>	
				<option value="Id" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Id'){?> selected="selected" <?php }?>>Theo mã hóa đơn</option>
				<option value="DateOD" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='DateOD'){?> selected="selected" <?php }?>>Theo ngày đặt</option>
				<option value="NoStatus" 
					<?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NoStatus'){?> selected="selected" <?php }?>>Hóa đơn chưa duyệt</option>
				<option value="OkStatus" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='OkStatus'){?> selected="selected" <?php }?>>Hóa đơn đã duyệt</option>
			</select>
</form>
</div>
<?php }?>
<form action="Delete/DelOrder.php" method="post" name="FormOrderMan">
<table width="655" height="78" border="1">
  <tr class="background">
    <td width="45" height="33">Check</td>
    <td width="47">Mã HD </td>
    <td width="172"><div align="center">Họ tên khách hàng </div></td>
    <td width="116"><div align="center">Ngày đặt </div></td>
    <td width="69">Ngày giao </td>
    <td width="71"><div align="center">Trạng thái</div></td>
    <td width="41"><div align="center">Xóa</div></td>
    <td width="42">Chi tiết </td>
  </tr>
  <?php 
  	$display = 12;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaHD) FROM hoadon";
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
  	$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao FROM hoadon ORDER BY MaHD ASC LIMIT $start,$display";
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
						FROM hoadon ORDER BY HotenKH ASC LIMIT $start,$display";
		}elseif($dpProduct=='Id'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
						FROM hoadon ORDER BY MaHD ASC LIMIT $start,$display";
		}elseif($dpProduct=='DateOD'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
						FROM hoadon ORDER BY Ngaydat ASC LIMIT $start,$display";
		}elseif($dpProduct=='NoStatus'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
						FROM hoadon WHERE TrangthaiGH = '0' ORDER BY Ngaydat ASC LIMIT $start,$display";
			$f_query = "SELECT COUNT(MaHD) FROM hoadon WHERE TrangthaiGH = '0'";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}
		}elseif($dpProduct=='OkStatus'){
			$se_query =  "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
						FROM hoadon WHERE TrangthaiGH = '1' ORDER BY Ngaydat ASC LIMIT $start,$display";
			$f_query = "SELECT COUNT(MaHD) FROM hoadon WHERE TrangthaiGH = '1'";
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
	if(isset($_REQUEST['MaHD']) and !empty($_REQUEST['MaHD']) and isset($_REQUEST['Detail'])){
		$se_query = "SELECT *,DATE_FORMAT(Ngaydat,'%d/%m/%Y %H:%i:%s') AS ngay_dat, DATE_FORMAT(Ngaygiao,'%d/%m/%Y') AS ngay_giao 
					FROM hoadon WHERE MaHD = '".$_REQUEST['MaHD']."'";
	}
	$query = mysql_query($se_query);
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkOrder[]" value="<?php echo $rows['MaHD']?>">
    </div></td>
    <td align="center"><?php echo $rows['MaHD']?></td>
    <td><?php echo $rows['HotenKH']?></td>
    <td><?php echo $rows['ngay_dat']?></td>
    <td><?php echo $rows['ngay_giao']?></td>
    <td><div align="center">
      <?php if($rows['TrangthaiGH']==1){?>
      <img src="Images/ok.gif" width="20" height="20" 
	  onClick="this.src='Images/thunderbird-delete.gif';FormOrderMan.action='index.php?page=OrderMan&MaHD=<?php echo $rows['MaHD'] ?>&status';FormOrderMan.submit()" >
      <?php }else{
	  ?>
	  <img src="Images/thunderbird-delete.gif" width="20" height="20" 
	  	onClick="this.src='Images/ok.gif';FormOrderMan.action='index.php?page=OrderMan&MaHD=<?php echo $rows['MaHD'] ?>&status';FormOrderMan.submit()" />
	  <?php
	  }?>
    </div></td>
    <td><div align="center"><a href="Delete/DelOrder.php?MaHD=<?php echo $rows['MaHD']?>" onClick="return confirm('Bạn có chắc muốn đơn hàng này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="index.php?page=DetailOrder&MaHD=<?php echo $rows['MaHD']?>"><img src="Images/RouteDetailIcon.gif" width="35" height="15"></a></div></td>
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
	if(!isset($_REQUEST['Detail'])){
		if($current > 1){//Hien thi Preview neu khong phai trang 1
			echo"<a href='index.php?page=OrderMan&start=$prev&pageNum=$pageNum'>Preview</a>";
		}		
		//Hien thi so trang
		for($i=1;$i<=$pageNum;$i++){
			if($current==$i){
				echo "<span>".$i."</span>";
			}else{
				echo"<a href='index.php?page=OrderMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
			}
		}
		//Hien thi Next neu ko phai trang cuoi
		if($current < $pageNum){
			echo"<a href='index.php?page=OrderMan&start=$next&pageNum=$pageNum'>Next</a>";
		}
	}	
}
?>	
</div>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa các đơn hàng</strong><span class="bt_red_r"></span></a> 
</form>
</div><!--end#Wrap-->

