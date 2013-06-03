<?php
    $i=0;
    $countArr = count($rows);
	foreach($rows as $row){
        $i++;
        if($i==$countArr){
            echo "<a href='{$row['FieldLink']}'>{$row['FieldName']}</a>";
        }else{
            echo "<a href='{$row['FieldLink']}'>{$row['FieldName']}</a>|";
        }
	}
?>