<?php

class NV_User {

    public static function getUser() {
        if (func_num_args() == 0) {
            $user = new Zend_Session_Namespace('user');
            return $user->user;
        } else if (func_num_args() == 1) {
            $user_id = func_get_arg(0);
            $user = NV_Data::_db()->fetchRow("SELECT * FROM `users` WHERE `ID`=?", array($user_id));
            return $user;
        }
    }

    public static function checkLogin($username, $password) {
        $username = trim(addslashes($username));
        $password = md5(addslashes($password));

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
            unset($user['password']);
            $session->user = $user;
            $session->setExpirationSeconds(60 * 15);
            return true;
        }
        Base::setJSON(array('alert' => 'Tên đăng nhập hoặc mật khẩu không đúng'));
        return false;
    }

    public static function getUsername() {
        if (func_num_args() == 0){
            $user = self::getUser();
        }  else if (func_num_args () == 1){
            $user_id = func_get_arg(0);
            $user = self::getUser($user_id);
        }
        return is_array($user) ? $user['username'] : "";
    }

    public static function logout() {
        Zend_Session::namespaceUnset('user');
        setcookie("user", '', time() - 3600 * 24 * 30);
       
    }

}
