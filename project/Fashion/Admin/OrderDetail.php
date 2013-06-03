<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	
	<div id="Container">
    <h2 class="Welcome">Bill Detail</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}
                if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu">
 
            <h2>Chi tiết hóa đơn</h2>
            <div id="TxtHint">
                <?php include'Application/Controllers/ControlOrderDetail.php'?>
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