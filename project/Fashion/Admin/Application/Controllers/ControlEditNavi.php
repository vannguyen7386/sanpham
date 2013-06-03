<?php
    include'Application/Models/MenuModel.php';
    $ID = $_REQUEST['Id'];
	$Menu = new DisplayAll();
    $sql = "SELECT * FROM fas_menutop WHERE TopID = {$ID}";
    $row = $Menu->displaySingle($sql);
    $Navi = new Menu();
    $sqlLink = "SELECT * FROM fas_link ORDER BY ID";
    $rowsLink = $Menu->display($sqlLink);
    include'Application/Views/ViewEditNavi.php';
?>