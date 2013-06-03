<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	

	<div id="Container">
    <h2 class="Welcome">Edit Advertisement</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}
                if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu" style="width: 600px;margin: 0 auto;">
            
            <h2>Edit Advertisement</h2>
            <div id="TxtHint">
                <?php include'Application/Controllers/ControlEditAdv.php'?>
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