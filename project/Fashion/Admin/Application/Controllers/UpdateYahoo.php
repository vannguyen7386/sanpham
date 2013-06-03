<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/DisplayAll.php';
    $conn = new Conection();
    $conn->Connected();

    $YahooName1 = $_POST['YahooName1'];
    $YahooName2 = $_POST['YahooName2'];
    $Name1 = $_POST['Name1'];
    $Name2 = $_POST['Name2'];  
    $Phone1 = $_POST['Phone1'];
    $Phone2 = $_POST['Phone2'];
    $online = new DisplayAll();
    $online->updateYahoo(1,$YahooName1,$Name1,$Phone1);
    $online->updateYahoo(2,$YahooName2,$Name2,$Phone2); 
    header('location:../../Online.php?success=Thành công');     
                  
?>