<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/ProductModel.php';
    $conn = new Conection();
    $conn->Connected();
    $flag = true;
    $err = "";
    $Id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Color = $_POST['Color'];
    $price = $_POST['Price'];
    $Inventory = $_POST['Inventory'];
    $ProcName = $_POST['Producer'];
    $TypeID = $_POST['Type'];
    $CateId = $_POST['Category'];
    $Newest=$_POST['Newest'];
    $MainProd=$_POST['Main'];
    $Material = $_POST['Material'];
    $ProdSize = $_POST['Size'];
    $Description = $_POST['Description'];
    $Prod = new Product();
    $Image=$_FILES['file']['name'];
    if($Prod->check_type_upload($_FILES['file']['type'])){
        if($Prod->check_error_upload($_FILES['file']['error'])){
            $err .= "Có lỗi xảy ra";
            $flag = false;
        }
    }else{
        if($_FILES['file']['type']!=""){
            $err.="Không đúng định dạng file";
            $flag = false;
        }
    }
    if($flag){
        if(!$Prod->check_exist_upload($_FILES['file']['name']))
            $Prod->upload_file($_FILES['file']['tmp_name'],$_FILES['file']['name']); 
        $Prod->updateProduct($Id,$Name,$Color,$price,$Inventory,$ProcName,$TypeID,
        $CateId,$Newest,$MainProd,$Material,$ProdSize,$Description,$Image); 
        header("location:../../Product.php?success=Sửa sản phẩm thành công");       
    }else{
        header("location:../../EditProd.php?err={$err}&Id={$Id}");
    }         
                  
?>