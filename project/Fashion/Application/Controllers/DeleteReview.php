<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    $review = new DisplayAll();
    if(isset($_REQUEST['id'])){
        $id = $review->sqlQuote($_REQUEST['id']);
        $sql = "SELECT ProdID FROM fas_reviews WHERE ID={$id}";
        $row = $review->displaySingle($sql);
        $ProdID = $row['ProdID'];
        $review->deleteReview($id);
        header("location:../../Chi tiet san pham.php?ProdID={$ProdID}");      
    }
    
?>