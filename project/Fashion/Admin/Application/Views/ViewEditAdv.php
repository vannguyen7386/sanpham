<?php 
    if($row['Place']=='Left'){
        echo "<img src='../{$row['Image']}' width='152' />" ;
    }elseif($row['Place']=='Right'){
        echo "<img src='../{$row['Image']}' width='195' />" ;
    }elseif($row['Place']=='Bottom'){
        echo "<img src='../{$row['Image']}' width='960' />" ;
    }
?>
<form style="margin: 20px 0 0 0;" action="Application/Controllers/UpdateAdv.php" method="post" enctype="multipart/form-data" >
    
    <p>Link: <input type="text" name="Link" class="Text" value="<?php echo $row['FieldLink']?>" style="width: 400px;" /></p>
    <input type="hidden" value="<?php echo $row['ID']?>" name="Id" />
    <p>Place: <select name="Place" class="Select">
            <option value="Right" <?php if($row['Place'] == 'Right'){echo"selected='selected'";}?>>Right</option>
            <option value="Left" <?php if($row['Place'] == 'Left'){echo"selected='selected'";}?>>Left</option>
            <option value="Bottom" <?php if($row['Place'] == 'Bottom'){echo"selected='selected'";}?>>Bottom</option>
            </select>
    </p>
    <p>Banner: <input type="file" name="file" class="Text" size="40" /></p>
    <p><input type="submit" name="Edit" class="BtnSubmit" value="Edit" /><input type="reset" class="BtnSubmit" value="Reset" /></p>
</form>