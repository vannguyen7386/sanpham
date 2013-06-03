<html><title>Upload tệp tin</title>
<body>
<?php if(isset($_REQUEST['err'])){
		echo"<p style='color:red'>".$_REQUEST['err']."</p>";
} ?>
<form action="uploadFile.php?MaAnh=<?php if (isset($_REQUEST['MaAnh'])){echo $_REQUEST['MaAnh'];}?>" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Upload" />
</form>
</body>
</html>
