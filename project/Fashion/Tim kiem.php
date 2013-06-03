<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>		
			<div id="Main_Content">
				<div class="MenuFirst">
                        <?php 
                            include'Application/Controllers/ControlSearch.php';
                        ?>                  
                    <div style="clear: both;"></div>
				</div>
                 <div id="Pagging">   
                        <?php  
                            include'Application/Controllers/ControlPagSearch.php'
                        ?>    
                    </div>
                
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
