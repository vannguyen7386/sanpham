<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	


	<div id="Container">
    <h2 class="Welcome">Add Product Type</h2>
        <?php 
            if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Login">
            <h2>Add Type</h2>
            <?php include'Application/Controllers/ControlAddType.php'?>   
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