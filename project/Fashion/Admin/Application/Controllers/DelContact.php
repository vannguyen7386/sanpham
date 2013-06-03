<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    
    include'../Models/InfoModel.php';
    $err = "";
    $Info = new Info();
    if(isset($_GET['Id'])){
        $Id = $_GET['Id']; 
       $Info->DelContact($Id);
        header("location:../../Contact.php");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $Info->DelContact($Id);
        	}	
        	header("location:../../Contact.php");	
        }else{
        	$err = "Bạn chưa chọn Item cần xóa";
        	header("location:../../Contact.php?err=$err");	
        }
    }
?>