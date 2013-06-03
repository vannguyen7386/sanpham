<?php
    $sql = "SELECT * FROM fas_cate_prod WHERE Choice='1' ORDER BY CateID";
    $SBsup = new DisplayAll();
    $rows = $SBsup->display($sql);
    $sqlAdv = "SELECT * FROM fas_adv WHERE Place='Left'";
    $rowAdvs = $SBsup->display($sqlAdv);
    include'Application/Views/SidebarItemView.php';
    echo "<div class='AdvLeft'>";
    include'Application/Views/ViewAdv.php';
    echo "</div>";
?>