<?php

class SettingController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        Zend_Layout::resetMvcInstance();
        NV_Base::addJSON(array(
            'title' => 'Cấu hình'
        ));
        NV_Base::getJSON();
        $configs = getCacheDB('configs');
        $slide = $this->getSlide();
        $banks = $this->getBanks();

        $names = explode(',', $configs['contact_name']);
        $phones = explode(',', $configs['contact_phone']);
        $yahoos = explode(',', $configs['yahoo']);
        $emails = explode(',', $configs['contact_email']);
        $contacts = array(
            'names' => $names,
            'phones' => $phones,
            'yahoos' => $yahoos,
            'emails' => $emails,
        );
        if ($this->getParam('success')) {
            $this->view->success = $this->getParam('success');
        }
        if ($this->getParam('error')) {
            $this->view->error = $this->getParam('error');
        }
        $this->view->customer_info_type = getCache('customer_info_type');
        $this->view->contacts = $contacts;
        $this->view->configs = $configs;
        $this->view->slide = $slide;
        $this->view->banks = $banks;
        $this->view->scates = NV_Data::_db()->fetchAll("SELECT * FROM `service_categories` ORDER BY `title`");
        $this->view->ncates = NV_Data::_db()->fetchAll("SELECT * FROM `news_categories` ORDER BY `title`");
    }

    public function editAction() {
        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        if ($isPost) {
            $configs = getCacheDB('configs');
            $data = array();
            $err = array();
            $data['site_title'] = get('site_title');
            if (get('site_title') == '') {
                $err[] = "Tựa đề website không được để trống";
            }
            $contact_names = get('contact_name', array());
            $phones = get('contact_phone', array());
            $yahoos = get('yahoo', array());
            $emails = get('contact_email', array());

            $check = count($contact_names) == count($phones) ? (count($phones) == count($yahoos) ? (count($yahoos) == count($emails)) : false) : false;
            if (!$check) {
                $err[] = "Chọn đầy đủ thông tin liên hệ";
            }
            $data['contact_name'] = implode(',', $contact_names);
            $data['contact_phone'] = implode(',', $phones);
            $data['contact_email'] = implode(',', $emails);
            $data['yahoo'] = implode(',', $yahoos);
            $data['contact_address'] = get('contact_address');
            $data['lat'] = get('lat');
            $data['lng'] = get('lng');
            $data['facebook'] = get('facebook');
            $data['bank_account'] = get('bank_account');
            $data['bank_id'] = get('bank_id');
            $data['bank_branch'] = get('bank_branch');
            $files = $_FILES['myfile'];
            if ($files['name']) {
                if (!preg_match('/image\/\w*(jpg|jpeg|png|gif|bmp)/ui', $files['type'])) {
                    $err[] = "Không đúng định dạng file";
                } else {
                    if ($files['error'] > 0) {
                        $err[] = "Có lỗi xảy ra";
                    }
                    if ($configs['max_size_upload']) {
                        if ($files['size'] > $configs['max_size_upload'] * 1024 * 1024) {
                            $err[] = "File upload có dung lượng quá lớn";
                        }
                    }
                }
            }
            $data['keywords'] = get('keywords');
            $data['desc'] = get('desc');
            $data['page_number'] = get('page_number');
            $data['max_size_upload'] = get('max_size_upload');

            if (count($err) == 0) {
                if ($files['name']) {
                    if (file_exists(ROOT . "/upload/logo/" . $files['name'])) {
                        $extension = getExtension($files['name']);
                        $files['name'] = str_replace('.' . $extension, '', $files['name']) . "_" . time() . ".{$extension}";
                    }
                    move_uploaded_file($files['tmp_name'], ROOT . "/upload/logo/" . $files['name']);
                    $data['logo'] = $files['name'];
                }
                NV_Data::_db()->update('configs', $data, "`ID`='{$configs['ID']}'");
                removeCacheDB('configs');
            } else {
                $this->redirect('#default/setting/index/error/' . implode(',', $err));
            }

            $this->redirect('#default/setting/index/success/Cập nhật thành công');
        }
    }

    public function editslideAction() {
        Zend_Layout::resetMvcInstance();
        $ID = get('ID', 0);
        $this->view->slide = Data::_db()->fetchRow("SELECT * FROM `slide` WHERE `ID`= ? ", array($ID));
        $isPost = $this->getRequest()->isPost();
        if ($isPost) {
            $configs = getCacheDB('configs');
            $data = array();
            $err = array();
            $data['title'] = get('title');
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            $data['summary'] = get('summary');
            $data['link'] = get('link');
            $data['active'] = get('active', 0);
            $files = $_FILES['file'];
            if ($files['name']) {
                if (!preg_match('/image\/\w*(jpg|jpeg|png|gif|bmp)/ui', $files['type'])) {
                    $err[] = "Không đúng định dạng file";
                } else {
                    if ($files['error'] > 0) {
                        $err[] = "Có lỗi xảy ra";
                    }
                    if ($configs['max_size_upload']) {
                        if ($files['size'] > $configs['max_size_upload'] * 1024 * 1024) {
                            $err[] = "File upload có dung lượng quá lớn";
                        }
                    }
                }
            }
            if (count($err) == 0) {
                if ($files['name']) {
                    if (file_exists(ROOT . "/public/style/images/slide/" . $files['name'])) {
                        $extension = getExtension($files['name']);
                        $files['name'] = str_replace('.' . $extension, '', $files['name']) . "_" . time() . ".{$extension}";
                    }
                    move_uploaded_file($files['tmp_name'], ROOT . "/public/style/images/slide/" . $files['name']);
                    $data['image'] = $files['name'];
                }
                NV_Data::_db()->update('slide', $data, "`ID`='{$ID}'");
                removeCacheDB('slide');
            } else {
                $this->redirect('#default/setting?tab=1&error=' . implode(',', $err));
            }
            $this->redirect('#default/setting?tab=1&success=Cập nhật thành công');
        }
    }

    public function addslideAction() {
        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        if ($isPost) {
            $configs = getCacheDB('configs');
            $data = array();
            $err = array();
            $data['title'] = get('title');
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            $data['summary'] = get('summary');
            $data['link'] = get('link');
            $data['active'] = get('active', 0);
            $files = $_FILES['file'];
            if ($files['name']) {
                if (!preg_match('/image\/\w*(jpg|jpeg|png|gif|bmp)/ui', $files['type'])) {
                    $err[] = "Không đúng định dạng file";
                } else {
                    if ($files['error'] > 0) {
                        $err[] = "Có lỗi xảy ra";
                    }
                    if ($configs['max_size_upload']) {
                        if ($files['size'] > $configs['max_size_upload'] * 1024 * 1024) {
                            $err[] = "File upload có dung lượng quá lớn";
                        }
                    }
                }
            }
            if (count($err) == 0) {
                if ($files['name']) {
                    if (file_exists(ROOT . "/public/style/images/slide/" . $files['name'])) {
                        $extension = getExtension($files['name']);
                        $files['name'] = str_replace('.' . $extension, '', $files['name']) . "_" . time() . ".{$extension}";
                    }
                    move_uploaded_file($files['tmp_name'], ROOT . "/public/style/images/slide/" . $files['name']);
                    $data['image'] = $files['name'];
                }
                NV_Data::_db()->insert('slide', $data);
                removeCacheDB('slide');
            } else {
                $this->redirect('#default/setting?tab=1&error=' . implode(',', $err));
            }
            $this->redirect('#default/setting?tab=1&success=Thêm mới thành công');
        }
    }

    public function editbannerAction() {
        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        if ($isPost) {
            $configs = getCacheDB('configs');
            $data = array();
            $err = array();
            $files = $_FILES['banner'];
            if ($files['name']) {
                if (!preg_match('/image\/\w*(jpg|jpeg|png|gif|bmp)/ui', $files['type'])) {
                    $err[] = "Không đúng định dạng file";
                } else {
                    if ($files['error'] > 0) {
                        $err[] = "Có lỗi xảy ra";
                    }
                    if ($configs['max_size_upload']) {
                        if ($files['size'] > $configs['max_size_upload'] * 1024 * 1024) {
                            $err[] = "File upload có dung lượng quá lớn";
                        }
                    }
                }
            }
            if (count($err) == 0) {
                if ($files['name']) {
                    move_uploaded_file($files['tmp_name'], ROOT . "/upload/banner/" . $files['name']);
                    $data['banner'] = $files['name'];
                    NV_Data::_db()->update('configs', $data, "`ID`='{$configs['ID']}'");
                    removeCacheDB('configs');
                    $this->redirect('#default/setting?tab=4&success=Cập nhật thành công');
                }
            } else {
                $this->redirect('#default/setting?tab=4&error=' . implode(',', $err));
            }
            $this->redirect("#default/setting?tab=4");
        }
    }
    public function deleteslideAction(){
        $ID = get('ID', array());
        Zend_Layout::resetMvcInstance();
        if (is_array($ID)){
            if (count($ID) == 0){
                NV_Base::setJSON(array('alert' => 'Bạn chưa chọn slide'));
            }
            $ids = implode(',', $ID);
            NV_Data::_db()->delete('slide', "`ID` IN ({$ids})");
        }else{
            $s = NV_Data::_db()->fetchOne("SELECT `image` FROM `slide` WHERE `ID`= ?", $ID);
            unlink(ROOT . "/public/style/images/slide/" . $s);
            NV_Data::_db()->delete('slide',"`ID` = '{$ID}'");
        }
        removeCacheDB('slide');
        NV_Base::setJSON(array('notice' => 'Xóa thành công', 'reload' => true));
        
    }
    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }

    private function getSlide() {
        $slides = getCacheDB('slide');
        if (!$slides) {
            $slides = NV_Data::_db()->fetchAll("SELECT * FROM `slide` ORDER BY `ID` DESC");
            setCacheDB('slide', 'slide', $slides);
        }
        return $slides;
    }

    private function getBanks() {
        $banks = getCache('banks');
        return $banks;
    }

    public function deleteAction() {
        Zend_Layout::resetMvcInstance();
        $ID = get('ID', array());
        if (get('type') == 'service') {
            $tb = 'service_categories';
        } else if (get('type') == 'news') {
            $tb = 'news_categories';
        } else if (get('type') == 'banks'){
            $tb = 'banks';
        }
        if (is_array($ID)) {
            if (count($ID) == 0) {
                NV_Base::setJSON(array('alert' => 'Chưa chọn bản ghi'));
            }
            $ids = implode(',', $ID);
            NV_Data::_db()->delete($tb, "`ID` IN ({$ids})");
            removeCacheDB($tb);
        } else {
            NV_Data::_db()->delete($tb, "`ID` = '{$ID}'");
            removeCacheDB($tb);
        }
        NV_Base::setJSON(array('notice' => 'Xóa thành công', 'reload' => true));
    }

    public function addAction() {
        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        if (get('type') == 'service') {
            $tb = 'service_categories';
            $tab = 2;
        } else if (get('type') == 'news') {
            $tb = 'news_categories';
            $tab = 3;
        } else if (get('type') == 'banks'){
            $tb = 'banks';
            $tab = 5;
        } 
        if ($isPost) {
            $data = array();
            $data['title'] = get('title');
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            if (NV_Data::_db()->fetchOne("SELECT COUNT(`title`) FROM `{$tb}` WHERE `title` LIKE ?", array(get('title'))) > 0) {
                $err[] = "Tiêu đề đã tồn tại";
            }
            if (get('type') == 'banks'){
                $data['desc'] = get('desc');
                $data['alias'] = get('alias');
            }
            $data['created_by_id'] = 1;
            $data['date_created'] = new Zend_Db_Expr('NOW()');
            if (count($err) == 0) {
                NV_Data::_db()->insert($tb, $data);
                removeCacheDB($tb);
            } else {
                $this->redirect('#default/setting?tab=' . $tab . '&error=' . implode(',', $err));
            }
            $this->redirect('#default/setting?tab=' . $tab . '&success=Thêm mới thành công');
        }
    }

    public function editcateAction() {
        Zend_Layout::resetMvcInstance();
        $isPost = $this->getRequest()->isPost();
        $ID = get('ID');

        if (get('type') == 'service') {
            $tb = 'service_categories';
            $tab = 2;
        } else if (get('type') == 'news') {
            $tb = 'news_categories';
            $tab = 3;
        } else if (get('type') == 'banks'){
            $tb = 'banks';
            $tab = 5;
        } 
        $p = NV_Data::_db()->fetchRow("SELECT * FROM `{$tb}` WHERE `ID` = ?", array($ID));
        $this->view->post = $p;
        if ($isPost) {
            $data = array();
            $data['title'] = get('title');
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            $check = NV_Data::_db()->fetchOne("SELECT COUNT(`title`) FROM `{$tb}` WHERE `title` LIKE ? AND `ID` <> ?", array(get('title'), $ID));

            if ($check > 0) {
                $err[] = "Tiêu đề đã tồn tại";
            }
            if (get('type') == 'banks'){
                $data['desc'] = get('desc');
                $data['alias'] = get('alias');
            }
            $data['updated_by_id'] = 1;
            $data['date_updated'] = new Zend_Db_Expr('NOW()');
            if (count($err) == 0) {
                NV_Data::_db()->update($tb, $data, "`ID`='{$ID}'");
                removeCacheDB($tb);
            } else {
                $this->redirect('#default/setting?tab=' . $tab . '&error=' . implode(',', $err));
            }
            $this->redirect('#default/setting?tab=' . $tab . '&success=Sửa thành công');
        }
    }

}

