<?php
	Class Menu{
	   public function DelItemTop($Id){
            $sql = "DELETE FROM fas_menutop WHERE TopID={$Id}";
            return mysql_query($sql) or die('Could not deleted'.mysql_error());        
	   }
       public function DelItemBot($Id){
            $sql = "DELETE FROM fas_menubot WHERE ID={$Id}";
            return mysql_query($sql) or die('Could not deleted'.mysql_error());        
	   }
       public function UpdateItemTop($Id,$Name,$Link){
            $sql = "UPDATE fas_menutop SET FieldName='{$Name}', FieldLink='{$Link}' WHERE TopID={$Id}";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
       }
       public function UpdateItemBot($Id,$Name,$Link){
            $sql = "UPDATE fas_menubot SET FieldName='{$Name}', FieldLink='{$Link}' WHERE ID={$Id}";
            return mysql_query($sql) or die('Could not updated'.mysql_error());
       }
       public function InsertMenuTop($Name,$Link){
            $sql = "INSERT INTO fas_menutop VALUES(NULL,'{$Name}','{$Link}')";
            return mysql_query($sql) or die('Could not inserted'.mysql_error());
       }
       public function InsertMenuBot($Name,$Link){
            $sql = "INSERT INTO fas_menubot VALUES(NULL,'{$Name}','{$Link}')";
            return mysql_query($sql) or die('Could not inserted'.mysql_error());
       }
	}
?>