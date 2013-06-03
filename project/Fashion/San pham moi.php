<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
		
			<div id="Main_Content">
				<div class="MenuFirst">
					<h2>Sản phẩm mới</h2>
					<?php include'Application/Controllers/NewProdControl.php'?>
                    <div style="clear: both;"></div>
				</div>
                 <div id="Pagging">  
                        <?php  
                        include'Application/Controllers/ControlPaggingNew.php';
                        ?>    
                </div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
