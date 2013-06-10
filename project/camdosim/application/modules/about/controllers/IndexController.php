<?php
class About_IndexController extends Zend_Controller_Action {
    public function indexAction(){
        $about = $this->getAbout();
        Base::addJSON(array('title'=>'Giới thiệu'));
        Base::getJSON();
        $this->view->about = $about;
    }
    
    private function getAbout(){
        $about = getCacheDB('about');
        if (!$about){
            $about = Data::_db()->fetchRow("SELECT * FROM `about` LIMIT 1");
            setCacheDB('about', (array)'about', $about);
        }
        return $about;
        
    } 
}