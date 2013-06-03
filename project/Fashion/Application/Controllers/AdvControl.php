<?php
    $adv = new DisplayAll();
	$sql = "SELECT * FROM fas_adv WHERE Place='Right'";
    $rowAdvs = $adv->display($sql);
    include'Application/Views/ViewAdv.php';
?>