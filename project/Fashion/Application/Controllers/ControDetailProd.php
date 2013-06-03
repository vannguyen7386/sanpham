<?php
    include'Application/Models/Pagging.php';
    $ID = mysql_real_escape_string($_REQUEST['ProdID']);
	$disp = new DisplayAll();
    $sql = "SELECT COUNT(*) FROM fas_product WHERE ProdID = '$ID'";
    if(!$disp->checkExist($sql)){
        echo "<p style='color:red' align='center'>Sản phẩm này không tồn tại</p>";    
    }else{
        $CountReviewSql = "SELECT COUNT(*) FROM fas_reviews WHERE ProdID = '$ID'";
        $CountReview = $disp->displaySingle($CountReviewSql); 
        $pagging = new Pagging(12,5);
        $pageNum = $pagging->get_Page($CountReviewSql);
        $display = $pagging->get_display();
        $display = $disp->sqlQuote($display);
        $start = $pagging->get_start();
        $start = $disp->sqlQuote($start);
        $next = $pagging->get_next();
        $prev =$pagging->get_prev();
        $current = $pagging->get_current();	
        $list = $pagging->get_list();
        $div = $pagging->get_div();	
        
        $query = "SELECT * FROM fas_product WHERE ProdID='$ID'";
        $row = $disp->displaySingle($query);
        $reviewSql = "SELECT *,DATE_FORMAT(Date,'%d/%m/%Y') AS date_add  FROM fas_reviews WHERE ProdID='$ID' ORDER BY Date DESC LIMIT {$start},{$display}";
        $rowReviews = $disp->display($reviewSql);  
        $CountReviewSql = "SELECT COUNT(*) FROM fas_reviews WHERE ProdID = '$ID'";
        $CountReview = $disp->displaySingle($CountReviewSql); 
        include'Application/Views/ViewSingleProd.php';         
    }
?>