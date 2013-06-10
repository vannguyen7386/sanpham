<?php

class Block_Banner extends Zend_View_Helper_Abstract{
    public function Banner(){
        $config = getCacheDB('configs');
        $banner = $config['banner'];
        return $banner;
    }
}

