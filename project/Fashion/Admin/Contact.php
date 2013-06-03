<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	
	<div id="Container">
    <h2 class="Welcome">Liên hệ</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}
                if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu">
            <div id="Intro">
                <h3>Thông tin liên hệ</h3>
                <?php include'Application/Controllers/ControlIntroContact.php'?></div>
            <div>
            <h3>Danh sách</h3>
            <?php include'Application/Controllers/ControlContact.php'?></div>
            <div id="Pagging">
                
                <?php include'Application/Controllers/ControlPagContact.php'?>
            </div>
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