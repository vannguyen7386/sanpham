
<form name="FormEdit" action="Application/Controllers/AddNews.php" method="post" enctype="multipart/form-data">
    <p>Tiêu đề: <input type="text" class="Text" value="" name="Heading" style="margin-left: 100px; width: 500px;" /></p>
    <p>SlideShow: <span style="margin-left: 100px;">
                    Yes<input type="radio" name="Slide" value="1" checked='checked' /> 
                    No<input type="radio" name="Slide" value="0" />
                    </span></p>
    <p>Ảnh tựa đề /Slideshow(530px * 300px)<input type="file" name="file" class="Text" size="50" style="margin-left: 60px;" /></p>
    <p>Tóm tắt:</p>
    <p> <textarea class="Text" style="width: 650px;" rows="6" name="Summary"></textarea>  </p>
    <p>Nội dung:</p>
    <?php $str = "Nội dung";?>
    <?php include 'Application/Controllers/ControCKEditor.php'?>

    <p align="center" style="margin-top: 15px;"><input type="submit" value="Add" class="BtnSubmit"/><input type="reset" value="Reset" class="BtnSubmit" /></p>
</form>
