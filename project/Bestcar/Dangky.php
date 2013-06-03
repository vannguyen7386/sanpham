
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Admin/css1.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<title>Untitled Document</title>
<script>
function checkuser()
{
	re=/^([A-Za-z]+\d*(\w*\_\w+)*){4,16}$/;
	a= document.formDangKy.username.value;
	if(a== "")
	{
		document.getElementById("loiuser").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(re.test(a)== false)
	{
		document.getElementById("loiuser").innerHTML= "<font color='red'>Tên đăng nhập phải bắt đầu là một chữ cái <br> và không có dấu cách</font>";
		return false;
	}else{
		document.getElementById("loiuser").innerHTML= "";
	}
}
function checkpass()
{
	re= /^(\w+(.\w*)*(\s\w+)*){5}$/;
	if(document.formDangKy.password.value== "")
	{
		document.getElementById("loipass").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(re.test(document.formDangKy.password.value)== false)
	{
		document.getElementById("loipass").innerHTML= "<font color='red'>Mật khẩu lớn hơn 4 <br>ký tự và bắt đầu là một chữ hoặc số</font>";
		//document.getElementById("password").focus();
		//document.getElementById("password").select();
		return false;
	}
	else
	{
		document.getElementById("loipass").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
	
}

function checkrepass()
{
	if(document.formDangKy.password2.value== "")
	{
		document.getElementById("loirepass").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}	
	if(document.formDangKy.password.value != document.formDangKy.password2.value)
	{
		document.getElementById("loirepass").innerHTML= "<font color='red'>Nhập lại mật khẩu phải giống mật khẩu ở trên!<br>Lưu ý: Mật khẩu phân biệt chữ HOA chữ thường</font>";
		return false;
	}
	else
	{
		document.getElementById("loirepass").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}

function checkname()
{
	a= document.formDangKy.name.value;
	
	if(document.formDangKy.name.value== "")
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(a.length <=4)
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Tên phải nhiều hơn 4 ký tự </font>";
		//document.getElementById("answer").focus();
		//document.getElementById("answer").select();
		return false;
	}
	else
	{
		document.getElementById("loiten").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkemail()
{
   email = document.formDangKy.email.value;
   re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.formDangKy.email.value== "")
	{
		document.getElementById("loiemail").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
   if (!re.test(email))
   {
      document.getElementById("loiemail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
    else
	{
		document.getElementById("loiemail").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}

function checkmobile()
{
	re= /^[0]{1}\d{1,3}\s?\d{7,9}$/;
	a= document.formDangKy.mobile.value;
	if(a== "")
	{
		document.getElementById("loimobile").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
		return true
	}
	else if(re.test(a)== false)
	{
		
		document.getElementById("loimobile").innerHTML= "<font color='red'>Số điện thoại phải theo dạng:<br />[Mã vùng] [Số điện thoại] hoặc [09x\/01xx] [xxxxxxx]</font>";
		
		return false;
	}
	else
	{
		document.getElementById("loifone").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkaddress()
{
	a= document.formDangKy.address.value;
	
	if(document.formDangKy.address.value== "")
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(a.length <=4)
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Địa chỉ phải nhiều hơn 4 ký tự</font>";s
		return false;
	}
	else
	{
		document.getElementById("loidiachi").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkForm()
{	
	re=/^([A-Za-z]+\d*(\w*\_\w+)*){4,16}$/;
	a= document.formDangKy.username.value;
	if(a== "")
	{
		document.getElementById("loiuser").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(re.test(a)== false)
	{
		document.getElementById("loiuser").innerHTML= "<font color='red'>Tên đăng nhập phải bắt đầu là một chữ cái <br> và không có dấu cách</font>";
		return false;
	}
	rePass= /^(\w+(.\w*)*(\s\w+)*){5}$/;
	if(document.formDangKy.password.value== "")
	{
		document.getElementById("loipass").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(rePass.test(document.formDangKy.password.value)== false)
	{
		document.getElementById("loipass").innerHTML= "<font color='red'>Mật khẩu lớn hơn 4 <br>ký tự và bắt đầu là một chữ hoặc số</font>";
		//document.getElementById("password").focus();
		//document.getElementById("password").select();
		return false;
	}
	if(document.formDangKy.password2.value== "")
	{
		document.getElementById("loirepass").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}	
	if(document.formDangKy.password.value != document.formDangKy.password2.value)
	{
		document.getElementById("loirepass").innerHTML= "<font color='red'>Nhập lại mật khẩu phải giống mật khẩu ở trên!<br>Lưu ý: Mật khẩu phân biệt chữ HOA chữ thường</font>";
		return false;
	}
	Name= document.formDangKy.name.value;
	
	if(document.formDangKy.name.value== "")
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(Name.length <=4)
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Tên phải nhiều hơn 4 ký tự </font>";
		//document.getElementById("answer").focus();
		//document.getElementById("answer").select();
		return false;
	}
	email = document.formDangKy.email.value;
   reEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.formDangKy.email.value== "")
	{
		document.getElementById("loiemail").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
   if (!reEmail.test(email))
   {
      document.getElementById("loiemail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
	rePhone= /^[0]{1}\d{1,3}\s?\d{7,9}$/;
	Phone= document.formDangKy.mobile.value;
	if(document.formDangKy.mobile.value != "" && rePhone.test(Phone)== false)
	{
		document.getElementById("loimobile").innerHTML= "<font color='red'>Số điện thoại phải theo dạng:<br />[Mã vùng] [Số điện thoại] hoặc [09x\/01xx] [xxxxxxx]</font>";
		return false;
	}	
	address= document.formDangKy.address.value;
	
	if(document.formDangKy.address.value== "")
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(address.length <=4)
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Địa chỉ phải nhiều hơn 4 ký tự</font>";s
		return false;
	}			
}

</script>
<link href="Admin/css/css1.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php 
	if(isset($_SESSION['username'])){
		header("location:index.php");
	}
?>
<div id="wrap">
	<div class="top">
		Đăng ký thành viên 
	</div>
	<?php 
		if(isset($_REQUEST['err'])){
			echo"<p align='center' style='color:red;margin-top:20px;font-size:14px'>".$_REQUEST['err']."</p>";
		}
	?>
<?php 
	$err=NULL;
	$accept = NULL;
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$query = "SELECT COUNT(TenDN) FROM thanhvien WHERE TenDN='".$username."'";
		if(check_exist($query)){
			$err="Tài khoản này đã tồn tại";
			/*header("location:index.php?page=signup&err=Tài khoản này đã tồn tại");	*/
		}else{
			$accept = "Chấp nhận";
			/*header("location:index.php?page=signup&accept=Chấp nhận&user=".$_POST['username']);	*/
		}
	}

?>
<form name="formDangKy" method="post" action="checkedReg.php" id="formDangKy" onSubmit="return checkForm()">
  <table width="723" height="97" border="0" align="center" cellpadding="0" cellspacing="10" class="viendk">
    <tr class="font">
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="font">
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="font">
      <td align="right"><span class="style1">*</span> Tên truy cập: </td>
      <td><input name="username" type="text" id="username" onBlur="checkuser()" value="<?php if(isset($accept) and isset($_POST['username'])){echo $_POST['username'];}?>"><input type="button" name"sumbit" value="Kiểm tra" 
	  		onClick="formDangKy.action='index.php?page=signup';document.formDangKy.submit()">
        <br />
		<span id="loiuser" ><?php 
		if(isset($err)) {
			echo "<span style='color:red'>".$err."</span>";
		}elseif(isset($accept)){
			echo "<span style='color:lightgreen'>".$accept."</span>";
		}
		?></span>  	  </td>
    </tr>
    
    <tr class="font">
      <td align="right"><span class="style1">*</span> Mật khẩu:</td>
      <td><input name="password" type="password" id="password" onBlur="checkpass()">
	  	<br />
		<span id="loipass"></span>	  </td>
    </tr>
    
    <tr class="font">
      <td align="right"><span class="style1">*</span> Xác nhận lại mật khẩu:</td>
      <td><input name="password2" type="password" id="password2" onBlur="checkrepass()">
	  	<br />
		<span id="loirepass"></span>	  </td>
    </tr>
    <tr class="font">
      <td align="right"><span class="style1">*</span> Tên đầy đủ: </td>
      <td><input name="name" type="text" id="name" onBlur="checkname()">
	 	 <br />
		 <span id="loiten"></span>	  </td>
    </tr>
    <tr class="font">
      <td align="right" class="style1">* <span class="font">Giới tính</span> </td>
      <td><select name="gioitinh" id="gioitinh">
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
      	</select>	  </td>
    </tr>
    <tr class="font">
      <td align="right"><span class="style1">*</span> Email: </td>
      <td><input name="email" type="text" id="email" onBlur="checkemail()">
	  	<br />
		<span id="loiemail"></span>	  </td>
    </tr>
    <tr class="font">
      <td align="right"> Mobile: </td>
      <td><input name="mobile" type="text" id="mobile" onBlur="checkmobile()">
	 	 <br />
			<span id="loimobile"></span>	</td>
    </tr>
    <tr class="font">
      <td align="right"><span class="style1">*</span> Địa chỉ: </td>
      <td><input name="address" type="text" id="address" size="40" onBlur="checkaddress()">
	  	<br />
		<span id="loidiachi"></span>	  </td>
    </tr>
    
    <tr class="font">
      <td align="right"><span class="style1">*</span> Ngày sinḥ: </td>
      <td>Ngày:<select name="Ngay">
	  <?php 
	  	for($i=1;$i<=31;$i++){
	  ?>
		<option value="<?php echo $i; ?>"><?php if($i<10){echo '0'.$i; }else{echo $i;} ?> </option>
	  
	  <?php }
	  ?>
      </select> 
        Tháng
        <select name="Thang">
		  <?php 
	  	for($i=1;$i<=12;$i++){
	  ?>
		<option value="<?php echo $i; ?>"><?php if($i<10){echo '0'.$i; }else{echo $i;} ?> </option>
	  
	  <?php }
	  ?>
        </select> 
        Năm      <select name="Nam">
		  <?php 
	  	for($i=Date("Y");$i>=1920;$i--){
	  ?>
		<option value="<?php echo $i; ?>"><?php echo $i;?> </option>
	  
	  <?php }
	  ?>
        </select>        </td>
    </tr>
    <tr class="font">
      <td align="right">&nbsp;</td>
      <td><input name="Submit" type="submit" value="Đăng ký">
        <input type="reset" name="Submit2" value="Làm lại"></td>
    </tr>
  </table>
</form>
</div>

</body>
</html>
