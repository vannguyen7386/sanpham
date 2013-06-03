<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
			
			<div id="Main_Content">
            <div class="MenuFirst">
					<h2>Thanh toán</h2>
			<?php include'Application/Controllers/ControlPayment.php';?>
                <div style="clear: both;"></div>
            </div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
		
				
<?php
    include('Include/Footer.inc.php');	
?>
