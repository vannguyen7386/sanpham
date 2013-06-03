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
        $rowsType = $Prod->getTypeByCateId($Id);
        $rowsProd = $Prod->getProdIdByCateId($Id);
        foreach($rowsType as $rowType){
            $TypeID = $rowType['TypeID'];
            $Prod->delType($TypeID);
        }
        foreach($rowsProd as $rowProd){
            $ProdId = $rowProd['ProdID'];
            $Prod->delProd($ProdId);
        }
        $Prod->delCate($Id);
        header("location:../../Category.php?success=Thành công");
    }else{
        if(isset($_POST['check'])){
        	$Del = $_POST['check'];
        	for($i=0;$i < count($Del);$i++){
                $Id = $Del[$i];
       	        $rowsType = $Prod->getTypeByCateId($Id);
                $rowsProd = $Prod->getProdIdByCateId($Id);
                foreach($rowsType as $rowType){
                    $TypeID = $rowType['TypeID'];
                    $Prod->delType($TypeID);
                }
                foreach($rowsProd as $rowProd){
                    $ProdId = $rowProd['ProdID'];
                    $Prod->delProd($ProdId);
                }
                $Prod->delCate($Id);	
        	}	
        	header("location:../../Category.php?success=Xóa thành công");	
        }else{
        	$err = "Bạn chưa chọn cate cần xóa";
        	header("location:../../Category.php?err=$err");	
        }
    }
?>