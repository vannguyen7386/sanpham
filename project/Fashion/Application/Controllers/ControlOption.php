<?php
	$sql = "SELECT * FROM fas_typeprod ORDER BY CateID ASC";
    $NameType = new DisplayAll();
    $rowsOption = $NameType->display($sql);
    include'Application/Views/ViewOption.php';
?>