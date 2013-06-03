<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/AccountModel.php';
    $Account = new Account();
    if(isset($_POST)){
        $Name = $_POST['newname']; 
        $ID = $_POST['id'];
        
        if($_POST['Type'] == "Admin"){
            $Account->UpdateNameAdm($Name,$ID);
            $_SESSION['Admin'] = $Name;
            header("location:../../index.php?success=Đổi tên thành công");
        }else{
            $Account->UpdateNameMod($Name,$ID);
            $_SESSION['Admin'] = $Name;
            header("location:../../index.php?success=Đổi tên thành công");
        }    
    }
	
?>