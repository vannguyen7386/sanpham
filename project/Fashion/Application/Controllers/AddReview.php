<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    $review = new DisplayAll();
    if(isset($_POST)){
        $Name = null;
        $Email = null;
        $Content = null;
        $ProdId = null;
        $flag = true;
        $err = "";
        $error="";
        if(isset($_POST['Name']) and !empty($_POST['Name'])){
            $Name = $review->sqlQuote($_POST['Name']);
        }else{
            $flag = false;
            $err .= "Bạn không được để trống họ tên";
        }
        if(isset($_POST['Email']) and !empty($_POST['Email'])){
            $Email = $review->sqlQuote($_POST['Email']);
        }else{
            $flag = false;
            $err .= "Bạn không được để trống Email";
        }
        if(isset($_POST['Content']) and !empty($_POST['Content'])){
            $Content = $review->sqlQuote($_POST['Content']);
        }else{
            $flag = false;
            $err .= "Bạn không được để trống nội dung";
        }
        $ProdId = $_POST['ProdID'];
        
        
        if($flag){
            $review->insertReview($Name,$Email,$Content,$ProdId);
            header("location:../../Chi tiet san pham.php?ProdID={$ProdId}");
        }
        else{
           header("location:../../Danh gia.php?Id={$ProdId}&err=$err");
                
        }   
    }  
?>