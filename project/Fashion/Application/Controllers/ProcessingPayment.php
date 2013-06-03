<?php  
    session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    $err = "";
    $flag = true;
    $Name = "";
    $Email = "";
    $Phone = "";
    $Address = "";
    $Content = ""; 
    $error = "";
    if(isset($_POST)){
        $Cont = new DisplayAll();
        if(isset($_POST['Name']) and !empty($_POST['Name'])){
            $Name = $Cont->sqlQuote($_POST['Name']);   
        }else{
            $flag = false;
            $err .= "Bạn không được để trống họ tên<br>";    
        }
        if(isset($_POST['Email']) and !empty($_POST['Email'])){
            $Email = $Cont->sqlQuote($_POST['Email']);   
        }else{
            $flag = false;
            $err .= "Bạn không được để trống Email<br>"; 
        }
        if(isset($_POST['Address']) and !empty($_POST['Address'])){
            $Address = $Cont->sqlQuote($_POST['Address']);
               
        }else{
            $flag = false;
            $err .= "Bạn không được để trống địa chỉ<br>";
        }
        if(isset($_POST['Phone']) and !empty($_POST['Phone'])){
            $Phone = $Cont->sqlQuote($_POST['Phone']);   
        }else{
            $flag = false;
            $err .= "Bạn không được để trống số điện thoại<br>"; 
        }
        $Content = $Cont->sqlQuote($_POST['Content']);
        require_once('../../recaptcha-php-1.11/recaptchalib.php');

        // Get a key from https://www.google.com/recaptcha/admin/create
        $publickey = "6Lf4UsASAAAAAHe7KKs4WgdABu5n-WJbW3nOLSFM ";
        $privatekey = "6Lf4UsASAAAAAOB4yNQYAOHBgmhppljHIat51Ii_ ";
        
        # the response from reCAPTCHA
        $resp = null;
        # the error code from reCAPTCHA, if any
        $error = null;
        
        # was there a reCAPTCHA response?
        if (isset($_POST["recaptcha_response_field"])) {
                $resp = recaptcha_check_answer ($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);
        
                if (!$resp->is_valid) {
                        $flag = false;
                        $error = "Sai mã bảo vệ";
                }else{
                    $flag = true;
                }
        }
        if($flag){
            $Cont->insertPayment($Name,$Email,$Phone,$Address,$Content);
            $BillId = $Cont->get_BillId($Name);
            $arr_id = $Cont->get_ProdId($_SESSION['CartId']);
            $arr_qty = $Cont->get_ProdQty($_SESSION['CartQty']);
            for($i=0;$i<count($arr_id)-1;$i++){
                $Price = $Cont->get_Price($arr_id[$i]);
                $ProdId = $arr_id[$i];
                $Quantity = $arr_qty[$i];
                $Cont->insertBillDetail($ProdId,$BillId,$Price,$Quantity);
            }
            unset($_SESSION['CartId']);
            unset($_SESSION['CartQty']);
            header("location:../../Thanh toan.php?success=success");
        }
        else{
            if(empty($err))
                header("location:../../Thanh toan.php?error=$error");
            else{
                if(empty($error)){
                    header("location:../../Thanh toan.php?err=$err");    
                }else{
                    header("location:../../Thanh toan.php?error=$error&err=$err");
                }
            }
        }
    }
	
?>