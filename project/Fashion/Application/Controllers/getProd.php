
<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    $q = $_GET['q'];
    include'../Models/DisplayAll.php';
    include'../Models/Pagging.php';
	$Prod = new DisplayAll();
    $pagging = new Pagging(20,8);
    $str = "";
    $extLink = "";
    $arr_id = null;
    $arr_qty = "";
    if(isset($_SESSION['CartQty']) and isset($_SESSION['CartId'])){
        $arr_id = explode(",",$_SESSION['CartId']);
        $arr_qty = explode(",",$_SESSION['CartQty']);
    }
    
    if(isset($_REQUEST['TypeID'])){
        $extLink = "TypeID=".$_REQUEST['TypeID']."&";
        $str = " WHERE TypeID=".$Prod->sqlQuote($_REQUEST['TypeID']);
    }elseif(isset($_REQUEST['CateID'])){
        $extLink = "CateID=".$_REQUEST['CateID']."&";
        $str = " WHERE CateID=".$Prod->sqlQuote($_REQUEST['CateID']);
    }
    $query = "SELECT COUNT(*) FROM fas_product".$str; 
    $string = "display={$q}&".$extLink;
    if($q=="Date"){
        $sql = "SELECT * FROM fas_product".$str." ORDER BY DateAdd DESC ";     
    }elseif($q == "DescPrice"){
        $sql = "SELECT * FROM fas_product".$str." ORDER BY ProdPrice DESC ";    
    }elseif($q == "AscPrice"){
        $sql = "SELECT * FROM fas_product".$str." ORDER BY ProdPrice ASC ";       
    }elseif($q == "Mark"){   
        $sql = "SELECT * FROM fas_product".$str." ORDER BY Mark DESC "; 
    }
        $pageNum = $pagging->get_Page($query);
        $display = $pagging->get_display();
        $start = $pagging->get_start();
        $sql .= "LIMIT {$start},{$display}";
    $rowsMainProd = $Prod->display($sql);
    include'../Views/ViewProd.php';
?>
<div id="Pagging">   
    <?php  
        include'ControlPagging.php';
    ?>    
</div>