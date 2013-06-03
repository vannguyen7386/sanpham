<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update san pham</title>
</head>

<body>
<?php 
include("../../Connect.php");
$err ="";
$flag=true;
$success = "Update thành công";		
if(isset($_POST['ProductName']) and !empty($_POST['ProductName'])){//Kiểm tra trường tên sản phẩm nhập vào rỗng. Nếu rỗng không update
	$query = "UPDATE sanpham SET TenSP = '".$_POST['ProductName']."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");		
}

if(isset($_POST['ProductPrice']) and !empty($_POST['ProductPrice']) and $_POST['ProductPrice'] >=0){//Kiểm tra trường giá nhập vào rỗng. Giá phải  lớn hơn(=)0
	$query = "UPDATE sanpham SET Gia = '".$_POST['ProductPrice']."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}

if(isset($_POST['ProductColor']) and !empty($_POST['ProductColor'])){//Kiểm tra trường màu sản phẩm nhập vào rỗng.
	$query = "UPDATE sanpham SET Mausac = '".$_POST['ProductColor']."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}

//So sánh mã loại sản phẩm và tên loại sản phẩm để lấy mã loại sản phẩm
$queryType = mysql_query("SELECT MaLSP FROM loaisp WHERE TenLSP='".$_POST['ProductType']."'") or die ("Không thể kết nối dữ liệu");

$rows = mysql_fetch_array($queryType);
if($rows){
	$ProductTypeID = $rows[0];
	$query = "UPDATE sanpham SET MaLSP = '".$ProductTypeID."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");
}

//So sánh mã nhà cung cấp và tên nhà cung cấp để lấy mã nhà cung cấp
$queryProducer = mysql_query("SELECT MaNCC FROM nhacc WHERE TenNCC='".$_POST['Producer']."'") or die ("Không thể kết nối dữ liệu");
$rows_Producer = mysql_fetch_array($queryProducer);
if($rows_Producer){
	$ProducerID = $rows_Producer[0];
	$query = "UPDATE sanpham SET MaNCC = '".$ProducerID."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");
}

$ProductState = $_POST['ProductState'];
$BestBuy =(isset($_POST['BestBuy']))?$_POST['BestBuy']:0;
$New=(isset($_POST['New']))?$_POST['New']:0;
$VIP=(isset($_POST['VIP']))?$_POST['VIP']:0;
$Sale=(isset($_POST['Sale']))?$_POST['Sale']:0;	
$SaleIndex = 0;
if($Sale != 0 and isset($_POST['SaleIndex'])){
	$SaleIndex = $_POST['SaleIndex'];
}

if(isset($_POST['Detail']) and !empty($_POST['Detail'])){//Kiểm tra trường mô tả sản phẩm. Rỗng không update
	$query = "UPDATE sanpham SET Mota = '". nl2br($_POST['Detail'])."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");	
}

$Ngaynhap = $_POST['Year']."-".$_POST['Month']."-".$_POST['Day'];	
$query = "UPDATE sanpham 
		SET Trangthai = '".$ProductState."', isBestBuy = '".$BestBuy."',isNew = '".$New."',isVIP = '".$VIP."',isSale = '".$Sale."',GiaKM = '".$SaleIndex."',Ngaynhap='".$Ngaynhap."' 
		WHERE MaSP = '".$_POST['ProductID']."'";

mysql_query($query) or die ("Không thể kết nối dữ liệu");	
		
//Upload file
if(($_FILES['file']['type']=='image/gif') or 
	($_FILES['file']['type']=='image/jpeg') or 
	($_FILES['file']['type']=='image/pjpeg') and
	($_FILES['file']['size'] < 25000)){
	if($_FILES['file']['error'] > 0){
		$err .= "Lỗi upload ảnh";
		$flag=false;
		
	}else{
		if(file_exists("../../Image/Product/".$_FILES['file']['name'])){
			$err .= "File ảnh đã tồn tại";
		}else{
			move_uploaded_file($_FILES['file']['tmp_name'],"../../Image/Product/".$_FILES['file']['name']);
		}
	}	
}else{
	if($_FILES['file']['type']!="")
		$err.="Không đúng định dạng";
	$flag = false;
}	
if($flag){
	$query = "UPDATE sanpham SET Picture = '".$_FILES['file']['name']."' WHERE MaSP = '".$_POST['ProductID']."'";
	mysql_query($query) or die ("Không thể kết nối dữ liệu");		
}
if($err !=""){
	header("location:../index.php?page=ProductMan&err=$err");
}else{
	header("location:../index.php?page=ProductMan&success=$success");
}
	
?>
</body>
</html>
