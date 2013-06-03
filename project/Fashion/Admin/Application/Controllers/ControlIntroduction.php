<?php
	include'Application/Models/InfoModel.php';
    $Info = new Info();
    $Content = $Info->getIntro();
    include'Application/Views/ViewIntroduction.php';
?>