<?php
    $Adv = new DisplayAll();
    $sql = "SELECT * FROM fas_adv ORDER BY ID";
    $rows = $Adv->display($sql);
    include'Application/Views/ViewAdv.php';	
?>