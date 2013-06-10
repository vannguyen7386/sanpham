<?php
class Block_Facebook extends Zend_View_Helper_Abstract {
    public function Facebook(){
        $config = getCacheDB('configs');
        $fb = $config['facebook'];
      
        echo '<div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, "script", "facebook-jssdk"));</script>';
        echo '<section class="item">
                <header>
                    <h2>Facebook</h2>
                </header>
                <div class="content" style="height:260px">
                    <div class="fb-like-box" 
                         data-href="' . $fb . '" 
                         data-width="218" data-height="240" data-show-faces="true" 
                         data-stream="false" data-header="true"
                         data-border-color="#f1f1f1"></div>
                </div>
            </section>';
    }
}