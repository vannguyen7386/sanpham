<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>

			<div id="Main_Content">
				<div class="MenuFirst">
					<h2>Giỏ hàng</h2>
                    <div class="CartView">
					<?php include'Application/Controllers/ControlCart.php';?>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
