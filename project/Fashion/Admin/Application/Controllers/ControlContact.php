<?php
    $pagging = new Pagging(10,8);
    $query = "SELECT COUNT(*) FROM fas_contact";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    $Contact = new DisplayAll();
    $sql = "SELECT *,DATE_FORMAT(Date,'%d / %m / %Y') AS DateSend FROM fas_contact ORDER BY Date DESC LIMIT {$start},{$display}";
    $rows = $Contact->display($sql);
    include'Application/VIews/ViewContact.php';
?>