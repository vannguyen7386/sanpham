<?php
    require_once 'Application/Models/DisplayAll.php';
    $navi = new DisplayAll();
    $sql = "SELECT * FROM fas_menutop ORDER BY TopID";
    $rows = $navi->display($sql);
    require_once 'Application/Views/NaviView.php';	
?>