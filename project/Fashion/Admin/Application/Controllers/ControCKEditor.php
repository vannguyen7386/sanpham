<?php 
    include_once('ckeditor/ckeditor.php');
    $initialValue = $str;
    $CKEditor = new CKEditor();
    $CKEditor->basePath="ckeditor/";
    $CKEditor->editor("editor1",$initialValue);
?>