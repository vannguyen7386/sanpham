<?php
    foreach($rowAdvs as $row){
        if($row['Place'] == 'Right')
            echo "<a href='".$row['FieldLink']."'><img src='".$row['Image']."' width='195' /></a>";
        elseif($row['Place'] == 'Left')
            echo "<a href='".$row['FieldLink']."'><img src='".$row['Image']."' width='152' /></a>";
                
        
    }   	
?>