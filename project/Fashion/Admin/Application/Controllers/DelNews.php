<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    
    include'../Models/ExtraInfoModel.php';
    $err = "";
    $News = new EtInfo();
    if(isset($_GET['Id'])){
        $Id = $_GET['Id']; 
        $News->DelNews($Id);
        header("location:../../News.php?success=Thành công");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $News->DelNews($Id);	
        	}	
        	header("location:../../News.php?success=Xóa thành công");	
        }else{
        	$err = "Bạn chưa chọn Bản tin cần xóa";
        	header("location:../../News.php?err=$err");	
        }
    }
?>