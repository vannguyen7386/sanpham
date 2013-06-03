<?php
	$Prod = new DisplayAll();
    $sql = "SELECT * FROM fas_typeprod ORDER BY TypeID";
    $rows = $Prod->display($sql);
    include'Application/Views/ViewTypeProd.php';
?>