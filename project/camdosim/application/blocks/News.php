<?php
class Block_News extends Zend_View_Helper_Abstract {
    public function News(){
        $news = NV_Data::_db()->fetchAll("SELECT * FROM `news` ORDER BY IFNULL(`date_updated`,`date_created`) DESC
                                        LIMIT 6");
        $content = "";
        foreach ($news as $n) {
            $content .= '<p><a href="news/index/view?ID=' . $n['ID'] . '" title="' . $n['title'] . '"
                onclick="call_ajax_load_content(this, \'Tin tức - ' . $n['title'] . '\'); $(this).addClass(\'active\'); return false;">
                ► ' . short_title($n['title'], 150) . '</a></p>';
        }
        echo '<section class="item">
                    <header>
                        <h2><span class="new">Cập nhật tin tức</span></h2>
                    </header>
                    <div class="content news">
                        ' . $content . '
                    </div>
                </section>';
    }
    
}