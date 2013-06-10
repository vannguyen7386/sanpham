<?php

class Contact_IndexController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        $config = getCacheDB('configs');
        $row_per_page = $config['page_number'];
        $start = get('start', 0);
        Zend_Layout::resetMvcInstance();
        $count = NV_Data::_db()->fetchOne("SELECT COUNT(`ID`) FROM `customer_messages`");
        $contacts = NV_Data::_db()->fetchAll("SELECT `a`.*, `b`.`name`, `b`.`email`, `b`.`phone` FROM `customer_messages` as `a` 
                                        LEFT JOIN `customers` as `b` ON `a`.`customer_id` = `b`.`ID`  
                                        ORDER BY `a`.`date_created` DESC LIMIT {$start},{$row_per_page}");
        
        NV_Base::addJSON(array('title' => 'Liên hệ'));
        $this->view->count = $count;
        $this->view->contacts = $contacts;
        $this->view->start = $start;
        $this->view->row_per_page = $row_per_page;
        NV_Base::getJSON();
    }

    public function deleteAction(){
        $ID = get('ID', array());
        Zend_Layout::resetMvcInstance();
        if (is_array($ID)){
            if (count($ID) == 0){
                NV_Base::setJSON(array('alert' => 'Bạn chưa chọn liên hệ'));
            }
            $ids = implode(',', $ID);
            NV_Data::_db()->delete('customer_messages', "`ID` IN ({$ids})");
        }else{
            NV_Data::_db()->delete('customer_messages',"`ID` = '{$ID}'");
        }
        NV_Base::setJSON(array('notice' => 'Xóa thành công', 'reload' => true));
    }
    public function viewAction() {
        Zend_Layout::resetMvcInstance();
        $ID = get('ID', 0);
        
        if (!filter_var($ID, FILTER_VALIDATE_INT)) {
            die(json_encode(array('alert' => 'Không đúng định dạng')));
        }
        $contact = NV_Data::_db()->fetchRow("SELECT `a`.*, `b`.`name`, `b`.`email`, `b`.`phone` FROM `customer_messages` as `a` 
                                        LEFT JOIN `customers` as `b` ON `a`.`customer_id` = `b`.`ID`  
                                        WHERE `a`.`ID`=?", array($ID));
        if($contact['is_read'] == 0){
            NV_Data::_db()->update("customer_messages", array('is_read' => 1), "`ID`='{$ID}'");
        }
     
        NV_Base::addJSON(array('title' => 'Liên hệ - ' . $contact['title']));
        NV_Base::getJSON();
        $this->view->contact = $contact;
    }

    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }
}