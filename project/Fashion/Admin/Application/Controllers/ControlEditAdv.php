<?php
    $ID = $_REQUEST['Id'];
    $Adv = new DisplayAll();
    $sql = "SELECT * FROM fas_adv WHERE ID={$ID}";
    $row = $Adv->displaySingle($sql);
    include'Application/Views/ViewEditAdv.php';
?>