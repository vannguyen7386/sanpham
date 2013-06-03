<?php
	Class Info{
	   public function getIntroContact(){
	       $sql = "SELECT Contact FROM fas_introduction WHERE ID=1";
           $sql = mysql_query($sql) or die('Could not selected');
           $row = mysql_fetch_array($sql);
           return $row[0];
	   }
       public function getIntroPayment(){
	       $sql = "SELECT ContentPayment FROM fas_introduction WHERE ID=1";
           $sql = mysql_query($sql) or die('Could not selected');
           $row = mysql_fetch_array($sql);
           return $row[0];
	   }
       public function getIntro(){
	       $sql = "SELECT Content FROM fas_introduction WHERE ID=1";
           $sql = mysql_query($sql) or die('Could not selected');
           $row = mysql_fetch_array($sql);
           return $row[0];
	   }
       public function updateIntroContact($Content){
            $sql = "UPDATE fas_introduction SET Contact='{$Content}' WHERE ID=1";
            return mysql_query($sql) or die('Could not updated');
       }
       public function updateIntroPayment($Content){
            $sql = "UPDATE fas_introduction SET ContentPayment='{$Content}' WHERE ID=1";
            return mysql_query($sql) or die('Could not updated');
       }
       public function updateIntroduce($Content){
            $sql = "UPDATE fas_introduction SET Content='{$Content}' WHERE ID=1";
            return mysql_query($sql) or die('Could not updated');
       }
       public function DelContact($Id){
            $sql = "DELETE FROM fas_contact WHERE ID={$Id}";
            return mysql_query($sql) or die('Could not deleted');
       }
	}
?>