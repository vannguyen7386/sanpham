<?php
    $advBot = new DisplayAll();
	$sql = "SELECT * FROM fas_adv WHERE Place='Bottom'";
    $rowAdvs = $advBot->display($sql);
    include'Application/Views/ViewAdvBot.php';
?>