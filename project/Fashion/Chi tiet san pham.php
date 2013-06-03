<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
		
			<div id="Main_Content">
				<div class="MenuFirst">
					<h2>Chi tiết sản phẩm</h2>
					 <?php
                        if(!isset($_REQUEST['ProdID']))
                            header('location:San pham.php');
                        else     
                            include'Application/Controllers/ControDetailProd.php';
                     
                     ?>  
                     <div style="clear: both;"></div>
				</div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
