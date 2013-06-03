<?php
echo "<h2>Hỗ trợ trực tuyến</h2>";
echo "<div class='WrapYahoo'>";
foreach($rows as $row)
{
    echo "<div class='Yahoo'><a href = 'ymsgr:sendim?".$row['YahooName']."'><img src='http://opi.yahoo.com/online?u=".$row['YahooName']."&m=g&t=14' width='65' /></a>
           <p>{$row['Name']}</p>
           <p>{$row['Phone']}</p> 
    
        </div>";
}
echo"</div>";
?>