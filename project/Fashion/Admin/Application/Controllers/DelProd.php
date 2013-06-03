<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    
    include'../Models/DisplayAll.php';
    include'../Models/ProductModel.php';
    $err = "";
    $Prod = new Product();
    if(isset($_GET['Id'])){
        $Id = $_GET['Id']; 
        $Prod->DelMark($Id);
        $Prod->DelReview($Id);
        $Prod->delProd($Id);
        header("location:../../Product.php?success=Thành công");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $Prod->DelMark($Id);
                $Prod->DelReview($Id);
                $Prod->delProd($Id);	
        	}	
        	header("location:../../Product.php?success=Xóa thành công");	
        }else{
        	$err = "Bạn chưa chọn sản phẩm cần xóa";
        	header("location:../../Product.php?err=$err");	
        }
    }
?>