<?php
    $MenuTop = new DisplayAll();
    $sqlNavi = "SELECT * FROM fas_menutop ORDER BY TopID";
    $rowsNavi = $MenuTop->display($sqlNavi);
    include'Application/Views/ViewMenutop.php';	
?>