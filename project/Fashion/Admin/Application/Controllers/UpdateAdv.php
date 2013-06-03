<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/DisplayAll.php';
    include'../Models/AdvModel.php';
    $conn = new Conection();
    $conn->Connected();
    
    $Adv = new DisplayAll();
    $upload = new Adv();
    $Id = $_POST['Id'];
    $Image = $_FILES['file']['name'];
    $Link = $_POST['Link'];
    $Place = $_POST['Place'];
    $err = "";
    $flag = true;
    if($upload->check_type_upload($_FILES['file']['type'])){
        if($upload->check_error_upload($_FILES['file']['error'])){
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
        if(!$upload->check_exist_upload($_FILES['file']['name']))
            $upload->upload_file($_FILES['file']['tmp_name'],$_FILES['file']['name']); 
        $Adv->UpdateAdv($Id,$Image,$Link,$Place);
        header("location:../../Advertisement.php?success=Sửa thành công");       
    }else{
        header("location:../../EditAdv.php?err={$err}&Id={$Id}");
    }         
?>