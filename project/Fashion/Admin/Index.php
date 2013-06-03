<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	

	<div id="Container">
    <h2 class="Welcome">Admin Panel Welcome You !!!!!</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Icon">
            <a href="Account.php"><img src="Image/users.jpg" width="70" title="Account" /><span>Account</span></a>
            <a href="Product.php"><img src="Image/product_icon.jpg" width="70" title="Product" /><span>Sản phẩm</span></a>
            <a href="Menu.php"><img src="Image/MenuIcon.png" width="70" title="Menu" /><span>Menu</span></a>
            <a href="Info.php"><img src="Image/icon-48-module.png" width="70" title="Infomation" /><span>Thông tin</span></a>
            <a href="News.php"><img src="Image/News_icon.jpeg" width="70" title="News" /><span>Tin tức</span></a>
            <a href="Experience.php"><img src="Image/Exp_icon.jpeg" width="70" title="Experience" /><span>Kinh nghiệm</span></a>
            <a href="Online.php"><img src="Image/Yahoo_icon.jpeg" width="70" title="Yahoo" /><span>Yahoo Name</span></a>
            <a href="Order.php"><img src="Image/icon-order.png" width="70" title="Order" /><span>Hóa đơn</span></a>
        </div>
        <?php 
            }else{
                include'Login.php';
            }        
        ?>
        
	</div><!--end #Container-->
<?php
	include'Include/Footer.inc.php';
?>