<?php
    $title = basename($_SERVER['SCRIPT_NAME'],'.php');	
    if($title == 'index')
        $title = 'Trang chu';
    $title = ucfirst($title);   
?>