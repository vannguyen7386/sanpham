<?php
	$Prod = new DisplayAll();
    $sql = "SELECT * FROM fas_cate_prod ORDER BY CateID";
    $rows = $Prod->display($sql);
    include'Application/Views/ViewCate.php';
?>