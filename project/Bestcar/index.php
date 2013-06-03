<?php session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include("CheckTitle.php");
	if(isset($_REQUEST['page']))
		$page_title = checkPage($_REQUEST['page']);
	else
		$page_title = "***BESTCAR***";	
?>
<title><?php echo $page_title?></title>
<link rel="shortcut icon" href="Image/favicon.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="css/css.css" />
<link href="css/StyleProduct.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/styleNews.css" />	
<script language="javascript" src="Script/jquery-1.4.3.min.js"></script>
<script language="javascript" src="Script/javaS1.js"></script>
</head>
<body>

<div id="Wrapper">
	<div id="Header">
		<?php 
			include("Header.php");
			include("Connect.php");
		?>
	</div><!--end#Header-->
	<div id="Banner">
		Banner
	</div><!--end#Banner-->
	<div id="Navigator">
		<?php 
			include("Navigator.php");
		?>
	</div><!--end#Navigator-->
	<div id="Content">
		<div id="Sidebar">
			<?php 
				include("Sidebar.php");
			?>
		</div>
		<!--end#Sidebar-->
	    <div id="MainContent">	
			<div id="top_menu">	
				<?php 
					include("Top_menu.php");
				?>	
			</div><!--end#top_menu-->
			<div id="Primary_Content">	
				<?php 
					include("Primary_Content.php");
				?>
			</div><!--end#Primary_Content-->
		</div>
		<!--end#MainContent-->
		<p align="center" style="font-weight:bold;text-shadow:1px 1px #000000;line-height:18px;">Copyright &copy;2010 by T0912h_Group1<br />Hà Nội 18/10/2010</p>
 	</div>
	<!--end#Content-->
	<div id="footer">
		<?php 
			include("Footer.php");
		?>
	</div><!--end#footer-->
</div><!--end#Wrapper-->
</body>
</html>
