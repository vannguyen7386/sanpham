<?php
	$Online = new DisplayAll();
    $sql = "SELECT * FROM fas_online ORDER BY ID";
    $rows = $Online->display($sql);
    include'Application/Views/VIewOnline.php';
?>