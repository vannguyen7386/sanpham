<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/AccountModel.php';
    $Login = new DisplayAll();
    if(isset($_POST)){
        $Name = null;
        $Pass = null;
        $flag = true;
        if(isset($_POST['Name']) and isset($_POST['Pass'])){
            $Name = $Login->sqlQuote($_POST['Name']);
            $Pass = $Login->sqlQuote($_POST['Pass']);
            $Account = new Account();
            $Account->setName($Name);
            $Account->setPass($Pass);
            if(!$Account->checkValue($Name) or !$Account->checkValue($Pass)){
                $flag = false;    
            }else{
                if(!$Account->checkLogin()){
                    $flag = false; 
                }
            }
            if($flag){
                $_SESSION['Admin'] = $Name;
                header("location:../../index.php");
            }
            else{
                header("location:../../index.php?err=Sai username hoặc password");
            }
        }
    }
	
?>