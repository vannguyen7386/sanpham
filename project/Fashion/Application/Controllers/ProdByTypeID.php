<?php
    include'Application/Models/Pagging.php';
	$Prod = new DisplayAll();
    $pagging = new Pagging(20,8);
    $query = "SELECT COUNT(*) FROM fas_product WHERE TypeID=".$Prod->sqlQuote($_REQUEST['TypeID']);
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    
    $sql = "SELECT * FROM fas_product WHERE TypeID=".(int)$TypeID." ORDER BY DateAdd DESC LIMIT {$start},{$display}";
    $string="TypeID=".$_REQUEST['TypeID']."&";
    if(isset($_REQUEST['display'])){
        $q = $Prod->sqlQuote($_REQUEST['display']);
        if($q == "Date")
            $sql = "SELECT * FROM fas_product WHERE TypeID=".$Prod->sqlQuote($_REQUEST['TypeID'])." ORDER BY DateAdd DESC LIMIT {$start},{$display}";
        elseif($q == "DescPrice")
            $sql = "SELECT * FROM fas_product WHERE TypeID=".$Prod->sqlQuote($_REQUEST['TypeID'])." ORDER BY ProdPrice DESC LIMIT {$start},{$display}";
        elseif($q == "AscPrice")
            $sql = "SELECT * FROM fas_product WHERE TypeID=".$Prod->sqlQuote($_REQUEST['TypeID'])." ORDER BY ProdPrice ASC LIMIT {$start},{$display}";
        $string = "display={$q}&TypeID=".$_REQUEST['TypeID']."&";
    }
    
    $rowsMainProd = $Prod->display($sql);
    include'Application/Views/ViewProd.php';
?>
