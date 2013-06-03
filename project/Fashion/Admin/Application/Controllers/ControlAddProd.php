<?php
    include'Application/Models/ProductModel.php';
	$Prod = new DisplayAll();
   
    $product = new Product();
    $sqlCate = "SELECT * FROM fas_cate_prod ORDER BY CateID";
    $rowsCate = $Prod->display($sqlCate);
    $sqlMinCate = "SELECT MIN(CateID) FROM fas_cate_prod";
    $rowMin = $Prod->displaySingle($sqlMinCate);
    $CateId = $rowMin[0];
    $rowsType = $product->getTypeByCateId($CateId);
    include'Application/Views/ViewAddProd.php';
?>