<?php
	$News = new DisplayAll();
    $pagging = new Pagging(10,8);
    $query = "SELECT COUNT(*) FROM fas_extra_info WHERE ModuleID=6";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    
    $sql = "SELECT *,DATE_FORMAT(InfoDate,'%d/%m/%Y - %r') AS Date FROM fas_extra_info  WHERE ModuleID=6 ORDER BY InfoDate DESC LIMIT {$start},{$display}";
    $rows = $News->display($sql);
    include'Application/Views/ViewNews.php';
?>