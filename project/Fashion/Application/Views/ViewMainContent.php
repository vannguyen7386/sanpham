<?php
	foreach($rows as $row)
    {
        if($row['Style'] == 'Style1'){
            echo"<div class ='MenuFirst'>";
            echo"<h2>".$row['ModuleName']."</h2>";
            include'Application/Controllers/ModuleMainProd.php';
        }elseif($row['Style'] == 'Style2'){
            echo"<div class = 'MenuSecond'>";
            echo"<h2>".$row['ModuleName']."</h2>";
            include'Application/Controllers/ModuleMainInfo.php'; 
        }
        echo "<div style='clear:both;'></div>";
        echo"</div>";
    }
?>
