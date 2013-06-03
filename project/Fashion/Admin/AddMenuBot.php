<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	


</script>
	<div id="Container">
    <h2 class="Welcome">Add Bot Item</h2>
        <?php 
            if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div id="TxtHint">
                <?php include'Application/Controllers/DisplayMenuBot.php'?>
        </div>
        <div class="Login">
            <h2>Add Bot Item</h2>
            <?php include'Application/Controllers/ControlAddBot.php'?>   
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