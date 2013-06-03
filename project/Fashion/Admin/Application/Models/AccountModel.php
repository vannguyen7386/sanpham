<?php
    include'DisplayAll.php';
    Class Account extends DisplayAll{
        private $id;
        private $Name;
        private $Pass;
        
        public function setName($Name){
            $this->Name = $Name;
        }
        public function setPass($Pass){
            $this->Pass = $Pass;
        }
        public function checkAdmin(){
            $sql = "SELECT COUNT(*) FROM fas_admin WHERE FieldName = '{$this->Name}' AND FieldPass = '".md5(md5($this->Pass))."'";
            $checkAdm = new DisplayAll();
            if($checkAdm->checkExist($sql)){
                return true;               
            }else{
                return false;
            }                
        }
        public function checkPass($Name){
            $sql = "SELECT COUNT(*) FROM fas_admin WHERE FieldName = '{$Name}' AND FieldPass = '".md5(md5($this->Pass))."'";
            $checkAdm = new DisplayAll();
            if($checkAdm->checkExist($sql)){
                return true;               
            }else{
                $sqlMod = "SELECT COUNT(*) FROM fas_mod WHERE FieldName = '{$Name}' AND FieldPass = '".md5(md5($this->Pass))."'";
                if($checkAdm->checkExist($sqlMod)){
                    return true;
                }else{
                    return false;
                }  
            }                   
        }
        public function checkValue($Value){
            $flag = true;
            $arr = Array("\'","SELECT","*","DROP","ALTER TABLE","DELETE FROM","UPDATE","%","\"","REMOVE","RENAME");
            for($i=0;$i<count($arr);$i++){
                if(stristr($Value,$arr[$i])){
                    $flag = false;
                    break;
                }    
            }
            if($flag)
                return true;
            else
                return false;
             
        }
        public function checkMod(){
            $sql = "SELECT COUNT(*) FROM fas_mod WHERE FieldName = '{$this->Name}' AND FieldPass = '".md5(md5($this->Pass))."'";
            $checkAdm = new DisplayAll();
            if($checkAdm->checkExist($sql)){
                return true;               
            }else{
                return false;
            }               
        }
        public function checkLogin(){
            if($this->checkAdmin()){
                return true;
            }else{
                if($this->checkMod()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function UpdatePassAdm($Pass,$ID){
            $query = "UPDATE fas_admin SET FieldPass = '{$Pass}' WHERE ID= {$ID}";
            mysql_query($query) or die('Could not updated');
            return;    
        }
        
        public function UpdatePassMod($Pass,$ID){
            $query = "UPDATE fas_mod SET FieldPass = '{$Pass}' WHERE ID= {$ID}";
            mysql_query($query) or die('Could not updated');
            return;
        }
        public function UpdateNameAdm($Name,$ID){
             $query = "UPDATE fas_admin SET FieldName = '{$Name}' WHERE ID= {$ID}";
            mysql_query($query) or die('Could not updated');
            return;   
        }
        public function UpdateNameMod($Name,$ID){
             $query = "UPDATE fas_mod SET FieldName = '{$Name}' WHERE ID= {$ID}";
            mysql_query($query) or die('Could not updated');
            return;   
        }
    }
?>