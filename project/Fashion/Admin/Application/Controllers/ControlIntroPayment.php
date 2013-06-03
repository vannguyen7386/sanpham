<?php
	include'Application/Models/InfoModel.php';
    $Info = new Info();
    $Content = $Info->getIntroPayment();
    include'Application/Views/ViewIntroPayment.php';
?>