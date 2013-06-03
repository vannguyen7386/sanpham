<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	
	<div id="Container">
    <h2 class="Welcome">Account Manager</h2>
		<div class="MainContent">
            <?php include'Application/Controllers/ControlAccount.php'?>
        </div>
	</div><!--end #Container-->
<?php
	include'Include/Footer.inc.php';
?>