<?php
    $TopContent = new DisplayAll();
    $sql = "SELECT * FROM fas_extra_info WHERE Slide ='1'";
    $rows = $TopContent->display($sql);
    include'Application/Views/ViewTopContent.php';
?>