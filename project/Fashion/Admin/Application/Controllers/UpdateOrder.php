<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/DisplayAll.php';
    include'../Models/ProductModel.php';
    $conn = new Conection();
    $conn->Connected();
    
    $Order = new DisplayAll();
    $Id = $_REQUEST['Id'];
    $err = "";
    $Prod = new Product();
    
    $sql = "SELECT * FROM fas_bill_detail WHERE BillID={$Id}";
    $rows = $Order->display($sql);
    foreach($rows as $row){
        $inven = $Order->CalInventory($row['ProdID'],$row['Quantity']);
        if($inven >=0){
            $Order->UpdateInven($inven,$row['ProdID']);    
        }else{
            $err .="Mã sản phẩm {$row['ProdID']} số lượng không còn đủ trong kho <br />";
        }
    }
    if(!empty($err)){
        $err .= "Hóa đơn này không thể duyệt";
        header("location:../../OrderDetail.php?err={$err}&Id={$Id}");
    }else{
        $Order->updateOrder($Id);
        header("location:../../Order.php");
    }
?>