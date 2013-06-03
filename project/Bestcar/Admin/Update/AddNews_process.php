<?php ob_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
//Xử lý form
include("../../Connect.php");
$err ="";
$flag = true;
$NewsID ="";
$NewsHeading="";
$NewsType ="";
$NewsTypeID="";
$NewsSummary ="";
$NewsContent="";
$file="";
$Copyright="";
if(isset($_POST['NewsID']) and !empty($_POST['NewsID'])){
	$se_query = "SELECT MaTT FROM tintuc WHERE MaTT = '".$_POST['NewsID']."'";
	if(check_exist($se_query)){
		$err = "Mã tin tức đã tồn tại<br>";
		$flag=false;
	}else{
		$NewsID = $_POST['NewsID'];
	}
}else{
	$err="Không được để trống Mã tin tức<br>";
	$flag = false;
}
if(isset($_POST['NewsHeading']) and !empty($_POST['NewsHeading'])){
	$NewsHeading=$_POST['NewsHeading'];
}else{
	$flag= false;
	$err.="Không được để trống tiêu đề<br>";
}
if(isset($_POST['NewsType']) and !empty($_POST['NewsType'])){
	$NewsType = $_POST['NewsType'];
}
if(isset($_POST['newTypeOfNews']) and !empty($_POST['newTypeOfNews'])){
	$NewsType = $_POST['newTypeOfNews'];	
	//Kiểm tra loại tin tức tồn tại trong CSDL:
	$check_query = "SELECT COUNT(TenLTT) FROM loaitt WHERE TenLTT LIKE '".$NewsType."'";
	if(!check_exist($check_query)){
		$query = "INSERT INTO loaitt VALUES (Null,'".$NewsType."')";	
		mysql_query($query) or die ("Không thể kết nối dữ liệu");	
	}	
}
if(!empty($NewsType)){
	$getID_query = mysql_query("SELECT MaLTT FROM loaitt WHERE TenLTT LIKE '".$NewsType."'");	
	$result = mysql_fetch_array($getID_query);
	if($result){
		$NewsTypeID = $result['MaLTT'];
	}else{
		$flag = false;
		$err .= "Không thể up loại tin  này<br>";
	}	
}else{
	$flag=false;
	$err .="Không được để trống loại tin tức<br>";
}							
if(isset($_POST['NewsSummary']) and !empty($_POST['NewsSummary'])){
	$NewsSummary = nl2br($_POST['NewsSummary']);
}

if(isset($_POST['NewsContent'])){
	$NewsContent = nl2br($_POST['NewsContent']);
}
if(isset($_POST['Copyright']) and !empty($_POST['Copyright'])){
	$Copyright =$_POST['Copyright'];	
}else{
	$flag= false;
	$err.="Không được để trống bản quyền<br>";
}
			
//Upload file
if(isset($_FILES['file']['type'])){
	if(($_FILES['file']['type']=='image/gif') or 
		($_FILES['file']['type']=='image/jpeg') or 
		($_FILES['file']['type']=='image/pjpeg') and
		($_FILES['file']['size'] < 25000)){
		if($_FILES['file']['error'] > 0){
			$err .= "Lỗi upload ảnh <br>";
		}else{
			if(file_exists("../../Image/News/".$_FILES['file']['name'])){
				$err .= $_FILES['file']['name']." File ảnh đã tồn tại<br>";
			}else{
				move_uploaded_file($_FILES['file']['tmp_name'],"../../Image/News/".$_FILES['file']['name']);
			}
		}	
	}else{
		if($_FILES['file']['type'] !="")
			$err.= $_FILES['file']['name']." Không đúng định dạng<br>";	
	}
	$file=$_FILES['file']['name'];
} 
/* Upload Category */
for($i=1;$i<=$_POST['numPic'];$i++){
	if(isset($_FILES['fileCat'.$i.'']['type']) and !empty($_FILES['fileCat'.$i.'']['type'])){
		if(($_FILES['fileCat'.$i.'']['type']=='image/gif') or 
			($_FILES['fileCat'.$i.'']['type']=='image/jpeg') or 
			($_FILES['fileCat'.$i.'']['type']=='image/pjpeg') and
			($_FILES['fileCat'.$i.'']['size'] < 25000)){
			if($_FILES['fileCat'.$i.'']['error'] > 0){
				$err .= "Lỗi upload ảnh <br>";
			}else{
				move_uploaded_file($_FILES['fileCat'.$i.'']['tmp_name'],"../../Image/News/".$_FILES['fileCat'.$i.'']['name']);
				$sql = mysql_query("INSERT INTO picture VALUES (Null,'".$NewsID."','".$_FILES['fileCat'.$i.'']['name']."')");
			}	
		}else{
			$err.= $_FILES['fileCat'.$i.'']['name']." Không đúng định dạng<br>";	
		}
	}		
}

if($flag){
	$query= "INSERT INTO tintuc 
				VALUES ('".$NewsID."','".$NewsHeading."','".$NewsSummary."','".$NewsContent."','".$Copyright."',CURDATE(),'".$NewsTypeID."','".$file."')";
	mysql_query($query) or die("Không thể kết nối dữ liệu");
	 header("location:../index.php?page=NewsMan&success=Thêm bản tin thành công");  
}else{
	 header("location:../index.php?page=AddNews&err=$err");  
}	
?>	