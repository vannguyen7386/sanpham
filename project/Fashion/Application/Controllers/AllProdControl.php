<?php
    include'Application/Models/Pagging.php';
	$Prod = new DisplayAll();
    $pagging = new Pagging(20,8);
    $query = "SELECT COUNT(*) FROM fas_product";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    
    $sql = "SELECT * FROM fas_product ORDER BY DateAdd DESC LIMIT {$start},{$display}";
    $string="";
    if(isset($_REQUEST['display'])){
        $q = $_REQUEST['display'];
        if($q == "Date")
            $sql = "SELECT * FROM fas_product ORDER BY DateAdd DESC LIMIT {$start},{$display}";  
        elseif($q == "DescPrice")
            $sql = "SELECT * FROM fas_product ORDER BY ProdPrice DESC LIMIT {$start},{$display}";  
        elseif($q == "AscPrice")
            $sql = "SELECT * FROM fas_product ORDER BY ProdPrice ASC LIMIT {$start},{$display}"; 
        elseif($q == "Mark")
            $sql = "SELECT * FROM fas_product ORDER BY Mark DESC LIMIT {$start},{$display}";  
        $string = "display={$q}&";
    }
    
    $rowsMainProd = $Prod->display($sql);
    include'Application/Views/ViewProd.php';
?>
