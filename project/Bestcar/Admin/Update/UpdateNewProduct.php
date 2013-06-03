<?php ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
//Xử lý form
include("../../Connect.php");
$err ="";
$flag = true;
$ProductID ="";
$ProductName="";
$ProductType ="";
$Producer ="";
$ProductState="";
$ProductColor="";
$Detail="";
$Ngaynhap="";
$file="";
if(isset($_POST['ProductID']) and !empty($_POST['ProductID'])){
	$se_query = "SELECT MaSP FROM sanpham WHERE MaSP = '".$_POST['ProductID']."'";
	if(check_exist($se_query)){
		$err = "Mã sản phẩm đã tồn tại<br>";
		$flag=false;
	}else{
		$ProductID = $_POST['ProductID'];
	}
}else{
	$err="Không được để trống Mã sản phẩm<br>";
	$flag = false;
}
if(isset($_POST['ProductName']) and !empty($_POST['ProductName'])){
	$ProductName=$_POST['ProductName'];
}else{
	$flag= false;
	$err.="Không được để trống tên sản phẩm<br>";
}
if(isset($_POST['ProductType']))
	$ProductType =$_POST['ProductType'];
$ProductPrice=(isset($_POST['ProductPrice']) and !empty($_POST['ProductPrice']) and (float)$_POST['ProductPrice']>=0)?$_POST['ProductPrice']:0;
if(isset($_POST['Producer']))
	$Producer =$_POST['Producer'];
if(isset($_POST['ProductState']))
	$ProductState =$_POST['ProductState'];	
if(isset($_POST['ProductColor']))
	$ProductColor=$_POST['ProductColor'];
$BestBuy =(isset($_POST['BestBuy']))?$_POST['BestBuy']:0;
$New=(isset($_POST['New']))?$_POST['New']:0;
$VIP=(isset($_POST['VIP']))?$_POST['VIP']:0;
$Sale=(isset($_POST['Sale']))?$_POST['Sale']:0;	
$SaleIndex=(isset($_POST['SaleIndex']))?$_POST['SaleIndex']:0;
if(isset($_POST['Detail']))
	$Detail=nl2br($_POST['Detail']);
if(isset($_POST['Day']) and isset($_POST['Month']) and isset($_POST['Year']))	
	$Ngaynhap = $_POST['Year']."-".$_POST['Month']."-".$_POST['Day'];	
	
//Upload file
if(isset($_FILES['file']['type'])){
	if(($_FILES['file']['type']=='image/gif') or 
		($_FILES['file']['type']=='image/jpeg') or 
		($_FILES['file']['type']=='image/pjpeg') and
		($_FILES['file']['size'] < 25000)){
		if($_FILES['file']['error'] > 0){
			$err .= "Lỗi upload ảnh";
		}else{
			if(file_exists("../../Image/Product/".$_FILES['file']['name'])){
				$err .= "File ảnh đã tồn tại";
			}else{
				move_uploaded_file($_FILES['file']['tmp_name'],"../../Image/Product/".$_FILES['file']['name']);
			}
		}	
	}else{
		if($_FILES['file']['type'] !="")
			$err.="Không đúng định dạng";	
	}
	$file=$_FILES['file']['name'];
}
if($flag){
	$query= "INSERT INTO sanpham 
	VALUES ('".$ProductID."','".$ProductName."',".$ProductPrice.",'".$ProductState."','".$ProductType."','".$Producer."','".$ProductColor."','".$BestBuy."','".$New."','".$VIP."'
	,'".$Sale."','".$SaleIndex."','".$Detail."','".$Ngaynhap."','".$file."')";
	mysql_query($query) or die("Không thể kết nối dữ liệu");
	header("location:../index.php?page=ProductMan&success=Thêm sản phẩm thành công");
}else{
	header("location:../index.php?page=AddProduct&err=$err");
}	

?>	