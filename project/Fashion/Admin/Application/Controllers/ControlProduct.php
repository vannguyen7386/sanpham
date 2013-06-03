<?php
	$Prod = new DisplayAll();
    $pagging = new Pagging(10,8);
    $query = "SELECT COUNT(*) FROM fas_product";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    
    $sql = "SELECT * FROM fas_product ORDER BY DateAdd DESC LIMIT {$start},{$display}";
    $string="";
    if(isset($_REQUEST['display'])){
        $q = $_REQUEST['display']; 
        if($q == "DescPrice")
            $sql = "SELECT * FROM fas_product ORDER BY ProdPrice DESC LIMIT {$start},{$display}";  
        elseif($q == "AscPrice")
            $sql = "SELECT * FROM fas_product ORDER BY ProdPrice ASC LIMIT {$start},{$display}";  
        elseif($q == "OKStatus"){  
            $query = "SELECT COUNT(*) FROM fas_product WHERE Inventory > 0";
            $pageNum = $pagging->get_Page($query);
            $display = $pagging->get_display();
            $start = $pagging->get_start();
            $sql = "SELECT * FROM fas_product WHERE Inventory > 0 ORDER BY DateAdd DESC LIMIT {$start},{$display}";
        }elseif($q == "NoStatus"){
            $query = "SELECT COUNT(*) FROM fas_product WHERE Inventory = 0";
            $pageNum = $pagging->get_Page($query);
            $display = $pagging->get_display();
            $start = $pagging->get_start();    
            $sql = "SELECT * FROM fas_product WHERE Inventory = 0 ORDER BY DateAdd DESC LIMIT {$start},{$display}";
        }elseif($q == "Mark")
            $sql = "SELECT * FROM fas_product ORDER BY Mark DESC LIMIT {$start},{$display}";
        
        $string = "display={$q}&";
    }
    if(isset($_POST['SearchValue'])){
        $searchValue = $_POST['SearchValue'];
        $query = "SELECT COUNT(*) FROM fas_product WHERE ProdID LIKE '{$searchValue}'";
        $pageNum = $pagging->get_Page($query);
        $display = $pagging->get_display();
        $start = $pagging->get_start();
        $sql = "SELECT * FROM fas_product WHERE ProdID LIKE '{$searchValue}' ORDER BY ProdPrice DESC LIMIT {$start},{$display}";
    }
    $rows = $Prod->display($sql);
    include'Application/Views/ViewProduct.php';
?>