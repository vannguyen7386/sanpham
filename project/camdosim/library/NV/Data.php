<?php
class NV_Data {
    public static function _db() {
        $config = include APPLICATION_PATH . "/configs/config.php";
        if (!($db = Zend_Db_Table::getDefaultAdapter())) {
            $db = Zend_Db::factory($config['Adapter'], $config['db']);
            $db->setFetchMode(Zend_Db::FETCH_ASSOC);
            Zend_Db_Table::setDefaultAdapter($db);
        } else {
            $db = Zend_Db_Table::getDefaultAdapter();
        }
        $db->query("SET NAMES 'utf8'");
        return $db;
    }

}

