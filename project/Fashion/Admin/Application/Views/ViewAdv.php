<div style="border-bottom: 1px dashed #CCCCCC;padding:0 0 5px 0 ">
<h3>Left Banner(width:152px)</h3>
<?php 
    foreach($rows as $row){
        if($row['Place']=='Left')
            echo "<a href='EditAdv.php?Id={$row['ID']}' style='margin:0 10px 0 0'><img src='../{$row['Image']}' width='152' /></a>" ;
    }

?>
</div>
<div style="border-bottom: 1px dashed #CCCCCC;padding:0 0 5px 0 ">
<h3>Right Banner (width:195px)</h3>
<?php
	foreach($rows as $row){
        if($row['Place']=='Right')
            echo "<a href='EditAdv.php?Id={$row['ID']}' style='margin:0 10px 0 0'><img src='../{$row['Image']}' width='195' /></a>" ;
    }
?>
</div>
<h3>Bottom Banner (width:960px)</h3>
<?php
	foreach($rows as $row){
        if($row['Place']=='Bottom')
            echo "<a href='EditAdv.php?Id={$row['ID']}' style='margin:0 10px 0 0'><img src='../{$row['Image']}' width='960' /></a>" ;
    }
?>
<div class="Add_Del" style="text-align: center;"><a href="AddAdv.php" class="Add">Thêm quảng cáo</a></div>