
<link href="Admin/css/css1.css" rel="stylesheet" type="text/css">
<script language="javascript">
function checkname()
{
	a= document.formLienHe.name.value;
	
	if(document.formLienHe.name.value== "")
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(a.length <=2)
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Tên phải nhiều hơn 2 ký tự </font>";
		return false;
	}
	else
	{
		document.getElementById("loiten").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkemail()
{
   a = document.formLienHe.email.value;
  re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.formLienHe.email.value== "")
	{
		document.getElementById("loiemail").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
   if (!re.test(a))
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
	a= document.formLienHe.mobile.value;
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
		document.getElementById("loimobile").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkaddress()
{
	a= document.formLienHe.address.value;
	
	if(document.formLienHe.address.value== "")
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(a.length <=4)
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Địa chỉ phải nhiều hơn 4 ký tự</font>";
		return false;
	}
	else
	{
		document.getElementById("loidiachi").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checknoidung()
{
	if(document.formLienHe.noidung.value== "")
	{
		document.getElementById("loinoidung").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	else
	{
		document.getElementById("loinoidung").innerHTML= "<font color='lightgreen'>Chấp nhận</font>";
	}
}
function checkForm(){
	a= document.formLienHe.name.value;
	
	if(document.formLienHe.name.value== "")
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(a.length <=2)
	{
		document.getElementById("loiten").innerHTML= "<font color='red'>Tên phải nhiều hơn 2 ký tự </font>";
		return false;
	}
	
	email = document.formLienHe.email.value;
   re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.formLienHe.email.value== "")
	{
		document.getElementById("loiemail").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
   if (!re.test( email))
   {
      document.getElementById("loiemail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
	reMobile= /^[0]{1}\d{1,3}\s?\d{7,9}$/;
	phone= document.formLienHe.mobile.value;
	if(document.formLienHe.mobile.value != "" && reMobile.test(phone)== false)
	{
		
		document.getElementById("loimobile").innerHTML= "<font color='red'>Số điện thoại phải theo dạng:<br />[Mã vùng] [Số điện thoại] hoặc [09x\/01xx] [xxxxxxx]</font>";
		
		return false;
	}
	address= document.formLienHe.address.value;
	
	if(document.formLienHe.address.value== "")
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	if(address.length <=4)
	{
		document.getElementById("loidiachi").innerHTML= "<font color='red'>Địa chỉ phải nhiều hơn 4 ký tự</font>";
		return false;
	}
	if(document.formLienHe.noidung.value== "")
	{
		document.getElementById("loinoidung").innerHTML= "<font color='red'>Phần này không được để trống</font>";
		return false;
	}
	
	
}
</script>
<style type="text/css">
<!--
.style3 {color: #FF0000}
-->
</style>
<div id="wrap">
<div class="top">
		  Liên hệ:
</div>
<?php 
		if(isset($_REQUEST['err'])){
			echo"<p align='center' style='color:red;margin-top:20px;font-size:14px'>".$_REQUEST['err']."</p>";
		}
		if(isset($_REQUEST['success'])){
			echo"<p align='center' style='color:lightgreen;margin-top:20px;font-size:14px'>".$_REQUEST['success']."</p>";
		}
?>
<?php
	$err=NULL;
	$accept = NULL;
?>
<form name="formLienHe" method="post" action="checkedCon.php" onsubmit="return checkForm()">
  <table width="500" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td class="font">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right" class="font"><span class="style1"><span class="style3">*</span></span> Tên đầy đủ<span class="style1">: </span></td>
      <td><input name="name" type="text" id="name" size="30" onblur="checkname()">
	  	<br />
		<span id="loiten"></span>	
	  </td>
    </tr>
    <tr class="fontLienHe">
      <td align="right" class="font style2"><span class="style3">*</span> Email: </td>
      <td><input name="email" type="text" size="30" onblur="checkemail()">
	  	<br />
		<span id="loiemail"></span>
	  </td>
    </tr>
    <tr class="fontLienHe">
      <td align="right" class="font style2">Điện thoại: </td>
      <td><input name="mobile" type="text" size="12" onblur="checkmobile()">
	  	<br />
		<span id="loimobile"></span>
	  </td>
    </tr>
    <tr class="fontLienHe">
      <td align="right" class="font style2"><span class="style3">*</span> Địa chỉ: </td>
      <td><input name="address" type="text" size="30" onblur="checkaddress()" >
	  	<br />
		<span id="loidiachi"></span>
	  </td>
    </tr>
    <tr class="fontLienHe">
      <td align="right" class="font style2"><span class="style3">*</span> Nội dung: </td>
      <td><textarea name="noidung" cols="28" rows="7" onblur="checknoidung()"></textarea>
	  	<br />
		<span id="loinoidung"></span>
	  </td>
    </tr>
    <tr class="fontLienHe">
      <td colspan="2" align="center" class="font style2"><input name="Submit" type="submit" class="style3" value="Gửi bài viết" />
        <input type="reset" name="Submit2" value="Nhập lại" /></td>
      </tr>
  </table>
</form>
</div>

