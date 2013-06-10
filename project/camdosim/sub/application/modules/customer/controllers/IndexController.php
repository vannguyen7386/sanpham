<?php
class Customer_IndexController extends Zend_Controller_Action {
    public function init() {
        $this->getLayout();
    }
    public function indexAction(){
        Zend_Layout::resetMvcInstance();
        $config = getCacheDB('configs');
        $row_per_page = $config['page_number'];
        $start = get('start', 0);
        $count = NV_Data::_db()->fetchOne("SELECT COUNT(`ID`) FROM `customers`");
        $posts = NV_Data::_db()->fetchAll("SELECT * FROM `customers` ORDER BY IFNULL(`date_updated`,`date_created`) DESC
                                          LIMIT {$start},{$row_per_page}");
        NV_Base::addJSON(array('title' => 'Khách hàng'));
        NV_Base::getJSON();
        $this->view->count = $count;
        $this->view->posts = $posts;
        $this->view->start = $start;
        $this->view->row_per_page = $row_per_page;                                  
                                     
    }
    
    public function viewAction(){
        Zend_Layout::resetMvcInstance();
        $ID = get('ID');
        if (!filter_var($ID, FILTER_VALIDATE_INT)){
            NV_Base::setJSON(array('alert' => 'ID không đúng định dạng'));
        }
        NV_Base::addJSON(array('title' => 'Chi tiết khách hàng'));
        NV_Base::getJSON();
        $customer = NV_Data::_db()->fetchRow("SELECT * FROM `customers` WHERE `ID`=?", array($ID));
        if (!$customer){
            NV_Base::setJSON(array('alert' => 'Không tồn tại khách hàng'));
        }
        $cus_banks = NV_Data::_db()->fetchAll("SELECT * FROM `customer_bank_account` WHERE `cus_id`=?", array($ID));
        $cus_info = NV_Data::_db()->fetchAll("SELECT * FROM `customer_info` WHERE `customer_id`=?", array($ID));
        $customer['banks'] = $cus_banks;
        $customer['info'] = $cus_info;
        $this->view->customer = $customer;
        $this->view->banks = getCache('banks');
        $this->view->cus_info_type = getCache('customer_info_type');
        
    }
    
    public function addAction(){
        Zend_Layout::resetMvcInstance();
        $this->view->banks = getCache('banks');
        $cus_info_type = getCache('customer_info_type', 'customer_info_type_alias', 'alias');
        $this->view->cus_info_type = $cus_info_type; 
        $this->view->code = code_generate('customers','ID','KH');
        NV_Base::addJSON(array('title' => 'Thêm mới khách hàng'));
     
        if ($this->_request->isPost()){
            $data = array();
            $err = array();
            $data['code'] = get('code');
            if (get('name', '') == ''){
                $err[] = "Tên khách hàng không được để trống";
            }
            $email = get('email');
            $count = NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `customers` WHERE `email` LIKE ?", $email);
           
            $data['name'] = get('name');
            if (get('email', '') == ''){
                $err[] = "Email không được để trống";
            }
            elseif (!filter_var(get('email'), FILTER_VALIDATE_EMAIL)){
                $err[] = "Email không đúng định dạng";
            }
            elseif ($count > 0){
                $err[] = "Email đã tồn tại";
            }
            $data['email'] = get('email');
            $data['phone'] = get('phone');
            $data['date_created'] = new Zend_Db_Expr('NOW()');
            $user = NV_User::getUser();
            $data['created_by_id'] = $user['ID'];
            $accounts = array();
            $accounts['account_number'] = get('account_number', array());
            $accounts['bank_id'] = get('bank_id', array());
            $accounts['bank_branch'] = get('bank_branch', array());
            $c_banks = array();
            if (count($err) > 0){
                NV_Base::setJSON(array('alert' => implode('<br/>', $err)));
            }
            $_db = NV_Data::_db();
            $_db->insert("customers", $data);
            $cus_id = $_db->lastInsertId();
            for ($i = 0; $i < count($accounts['account_number']); $i++) {
                $c_banks['cus_id'] = $cus_id;
                $c_banks['bank_id'] = $accounts['bank_id'][$i];
                $c_banks['account_number'] = $accounts['account_number'][$i];
                $c_banks['bank_branch'] = $accounts['bank_branch'][$i];
                NV_Data::_db()->insert("customer_bank_account", $c_banks);
            }
            $cus_info = array();
            foreach ($cus_info_type as $k => $value) {
                $cus_info['customer_id'] = $cus_id;
                $cus_info['type'] = $cus_info_type[$k]['ID'];
                $cus_info['value'] = get($k);
                NV_Data::_db()->insert('customer_info', $cus_info);
            }
        }
        NV_Base::getJSON();
    }
    public function editAction(){
        Zend_Layout::resetMvcInstance();
        $this->view->banks = getCache('banks');
        $cus_info_type = getCache('customer_info_type', 'customer_info_type_alias', 'alias');
        $this->view->cus_info_type = $cus_info_type; 
        NV_Base::addJSON(array('title' => 'Sửa khách hàng'));
        $ID = get('ID');
        if (!filter_var($ID, FILTER_VALIDATE_INT)){
            NV_Base::setJSON(array('alert' => 'ID không đúng định dạng'));
        }
        $customer = NV_Data::_db()->fetchRow("SELECT * FROM `customers` WHERE `ID`=?", array($ID));
        $cus_banks = NV_Data::_db()->fetchAll("SELECT * FROM `customer_bank_account` WHERE `cus_id`=?", array($ID));
        $cus_info = NV_Data::_db()->fetchAll("SELECT * FROM `customer_info` WHERE `customer_id`=?", array($ID));
        $customer['banks'] = $cus_banks;
        $customer['info'] = $cus_info;
        $this->view->customer = $customer;
        if ($this->_request->isPost()){
            $data = array();
            $err = array();
            $data['code'] = get('code');
            if (get('name', '') == ''){
                $err[] = "Tên khách hàng không được để trống";
            }
            $email = get('email');
            $count = NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `customers` WHERE `email` LIKE ?", $email);
           
            $data['name'] = get('name');
            if (get('email', '') == ''){
                $err[] = "Email không được để trống";
            }
            elseif (!filter_var(get('email'), FILTER_VALIDATE_EMAIL)){
                $err[] = "Email không đúng định dạng";
            }
            elseif ($count > 0){
                $err[] = "Email đã tồn tại";
            }
            $data['email'] = get('email');
            $data['phone'] = get('phone');
            $data['date_created'] = new Zend_Db_Expr('NOW()');
            $user = NV_User::getUser();
            $data['created_by_id'] = $user['ID'];
            $accounts = array();
            $accounts['account_number'] = get('account_number', array());
            $accounts['bank_id'] = get('bank_id', array());
            $accounts['bank_branch'] = get('bank_branch', array());
            $c_banks = array();
            if (count($err) > 0){
                NV_Base::setJSON(array('alert' => implode('<br/>', $err)));
            }
            $_db = NV_Data::_db();
            $_db->insert("customers", $data);
            $cus_id = $_db->lastInsertId();
            for ($i = 0; $i < count($accounts['account_number']); $i++) {
                $c_banks['cus_id'] = $cus_id;
                $c_banks['bank_id'] = $accounts['bank_id'][$i];
                $c_banks['account_number'] = $accounts['account_number'][$i];
                $c_banks['bank_branch'] = $accounts['bank_branch'][$i];
                NV_Data::_db()->insert("customer_bank_account", $c_banks);
            }
            $cus_info = array();
            foreach ($cus_info_type as $k => $value) {
                $cus_info['customer_id'] = $cus_id;
                $cus_info['type'] = $cus_info_type[$k]['ID'];
                $cus_info['value'] = get($k);
                NV_Data::_db()->insert('customer_info', $cus_info);
            }
        }
        NV_Base::getJSON();
    }
    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }
    
}
