<?php

class News_IndexController extends Zend_Controller_Action {

    public function init() {
        $this->getLayout();
    }

    public function indexAction() {
        $config = getCacheDB('configs');
        $row_per_page = $config['page_number'];
        $start = get('start', 0);
        Zend_Layout::resetMvcInstance();
        $count = NV_Data::_db()->fetchOne("SELECT COUNT(`ID`) FROM `news`");
        $news = NV_Data::_db()->fetchAll("SELECT * FROM `news` as `a`
                                        ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT {$start},{$row_per_page}");
        NV_Base::addJSON(array('title' => 'Tin tức'));
        NV_Base::getJSON();
        $this->view->success = $this->getParam('success');
        $this->view->count = $count;
        $this->view->news = $news;
        $this->view->start = $start;
        $this->view->row_per_page = $row_per_page;
        $this->view->categories = $this->getNewsCategories();
    }

    public function addAction() {
        $configs = getCacheDB('configs');
        Zend_Layout::resetMvcInstance();
        NV_Base::addJSON(array('title' => 'Tin tức - Thêm mới'));
        $this->view->categories = $this->getNewsCategories();
        $this->view->error = $this->getParam('error');
        if ($this->getRequest()->isPost()) {
            $data = array();
            $data['title'] = get('title');
            $err = array();
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            if (get('summary') == '') {
                $err[] = "Tóm tắt không được để trống";
            }
            $data['summary'] = get('summary');
            $data['origin'] = get('origin');
            $data['origin_link'] = get('origin_link');
            if (!get('category_id')) {
                $err[] = "Nhóm tin không được để trống";
            }
            $data['category_id'] = get('category_id');
            $files = $_FILES['thumb'];
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
            $data['created_by_id'] = 1;
            $data['date_created'] = new Zend_Db_Expr('NOW()');
            $data['content'] = get('content');
            $data['keywords'] = get('keywords');
            if (count($err) == 0) {
                if ($files['name']) {
                    if (file_exists(ROOT . "/upload/news/" . $files['name'])){
                        $extension = getExtension($files['name']);
                        $files['name'] = str_replace('.' . $extension, '', $files['name']) ."_" . time() . ".{$extension}";
                        
                    }
                    move_uploaded_file($files['tmp_name'], ROOT . "/upload/news/" . $files['name']);
                    $data['thumb'] = $files['name'];
                }
                $_db = NV_Data::_db();
                $_db->insert('news', $data);
                $data_group = array();
                $data_group['title'] = get('title');
                $data_group['rel_id'] = $_db->lastInsertId();
                $data_group['content'] = $data['content'];
                $data_group['summary'] = $data['summary'];
                $data_group['module'] = "news";
                $data_group['created_by_id'] = $data['created_by_id'];
                $data_group['date_created'] = $data['date_created'];
                $_db->insert('group_datas', $data_group);
                
            }else {
                $this->redirect('#news/index/add?error=' . implode('<br/>', $err));
            }

            $this->redirect('#news/index?success=Cập nhật thành công');
        }
        NV_Base::getJSON();
    }

    public function editAction() {
        $configs = getCacheDB('configs');
        Zend_Layout::resetMvcInstance();
        NV_Base::addJSON(array('title' => 'Tin tức - Sửa tin tức'));
        $ID = get('ID');
        if (!filter_var($ID, FILTER_VALIDATE_INT)){
            die('ID ko đúng định dạng');
        }
        $this->view->post = NV_Data::_db()->fetchRow("SELECT * FROM `news` WHERE `ID`=?", array($ID));
        $this->view->categories = $this->getNewsCategories();
        $this->view->error = $this->getParam('error');
        if ($this->getRequest()->isPost()) {
            $data = array();
            $data['title'] = get('title');
            $err = array();
            if (get('title') == '') {
                $err[] = "Tiêu đề không được để trống";
            }
            if (get('summary') == '') {
                $err[] = "Tóm tắt không được để trống";
            }
            $data['summary'] = get('summary');
            $data['origin'] = get('origin');
            $data['origin_link'] = get('origin_link');
            if (!get('category_id')) {
                $err[] = "Nhóm tin không được để trống";
            }
            $data['category_id'] = get('category_id');
            $files = $_FILES['thumb'];
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
            $data['updated_by_id'] = 1;
            $data['date_updated'] = new Zend_Db_Expr('NOW()');
            $data['content'] = get('content');
            $data['keywords'] = get('keywords');
            if (count($err) == 0) {
                if ($files['name']) {
                    if (file_exists(ROOT . "/upload/news/" . $files['name'])){
                        $extension = getExtension($files['name']);
                        $files['name'] = str_replace('.' . $extension, '', $files['name']) ."_" . time() . ".{$extension}";
                        
                    }
                    move_uploaded_file($files['tmp_name'], ROOT . "/upload/news/" . $files['name']);
                    $data['thumb'] = $files['name'];
                }
                $_db = NV_Data::_db();
                $_db->update('news', $data, "`ID`='{$ID}'");
                $data_group = array();
                $data_group['title'] = get('title');
                $data_group['content'] = $data['desc'];
                $data_group['summary'] = $data['summary'];
                $data_group['module'] = "news";
                $data_group['updated_by_id'] = $data['updated_by_id'];
                $data_group['date_updated'] = $data['date_updated'];
                $_db->update('group_datas', $data_group, "`module`='news' AND `rel_id`='{$ID}'");
                
            }else {
                $this->redirect('#news/index/add?error=' . implode('<br/>', $err));
            }

            $this->redirect('#news/index?success=Cập nhật thành công');
        }
        NV_Base::getJSON();
    }
    public function deleteAction(){
        $ID = get('ID', array());
        Zend_Layout::resetMvcInstance();
        if (is_array($ID)){
            if (count($ID) == 0){
                NV_Base::setJSON(array('alert' => 'Bạn chưa chọn bản tin'));
            }
            $ids = implode(',', $ID);
            NV_Data::_db()->delete('news', "`ID` IN ({$ids})");
            NV_Data::_db()->delete('group_datas', "`module`='news' AND `rel_id` IN ({$ids})");
        }else{
            NV_Data::_db()->delete('news',"`ID` = '{$ID}'");
            NV_Data::_db()->delete('group_datas', "`module`='news' AND `rel_id` = '{$ID}'");
        }
        NV_Base::setJSON(array('notice' => 'Xóa thành công', 'reload' => true));
    }
    public function viewAction() {
        Zend_Layout::resetMvcInstance();
        $ID = get('ID', 0);
        if (!filter_var($ID, FILTER_VALIDATE_INT)) {
            die(json_encode(array('alert' => 'Không đúng định dạng')));
        }
        $service = NV_Data::_db()->fetchRow("SELECT * FROM `services` WHERE `ID`=?", array($ID));
        NV_Base::addJSON(array('title' => 'Dịch vụ - ' . $service['title']));
        NV_Base::getJSON();
        $this->view->service = $service;
        $other_services = Data::_db()->fetchAll("SELECT * FROM `services` WHERE `category_id`='{$service['category_id']}'
                      AND `ID` <> '{$service['ID']}'  
                      ORDER BY IFNULL(`date_updated`,`date_created`) DESC LIMIT 5");
        $this->view->others = $other_services;
    }

    private function getLayout() {
        $options = array(
            'layout' => "layout",
            'layoutPath' => APPLICATION_PATH . "/layout/scripts"
        );
        Zend_Layout::startMvc($options);
    }

    public function getNewsCategories() {
        $categories = getCacheDB('news_categories');
        if (!$categories) {
            $posts = NV_Data::_db()->fetchAll("SELECT * FROM `news_categories` ORDER BY `title`");
            $categories = array();
            if ($posts) {
                foreach ($posts as $p) {
                    $categories[$p['ID']] = $p;
                }
                setCacheDB('news_categories', array('news_categories'), $categories);
                return $categories;
            }
            return null;
        }
        return $categories;
    }
   

}