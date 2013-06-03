
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#DetailProduct{
		width:600px;
		overflow:hidden;
		margin:15px auto;
	}
	#DetailProduct .bold{
		font-weight:bold;
	}
	a.change{
		padding:5px;
		color:#0066CC;
		text-decoration:none;
		font-size:14px;
	}
	a.change:hover{
		text-decoration:underline;
		color:#D17601;
	}
	input:hover, select:hover{
		color:#0066FF;
	}
		
</style>
<?php 
if(isset($_SESSION['username']) and $_SESSION['Quyen'] == '1'){
	$f_query = "SELECT *,DATE_FORMAT(NgayDK,'%d/%m/%Y') AS ngay_dk,
				YEAR(Ngaysinh) AS Namsinh,
				MONTH(Ngaysinh) AS Thangsinh,
				DAY(Ngaysinh) AS Ngay_sinh 
				FROM thanhvien
				WHERE TenDN = '".$_SESSION['username']."'";	
	$result = mysql_query($f_query);
	$rows = mysql_fetch_array($result);
	if($rows){
				
?>
<div class="title">Hồ sơ cá nhân</div>
<a href="index.php?page=Change&field=pass" class="change">Thay đổi mật khẩu</a>
<a href="index.php?page=Change&field=email" class="change">Thay đổi email</a>
<form action="Update/UpdateInfo.php" method="post" name="PrivDoc">
<div id="DetailProduct">
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}	
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
	}
?>
    <table width="486" height="466" border="0" align="center">
	 <tr bgcolor="#32ADD9">
       <td height="34" colspan="2" class="bold"><div align="center" style="font-size:17px; font-weight:bold; color:#FFFFFF"><?php echo $rows['TenDN'] ?></div></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="200" height="33" class="bold">Mã thành viên: </td>
        <td width="276"><?php echo $rows['MaTV']; ?></td>
      </tr>
      <tr  bgcolor="#CCCCCC">
        <td class="bold">Tên truy cập: </td>
        <td><input type="text" value="<?php echo $rows['TenDN'] ?>" name="User" disabled="disabled"/></td>
      </tr>

<script language="JavaScript" type="text/javascript">
	x = document.PrivDoc;
	function getName(){
		if(x.name.value==""){
			x.name.value="<?php echo $rows['Hoten']; ?>";
		}
	}
</script>
      <tr  bgcolor="#CCCCCC">
        <td class="bold">Họ tên:</td>
        <td><input name="name" type="text"  onBlur="getName()" value="<?php echo $rows['Hoten']; ?>" size="36"></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Email: </td>
        <td><?php echo $rows['Email'] ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Giới tính: </td>
        <td>Nam: <input type="radio" name="gender" value="Nam" <?php if ($rows['Gioitinh']=='Nam'){echo "checked='checked'";} ?> >
			Nữ: <input type="radio" name="gender" value="Nữ" <?php if ($rows['Gioitinh']=='Nữ'){echo "checked='checked'";} ?>>		</td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Ngày sinh: </td>
        <td>Ngày:<select name="Ngay">
	  <?php 
	  	for($i=1;$i<=31;$i++){
	  ?>
		<option value="<?php echo $i; ?>" <?php if ($rows['Ngay_sinh'] == $i){echo "selected='selected'";} ?>><?php if($i<10){echo '0'.$i; }else{echo $i;} ?> </option>
	  
	  <?php }
	  ?>
      </select> 
        Tháng
        <select name="Thang">
		  <?php 
	  	for($i=1;$i<=12;$i++){
	  ?>
		<option value="<?php echo $i; ?>" <?php if ($rows['Thangsinh'] == $i){echo "selected='selected'";} ?>><?php if($i<10){echo '0'.$i; }else{echo $i;} ?> </option>
	  
	  <?php }
	  ?>
        </select> 
        Năm      <select name="Nam">
		  <?php 
	  	for($i=Date("Y");$i>=1920;$i--){
	  ?>
		<option value="<?php echo $i; ?>" <?php if ($rows['Namsinh'] == $i){echo "selected='selected'";} ?>><?php echo $i;?> </option>
	  
	  <?php }
	  ?>
        </select>       </td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Tuổi: </td>
        <td><?php $Age = (date("Y") - $rows['Namsinh']);
					echo $Age;?></td>
      </tr>
<script language="JavaScript" type="text/javascript">
	x = document.PrivDoc;
	function getAddress(){
		if(x.Address.value==""){
			x.Address.value="<?php echo $rows['Diachi']; ?>";
		}
	}
</script>	  
      <tr bgcolor="#CCCCCC">
        <td class="bold">Địa chỉ: </td>
        <td><input type="text" value="<?php 
		echo $rows['Diachi'];?>" 
		size="36" name="Address" 
		 onBlur="getAddress()"></td>
      </tr>
	  
<script language="JavaScript" type="text/javascript">
	x = document.PrivDoc;
	function getPhone(){
		if(x.Phone.value==""){
			x.Phone.value="<?php echo $rows['Phone']; ?>";
		}
	}
</script>	  
      <tr bgcolor="#CCCCCC">
        <td class="bold">Điện thoại: </td>
        <td><input type="text" value="<?php 
		echo $rows['Phone'];?>" 
		size="36" name="Phone" 
		onBlur="getPhone()"></td>
      </tr>
	  
      <tr bgcolor="#CCCCCC">
        <td class="bold">Quyền hạn: </td>
        <td><?php 
		echo ($rows['Quyen']==1)?"<span style='color:green'>Admin</span>":"<span style='color:red'>User</span>";
		?></td>
      <tr bgcolor="#CCCCCC">
        <td height="24" valign="top" class="bold">Ngày đăng kí: </td>
        <td><?php echo $rows['ngay_dk'];?></td>
      </tr>
      <tr>
        <td height="63" >&nbsp;</td>
        <td><input type="submit" name="Submit" value="Cập nhật thông tin"></td>
      </tr>
  </table>  
</div>
</form>
    <?php
	}
}else{
	header("location:../index.php?page=MemDoc");
}
?>
