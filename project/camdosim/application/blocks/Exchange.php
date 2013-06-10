<?php
class Block_Exchange extends Zend_View_Helper_Abstract {
    public function Exchange(){
        echo '<section class="item">
                        <header>
                            <h2><span class="exc">Cập nhật tỷ giá</span></h2>
                        </header>
                        <div class="content">
                            <h3>Ngày: ' . date('d/m/Y') . '</h3>
                            <script type="text/javascript">
                                document.write(update_exchange(vForexs, vCosts));
                            </script>
                        </div>
                    </section>';
    }
}
