<?php
    include'Application/Models/Pagging.php';
    
    $Experience = new DisplayAll();
    $pagging = new Pagging(12,5);
    if(!isset($_REQUEST['Id'])){
        $query = "SELECT COUNT(*) FROM fas_extra_info WHERE ModuleID=6";
        $pageNum = $pagging->get_Page($query);
        $display = $pagging->get_display();
        $start = $pagging->get_start();
       
        
        $sql = "SELECT *,DATE_FORMAT(InfoDate,'%d/%m/%Y - %r') AS datetime FROM fas_extra_info WHERE ModuleID=6 ORDER BY InfoDate DESC  LIMIT {$start},{$display}";
        $rows = $Experience->display($sql);  
    }else{
        $ID = $Experience->sqlQuote($_REQUEST['Id']);
        $sql = "SELECT *,DATE_FORMAT(InfoDate,'%d/%m/%Y - %r') AS datetime FROM fas_extra_info WHERE InfoID = {$ID}";
        $row = $Experience->displaySingle($sql);      
    }
    include'Application/Views/ViewNews.php';
?>