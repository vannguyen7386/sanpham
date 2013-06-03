<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
		
			<div id="Main_Content">
				<div class="MenuFirst">
					<h2>Giới thiệu</h2>
					<?php include'Application/Controllers/ControlIntro.php'?>
				</div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
