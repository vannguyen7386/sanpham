
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="wrap">
	<div class="top">
		Thanh toán và giao hàng
	</div>
	
<style>
	.signIn a{
		 color:#33CCCC !important;
		 font-weight:bold;
		 text-decoration:none;	
	}
	.signIn a:hover,active{
		text-decoration:underline;
	}
	
	.signIn .input{
		width:200px;
		height:17px;
		background:#FFFFCC;
		border:1px solid #999999;
		-moz-border-radius:3px;
		font-size:11px;
	}	
	.signIn .input:hover{
		background:#00CCFF;
	}
	.signIn .submit{
		width:75px !important;
		height:21px;
		background:url(Image/Login.gif);
		display:block;
	}
	.signIn .submit:hover{
		background:url(Image/Login_hover.gif);	
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

function submitForm(){
		document.Formlogin.submit();
}
</script>	
<?php 
	if(!isset($_SESSION['username'])){
?>		
	<p style="margin:20px; font-size:15px">Bạn vui lòng đăng nhập website để thực hiện chức năng thanh toán</p>
	<fieldset style="width:500px;">
	<legend style="color:lightgreen;font-size:14px;">Login</legend>
	<?php if(isset($_REQUEST['Error'])){
			echo"<p style='color:red; text-align:center;font-size:14px;'>".$_REQUEST['Error']."</p>";
		}	?>
	<form name="Formlogin" method="post" action="checkedLogin.php?cart" onsubmit="return checkForm()">
	<div class="signIn">
	<table width="479" border="0" style="color:#FFFFFF;font-weight:bold;">
  <tr>
    <td width="120" height="38">Tên đăng nhập: </td>
    <td width="370"><input name="username" type="text" size="25" onfocus="resetUser()" value="" class="input"/><br /><span id="errorUser" style="color:red"></span></td>
  </tr>
  <tr>
    <td height="37">Mật khẩu: </td>
    <td><input name="password" type="password" size="30" class="input"><br /><span id="errorPass" style="color:#FF0000"></span></td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td><input type="submit" value="Đăng nhập" /></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td><a  href="index.php?page=signup">+Đăng kí tài khoản</a></td>
  </tr>
</table>
</div>
</form>
	</fieldset>
	
<?php		
	}else{
		if(isset($_POST['Submit'])){
			$Name =NULL;
			$Address = NULL;
			$Phone = NULL;
			$err = NULL;
			$flag = true;
			$email = NULL;
			if(isset($_POST['Name']) and !empty($_POST['Name'])){
				$Name = $_POST['Name'];	
			}else{
				$err .= "Bạn chưa nhập họ tên<br>";
				$flag = false;
			}
			if(isset($_POST['Address']) and !empty($_POST['Address'])){
				$Address = $_POST['Address'];
			}else{
				$err .= "Bạn chưa nhập địa chỉ<br>";
				$flag = false;
			}
			if(isset($_POST['Phone']) and !empty($_POST['Phone'])){
				$Phone = $_POST['Phone'];
			}else{
				$err .= "Bạn chưa nhập số điện thoại<br>";
				$flag = false;
			}
			if(isset($_POST['Email']) and !empty($_POST['Email'])){
				$email = $_POST['Email'];
			}else{
				$err .= "Bạn chưa nhập email<br>";
				$flag = false;
			}
			$method = NULL;
			if(isset($_POST['method'])){
				$method = $_POST['method'];
			}
			if($flag){
				$getID_query = "SELECT MaTV FROM thanhvien WHERE TenDN = '".$_SESSION['username']."'";
				$sqlID = mysql_query($getID_query);
				$result = mysql_fetch_array($sqlID);
				
				$query = "INSERT INTO hoadon 
				VALUES (NULL,".$result['MaTV'].",'".$Name."','".$Phone."','".$Email."',NOW(), INTERVAL 7 DAY + CURDATE(), '".$method."','0','".$Address."')";
				mysql_query($query)or die ("Không thể kết nối dữ liệu");
				
				$De_query = "SELECT MAX(MaHD) as Id FROM hoadon WHERE MaTV=".$result['MaTV'];
				$De_sql = mysql_query($De_query) or die ("Không thể kết nối dữ liệu");
				$rows = mysql_fetch_array($De_sql);	
		
				$arr_id=explode(",",$_SESSION["CartId"]);
				$arr_qty=explode(",",$_SESSION["CartQty"]);
				
				for($i=0;$i<count($arr_id)-1;$i++){
					$Product_qr = mysql_query("SELECT Gia From sanpham WHERE MaSP='".$arr_id[$i]."'");
					$result = mysql_fetch_array($Product_qr); 
					$query = "INSERT INTO chitiethoadon VALUES(".$rows['Id'].",'".$arr_id[$i]."',".$result['Gia'].",".$arr_qty[$i].")";
					mysql_query($query) or die ("không thể kết nối dữ liệu");
				}
				header('location:index.php?page=DiOrder');
				
			}else{
				echo"<p align='center' style='color:red'>$err</p>";	
			}
		}	
	
?>		
			<h3 align="center" style="color:#FFFFFF; margin-top:25px;">Địa chỉ thanh toán và giao hàng</h3>
			<div style="color:#FFFFFF;width:225px;float:left; margin:0 10px 0 20px">
			<?php 
				$query = "SELECT * FROM thanhvien WHERE TenDN='".$_SESSION['username']."'";
				$sql = mysql_query($query) or die ("Không thể kết nối dữ liệu");
				$rows = mysql_fetch_array($sql);
			?>
			<h4>Thông tin tài khoản</h4>
			<p>Họ và tên: <?php echo "<span style='font-weight:bold'>".$rows['Hoten']."</span>" ?></p>	
			<p>Địa chỉ: <?php echo "<span style='font-weight:bold'>".$rows['Diachi']."</span>" ?></p>
			<p>Điện thoại: <?php echo "<span style='font-weight:bold'>".$rows['Phone']."</span>" ?></p>
			<p>Email: <?php echo "<span style='font-weight:bold'>".$rows['Email']."</span>" ?></p>
			</div>
			<div style="color:#FFFFFF;width:300px;overflow:hidden;line-height:10px">
			<form name="buycart" action="index.php?page=BuyCart" method="post">
			<h4>Địa chỉ giao hàng</h4>
			<p>Họ và tên:<span style="color:#FF0000">(*)</span> <input type="text" name="Name" size="40" style="margin-top:6px;" value="<?php echo $rows['Hoten'];?>"/></p>	
			<p>Địa chỉ:<span style="color:#FF0000">(*)</span> <textarea name="Address" cols="30" rows="5" style="margin-top:6px;"><?php echo $rows['Diachi'];?></textarea></p>
			<p>Điện thoại:<span style="color:#FF0000">(*)</span> <input type="text" name="Phone" size="40" style="margin-top:6px;" value="<?php echo $rows['Phone'];?>"/></p>
			<p>Email:<span style="color:#FF0000">(*)</span> <input type="text" name="Email" size="40" style="margin-top:6px;" value="<?php echo $rows['Email'];?>"/></p>
			<p>Phương thức giao hàng: <select name="method" style="margin-top:6px;" ><option value="style1">Nhân viên công ty giao hàng</option>
			
													<option value="style2">Khách hàng đến Công ty nhận hàng</option>
										</select></p>
			<p><input type="submit" value="Mua hàng" name="Submit" /></p>							
			</form>
			</div>	
<?php	
	}
?>
</div>