<?php
	$Menu = new DisplayAll();
    $sql = "SELECT * FROM fas_menubot ORDER BY ID";
    $rows = $Menu->display($sql);
    include'Application/Views/ViewMenubot.php';
?>