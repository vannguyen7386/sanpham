<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $Id = $_GET['q'];
    include'../Models/DisplayAll.php';
    $Prod = new DisplayAll();
    $sql = "SELECT COUNT(*) FROM fas_product WHERE ProdID='{$Id}'";
    if($Prod->checkExist($sql)){
        $flag = false;
        echo "<span style='color:red;margin-left:200px'>Trùng mã sản phẩm</span>";
    }else{
        $flag = true;
        echo "<span style='color:green;margin-left:200px'>Mã sản phẩm phù hợp</span>";
    }
?>
