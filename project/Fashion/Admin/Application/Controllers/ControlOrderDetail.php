<?php
    include'Application/Models/ProductModel.php';
	$Order = new DisplayAll();
    $Prod = new Product();
    $ID = $_REQUEST['Id'];
    $sql = "SELECT * FROM fas_bill WHERE BillID={$ID}";
    $row = $Order->displaySingle($sql);
    
    $sqlDetail = "SELECT * FROM fas_bill_detail WHERE BillID={$ID}";
    $rowsDetail = $Order->display($sqlDetail);
    include'Application/Views/ViewDetail.php';
?>