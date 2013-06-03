<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/AccountModel.php';
    $Account = new Account();
    if(isset($_POST)){
        $OldPass = $_POST['oldpass'];
        $NewPass = $_POST['newpass']; 
        $NewPass = md5(md5($NewPass));
        $ID = $_POST['id'];
        $Account->setPass($OldPass);
        if($Account->checkPass($_SESSION['Admin'])){
            if($_POST['Type'] == "Admin"){
                $Account->UpdatePassAdm($NewPass,$ID);
                header("location:../../index.php?success=Đổi mật khẩu thành công");
            }else{
                $Account->UpdatePassMod($NewPass,$ID);
                header("location:../../index.php?success=Đổi mật khẩu thành công");
            }
        }
           
    }
	
?>