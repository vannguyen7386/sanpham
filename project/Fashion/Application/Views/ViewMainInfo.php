<?php
    echo "<ul>";
	foreach($rowsMainInfo as $rowMI)
    {
        echo"<li>
                <a href='#'><img src='".$rowMI['InfoImage']."' width='140' /></a>
                <h3>".$rowMI['InfoHead']."</h3>
                <p>".$rowMI['InfoSummary']."</p>
                <a href='#' class='ReadMore'>...Xem tiếp</a>
            </li>";
    }
    echo"</ul>";
?>
