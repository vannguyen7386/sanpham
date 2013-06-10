<?php
Zend_Session::start();
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    public function _initAutoload(){
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
                                'module'     => 'error',
                                'controller' => 'error',
                                'action'     => 'error'
        )));
        
    }
    public function _initConfig(){
        if (!hasCache("configs")){
            $config = Data::_db()->fetchRow("SELECT * FROM `configs` ORDER BY `ID` LIMIT 1");
            setCacheDB("configs", "configs", $config);
        }
    }
}
?>
