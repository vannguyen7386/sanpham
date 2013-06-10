<?php

class MapsController extends Zend_Controller_Action {

    public function indexAction() {
        Zend_Layout::resetMvcInstance();
        $config = getCacheDB("configs");
        $this->view->lat = $config['lat'];
        $this->view->lng = $config['lng'];
    }

}
