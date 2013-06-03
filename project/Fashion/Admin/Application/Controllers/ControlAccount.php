<?php
    $Account = new Account();
    $Type = null;
    $checkType = "SELECT COUNT(*) FROM fas_admin WHERE FieldName = '{$_SESSION['Admin']}'";
    if($Account->checkExist($checkType)){
        $sql = "SELECT * FROM fas_admin WHERE FieldName = '{$_SESSION['Admin']}'";  
        $Type = "Admin";
    }else{
        $sql = "SELECT * FROM fas_mod WHERE FieldName = '{$_SESSION['Admin']}'"; 
        $Type = "Mod";
    }
    $row = $Account->displaySingle($sql);
    include'Application/Views/ViewAccount.php';
?>