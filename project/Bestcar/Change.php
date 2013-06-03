
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#DetailProduct{
		width:600px;
		overflow:hidden;
		margin:30px auto;
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
	#errPass,#errNewPass,#errEmail,#errNewEmail{
		color:#FF0000 !important;
		line-height:15px;
	}
		
	legend{
		color:lightblue;
		font-size:14px;
		padding:10px;
	}	
	
.style1 {color: #FF0000}
</style>
<script>

function checkForm(){
	var x = document.changePass;
	if(x.Pass.value==""){
		document.getElementById("errPass").innerHTML="Không được để trống mật khẩu cũ";
		return false;
	}
	if(x.NewPass.value== ""){
		document.getElementById("errNewPass").innerHTML="Không được để trống mật khẩu mới";
		return false;
	}
	return true;
}
function resetPass(){
	document.getElementById("errPass").innerHTML = "";
}
function resetNewPass(){
	document.getElementById("errNewPass").innerHTML = "";
}


//Check email
function checkEmail(){
	var x = document.changeEmail;
   	re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(x.Email.value==""){
		document.getElementById("errEmail").innerHTML="Không được để trống Email cũ";
		return false;
	}
	if (!re.test(x.Email.value))
   	{
      document.getElementById("errEmail").innerHTML= "Sai địa chỉ email";
   	  return false;
    }
	if(x.Pass.value==""){
		document.getElementById("errPass").innerHTML="Không được để trống mật khẩu";
		return false;
	}
	if(x.NewEmail.value== ""){
		document.getElementById("errNewEmail").innerHTML="Không được để trống Email mới";
		return false;
	}
	if (!re.test(x.NewEmail.value))
   	{
      document.getElementById("errNewEmail").innerHTML= "Sai địa chỉ email";
   	  return false;
    }
	return true;
}
function resetEmail(){
	document.getElementById("errEmail").innerHTML = "";
}
function resetNewEmail(){
	document.getElementById("errNewEmail").innerHTML = "";
}	

</script>
<div id="wrap">
	
<?php 
	if(isset($_REQUEST['field']) and $_REQUEST['field']=='pass'){
?>		
		<div class="top">Đổi mật khẩu</div>
		<div id="DetailProduct">
		<?php if(isset($_REQUEST['err'])){
			echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
		}?>
		<fieldset style="width:500px"><legend>Change Password</legend>
		<form action="UpdateMem.php" method="post" name="changePass" onSubmit="return checkForm()">	
		  <table width="445" height="140" border="0" align="center" style="color:#FFFFFF;">
			  <tr>
				<td width="149" height="43" align="right" style="font-size:14px">Mật khẩu cũ: <span class="style1">(*) </span></td>
				<td width="286"><input name="Pass" type="password" size="30" onFocus="resetPass()" style="height:14px;"><br /><span id="errPass"></span></td>
				
			  </tr>
			  <tr>
				<td height="43" align="right" style="font-size:14px">Mật khẩu mới <span class="style1">(*) </span></td>
				<td><input name="NewPass" type="password" size="30" onFocus="resetNewPass()" style="height:14px;"><br /><span id="errNewPass"></span></td>
			  </tr>
			  <tr>
				<td height="46">&nbsp;</td>
				<td><input type="submit" name="ChangePass" value="Đổi mật khẩu"></td>
			  </tr>
		  </table>
		</form>	
		</fieldset>
		</div>	
<?php		
	}elseif(isset($_REQUEST['field']) and $_REQUEST['field']=='email'){
?>		
		<div class="top">Đổi email</div>
		<div id="DetailProduct">
<?php if(isset($_REQUEST['err'])){
			echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
}?>
	<fieldset style="width:500px"><legend>Change Email</legend>
		<form action="UpdateMem.php" method="post" name="changeEmail" onSubmit="return checkEmail()">	
		  <table width="445" height="185" border="0" align="center" style="color:#FFFFFF">
			  <tr>
				<td width="149" height="43" align="right" style="font-size:14px">Nhập email cũ: <span class="style1">(*) </span></td>
				<td width="286"><input name="Email" type="text" size="30" onFocus="resetEmail()" style="height:14px;"><br /><span id="errEmail"></span></td>
			  </tr>
			  <tr>
				<td width="149" height="43" align="right" style="font-size:14px">Mật khẩu: <span class="style1">(*) </span></td>
				<td width="286"><input name="Pass" type="password" size="30" onFocus="resetPass()" style="height:14px;"><br /><span id="errPass"></span></td>
			  </tr>
			  <tr >
				<td height="43" align="right" style="font-size:14px">Nhập email mới <span class="style1">(*) </span></td>
				<td><input name="NewEmail" type="text" size="30" onFocus="resetNewEmail()" style="height:14px;"><br /><span id="errNewEmail"></span></td>
			  </tr>
			  <tr>
				<td height="46">&nbsp;</td>
				<td><input type="submit" name="ChangeEmail" value="Đổi Email"></td>
			  </tr>
		  </table>
		</form>
	</fieldset>		
		</div>		
<?php		
	}else{
		echo"<h2 align='center'>Không tồn tại trang này</h2>";
	}
?>
</div>