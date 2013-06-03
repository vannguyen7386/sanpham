<?php
    $payment = new DisplayAll();
    $sql = "SELECT ContentPayment FROM fas_introduction WHERE ID = 1";
    $row = $payment->displaySingle($sql);
    $Cont = $row[0];
    if(!isset($_REQUEST['success']))
        echo "<p style='text-align:justify;margin:20px;'>$Cont</p>";
    include'Application/Views/FormPayment.php';
?>
