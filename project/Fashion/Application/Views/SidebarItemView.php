<?php
    $linked = null;
	foreach($rows as $row)
    {
        $MenuSup =  "<div class = 'Item_Sidebar'>
                 <h2><a href='San pham.php?CateID=".$row['CateID']."'>".$row['CateName']."</a></h2>      
                 <ul>";
        echo $MenuSup;
        $sqlSub = "SELECT * FROM fas_typeprod WHERE CateID = ".$row['CateID']." ORDER BY TypeID";
        $SBSub = new DisplayAll();
        $rowsSub = $SBSub->display($sqlSub);
        $TypeID = null;
        if(isset($_REQUEST['CateID']) and $_REQUEST['CateID'] == $row['CateID'])
            $linked = $row['CateName'];
        foreach($rowsSub as $rowSub)
        {   
            if(isset($_REQUEST['TypeID']) and $_REQUEST['TypeID']==$rowSub['TypeID']){
                $MenuSub = "<li><a href ='San pham.php?TypeID=".$rowSub['TypeID']."' class='Place'>".$rowSub['TypeName']."</a></li>";  
                $linked = $rowSub['TypeName'];   
            }else{
                $MenuSub = "<li><a href ='San pham.php?TypeID=".$rowSub['TypeID']."'>".$rowSub['TypeName']."</a></li>";
            }
            echo $MenuSub;
        }         
        echo "</ul>";
        echo "</div>";
    }
?>
	  