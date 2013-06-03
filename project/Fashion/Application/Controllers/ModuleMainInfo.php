<?php
	$MainInfo = new DisplayAll();
    $rowsMainInfo = $MainInfo->ModuleMainInfo($row['Quantity'],$row['ModuleID']);
    include'Application/Views/ViewMainInfo.php';	
?>