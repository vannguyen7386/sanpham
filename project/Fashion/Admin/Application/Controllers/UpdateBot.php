<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/MenuModel.php';
    include'../Models/DisplayAll.php';
    $conn = new Conection();
    $conn->Connected();
    
    $Menu = new Menu();
    $Name = $_POST['Name'];
    $link = $_POST['Link'];
    $Id = $_POST['Id'];	
    $Menu->UpdateItemBot($Id,$Name,$link);
    header('location:../../MenuBot.php');
?>