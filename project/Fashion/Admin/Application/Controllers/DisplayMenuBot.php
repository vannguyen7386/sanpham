<?php
	$navi = new DisplayAll();
    $sql = "SELECT * FROM fas_menubot ORDER BY ID";
    $rows = $navi->display($sql);
    require_once 'Application/Views/MenuBotView.php';	
?>