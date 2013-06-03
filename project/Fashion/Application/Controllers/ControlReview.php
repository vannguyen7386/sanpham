<?php
    $review = new DisplayAll();
    $ID = $review->sqlQuote($_REQUEST['Id']);
    
    $session_mark = new beingOnline();
    $session_mark->set_session();
    $session = $session_mark->getSession();
    $IdSe = $session_mark->getSeID();
    $sql = "SELECT Rank FROM fas_mark WHERE ID={$IdSe} AND ProdID='$ID'";
    $row = $review->displaySingle($sql);
    include'Application/Views/ViewReview.php';
?>