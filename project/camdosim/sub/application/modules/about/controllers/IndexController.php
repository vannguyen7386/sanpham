<?php
class About_IndexController extends Zend_Controller_Action {
    public function indexAction(){
        $about = $this->getAbout();
        Base::addJSON(array('title'=>'Giới thiệu'));       
        $this->view->about = $about;
        if ($this->getRequest()->isPost()){
            $desc = get('desc');
            if (get('desc') == ''){
                NV_Base::setJSON(array('alert' => 'Không được để trống nội dung'));
            }
            NV_Data::_db()->update('about', array('desc' => $desc),"`ID`='{$about['ID']}'");
            removeCacheDB('about');
            NV_Base::setJSON(array('notice' => 'Cập nhật thành công', 'reload' => true));
        }
        Base::getJSON();
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