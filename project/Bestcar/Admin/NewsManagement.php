
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa tin tức này?"))
		document.FormNewsMan.submit();
}
</script>

<div class="title">Quản lý tin tức</div>
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
<?php if(!isset($_REQUEST['MaTT']) and !isset($_REQUEST['MaLTT'])){?>
<div class="select">
<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Heading" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tiêu đề</option>	
				<option value="Id" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Id'){?> selected="selected" <?php }?>>Theo mã tin tức</option>
				<option value="Date" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='NewProduct'){?> selected="selected" <?php }?>>Ngày tạo</option>
			</select>
</form>
</div>
<?php }?>
<form action="Delete/DelNews.php" method="post" name="FormNewsMan">
<table width="653" height="78" border="1">
  <tr class="background">
    <td width="40" height="33">Check</td>
    <td width="53">Mã tin tức </td>
    <td width="197"><div align="center">Tiêu đề </div></td>
    <td width="121"><div align="center">Loại tin tức </div></td>
    <td width="72"><div align="center">Ngày tạo </div></td>
    <td width="37"><div align="center">Sửa</div></td>
    <td width="38"><div align="center">Xóa</div></td>
    <td width="43">Chi tiết </td>
  </tr>
  <?php 
  	$display = 12;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaTT) FROM tintuc";
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
  	$se_query = "SELECT *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao FROM tintuc,loaitt WHERE tintuc.MaLTT=loaitt.MaLTT ORDER BY MaTT ASC LIMIT $start,$display";
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Heading'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao FROM tintuc,loaitt WHERE tintuc.MaLTT=loaitt.MaLTT ORDER BY Tieude ASC LIMIT $start,$display";
		}elseif($dpProduct=='Id'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao FROM tintuc,loaitt WHERE tintuc.MaLTT=loaitt.MaLTT ORDER BY MaTT ASC LIMIT $start,$display";
		}elseif($dpProduct=='Date'){
			$se_query = "SELECT *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao FROM tintuc,loaitt WHERE tintuc.MaLTT=loaitt.MaLTT ORDER BY Ngaytao ASC LIMIT $start,$display";
		}
	}
	if(isset($_REQUEST['MaLTT']) and !empty($_REQUEST['MaLTT'])){
		$se_query = "Select *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao from tintuc,loaitt 
			where  tintuc.MaLTT = loaitt.MaLTT and tintuc.MaLTT='".$_REQUEST['MaLTT']."'";	
	}
	if(isset($_REQUEST['MaTT']) and !empty($_REQUEST['MaTT'])){
		$se_query = "Select *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') as Ngay_tao from tintuc,loaitt 
			where tintuc.MaLTT=loaitt.MaLTT and  MaTT ='".$_REQUEST['MaTT']."'";	
	}
	$query = mysql_query($se_query) or die ("Không thể kết nối dữ liệu");
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr <?php if(isset($_REQUEST['MaTT'])and $_REQUEST['MaTT'] == $rows['MaTT']){?> bgcolor="#00FF99"<?php }?>>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkNews[]" value="<?php echo $rows['MaTT']?>">
    </div></td>
    <td><?php echo $rows['MaTT']?></td>
    <td><?php echo $rows['Tieude']?></td>
    <td><?php echo "<a style='margin-left:5px' href='index.php?page=NewsMan&MaLTT=".$rows['MaLTT']."'>".$rows['TenLTT']."</a>" ?></td>
    <td><?php echo $rows['Ngay_tao'] ?></td>
    <td><div align="center"><a href="index.php?page=EditNews&MaTT=<?php echo $rows['MaTT']?>"><img src="Images/Text Edit Icon.gif" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="Delete/DelNews.php?MaTT=<?php echo $rows['MaTT']?>" onclick="return confirm('Bạn có chắc muốn xóa bản tin này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="index.php?page=DetailNews&MaTT=<?php echo $rows['MaTT']?>"><img src="Images/RouteDetailIcon.gif" width="35" height="15"></a></div></td>
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
		if(!isset($_REQUEST['MaTT']) and !isset($_REQUEST['MaLTT'])){
			if($current > 1){//Hien thi Preview neu khong phai trang 1
				echo"<a href='index.php?page=NewsMan&start=$prev&pageNum=$pageNum'>Preview</a>";
			}		
			//Hien thi so trang
			for($i=1;$i<=$pageNum;$i++){
				if($current==$i){
					echo "<span>".$i."</span>";
				}else{
					echo"<a href='index.php?page=NewsMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
				}
			}
			//Hien thi Next neu ko phai trang cuoi
			if($current < $pageNum){
				echo"<a href='index.php?page=NewsMan&start=$next&pageNum=$pageNum'>Next</a>";
			}
		}
}
?>	
</div>
<a href="index.php?page=AddNews" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm tin tức</strong><span class="bt_green_r"></span></a>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa các tin tức</strong><span class="bt_red_r"></span></a> 
</form>
</div><!--end#Wrap-->

