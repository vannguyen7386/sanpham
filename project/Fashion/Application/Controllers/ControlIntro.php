<?php
    $Intro = new DisplayAll();
    $sql = "SELECT Content FROM fas_introduction WHERE ID = 1";
    $row = $Intro->displaySingle($sql);
    $Cont = $row[0];
    echo "<p style='text-align:justify;margin:20px;'>$Cont</p>";
?>
