<?php session_start();ob_start();
    unset($_SESSION['Admin']);
    header("location:index.php");
	
?>