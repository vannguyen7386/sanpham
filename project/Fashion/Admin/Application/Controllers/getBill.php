<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $q = $_GET['q'];
    include'../Models/DisplayAll.php';
    include'../Models/Pagging.php';
	$Prod = new DisplayAll();
    $pagging = new Pagging(10,8);
    
    $query = "SELECT COUNT(*) FROM fas_bill"; 
    $string = "display={$q}&";
       
    if($q == "Date"){
        $sql = "SELECT * FROM fas_bill ORDER BY DateOrder DESC ";    
    }elseif($q == "OKStatus"){
        $query = "SELECT COUNT(*) FROM fas_bill WHERE Status='1'"; 
        $sql = "SELECT * FROM fas_bill WHERE Status='1' ORDER BY DateOrder DESC "; 
    }elseif($q == "NoStatus"){
        $query = "SELECT COUNT(*) FROM fas_bill WHERE Status='0'"; 
        $sql = "SELECT * FROM fas_bill WHERE Status='0' ORDER BY DateOrder DESC ";  
    }
        
        $pageNum = $pagging->get_Page($query);
        $display = $pagging->get_display();
        $start = $pagging->get_start();
        $sql .= "LIMIT {$start},{$display}";
    $rows = $Prod->display($sql);
    include'../Views/ViewOrder.php';
?>
<div id="Pagging">   
    <?php  
        include'ControlPagProd.php';
    ?>    
</div>