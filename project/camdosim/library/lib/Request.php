<?php
function get($key, $default = null){
    $request = new Zend_Controller_Request_Http();
    if ($request->get($key))
        return $request->get($key);
    else
        return $default;
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
