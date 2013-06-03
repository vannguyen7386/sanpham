<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/InfoModel.php';
    $conn = new Conection();
    $conn->Connected();
    
    $Info = new Info();
    $Content = $_POST['editor1'];
    $Info->updateIntroduce($Content);
    header('location:../../Introduction.php');
?>