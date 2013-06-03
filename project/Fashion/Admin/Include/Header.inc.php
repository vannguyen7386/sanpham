<?php
	include'Application/Models/AccountModel.php';
    include'Application/Models/Pagging.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="Script/Script.js"></script>
<link href="CSS/Style_layout.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="Wrapper">
	<div id="Header">
		<div id="Banner">
		  <h2 class="Logo"></h2>
          <p class="Text_banner"><a href="../index.php" target="_blank">View Website</a> /<?php if(isset($_SESSION['Admin'])){ ?> <a href="Logout.php">Log out</a>
                                                                                        <?php }else{echo "<a href='index.php'>Log in</a>";}?></p>	
		</div><!--end #Banner-->
	
		<div id="Navi_bar">
        <?php if(isset($_SESSION['Admin'])){?>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li ><a href="Account.php">Account</a></li>
            <li class="submenu"><a href="Product.php">Sản phẩm</a>
                <ul>
                    <li><a href="Category.php">Category</a></li>
                    <li><a href="TypeProd.php">Product type</a></li>
                </ul>
            </li>
            <li class="submenu"><a href="Menu.php">Menu</a>
                <ul>
                    <li><a href="MenuTop.php">Menu top</a></li>
                    <li><a href="MenuBot.php">Menu bottom</a></li>
                </ul>
            </li>
            <li class="submenu"><a href="Info.php">Thông tin</a>
                <ul>
                    <li><a href="Contact.php">Liên hệ</a></li>
                    <li><a href="Introduction.php">Giới thiệu</a></li>
                    <li><a href="Advertisement.php">Quảng cáo</a></li>
                </ul>
            </li>
            <li><a href="News.php">Tin tức</a></li>
            <li><a href="Experience.php">Kinh nghiệm</a></li>
            <li><a href="Online.php">Yahoo</a></li>
            <li><a href="Order.php">Hóa đơn</a></li>           
        </ul>
        <?php }?>
		</div><!--end #Navi_bar-->
		
	</div><!--end #Header-->