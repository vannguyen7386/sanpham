<?php
    echo"<div class='Menubot'>";
    $i=0;
    $counuArr = count($rows);
    foreach($rows as $row){
        $i++;
        $Name = $row['FieldName'];
        if($i==$counuArr)
            echo "<a href='javaScript:void()'>".$Name."</a>";    
        else
            echo "<a href='javaScript:void()'>".$Name."</a>|";    
    }
    echo"</div>";
?>