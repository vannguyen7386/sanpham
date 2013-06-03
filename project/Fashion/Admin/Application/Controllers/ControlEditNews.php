<?php
    include'Application/Models/ExtraInfoModel.php';
    $ID = $_REQUEST['Id'];
	$News = new DisplayAll();
    $sql = "SELECT *,Date_format(InfoDate,'%d / %m / %Y - %r') as Date FROM fas_extra_info WHERE InfoID = '{$ID}'";
    $row = $News->displaySingle($sql);
    include'Application/Views/ViewEditNews.php';
?>