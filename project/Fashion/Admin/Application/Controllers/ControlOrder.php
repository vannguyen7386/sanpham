<?php
	$Bill = new DisplayAll();
    $pagging = new Pagging(10,8);
    $query = "SELECT COUNT(*) FROM fas_bill";
    $pageNum = $pagging->get_Page($query);
    $display = $pagging->get_display();
    $start = $pagging->get_start();
    
    $sql = "SELECT * FROM fas_bill ORDER BY DateOrder DESC LIMIT {$start},{$display}";
    $string="";
    if(isset($_REQUEST['display'])){
        $q = $_REQUEST['display']; 
        if($q == "Date")
            $sql = "SELECT * FROM fas_bill ORDER BY DateOrder DESC LIMIT {$start},{$display}";  
        elseif($q == "OKStatus"){  
            $query = "SELECT COUNT(*) FROM fas_bill WHERE Status = '1'";
            $pageNum = $pagging->get_Page($query);
            $display = $pagging->get_display();
            $start = $pagging->get_start();
            $sql = "SELECT * FROM fas_bill WHERE Status = '1' ORDER BY DateOrder DESC LIMIT {$start},{$display}";
        }elseif($q == "NoStatus"){
            $query = "SELECT COUNT(*) FROM fas_bill WHERE Status = '0'";
            $pageNum = $pagging->get_Page($query);
            $display = $pagging->get_display();
            $start = $pagging->get_start();    
            $sql = "SELECT * FROM fas_bill WHERE WHERE Status = '0' ORDER BY DateOrder DESC LIMIT {$start},{$display}";
        }
        $string = "display={$q}&";
    }
 
    $rows = $Bill->display($sql);
    include'Application/Views/ViewOrder.php';
?>