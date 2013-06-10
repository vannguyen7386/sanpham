<?php
class Logout_IndexController extends Zend_Controller_Action{
    public function init() {
        NV_User::logout();
        $this->redirect("login");
    }
    
    public function indexAction() {
        
    }
}
