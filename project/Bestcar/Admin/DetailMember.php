
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#DetailProduct{
		width:500px;
		overflow:hidden;
		margin:15px auto;
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
if(isset($_REQUEST['MaTV'])){
	$f_query = "SELECT *,DATE_FORMAT(NgayDK,'%d/%m/%Y') AS ngay_dk, DATE_FORMAT(Ngaysinh,'%d/%m/%Y') AS ngay_sinh ,YEAR(Ngaysinh) AS Namsinh FROM thanhvien
				WHERE MaTV = '".$_REQUEST['MaTV']."'";	
	$result = mysql_query($f_query);
	$rows = mysql_fetch_array($result);
	if($rows){
				
?>
<div class="title">Hồ sơ thành viên</div>
<div id="DetailProduct">
    <table width="409" height="368" border="0" align="center">
	 <tr bgcolor="#32ADD9">
       <td height="34" colspan="2" class="bold"><div align="center" style="font-size:17px; font-weight:bold; color:#FFFFFF"><?php echo $rows['TenDN'] ?></div></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td width="169" height="26" class="bold">Mã thành viên: </td>
        <td width="168"><?php echo $rows['MaTV']; ?></td>
      </tr>
      <tr  bgcolor="#CCCCCC">
        <td class="bold">Tên truy cập: </td>
        <td><?php echo $rows['TenDN'] ?></td>
      </tr>
      <tr  bgcolor="#CCCCCC">
        <td class="bold">Password: </td>
        <td><?php echo $rows['Matkhau'] ?></td>
      </tr>
      <tr  bgcolor="#CCCCCC">
        <td class="bold">Họ tên:</td>
        <td><?php echo $rows['Hoten']; ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Email: </td>
        <td><?php echo $rows['Email'] ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Giới tính: </td>
        <td><?php echo $rows['Gioitinh'] ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Ngày sinh: </td>
        <td><?php echo $rows['ngay_sinh'] ?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Tuổi: </td>
        <td><?php $Age = (date("Y") - $rows['Namsinh']);
					echo $Age;?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Địa chỉ: </td>
        <td><?php 
		echo $rows['Diachi'];
		?></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td class="bold">Điện thoại: </td>
        <td><?php 
		echo $rows['Phone'];
		?></td>
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
  </table>
    <?php
	}
}
?>
	<div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay về</a></div>
</div>
