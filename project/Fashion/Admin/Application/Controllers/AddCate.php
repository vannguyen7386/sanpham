<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/ProductModel.php';
    include'../Models/DisplayAll.php';
    $conn = new Conection();
    $conn->Connected();
    $flag = true;
    $err = "";
    $Name = $_POST['Name'];
    $Cate = new DisplayAll();
    $Prod = new Product();
    $sql = "SELECT COUNT(*) FROM fas_cate_prod WHERE CateName LIKE '{$Name}'";
    if($Cate->checkExist($sql)){
        $flag = false;
        $err = "Trùng tên Category";
    }
    if($flag){
        $Prod->InsertCate($Name);
        header("location:../../Category.php?success=Thêm category thành công");       
    }else{
        header("location:../../ChangeCate.php?err={$err}");
    }         
                  
?>