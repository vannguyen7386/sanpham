<?php

class Contact_IndexController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {

        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        NV_Base::addJSON(array('title' => 'Liên hệ'));
        $captcha = randomText(5);
        $this->view->captcha = $captcha;
        if ($isPost) {
            $captcha_text = trim(get('captcha'));
            $captcha_right = trim(get('hdCaptcha'));
            if ($captcha_text != $captcha_right) {
                NV_Base::setJSON(array('alert' => 'Bạn phải nhập đúng các kí tự captcha'));
            }
            $err = array();
            if (get('name') == '') {
                $err[] = "Bạn chưa nhập tên";
            }
            if (get('email') == '') {
                $err[] = "Bạn chưa nhập email";
            } else {
                if (!filter_var(get('email'), FILTER_VALIDATE_EMAIL)) {
                    $err[] = "Email không đúng định dạng";
                }
            }
            if (get('subject') == '') {
                $err[] = "Bạn chưa nhập chủ đề";
            }
            if (get('feedback') == '') {
                $err[] = "Bạn chưa nhập nội dung";
            }
            if (count($err) > 0) {
                $error = implode('<br/>', $err);
                NV_Base::setJSON(array(
                    'alert' => $error
                ));
            }
            $name = trim(escape_html(get('name')));
            $code = code_generate('customers', 'ID', 'KH');
            $email = trim(escape_html(get('email')));
            $subject = trim(escape_html(get('subject')));
            $feedback = trim(escape_html(get('feedback')));
            $phone = trim(escape_html(get('phone', '')));
            $data_cus = array(
                'code' => $code,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'date_created' => new Zend_Db_Expr('NOW()'),
                'created_by_id' => 0
            );
            $db = NV_Data::_db();
            if ($customer = NV_Data::_db()->fetchRow("SELECT * FROM `customers` WHERE `email` LIKE ? ", $email)) {
                $cus_id = $customer['ID'];
            } else {
                $db->insert('customers', $data_cus);
                $cus_id = $db->lastInsertId('customers');
            }
            $data_message = array(
                'customer_id' => $cus_id,
                'title' => $subject,
                'content' => $feedback,
                'date_created' => new Zend_Db_Expr('NOW()')
            );

            $db->insert('customer_messages', $data_message);
            NV_Base::setJSON(array(
                'notice' => 'Gửi liên hệ thành công',
                'reload' => true
            ));
        }
        NV_Base::getJSON();
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
