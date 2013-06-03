<?php

/**
 * @author Huy Van
 * @copyright 2011
 */

class CountOnline{
    var $ip;
    var $quantity;
    public function CountOnline($ip){
        $this->ip = $ip;
    }
    public function set_cookie(){
        setcookie('ip',$this->ip,time()+3600*3);
        return;
    } 
    public function insertIp(){
        $query = "INSERT INTO fas_countonline VALUES(NULL,'".$this->ip."',1)";
        mysql_query($query) or die('Could not connect DATABASE');
        return;
    }
    public function checkIp(){
        $query = "SELECT COUNT(*) FROM fas_countonline WHERE Ip='".$this->ip."'";
        $query = mysql_query($query) or die('Could not connect DATABASE');
        $row = mysql_fetch_row($query);
        return $row[0];
    }
    public function getQuantity(){
        $query = "SELECT Quantity FROM fas_countonline WHERE Ip='".$this->ip."'";
        $query = mysql_query($query) or die('Could not connect DATABASE');
        $row = mysql_fetch_row($query);
        return $row[0];
    }
    public function updateQty($quantity){
        $quantity+=1;
        $query = "UPDATE fas_countonline SET Quantity=$quantity WHERE Ip='".$this->ip."'";
        mysql_query($query) or die('Could not connect DATABASE');
        return;       
    }   
    public function displayQty(){
        $query = "SELECT SUM(Quantity) FROM fas_countonline";
        $query = mysql_query($query)or die('Could not connect DATABASE');
        $result = mysql_fetch_row($query);
        return $result[0];
    } 
}


?>