<?php

class Block_GoogleMap extends Zend_View_Helper_Abstract {

    public function GoogleMap() {
        $config = getCacheDB("configs");
        $lat = $config['lat'];
        $lng = $config['lng'];
        
        echo '<section class="item">
                <header>
                    <h2><span class="map">Bản đồ</span></h2>
                </header>
                <div class="content">
                    <div id="map">
                        <script type="text/javascript">
                            (function($){
                            $(document).ready(function(){
                                $(window).load(function(){
                                    load_google_map(' . $lat . ', ' . $lng . ');
                                });
                            });
                        })(jQuery);
                        </script>
                    </div>
                </div>
            </section>';
    }

}
?>

