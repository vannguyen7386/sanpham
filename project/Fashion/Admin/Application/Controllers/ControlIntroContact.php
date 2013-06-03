<?php
	include'Application/Models/InfoModel.php';
    $Info = new Info();
    $Content = $Info->getIntroContact();
    include'Application/Views/ViewIntroContact.php';
?>