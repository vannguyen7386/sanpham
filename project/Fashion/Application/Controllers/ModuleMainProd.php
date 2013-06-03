<?php
    $MainProd = new DisplayAll();
    $rowsMainProd = $MainProd->ModuleMainProd($row['Quantity']);
    include'Application/Views/ViewProd.php';	
?>