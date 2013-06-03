<?php
    $MenuTop = new DisplayAll();
    $sqlBot = "SELECT * FROM fas_menubot ORDER BY ID";
    $rowsBot = $MenuTop->display($sqlBot);
    include'Application/Views/ViewMenubot.php';	
?>