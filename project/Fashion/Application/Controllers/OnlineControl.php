<?php
    $sql = "SELECT * FROM fas_online ORDER BY ID";
	$Online = new DisplayAll();
    $rows = $Online->display($sql);
    include'Application/Views/ViewOnline.php';
?>