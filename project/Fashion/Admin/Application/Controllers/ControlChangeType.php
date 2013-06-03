<?php
    include'Application/Models/ProductModel.php';
    $ID = $_REQUEST['Id'];
	$Prod = new DisplayAll();
    $sql = "SELECT * FROM fas_typeprod WHERE TypeID = {$ID}";
    $row = $Prod->displaySingle($sql);
    $product = new Product();
    $sqlCate = "SELECT * FROM fas_cate_prod ORDER BY CateID";
    $rowsCate = $Prod->display($sqlCate);
    include'Application/Views/ViewEditType.php';
?>