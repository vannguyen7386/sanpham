<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    $review = new DisplayAll();
    if(isset($_POST)){
        $ID = $_POST['ID'];
        $Content = $_POST['Content'];
        $review->updateReview($ID,$Content);
        $sql = "SELECT ProdID FROM fas_reviews WHERE ID={$ID}";
        $row = $review->displaySingle($sql);
        $ProdID = $row['ProdID'];
        header("location:../../Chi tiet san pham.php?ProdID={$ProdID}");    
    }
?>