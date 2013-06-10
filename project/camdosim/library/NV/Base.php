<?php
class NV_Base {
    private static $jsonData = array();
    
    final public static function addJSON( $data ) {
        self::$jsonData = array_merge(self::$jsonData, (array) $data);

    }

    final public static function setJSON( $data ) {
        die(json_encode(array_merge(self::$jsonData, (array) $data)));
    }
    
    public static function getJSON(){
        echo "<script>var json_data = " . json_encode(self::$jsonData) . "</script>";
    }
    
    
}
