<?php
	$Prod = new DisplayAll();
    include'Application/Models/Pagging.php';
    $pagging = new Pagging(21,8);
    $query = "SELECT COUNT(*) FROM fas_product WHERE MainProd = '1'";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    $sql = "SELECT * FROM fas_product WHERE Newest = '1' ORDER BY DateAdd LIMIT $start,$display";
    $rowsMainProd = $Prod->display($sql);
    include'Application/Views/ViewProd.php';
?>