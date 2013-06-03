<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    include'../Models/ExtraInfoModel.php';
    $conn = new Conection();
    $conn->Connected();
    $flag = true;
    $err = "";
    $Id = $_POST['Id'];
    $Heading = $_POST['Heading'];
    $Check = 0;
    if(isset($_POST['Check'])){
        $Check = $_POST['Check'];
    }
    $Slide = $_POST['Slide'];
    $Summary = $_POST['Summary'];
    $Content = $_POST['editor1'];
    $Image=$_FILES['file']['name'];
    
    $News = new EtInfo();
    
    if($News->check_type_upload($_FILES['file']['type'])){
        if($News->check_error_upload($_FILES['file']['error'])){
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
        if(!$News->check_exist_upload($_FILES['file']['name']))
            $News->upload_file($_FILES['file']['tmp_name'],$_FILES['file']['name']); 
        if($Check == 1){
            $News->updateNewsWithinDate($Id,$Heading,$Summary,$Content,$Image,$Slide);
        }else{
            $News->updateNewsWithoutDate($Id,$Heading,$Summary,$Content,$Image,$Slide);
        }
        header("location:../../Experience.php?success=Sửa bản tin thành công");       
    }else{
        header("location:../../EditExp.php?err={$err}&Id={$Id}");
    }         
                  
?>