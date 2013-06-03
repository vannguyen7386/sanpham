<?php
    include'Application/Models/MenuModel.php';
    $ID = $_REQUEST['Id'];
	$Menu = new DisplayAll();
    $sql = "SELECT * FROM fas_menubot WHERE ID = {$ID}";
    $row = $Menu->displaySingle($sql);
    $Navi = new Menu();
    $sqlLink = "SELECT * FROM fas_link ORDER BY ID";
    $rowsLink = $Menu->display($sqlLink);
    include'Application/Views/ViewEditBot.php';
?>