<?php
    echo"<div class='Navi'>";
    foreach($rows as $row){
        $Name = $row['FieldName'];
        if($row['FieldLink'] == "Gio hang.php")
            $Name .= "(<span style='color:red;'>0</span>)";
        echo "<a href='javaScript:void()'>".$Name."</a>";        
    }
    echo"</div>";
?>