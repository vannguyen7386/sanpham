
<?php 
echo"<ul id='imageShow'>";
$i=1;
$j=1;
foreach($rows as $row){
    if($i==1)
        echo "<li class='current'><a href='Tin tuc.php?Id={$row['InfoID']}'><img src='".$row['InfoImage']."' /></a></li>";
    else
        echo "<li><a href='Tin tuc.php?Id={$row['InfoID']}'><img src='".$row['InfoImage']."' /></a></li>";
    $i++;
}
echo "</ul>";
echo "<div id='ContentSlide'>";
echo "<div class='info'></div>";
foreach($rows as $row){
    $Summary = substr($row['InfoSummary'],0,200);
    if($j==1)
        echo "<p class='info current'><b>".$row['InfoHead']."</b><br />".$Summary."</p>";
    else
        echo "<p class='info'><b>".$row['InfoHead']."</b><br />".$Summary."</p>";
    $j++;
}
echo "</div>";
?>