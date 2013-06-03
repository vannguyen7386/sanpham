
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#Login{
		width:725px;
		margin:0;
		margin-top:50px;
		color:#FFFFFF;
	}
	#Login a{
		color:lightgreen;
		text-decoration:none;
	}
	#Login a:hover,active{
		text-decoration:underline;
	}
	fieldset{
		width:400px;
		margin:20px auto;
		border:1px solid #CCCCCC;
		-moz-border-radius:5px;
	}
	#Login legend{
		font-size:16px;
		font-weight:bold;
		color:lightgreen;
	}
	#Login h2{
		text-align:center;
		font-weight:normal;
	}
</style>
<script language="javascript">
function checkForm(){
	var x= document.Formlogin;
	if(x.username.value == ""){
		var error = "(*)Ban chua nhap username";
		document.getElementById("errorUser").innerHTML = error;
		return false;
	}
	if(x.password.value == ""){
		var error = "(*)Ban chua nhap password";
		document.getElementById("errorPass").innerHTML = error;
		return false;
	}	
	return true;
}
function resetUser(){
	document.getElementById("errorUser").innerHTML = "";
	document.Formlogin.username.value="";
}
function resetPass(){
	document.getElementById("errorPass").innerHTML = "";
	document.Formlogin.password.value="";
}

</script>
<?php if(isset($_SESSION['username'])){
		header("location:index.php");
	}
?>
<div id="Login">
<h2>Đăng nhập</h2>
<?php 
	//Hiển thị lỗi đăng nhập
	if(isset($_REQUEST['Error'])){
		echo"<p style='color:red; text-align:center;font-size:14px;'>".$_REQUEST['Error']."</p>";
	}	
	$user = "";
	$pass = "";
	
	//lấy Cookie để hiển thị trong textbox khi check vào ghi nhớ đăng nhập
	if(isset($_COOKIE['username']) && $_COOKIE['password']){
		$user = $_COOKIE['username'];
		$pass = $_COOKIE['password'];
	}
?>
<fieldset ><legend>Login</legend>
<form name="Formlogin" method="post" action="checkedLogin.php" onsubmit="return checkForm()">
<table width="338" height="159">
	<tr>
	<td width="121" height="36" valign="top">Tên đăng nhập: </td>
	<td width="205" valign="top"><input name="username" type="text" size="25" onfocus="resetUser()" value="<?php echo $user; ?>"/><br /><span id="errorUser" style="color:red"></span></td>
	</tr>
	<tr>
	  <td height="27" valign="top">Mật khẩu: </td>
	  <td valign="top"><input name="password" type="password" size="25" onfocus="resetPass()" value="<?php echo $pass; ?>"/><br /><span id="errorPass" style="color:#FF0000"></span></td>
	  </tr>
	<tr>
	  <td height="22">Ghi nhớ : </td>
	  <td><input type="checkbox" name="save_user" value="yes" /></td>
	  </tr>
	<tr>
	  <td height="26"><div align="left"></div></td>
	  <td><input type="submit" name="Submit" value="Login" /></td>
	</tr>
	<tr>
	  <td height="21" colspan="2"><a href="index.php?page=signup">Đăng kí thành viên</a></td>
	  </tr>
</table>
</form>
</fieldset>
</div>