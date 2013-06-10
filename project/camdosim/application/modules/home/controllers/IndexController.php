<?php
class Home_IndexController extends Zend_Controller_Action {
    public function indexAction(){
        
    }
    
    public function addAction(){
        $this->view->product = "ABC";
    }
}
?>
