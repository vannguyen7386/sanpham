<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/ProductModel.php';
    include'../Models/DisplayAll.php';
    $conn = new Conection();
    $conn->Connected();
    $flag = true;
    $err = "";
    $CateId = $_POST['Cate'];
    $Name = $_POST['Name'];
    $Cate = new DisplayAll();
    $Prod = new Product();
    $sql = "SELECT COUNT(*) FROM fas_typeprod WHERE TypeName LIKE '{$Name}' AND CateID={$CateId}";
    if($Cate->checkExist($sql)){
        $flag = false;
        $err = "Trùng tên Type trong cùng 1 category";
    }
    if($flag){
        $Prod->InsertType($Name,$CateId);
        header("location:../../TypeProd.php?success=Add Type thành công");       
    }else{
        header("location:../../TypeProd.php?err={$err}&Id={$Id}");
    }         
                  
?>