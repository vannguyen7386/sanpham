<?php
    $contact = new DisplayAll();
    $sql = "SELECT Contact FROM fas_introduction WHERE ID = 1";
    $row = $contact->displaySingle($sql);
    $Cont = $row[0];
    echo "<p style='text-align:justify;margin:20px;'>$Cont</p>";
    include'Application/Views/FormContact.php';
?>
