<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    
    include'../Models/DisplayAll.php';
    include'../Models/MenuModel.php';
    $err = "";
    $Menu = new Menu();
    if(isset($_GET['Id'])){
        $Id = $_GET['Id']; 
        $Menu->DelItemBot($Id);
        header("location:../../MenuBot.php");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $Menu->DelItemBot($Id);	
        	}	
        	header("location:../../MenuBot.php");	
        }else{
        	$err = "Bạn chưa chọn Item cần xóa";
        	header("location:../../MenuBot.php?err=$err");	
        }
    }
?>