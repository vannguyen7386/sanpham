<?php
class News_IndexController extends Zend_Controller_Action {
    public function indexAction(){
        $start = get('start', 0);
        $config = getCacheDB('configs');
        $row_per_page = $config['page_number'];
        if (!filter_var($start, FILTER_VALIDATE_INT) && $start != 0){
            Base::setJSON(array('alert'=>'Lỗi định dạng'));
        }
        Base::addJSON(array('title' => 'Tin tức'));
        Base::getJSON();
        $count = Data::_db()->fetchOne("SELECT COUNT(`ID`) FROM `news`");
        $news = Data::_db()->fetchAll("SELECT * FROM `news` ORDER BY IFNULL(`date_updated`,`date_created`) DESC
                                        LIMIT {$start},{$row_per_page}");
        $this->view->start = $start;
        $this->view->count = $count;
        $this->view->news = $news;
        $this->view->row_per_page = $row_per_page;
        if ($start > 0){
            $this->render('extra');
        }
    }
    
    public function viewAction() {
        $ID = get('ID', 0);
        if (!filter_var($ID, FILTER_VALIDATE_INT)){
            die(json_encode(array('alert'=>'Không đúng định dạng')));
        }
        $news = Data::_db()->fetchRow("SELECT * FROM `news` WHERE `ID`=?", array($ID));
        Base::addJSON(array('title'=>'Tin tức - ' . $news['title']));
        Base::getJSON();
        $this->view->news = $news;
        $other_news = Data::_db()->fetchAll("SELECT * FROM `news` WHERE `category_id`='{$news['category_id']}'
                      AND `ID` <> '{$news['ID']}'  
                      ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT 5");
        $this->view->others = $other_news;
    }
}
