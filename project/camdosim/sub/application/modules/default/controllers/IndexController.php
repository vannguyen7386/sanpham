<?php
class IndexController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        $this->view->headTitle("Cầm đồ sim - Admin Panel");
        if (get('mod','') == 'ajax') {
            Zend_Layout::resetMvcInstance();
        }
        $this->view->messages  = NV_Data::_db()->fetchAll("SELECT `a`.*, `b`.`name` FROM `customer_messages` as `a` 
                                                        LEFT JOIN `customers` as `b` ON `a`.`customer_id`=`b`.`ID`
                                                        WHERE `a`.`is_read`=0 LIMIT 8");
        
    }
    
    
    public function sessionAction(){
        $user = new Zend_Session_Namespace("user");
        $user->setExpirationSeconds(100);
        if ($user->user){
            echo $user->user['username'];
        }else{
            $user->user = Data::_db()->fetchRow("SELECT * FROM `users` WHERE `ID`=?", 1);
        }
        $this->render('index');
    }   

    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }

    

}

?>
