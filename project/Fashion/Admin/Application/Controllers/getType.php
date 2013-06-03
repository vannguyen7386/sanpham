<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $q = $_GET['q'];
    include'../Models/ProductModel.php';
    $product = new Product();
    $rowsType = $product->getTypeByCateId($q);
    include'../Views/VIewType.php';
?>
