<?php

class Block_GoldPrice extends Zend_View_Helper_Abstract {

    public function GoldPrice() {
        echo '<section class="item">
                        <header>
                            <h2><span class="gold">Cập nhật giá vàng</span></h2>
                        </header>
                        <div class="content">
                            <script type="text/javascript">
                                document.write(update_gold_price(vGoldSbjBuy, vGoldSbjSell, vGoldSjcBuy, vGoldSjcSell));
                            </script>
                        </div>
                    </section>';
    }

}