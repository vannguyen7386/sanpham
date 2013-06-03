<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	

	<div id="Container">
    <h2 class="Welcome">Menu</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu" style="width: 500px; margin:0 auto">
            <div class="Add_Del" style="text-align: center;"><a href="MenuTop.php" class="Add" style="margin-right: 40px;">Menu top manage</a><a href="MenuBot.php" class="Delete" >Menu bot manage</a></div>
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