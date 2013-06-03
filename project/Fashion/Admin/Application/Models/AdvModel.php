<?php
    Class Adv{
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
       	    if(file_exists("../../../Image/Adv/".$Name)){
                return true;
			}
        }
        
        public function upload_file($tmp_name,$name){  
      		move_uploaded_file($tmp_name,"../../../Image/Adv/".$name); 
        }
    }

?>