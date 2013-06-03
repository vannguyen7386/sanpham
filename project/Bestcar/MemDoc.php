
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	a.change{
		padding:5px;
		color:#FFFFFF !important;
		text-decoration:none;
		font-size:15px;
	}
	a.change:hover{
		text-decoration:underline;
		color:lightgreen !important;
	}
	.bold{
		font-weight:bold;
	}
</style>	
<div id="wrap">
	<div class="top">
		Hồ sơ thành viên
	</div>
	
<?php
if(isset($_SESSION['username'])){
	if($_SESSION['Quyen'] == '1'){
		header("location:Admin/index.php?page=AdmDocument");
	}
	$f_query = "SELECT *,DATE_FORMAT(NgayDK,'%d/%m/%Y') AS ngay_dk,
				YEAR(Ngaysinh) AS Namsinh,
				MONTH(Ngaysinh) AS Thangsinh,
				DAY(Ngaysinh) AS Ngay_sinh 
				FROM thanhvien
				WHERE TenDN = '".$_SESSION['username']."'";	
	$result = mysql_query($f_query);
	$rows = mysql_fetch_array($result);
	if($rows){
				
?><div align="center">
<a href="index.php?page=Change&field=pass" class="change">Thay đổi mật khẩu</a> <span style="color:#FFFFFF; font-size:15px">|</span>
<a href="index.php?page=Change&field=email" class="change" >Thay đổi email</a>
</div>
<form action="UpdateMem.php" method="post" name="PrivDoc">
<div id="DetailProduct">
<?php 
	if(isset($_REQUEST['err'])){
		echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
	}
	if(isset($_REQUEST['success'])){
		echo"<div align='center' style='color:lightgreen;font-size:14px'>".$_REQUEST['success']."</div>";
	}		

?>
    <table width="486" height="472" border="1"  align="center" style="margin-top:30px; color:#FFFFFF;" cellpadding="7">
	 <tr bgcolor="#1172E1">
       <td height="34" colspan="2" class="bold"><div align="center" style="font-size:17px; font-weight:bold; color:#FFFFFF"><?php echo $rows['TenDN'] ?></div></td>
      </tr>
      <tr >
        <td width="200" height="33" class="bold" align="right">Mã thành viên: </td>
        <td width="276"><?php echo $rows['MaTV']; ?></td>
      </tr>
      <tr >
        <td class="bold" align="right">Tên truy cập: </td>
        <td><input type="text" value="<?php echo $rows['TenDN'] ?>" name="User"  disabled="disabled" size="36" /></td>
      </tr>

<script language="JavaScript" type="text/javascript">
	x = document.PrivDoc;
	function getName(){
		if(x.name.value==""){
			x.name.value="<?php echo $rows['Hoten']; ?>";
		}
	}
</script>
      <tr>
        <td class="bold" align="right">Họ tên thành viên:</td>
        <td><input name="name" type="text"  onBlur="getName()" value="<?php echo $rows['Hoten']; ?>" size="36"></td>
      </tr>
      <tr>
        <td class="bold" align="right">Email: </td>
        <td><?php echo $rows['Email'] ?></td>
      </tr>
      <tr >
        <td class="bold" align="right">Giới tính: </td>
        <td>Nam: <input type="radio" name="gender" value="Nam" <?php if ($rows['Gioitinh']=='Nam'){echo "checked='checked'";} ?> >
			Nữ: <input type="radio" name="gender" value="Nữ" <?php if ($rows['Gioitinh']=='Nữ'){echo "checked='checked'";} ?>>		</td>
      </tr>
      <tr>
        <td class="bold" align="right">Ngày sinh: </td>
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
      <tr >
        <td class="bold" align="right">Tuổi: </td>
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
      <tr>
        <td class="bold" align="right">Địa chỉ: </td>
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
      <tr>
        <td class="bold" align="right">Điện thoại: </td>
        <td><input type="text" value="<?php 
		echo $rows['Phone'];?>" 
		size="36" name="Phone" 
		onBlur="getPhone()"></td>
      </tr>
	  
      <tr >
        <td class="bold" align="right">Quyền hạn: </td>
        <td><?php 
		echo ($rows['Quyen']==1)?"<span style='color:green'>Admin</span>":"<span style='color:red'>User</span>";
		?></td>
      <tr >
        <td height="30" valign="top" class="bold" align="right">Ngày đăng kí: </td>
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
	header("location:index.php?page=login&Error=Bạn chưa đăng nhập");
}
?>

</div>

