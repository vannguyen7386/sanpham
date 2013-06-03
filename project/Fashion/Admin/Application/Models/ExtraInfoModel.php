<?php
	class EtInfo{
	   public function DelNews($Id){
	       $sql = "DELETE FROM fas_extra_info WHERE InfoID={$Id}";
           return mysql_query($sql) or die('Could not deleted');
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
       	    if(file_exists("../../../Image/News/".$Name)){
                return true;
			}
        }
        
        public function upload_file($tmp_name,$name){  
      		move_uploaded_file($tmp_name,"../../../Image/News/".$name); 
        }
        
        public function updateNewsWithoutDate($Id,$Heading,$Summary,$Content,$Image,$Slide){
            if(!empty($Image)){
                $sql = "UPDATE fas_extra_info SET InfoHead='{$Heading}', InfoSummary='{$Summary}', 
                        InfoContent='{$Content}', InfoImage='Image/News/{$Image}', Slide='{$Slide}' WHERE InfoID={$Id}";
            }else{
                $sql = "UPDATE fas_extra_info SET InfoHead='{$Heading}', InfoSummary='{$Summary}', 
                        InfoContent='{$Content}', Slide='{$Slide}' WHERE InfoID={$Id}";
            }
            return mysql_query($sql) or die('Could not updated');   
        }
        
        public function updateNewsWithinDate($Id,$Heading,$Summary,$Content,$Image,$Slide){
            if(!empty($Image)){
                $sql = "UPDATE fas_extra_info SET InfoHead='{$Heading}', InfoSummary='{$Summary}', 
                        InfoContent='{$Content}',InfoDate=NOW(), InfoImage='Image/News/{$Image}', Slide='{$Slide}' WHERE InfoID={$Id}";
            }else{
                $sql = "UPDATE fas_extra_info SET InfoHead='{$Heading}', InfoSummary='{$Summary}', 
                        InfoContent='{$Content}', InfoDate=NOW(), Slide='{$Slide}' WHERE InfoID={$Id}";
            }
            return mysql_query($sql) or die('Could not updated');   
        }
        
        public function AddNews($Heading,$Summary,$Content,$Image,$Slide){
            $sql = "INSERT INTO fas_extra_info VALUES(NULL,6,'{$Heading}','{$Summary}','{$Content}',NOW(),'Image/News/{$Image}','{$Slide}')";
            return mysql_query($sql) or die('Could not inserted'); 
        }
        public function AddEXP($Heading,$Summary,$Content,$Image,$Slide){
            $sql = "INSERT INTO fas_extra_info VALUES(NULL,3,'{$Heading}','{$Summary}','{$Content}',NOW(),'Image/News/{$Image}','{$Slide}')";
            return mysql_query($sql) or die('Could not inserted'); 
        }
             
	}
?>