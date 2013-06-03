<?php
	if(!isset($_REQUEST)){
	   header("location:index.php");
    }else{
        $SearchProd = new DisplayAll();
        $TypeID = null;
        $ProdName = null;
        if($_POST['SelectValue']=="None"){
            ?>
            <script>
                window.history.back();
            </script>
            
            <?php 
        }else{
            if(isset($_POST['SelectValue']) and  isset($_POST['Value'])){
                $TypeID = $SearchProd->sqlQuote($_POST['SelectValue']);
                $ProdName = $SearchProd->sqlQuote($_POST['Value']);
            }
            if(isset($_REQUEST['Id']) and isset($_REQUEST['Name'])){
                $TypeID = $SearchProd->sqlQuote($_REQUEST['Id']);
                $ProdName = $SearchProd->sqlQuote($_REQUEST['Name']);    
            }
            include'Application/Models/Pagging.php';
            $pagging = new Pagging(20,8);
            $query = "SELECT COUNT(*) FROM fas_product WHERE TypeID={$TypeID} AND ProdName LIKE '%{$ProdName}%'";
            if($TypeID == "All"){
                $query = "SELECT COUNT(*) FROM fas_product WHERE ProdName LIKE '%{$ProdName}%'"; 
            }
            $pageNum = $pagging->get_Page($query);
            $display = $pagging->get_display();
            $start = $pagging->get_start();
            if($TypeID == "All"){
                $sql = "SELECT * FROM fas_product WHERE ProdName LIKE '%{$ProdName}%' ORDER BY DateAdd DESC LIMIT {$start},{$display}";    
            }else{
                $sql = "SELECT * FROM fas_product WHERE TypeID={$TypeID} AND ProdName LIKE '%{$ProdName}%' ORDER BY DateAdd DESC LIMIT {$start},{$display}";
            }
            if($SearchProd->checkExist($query)){
                $rowsMainProd = $SearchProd->display($sql);
                include'Application/Views/ViewProd.php';
            }else{
                echo"<p class='red' align='center' style='margin-bottom:20px;'>Không tìm thấy sản phẩm</p>";
            }
        }
	}
?>