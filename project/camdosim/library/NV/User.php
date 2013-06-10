<?php
class NV_User {
    public static function getUser() {
        $user = new Zend_Session_Namespace('user');
        return $user->user;
    }

    public static function checkLogin($username, $password) {
        $username = trim(Data::_db()->quote($username));
        $password = md5(trim(Data::_db()->quote($password)));
        if ($user = Data::_db()->fetchRow("SELECT * FROM `users` WHERE `username` LIKE ? AND `password` LIKE ?", array($username, $password))) {
            if ($user['ip_access'] != NULL) {
                $ips_accept = explode(',', $user['ip_access']);
                $ip = $_SERVER['REMOTE_ADDR'];
                if (!in_array($ip, $ips_accept)) {
                    Base::setJSON(array('alert' => 'Ip không được chấp nhận'));
                    return false;
                }
            }
            $session = new Zend_Session_Namespace('user');
            $session->user = $user;
            return true;
        }
        Base::setJSON(array('alert' => 'Tên đăng nhập hoặc mật khẩu không đúng'));
        return false;
    }

}
