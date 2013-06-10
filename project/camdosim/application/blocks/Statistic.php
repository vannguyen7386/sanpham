<?php
class Block_Statistic extends Zend_View_Helper_Abstract {
    public function Statistic(){
        $visitor = new NV_Visitor();
        $online = $visitor->getVisitorsOnline();
        echo '<section class="item">
                <header>
                    <h2><span class="statistic">Thống kê</span></h2>
                </header>
                <div class="content" id="statistic">
                    <p><span class="online">Online: </span><span class="s-value">' . $online['all'] . '</span></p>
                    <p><span class="member-online">Thành viên: </span><span class="s-value">' . $online['users'] . '</span></p>
                    <p><span class="cus-online">Khách: </span><span class="s-value">' . $online['customers'] . '</span></p>
                    <p><span class="access">Lượt truy cập: </span><span class="s-value">' . $visitor->getVisitors() . '</span></p>
                </div>
            </section>';
    }
}