<?php include('Title.inc.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="Script/Query.js"></script>
<script type="text/javascript" src="Script/Script.js"></script>
<title>Fashion Web - <?php echo "{$title}";?></title>
<?php
    include 'Connect.inc.php';
    include'Application/Models/Session_Mark.php';
    include'Application/Models/CountOnline.php';
    $conn = new Conection();
    $conn->Connected();
?>
<link href="CSS/Style_layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
            $(document).ready(function() {
            setInterval('imageRotate()', 8000);
            setInterval('pRotate()', 8000);
            });
            
            function imageRotate() {
              var curImage = $('#imageShow li.current');
              var nextImage = curImage.next();
              var preImage = curImage.prev();
              
              if(nextImage.length == 0) {
                nextImage = $('#imageShow li:first');
              };
              
              curImage.removeClass('current').addClass('previous');
              preImage.removeClass('previous');
              $('#imageShow li:last').removeClass('previous');
              nextImage.css({opacity:0}).addClass('current').animate({opacity: 1}, 1000, function() {
                nextImage.removeClass('previous');
                
              });
            };
			function pRotate() {
              var curP = $('p.info.current');
              var nextP = curP.next();
              
              if(nextP.length == 0) {
                nextP = $('p.info:first');
              };
              
              curP.removeClass('current').addClass('previous');
              nextP.css({opacity:0}).addClass('current').animate({opacity: 1}, 1000, function() {
                nextP.removeClass('previous');
              });
            };
        
</script>
<style type="text/css">
/*------------------POPUPS------------------------*/
#fade {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none;
	background: #fff;
	padding: 20px; 	
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right; 
	margin: -55px -55px 0 0;
}
.popup p {
	padding: 5px 10px;
	margin: 5px 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
}
</style>
</head>
<body>
<div id="Wrapper">

	<div id="Header">
		<div id="Banner">
			<!--[if !IE]> -->
				<object type="application/x-shockwave-flash"
				  data="flash_name.swf" width="960" height="150">
			<!-- <![endif]-->
				
			<!--[if IE]>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
				  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"
				  width="960" height="150">
				  <param name="movie" value="flash_name.swf" />
				  <param name="wmode" value="transparent" />
				<!--><!---->
				  <param name="loop" value="true" />
				  <param name="menu" value="false" />
				  <param name="wmode" value="transparent" />
				</object>
			<!-- <![endif]-->
			<!-- <![endif]-->
		</div><!--end #Banner-->
        <?php
	       $CurrentPage = basename($_SERVER['SCRIPT_NAME']);
        ?>
	
		<div id="Navi_bar">
			<?php
	           include'Application/Controllers/NavigateControl.php';  
            ?>
		</div><!--end #Navi_bar-->
		
	</div><!--end #Header-->