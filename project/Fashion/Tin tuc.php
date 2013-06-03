<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
		
			<div id="Main_Content">
				<div class="MenuSecond">
					<h2>Tin tức</h2>
					<?php include'Application/Controllers/ControlNews.php'?>
				</div>
                <div id="Pagging" style="margin-top: 25px;">  
                        <?php  
                        if(!isset($_REQUEST['Id']))
                            include'Application/Controllers/ControlPagNews.php';
                        ?>    
                </div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
