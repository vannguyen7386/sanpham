<?php
class NV_Visitor {
    private $ip;
    private $time;
    private $browser;

    public function __construct() {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->time = time();
        $this->browser = $_SERVER['HTTP_USER_AGENT'];
    }

    private function executeIp() {
        
        if (!isset($_COOKIE['ip']) or $_COOKIE['ip'] != $this->ip) {
            $current_ip = trim($this->ip);
            
            $ip = NV_Data::_db()->fetchRow("SELECT * FROM `visitors` WHERE `ip`=?", array($current_ip));
            if (!$ip) {
                NV_Data::_db()->insert('visitors', array('ip' => $current_ip, 'count' => 1));
            } else {
                NV_Data::_db()->update('visitors', array('count' => $ip['count'] + 1), "`ID`='{$ip['ID']}'");
            }
            setcookie('ip', $current_ip, $this->time + 3600 * 3);
        }
    }
    
    public function getVisitors(){
        $this->executeIp();
        $visitors = NV_Data::_db()->fetchOne("SELECT SUM(`count`) FROM `visitors`");
        return $visitors;
    }
    
    private function executeOnline(){
        $check_time = $this->time - 600;
        NV_Data::_db()->delete('visitors_online', "`time` < '{$check_time}'");
        $visitor = NV_Data::_db()->fetchRow("SELECT * FROM `visitors_online` WHERE `ip`=? AND `browser`=?", 
                array(
                    $this->ip, $this->browser
                ));
        if ($visitor){
            NV_Data::_db()->update('visitors_online', array('time' => $this->time), "`ip`='{$visitor['ip']}' 
                        AND `browser`='{$visitor['browser']}'");
        }else{
            if ($user = NV_User::getUser()){
                $data = array(
                    'ip' => $this->ip,
                    'user_id' => $user['ID'],
                    'time' =>  $this->time,
                    'browser' => $this->browser
                );
            }else{
                $data = array(
                    'ip' => $this->ip,
                    'time' =>  $this->time,
                    'browser' => $this->browser
                );
            }
            NV_Data::_db()->insert('visitors_online', $data);
        }
    }
    
    public function getVisitorsOnline(){
        $this->executeOnline();
        $totals = array(
            'all' => NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `visitors_online`"),
            'customers' =>NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `visitors_online` WHERE `user_id`=0"),
            'users' => NV_Data::_db()->fetchOne("SELECT COUNT(*) FROM `visitors_online` WHERE `user_id` > 0")
        );
        return $totals;
    }

}