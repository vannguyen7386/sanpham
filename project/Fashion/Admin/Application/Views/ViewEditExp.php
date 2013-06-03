
<form name="FormEdit" action="Application/Controllers/UpdateExp.php" method="post" enctype="multipart/form-data">
    <p>Tiêu đề: <input type="text" class="Text" value="<?php echo $row['InfoHead']?>" name="Heading" style="margin-left: 100px; width: 500px;" /></p>
    <p>Ngày đăng: <span style="margin: 0 30px 0 100px;"><?php echo $row['Date']?> </span>Cập nhật: <input type="checkbox" name="Check" value="1" /></p>
    <p>SlideShow: <span style="margin-left: 100px;">
                    Yes<input type="radio" name="Slide" value="1" <?php if($row['Slide'] == '1'){echo "checked='checked'";}?> /> 
                    No<input type="radio" name="Slide" value="0" <?php if($row['Slide'] == '0'){echo "checked='checked'";}?>/>
                    </span></p>
    <input type="hidden" name="Id" value="<?php echo $row['InfoID']?>" /> 
    <p>Ảnh tựa đề /Slideshow(530px * 300px)<input type="file" name="file" class="Text" size="50" style="margin-left: 60px;" /></p>
    <p>Tóm tắt:</p>
    <p> <textarea class="Text" style="width: 650px;" rows="6" name="Summary"><?php echo $row['InfoSummary']?></textarea>  </p>
    <p>Nội dung:</p>
    <?php $str = $row['InfoContent']?>
    <?php include 'Application/Controllers/ControCKEditor.php'?>

    <p align="center" style="margin-top: 15px;"><input type="submit" value="Edit" class="BtnSubmit"/><input type="reset" value="Reset" class="BtnSubmit" /></p>
</form>
