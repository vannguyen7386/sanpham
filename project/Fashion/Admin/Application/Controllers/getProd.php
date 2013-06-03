<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $q = $_GET['q'];
    include'../Models/DisplayAll.php';
    include'../Models/Pagging.php';
	$Prod = new DisplayAll();
    $pagging = new Pagging(10,8);
    
    $query = "SELECT COUNT(*) FROM fas_product"; 
    $string = "display={$q}&";
       
    if($q == "DescPrice"){
        $sql = "SELECT * FROM fas_product ORDER BY ProdPrice DESC ";    
    }elseif($q == "AscPrice"){
        $sql = "SELECT * FROM fas_product ORDER BY ProdPrice ASC "; 
    }elseif($q == "OKStatus"){
        $query = "SELECT COUNT(*) FROM fas_product WHERE Inventory > 0"; 
        $sql = "SELECT * FROM fas_product WHERE Inventory > 0 ORDER BY DateAdd DESC "; 
    }elseif($q == "NoStatus"){
        $query = "SELECT COUNT(*) FROM fas_product WHERE Inventory = 0"; 
        $sql = "SELECT * FROM fas_product WHERE Inventory = 0 ORDER BY DateAdd DESC "; 
    }elseif($q == "Mark"){   
        $sql = "SELECT * FROM fas_product ORDER BY Mark DESC "; 
    }
        
        $pageNum = $pagging->get_Page($query);
        $display = $pagging->get_display();
        $start = $pagging->get_start();
        $sql .= "LIMIT {$start},{$display}";
    $rows = $Prod->display($sql);
    include'../Views/ViewProduct.php';
?>
<div id="Pagging">   
    <?php  
        include'ControlPagProd.php';
    ?>    
</div>