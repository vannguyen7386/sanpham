<?php
    $arr_qty = "";
    $arr_id = "";
    $sum = 0;
    if(isset($_SESSION['CartId']) and isset($_SESSION['CartQty'])){
        $arr_qty = explode(",",$_SESSION['CartQty']);
        $arr_id = explode(",",$_SESSION['CartId']);   
        for($i=0;$i<count($arr_qty);$i++){
            $sum += $arr_qty[$i];
        } 
    }
    foreach($rows as $row){
        $Name = $row['FieldName'];
        if($row['FieldLink'] == "Gio hang.php")
            $Name .= "(<span style='color:red;'>$sum</span>)";
        if($CurrentPage == $row['FieldLink'])
            echo "<a href='".$row['FieldLink']."' id = 'Here'>".$Name."</a>";   
        else
            echo "<a href='".$row['FieldLink']."'>".$Name."</a>";        
    }
?>