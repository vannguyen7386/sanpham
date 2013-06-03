<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
    if(!isset($_REQUEST['Id']))
        header('location:index.php');
?>
			
			<div id="Main_Content">
            <div class="MenuFirst">
					<h2>Đánh giá sản phẩm</h2>
			<?php include'Application/Controllers/ControlReview.php';?>
                <div style="clear: both;"></div>
            </div>
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
		
				
<?php
    include('Include/Footer.inc.php');	
?>
