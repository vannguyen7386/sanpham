<?php
class Block_Support extends Zend_View_Helper_Abstract {
    public function Support() {
        $config = getCacheDB('configs');
        $yahoos = explode(',', $config['yahoo']);
        $names = explode(',', $config['contact_name']);
        $phones = explode(',', $config['contact_phone']);
        $content = "";
        for ($i = 0; $i < count($names); $i++) {
            $content .= '<p><a href="ymsgr:sendim?' . $yahoos[$i] . '" class="yahoo_' . checkYahoo($yahoos[$i]) . '">
                                    <span class="yahoo_name">' . $names[$i] . '</span>
                            </a>
                        </p>

                        <p>
                            <a href="javascript:;" class="phone">
                                <span class="phone_number">' . $phones[$i] . '</span>
                            </a>
                        </p>';
        }
        echo ' <section class="item">
                        <header>
                            <h2>Hỗ trợ </h2>
                        </header>
                        <div class="content">
                            ' . $content . '

                        </div>
                    </section>';
    }
}