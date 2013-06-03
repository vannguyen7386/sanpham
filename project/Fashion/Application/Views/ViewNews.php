<?php
    if(!isset($_REQUEST['Id'])){
        echo "<ul>";
        foreach($rows as $row){
            echo "<li>";
            echo "<a href='Tin tuc.php?Id={$row['InfoID']}'><img src='{$row['InfoImage']}' class='Head' width='150'/></a>";
            echo "<h3>{$row['InfoHead']}</h3>";
            echo "<p class='Date'>{$row['datetime']}</p>";
            echo "<p>{$row['InfoSummary']}</p>";
            echo "<a href='Tin tuc.php?Id={$row['InfoID']}' class='ReadMore'>...Xem tiếp</a>";
            echo "</li>";
        }
        echo "</ul>";
    }else{
        echo "<div class='InfoExp'>";
        echo "<h3>{$row['InfoHead']}</h3>"; 
        echo "<p class='Date'>{$row['datetime']}</p>";
        echo "<p>{$row['InfoContent']}</p>";  
        echo "</div>";
    }
?>
