<?php  session_start();
ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	include("CheckTitleAdm.php");
	if(isset($_REQUEST['page']))
		$page_title = checkPage($_REQUEST['page']);
	else
		$page_title = "Trang chủ Admin";	
?>
<title><?php echo $page_title ?></title>
<link rel="shortcut icon" href="../Image/favicon.ico" type="image/x-icon" />
<link href="css/cssAdmin.css" type="text/css" rel="stylesheet" />
<link href="css/style_tb.css" type="text/css" rel="stylesheet" /> 
<script language="javascript" src="../Script/jquery-1.4.3.min.js"></script>
<script language="javascript" src="Script/javaS.js"></script>
</head>
<body>
<?php
if(!isset($_SESSION['Quyen']) || $_SESSION['Quyen']!='1'){
	header("location:../index.php");
}
?>
<div id="Wrapper">
	<div id="Header">
		<?php include("Header_Adm.php");
			include("../Connect.php");
		?>
	</div><!--end#Header-->
	<div id="Navigator">
		<?php include("Navigator_Adm.php");?>
	</div><!--end#Navigator-->
	<div id="Content">
		<div id="Sidebar">
			<?php include("Sidebar_Adm.php");?>	
		</div><!--end#Sidebar-->
		<div id="MainContent">
			<?php include("MainContent_Adm.php");?>
		
		</div><!--end#MainContent-->
	</div><!--end#Content-->
	<div id="footer">
		<p>Copyright &copy;2010 by T0912h_Group1</p>
	</div><!--end#footer-->
</div><!--end#Wrapper-->
</body>
</html>
