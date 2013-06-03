<?php
    Class Product{
        Private $Id;
        Private $Name;
        Private $Price;
        Private $Image;
       
        public function setID($Id){
            $this->Id = $Id;
        }
        public function delProd($Id){
            $sql = "DELETE FROM fas_product WHERE ProdID = '{$Id}'";
            return mysql_query($sql) or die('Could not Deleted');
        }
        public function delType($Id){
            $sql = "DELETE FROM fas_typeprod WHERE TypeID = '{$Id}'";
            return mysql_query($sql) or die('Could not Deleted');
        }
        public function delCate($Id){
            $sql = "DELETE FROM fas_cate_prod WHERE CateID = '{$Id}'";
            return mysql_query($sql) or die('Could not Deleted');
        }
        public function getNameType($Id){
            $sql = "SELECT TypeName FROM fas_typeprod WHERE TypeID={$Id}";
            $sql = mysql_query($sql) or die('Could not selected');    
            $row = mysql_fetch_array($sql);
            return $row[0];
        }
        public function getProdById($Id){
            $sql = "SELECT * FROM fas_product WHERE ProdID='{$Id}'";
            $sql = mysql_query($sql) or die('Could not selected');
            return $row=mysql_fetch_array($sql);
        }
        public function getProdIdByCateId($Id){
            $sql = "SELECT * FROM fas_product WHERE CateID={$Id}";
            $sql = mysql_query($sql) or die('Could not selected');    
            $arr[] = array();
            while($rows = mysql_fetch_array($sql)){
                $arr[] = $rows;    
            }
            return $arr;    
        }
        public function getProdIdByTypeId($Id){
            $sql = "SELECT * FROM fas_product WHERE TypeID={$Id}";
            $sql = mysql_query($sql) or die('Could not selected');    
            $arr[] = array();
            while($rows = mysql_fetch_array($sql)){
                $arr[] = $rows;    
            }
            return $arr;    
        }
        public function getCateType($Id){
            $sql = "SELECT CateName FROM fas_typeprod WHERE CateID={$Id}";
            $sql = mysql_query($sql) or die('Could not selected');    
            $row = mysql_fetch_array($sql);
            return $row[0];
        }
        public function getTypeByCateId($Id){
            $sql = "SELECT * FROM fas_typeprod WHERE CateID={$Id}";
            $sql = mysql_query($sql) or die('Could not selected');    
            $arr[] = array();
            while($rows = mysql_fetch_array($sql)){
                $arr[] = $rows;    
            }
            return $arr;
        }
        
        public function checkIDProd($Id){
            $sql = "SELECT COUNT(*) FROM fas_product WHERE ProdID='{$Id}'";
            $sql = mysql_query($sql) or die('Could not selected');
            $row = mysql_fetch_array($sql);
            if($row[0] > 0){
                return true;
            }else{
                return false;
            } 
        }
        
        public function check_type_upload($Picture){
            if(($Picture =='image/gif') or 
           		($Picture =='image/jpeg') or 
                ($Picture =='image/png') or
           		($Picture =='image/pjpeg') or
                ($Picture == 'application/x-shockwave-flash') and
           		($Picture  < 25000)){
           	    return true;	   
      		}else{
      		    return false;
      		}
        }
        public function check_error_upload($error){
            if($error > 0)
                return true;
            else
                return false;
        }
        public function check_exist_upload($Name){
       	    if(file_exists("../../../Image/Product/".$Name)){
                return true;
			}
        }
        public function upload_file($tmp_name,$name){  
      		move_uploaded_file($tmp_name,"../../../Image/Product/".$name); 
        }
        
        public function updateProduct($Id,$Name,$Color,$Price,$Inventory,$ProcName,
        $TypeId,$CateId,$Newest,$Main,$Material,$Size,$Description,$Image){
            if(!empty($Image)){
                $sql = "UPDATE fas_product SET ProdName='{$Name}', ProdColor='{$Color}', 
                ProdPrice={$Price}, Inventory={$Inventory}, ProcName='{$ProcName}', 
                TypeID={$TypeId}, CateID={$CateId}, Newest='{$Newest}', MainProd='{$Main}',
                Material='{$Material}', ProdSize='{$Size}', Description='{$Description}', ProdImage='Image/Product/{$Image}' WHERE ProdID='{$Id}'";
                
            }else{
                $sql = "UPDATE fas_product SET ProdName='{$Name}', ProdColor='{$Color}', 
                ProdPrice={$Price}, Inventory={$Inventory}, ProcName='{$ProcName}', 
                TypeID={$TypeId}, CateID={$CateId}, Newest='{$Newest}', MainProd='{$Main}',
                Material='{$Material}', ProdSize='{$Size}', Description='{$Description}' WHERE ProdID='{$Id}'";
            }   
            return mysql_query($sql) or die('Could not updated'.mysql_error()); 
        }
        
        public function AddProdcut($Id,$Name,$Color,$Price,$Inventory,$ProcName,
        $TypeId,$CateId,$Newest,$Main,$Material,$Size,$Description,$Image){
            $sql = "INSERT INTO fas_product VALUES('{$Id}','{$Name}','{$Color}',{$Price},{$Inventory},'{$ProcName}',
                    {$TypeId},{$CateId},'{$Newest}','{$Main}',0,CURDATE(),'{$Material}','{$Size}','{$Description}','Image/Product/{$Image}')";   
            return mysql_query($sql) or die('Could not inserted'.mysql_error());      
        }
        
        public function updateCate($Id,$Name){
            $sql = "UPDATE fas_cate_prod SET CateName='{$Name}' WHERE CateID={$Id}";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
        }
        public function InsertCate($Name){
            $sql = "INSERT INTO fas_cate_prod VALUES (NULL,'{$Name}','1')";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
        }
        
        public function updateType($Id,$Name,$CateId){
            $sql = "UPDATE fas_typeprod SET CateID={$CateId}, TypeName='{$Name}'  WHERE TypeID={$Id}";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
        }
        public function InsertType($Name,$CateId){
            $sql = "INSERT INTO fas_typeprod VALUES (NULL,{$CateId},'{$Name}')";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
        }    
        
        public function DelMark($Id){
            $sql = "DELETE FROM fas_mark WHERE ProdID='{$Id}'";
            return mysql_query($sql) or die('Could not Deleted'.mysql_error());
        }
        public function DelReview($Id){
            $sql = "DELETE FROM fas_reviews WHERE ProdID='{$Id}'";
            return mysql_query($sql) or die('Could not Deleted'.mysql_error());
        }
    }
?>