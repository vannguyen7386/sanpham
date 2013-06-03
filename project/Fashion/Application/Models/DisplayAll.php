<?php
	class DisplayAll
    {
        public function display($sql){
            $query = mysql_query($sql) or die(mysql_error());
            $arr = array();
            while($rows = mysql_fetch_array($query)){
                $arr[] = $rows;
            }
            return $arr;    
        }
         public function displaySingle($sql){
            $query = mysql_query($sql) or die('Could not connect database');
            $row = mysql_fetch_array($query);
            return $row;    
        }
        
        public function ModuleMainProd($quantity)
        {
            $sql = "SELECT * FROM fas_product WHERE MainProd = '1' ORDER BY ProdID LIMIT ".$quantity."";
            return $this->display($sql);
        }
        
        public function ModuleMainInfo($quantity,$moduleID)
        {
            $sql = "SELECT * FROM fas_extra_info WHERE ModuleID = ".$moduleID." ORDER BY InfoID LIMIT ".$quantity."";
            return $this->display($sql);
        }
        public function checkExist($sql){
            $query = mysql_query($sql) or die('Could not connect database');
            $row = mysql_fetch_array($query);
            if($row[0]>0)
                return true;
            else
                return false;
        }
        public function insertContact($Heading,$Name,$Email,$Phone,$Content){
            $sql = "INSERT INTO fas_contact VALUES(NULL,'{$Name}','{$Email}','{$Phone}','{$Heading}','{$Content}',CURDATE())";  
            mysql_query($sql) or die('Could not inserted value');
            return;          
        }
        public function insertPayment($Name,$Email,$Phone,$Address,$Content){
            $sql = "INSERT INTO fas_bill VALUES(NULL,'{$Name}','{$Email}','{$Phone}','{$Address}','{$Content}',CURDATE(),'0','0')";  
            mysql_query($sql) or die('Could not inserted value');
            return;          
        }
        public function get_BillId($Name){
            $query = "SELECT BillID FROM fas_bill WHERE Name = '{$Name}' ORDER BY BillID DESC LIMIT 1";
            $query = mysql_query($query) or die('Could not connect database');
            $rows = mysql_fetch_array($query);
            return $rows[0];  
        }
        public function get_ProdId($Id){
            $arr_id=explode(",",$Id); 
            return $arr_id;    
        }
        public function get_ProdQty($Quantity){
            $arr_Qty=explode(",",$Quantity); 
            return $arr_Qty;    
        }
        public function get_Price($Prodid){
            $query = "SELECT ProdPrice FROM fas_product WHERE ProdID = '{$Prodid}'"; 
            $query = mysql_query($query) or die ('Could not connect database');
            $Price = mysql_fetch_array($query);
            return $Price[0];   
        }
        
        public function insertBillDetail($ProdId,$BillId,$Price,$Quantity){
            $sql = "INSERT INTO fas_bill_detail VALUES('{$ProdId}',{$BillId},{$Price},{$Quantity})";
            mysql_query($sql) or die('Could not inserted value');
            return;       
        }
        public function sqlQuote( $value ){
            $value = addslashes( $value );      
            $value = mysql_real_escape_string( $value );
            return $value; 
        }
        public function insertReview($Name,$Email,$Content,$ProdId){
            $sql = "INSERT INTO fas_reviews VALUES(NULL,'{$Name}','{$Email}',CURDATE(),'{$Content}','{$ProdId}')";
            mysql_query($sql) or die('Could not inserted value');
            return;    
        }
        public function updateReview($ID,$Content){
            $sql = "UPDATE fas_reviews SET Content='{$Content}' WHERE ID={$ID}";
            mysql_query($sql) or die('Could not inserted value');
            return;    
        }
        public function deleteReview($ID){
            $sql = "DELETE FROM fas_reviews WHERE ID={$ID}";
            mysql_query($sql) or die('Could not deleted value');
            return;    
        }
    }
?>