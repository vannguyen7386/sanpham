
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(isset($_SESSION['username'])){?>
<div class="right_header">Chào bạn <b><?php echo $_SESSION['username'];?></b>, |  <a href="../logout.php" class="logout">Thoát</a></div>
		<div class="logo">
		<a href="index.php"><img src="Images/logo.gif" /></a>
		</div>
		<p><?php $today = gmdate("D, d/m/Y - g:i a.", time() + 7*3600); echo $today;?></p>
		
<?php 
}else{
	header("location:../index.php");
}
?>
						
		