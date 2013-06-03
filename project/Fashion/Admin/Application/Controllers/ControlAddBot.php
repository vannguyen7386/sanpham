<?php
	$Menu = new DisplayAll();
    $sqlLink = "SELECT * FROM fas_link ORDER BY ID";
    $rowsLink = $Menu->display($sqlLink);
    include'Application/Views/ViewAddBot.php';
?>
