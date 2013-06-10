<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        
        $this->view->headTitle("Cầm đồ sim - Trang chủ");
        if (get('mod','') == 'ajax') {
            Zend_Layout::resetMvcInstance();
        }
        $slides = $this->getSlide();
        $this->view->slides = $slides;
        $services = NV_Data::_db()->fetchAll("SELECT * FROM `services` ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT 2");
        $news = NV_Data::_db()->fetchAll("SELECT * FROM `news` ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT 2");
        $posts = array();
        $link = "";
        foreach ($services as $s) {
            $link = "service/index/view?ID={$s['ID']}";
            $s['link'] = $link;
            $s['type'] = "Dịch vụ";
            $s['thumb'] = BASE_URL . "/upload/service/" . $s['thumb'];
            $posts[] = $s;
        }
        foreach ($news as $s) {
            $link = "news/index/view?ID={$s['ID']}";
            $s['link'] = $link;
            $s['type'] = "Tin tức";
            $s['thumb'] = BASE_URL . "/upload/news/" . $s['thumb'];
            $posts[] = $s;
        }
        $this->view->posts = $posts;
    }
    
    private function getSlide(){
        $slides = getCacheDB('slide');
        if (!$slides){
            $slides = NV_Data::_db()->fetchAll("SELECT * FROM `slide` WHERE `active`= 1 ORDER BY `ID` DESC");
            setCacheDB('slide', 'slide', $slides);
        }
        return $slides;
    }
    
    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }
    
    public function searchAction() {
        Zend_Layout::resetMvcInstance();
    }
}

?>
