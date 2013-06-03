<?php
    include'Application/Models/ProductModel.php';
    $ID = $_REQUEST['Id'];
	$Prod = new DisplayAll();
    $sql = "SELECT *,Date_format(DateAdd,'%d / %m / %Y') as date FROM fas_product WHERE ProdID = '{$ID}'";
    $row = $Prod->displaySingle($sql);
    $product = new Product();
    $CateId = $row['CateID'];
    $TypeID = $row['TypeID'];
    $sqlCate = "SELECT * FROM fas_cate_prod ORDER BY CateID";
    $rowsCate = $Prod->display($sqlCate);
    $rowsType = $product->getTypeByCateId($CateId);
    include'Application/Views/ViewEditProd.php';
?>