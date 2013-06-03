<?php
    include'Application/Models/ProductModel.php';
    $ID = $_REQUEST['Id'];
	$Prod = new DisplayAll();
    $sql = "SELECT * FROM fas_cate_prod WHERE CateID = {$ID}";
    $row = $Prod->displaySingle($sql);
    $product = new Product();
    $CateId = $row['CateID'];
    include'Application/Views/ViewEditCate.php';
?>