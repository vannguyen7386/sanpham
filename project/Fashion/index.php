<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
		<div class="TopContent">
        <?php include'Application/Controllers/TopContentControl.php'?>
        </div>
			<div id="Main_Content">
			<?php include'Application/Controllers/MainContentControl.php';?>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
		
<?php
    include('Include/Footer.inc.php');	
?>
