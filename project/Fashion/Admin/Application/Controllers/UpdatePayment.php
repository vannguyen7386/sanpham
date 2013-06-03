<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/InfoModel.php';
    include'../Models/DisplayAll.php';
    $conn = new Conection();
    $conn->Connected();
    
    $Info = new Info();
    $Content = $_POST['editor1'];
    $Info->updateIntroPayment($Content);
    header('location:../../Order.php');
?>