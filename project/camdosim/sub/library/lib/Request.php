<?php
function get($key, $default = null){
    $request = new Zend_Controller_Request_Http();
    if (!is_null($request->get($key)))
        return $request->get($key);
    else
        return $default;
}

function isLogin(){
    if (!NV_User::getUser()){
        header("location:" . SUB_URL . "/login/#");
    }
    
}
function getController(){
    $controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
    return $controller;
}

function getAction(){
    $action = Zend_Controller_Front::getInstance()->getRequest()->getActionName();
    return $action;
}

function getModule(){
    $module = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();
    return $module;
}

?>
