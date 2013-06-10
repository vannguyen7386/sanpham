<?php
class Login_IndexController extends Zend_Controller_Action {
    public function init(){
        if (isset($_COOKIE['user'])){
            $ID = $_COOKIE['user'];
            $user = NV_User::getUser($ID);
            $session = new Zend_Session_Namespace('user');
            $session->user = $user;
        }
        if (NV_User::getUser() != null){
            $this->redirect("");
        }
    }
    public function indexAction(){
        $this->getLayout();
        NV_Base::addJSON(array('title'=>'Đăng nhập'));
        if ($this->getRequest()->isPost()){
            $username = get('username');
            $password = md5(get('password'));
            if (NV_User::checkLogin($username, $password)){
                if (get('remember', '0') == 1){
                    $session = new Zend_Session_Namespace('user');
                    $user = $session->user;
                    setcookie('user', $user['ID'], time() + 3600 * 24 * 30);
                }
                NV_Base::setJSON(array('redirect'=>SUB_URL));
            }
        }
    }
    
    private function getLayout() {
        $options = array(
            'layout' => "login",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }
    
}
