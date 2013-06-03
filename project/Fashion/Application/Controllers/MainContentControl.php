<?php
    $sql = "SELECT * FROM fas_module WHERE Display='Main' ORDER BY ModuleID";
    $content = new DisplayAll();
    $rows =$content->display($sql);
    include'Application/Views/ViewMainContent.php';
?>