<?php 
    $online = new beingOnline();
    $online->set_session();
    $online->set_time();
    if($online->check_session()==0){
        $online->insertDB();
    }else{
        $online->updateDB();
    }
    $online->deleteSession();
    
    $countOn = new CountOnline($_SERVER['REMOTE_ADDR']);
    if(!isset($_COOKIE['ip']) or $_COOKIE['ip'] != $_SERVER['REMOTE_ADDR']){
        $countOn->set_cookie();
        if($countOn->checkIp()==0){
            $countOn->insertIp();
        }else{
            $quantity = $countOn->getQuantity();
            $countOn->updateQty($quantity);
        }
    }
    $CountProd = new DisplayAll();
    $sql = "SELECT COUNT(*) FROM fas_product";
    $res = $CountProd->displaySingle($sql);
    include'Application/Views/ViewStatistic.php';
?>