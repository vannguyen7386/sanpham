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
        $rowsProd = $Prod->getProdIdByTypeId($Id);
        foreach($rowsProd as $rowProd){
            $ProdId = $rowProd['ProdID'];
            $Prod->delProd($ProdId);
        }
        $Prod->delType($Id);
        header("location:../../TypeProd.php?success=Thành công");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
                $rowsProd = $Prod->getProdIdByTypeId($Id);
                foreach($rowsProd as $rowProd){
                    $ProdId = $rowProd['ProdID'];
                    $Prod->delProd($ProdId);
                }
                $Prod->delType($Id);	
        	}	
        	header("location:../../TypeProd.php?success=Xóa thành công");	
        }else{
        	$err = "Bạn chưa chọn Type cần xóa";
        	header("location:../../TypeProd.php?err=$err");	
        }
    }
?>