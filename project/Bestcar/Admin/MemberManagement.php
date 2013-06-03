
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa thành viên?"))
		document.FormMemberMan.submit();
}
function UpdatePer(){
	document.FormMemberMan.action = 'index.php?page=MemberMan';
	document.FormMemberMan.submit();	
}
</script>

<?php 
if(isset($_POST['Admin_user'])){
	$sql = mysql_query("SELECT * FROM thanhvien ORDER BY MaTV");
	$i=0;
	$flag = true;
	while($rowMem = mysql_fetch_array($sql)){
		if($_POST['Admin_user'][0] == '0'){
			$flag = false;
		}
		$queryUp = mysql_query("Update thanhvien SET Quyen=".$_POST['Admin_user'][$i]." WHERE MaTV = ".$rowMem['MaTV']." and MaTV != 1");	
		$i++;
	}
	if(!$flag){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>Bạn không thể thay đổi được quyền quản trị tài khoản Admin 1</div>";
	}else{
		echo"<div align='center' style='color:green;font-size:14px'>Update thành công</div>";
	}
}
?>

<div class="title">Quản lí thành viên</div>
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
<?php if(!isset($_REQUEST['MaTV'])){?>
<div class="select">
<form action="#" method="post" name="myForm">
			<span>Hiển thị: </span>
			<select name="displayProduct" onchange="myForm.submit()">
				<option>[Chọn mục hiển thị]</option>
				<option value="Name" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='Name'){?> selected="selected" <?php }?>>Theo tên đăng nhập</option>
				<option value="UserId" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='UserId'){?> selected="selected" <?php }?>>Theo Mã thành viên</option>	
				<option value="FullName" <?php if(isset($_POST['displayProduct']) and $_POST['displayProduct']=='FullName'){?> selected="selected" <?php }?>>Theo họ tên</option>
			</select>
</form>
</div>
<?php }?>
<form action="Delete/DelMember.php" method="post" name="FormMemberMan">
<table width="655" height="78" border="1">
  <tr class="background">
    <td width="44" height="33">Check</td>
    <td width="48">Mã TV </td>
    <td width="118"><div align="center">Tên truy cập </div></td>
    <td width="236"><div align="center">Họ tên thành viên </div></td>
    <td width="80"><div align="center">Quyền</div></td>
    <td width="36"><div align="center">Xóa</div></td>
    <td width="47">Chi tiết  </td>
  </tr>
  <?php 
  	$display = 12;
	if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
		$pageNum = $_REQUEST['pageNum'];
	}else{
		$f_query = "SELECT COUNT(MaTV) FROM thanhvien";
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
  	$se_query = "SELECT * FROM thanhvien ORDER BY MaTV ASC LIMIT $start,$display";
	if(isset($_POST['displayProduct']) and !empty($_POST['displayProduct'])){
		$dpProduct = $_POST['displayProduct'];
		if($dpProduct == 'Name'){
			$se_query = "Select *FROM thanhvien ORDER BY TenDN ASC LIMIT $start,$display";	
		}elseif($dpProduct=='UserId'){
			$se_query = "Select *FROM thanhvien ORDER BY MaTV ASC LIMIT $start,$display";	
		}elseif($dpProduct=='FullName'){
			$se_query = "Select *FROM thanhvien ORDER BY Hoten ASC LIMIT $start,$display";	
		}
	}
	if(isset($_REQUEST['MaTV'])){
		$se_query = "Select *FROM thanhvien WHERE MaTV =".$_REQUEST['MaTV'];		
	}
	 $query = mysql_query($se_query) or die("Không thể kết nối dữ liệu"); 
	while($rows = mysql_fetch_array($query)){
  ?>
  <tr <?php if(isset($_REQUEST['MaTV']) and $_REQUEST['MaTV'] == $rows['MaTV']){?> bgcolor="#00FF99"<?php }?>>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkMember[]" value="<?php echo $rows['MaTV']?>">
    </div></td>
    <td><div align="center"><?php echo $rows['MaTV']?>
      </div></td>
    <td><?php echo $rows['TenDN']?></td>
    <td><?php echo $rows['Hoten']?></td>
    <td><div align="center"><select name="Admin_user[]">
								<option value="1" <?php if($rows['Quyen'] == '1'){echo "selected='selected'";}?>>Admin</option>
								<option value="0" <?php if($rows['Quyen'] == '0'){echo "selected='selected'";}?>>User</option>
							</select>	
						</div></td>
    <td><div align="center"><a href="Delete/DelMember.php?MaTV=<?php echo $rows['MaTV']?>" onclick="return confirm('Bạn có chắc muốn xóa thành viên này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="index.php?page=DetailMember&MaTV=<?php echo $rows['MaTV']?>"><img src="Images/RouteDetailIcon.gif" width="35" height="15"></a></div></td>
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
		
		if(!isset($_REQUEST['MaTV'])){
			if($current > 1){//Hien thi Preview neu khong phai trang 1
				echo"<a href='index.php?page=MemberMan&start=$prev&pageNum=$pageNum'>Preview</a>";
			}		
			//Hien thi so trang
			for($i=1;$i<=$pageNum;$i++){
				if($current==$i){
					echo "<span>".$i."</span>";
				}else{
					echo"<a href='index.php?page=MemberMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
				}
			}
			//Hien thi Next neu ko phai trang cuoi
			if($current < $pageNum){
				echo"<a href='index.php?page=MemberMan&start=$next&pageNum=$pageNum'>Next</a>";
			}
		}
}
?>	
</div>
<a href="javaScript:UpdatePer()" class="bt_green"><span class="bt_green_lft"></span><strong>Update quyền thành viên</strong><span class="bt_green_r"></span></a>
 <a href="JavaScript:submitForm()" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa các thành viên</strong><span class="bt_red_r"></span></a> 
</form>
</div><!--end#Wrap-->


