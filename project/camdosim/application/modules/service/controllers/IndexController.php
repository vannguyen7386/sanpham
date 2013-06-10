<?php
class Service_IndexController extends Zend_Controller_Action {
    
    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        $config = getCacheDB('configs');
        $row_per_page = $config['page_number'];
        $start = get('start', 0);
        Zend_Layout::resetMvcInstance();
        $count = NV_Data::_db()->fetchOne("SELECT COUNT(`ID`) FROM `services`");
        $services = NV_Data::_db()->fetchAll("SELECT * FROM `services` as `a`
                                        ORDER BY `ID` DESC LIMIT {$start},{$row_per_page}");
        NV_Base::addJSON(array('title'=>'Dịch vụ'));
        NV_Base::getJSON();
        $this->view->count = $count;
        $this->view->services = $services;
        $this->view->start = $start;
        $this->view->row_per_page = $row_per_page;
        if ($start > 0)
            $this->render ('extra');
    }

    public function viewAction() {
        Zend_Layout::resetMvcInstance();
        $ID = get('ID', 0);
        if (!filter_var($ID, FILTER_VALIDATE_INT)){
            die(json_encode(array('alert'=>'Không đúng định dạng')));
        }
        $service = NV_Data::_db()->fetchRow("SELECT * FROM `services` WHERE `ID`=?", array($ID));
        NV_Base::addJSON(array('title'=>'Dịch vụ - ' . $service['title']));
        NV_Base::getJSON();
        $this->view->service = $service;
        $other_services = Data::_db()->fetchAll("SELECT * FROM `services` WHERE `category_id`='{$service['category_id']}'
                      AND `ID` <> '{$service['ID']}'  
                      ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT 5");
        $this->view->others = $other_services;
    }
    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }

}