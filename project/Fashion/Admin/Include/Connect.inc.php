<?php 
class Conection{
    private $conn;
    public function Connected(){
        $this->conn = mysql_connect('localhost','root','');
        if(!$this->conn)
            die('Could not connect server');
        mysql_select_db('fashion') or die('Could not connect database');
        mysql_query("SET NAMES 'utf8'");  
    }	   
}

?>