<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    
    include'../Models/DisplayAll.php';
    include'../Models/ProductModel.php';
    $err = "";
    $Order = new DisplayAll();
    if(isset($_GET['Id'])){
        $Id = $_GET['Id']; 
        $Order->DelBill($Id);
        $Order->DelBillDetail($Id);
        header("location:../../Order.php?success=Thành công");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $Order->DelBill($Id);
                $Order->DelBillDetail($Id);	
        	}	
        	header("location:../../Order.php?success=Xóa thành công");	
        }else{
        	$err = "Bạn chưa chọn đơn hàng cần xóa";
        	header("location:../../Order.php?err=$err");	
        }
    }
?>