<?php

/**
 * @author Huy Van
 * @copyright 2011
 */

class beingOnline{
    var $session;
    var $time;
    var $mark;
    
    public function set_session(){
        $this->session = session_id();
        return;
    }
    public function set_time(){
        $this->time = time();
        return;
    }
    public function getSession(){
        
        return $this->session;
    }
    public function check_session(){
        $query = "SELECT COUNT(*)FROM fas_session WHERE Session_Name='".$this->session."'";
        $query=mysql_query($query) or die('Could not connect SERVER');
        $row = mysql_fetch_row($query);
        return $row[0];
    }
    public function insertDB(){
        $query = "INSERT INTO fas_session values(NULL,'".$this->session."','".$this->time."',0,'0',0)";
        mysql_query($query) or die('Could not connect DB');
        return;
    } 
    public function updateDB(){
        $query = "UPDATE fas_session SET Time = '".$this->time."' WHERE Session_Name='".$this->session."'";
        mysql_query($query) or die('Could not connect SERVER');
        return;
    }
    public function deleteSession(){
        $check_time = $this->time-600;
        $query = "DELETE FROM fas_session WHERE Time < '".$check_time."'";
        mysql_query($query) or die('Could not connect SERVER');
        return;
    }
    public function displayCount(){
        $query = "SELECT COUNT(*)FROM fas_session";
        $query = mysql_query($query) or die('Could not connect SERVER');
        $result = mysql_fetch_row($query);
        return $result[0];
    }   
    public function getID($query){
        $query = mysql_query($query);
        $row = mysql_fetch_array($query);
        return $row[0];
    }
    public function getSeID(){
        $sql = "SELECT ID FROM fas_session WHERE Session_Name = '".$this->session."'";
        $ID = $this->getID($sql);
        return $ID;    
    }
    public function insertMark($Rank,$ProdID){
        $ID = $this->getSeID();
        mysql_query("INSERT INTO fas_mark VALUES(NULL,$ID,$Rank,'{$ProdID}')");
        return;
    }
    public function getMark($ID){
        $query = "SELECT AVG(Rank) FROM fas_mark WHERE ProdID = '".$ID."'";
        $this->mark = round($this->getID($query));
        return $this->mark;
    }
   
    public function UpdateSession($Rank,$id,$seId){
        $sql = "UPDATE fas_session SET Quantity = 1, ProdID = '{$id}', Mark = {$Rank} WHERE ID = {$seId}";
        return mysql_query($sql) or die(mysql_error());       
    }
    public function UpdateMarkProd($Id){
        $Mark = $this->getMark($Id);
        $sql = "UPDATE fas_product SET Mark = {$Mark} WHERE ProdID = '{$Id}'";
        return mysql_query($sql) or die(mysql_error());   
    }
    public function checkReview($ID,$ProdID){
        $sql = "SELECT COUNT(*) FROM fas_mark WHERE ID = {$ID} AND ProdID LIKE '{$ProdID}'";
        $sql = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($sql);
        if($row[0] != 0)
            return false;
        else
            return true;
    }
}

?>