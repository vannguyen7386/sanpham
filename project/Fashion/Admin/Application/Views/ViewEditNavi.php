<div>
<form name="FormEdit" action="Application/Controllers/UpdateNavi.php" method="post">
    <p>Navi Name: <input type="text" value="<?php echo $row['FieldName']?>" name="Name" class="Text" /><input type="hidden" name="Id" value="<?php echo $row['TopID'] ?>" /></p>    
    <p>Link: <select name="Link" class="Select">
                    <?php
                    foreach($rowsLink as $rowLink){
                        if($row['FieldLink'] == $rowLink['Link']){
                            echo "<option value='{$rowLink['Link']}' selected='selected'>{$rowLink['Link']}</option>";
                        }else{
                            echo "<option value='{$rowLink['Link']}'>{$rowLink['Link']}</option>";
                        }
                    }
                    ?>
                </select></p>
            
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Change" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</form>
</div>