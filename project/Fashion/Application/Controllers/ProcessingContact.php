<?php  
    session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    $err = "";
    $flag = true;
    $Heading = "";
    $Name = "";
    $Email = "";
    $Phone = "";
    $Content = ""; 
    $error = "";
    if(isset($_POST)){
        $Cont = new DisplayAll();
        if(isset($_POST['Heading']) and !empty($_POST['Heading'])){
            $Heading = $Cont->sqlQuote($_POST['Heading']);
               
        }else{
            $flag = false;
            $err .= "Bạn không được để trống tiêu đề<br>";
        }
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
        if(isset($_POST['Content']) and !empty($_POST['Content'])){
            $Content = $Cont->sqlQuote($_POST['Content']);   
        }else{
            $flag = false;
            $err .= "Bạn không được để trống nội dung<br>"; 
        }
        $Phone = $Cont->sqlQuote($_POST['Phone']);
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
            $Cont->insertContact($Heading,$Name,$Email,$Phone,$Content);
            header("location:../../Lien he.php?success=Gửi thành công");
        }
        else{
            if(empty($err))
                header("location:../../Lien he.php?error=$error");
            else{
                if(empty($error)){
                    header("location:../../Lien he.php?err=$err");    
                }else{
                    header("location:../../Lien he.php?error=$error&err=$err");
                }
            }
        }
    }
	
?>