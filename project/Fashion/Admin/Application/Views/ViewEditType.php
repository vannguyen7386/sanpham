<div>
<form name="FormEdit" action="Application/Controllers/UpdateType.php" method="post">
    <p>CateName: <select name="Cate" class="Select">
                    <?php
                    foreach($rowsCate as $rowCate){
                        if($row['CateID'] == $rowCate['CateID']){
                            echo "<option value='{$rowCate['CateID']}' selected='selected'>{$rowCate['CateName']}</option>";
                        }else{
                            echo "<option value='{$rowCate['CateID']}' >{$rowCate['CateName']}</option>";
                        }
                    }
                    ?>
                </select></p>
    <p>Product Type: <input type="text" value="<?php echo $row['TypeName']?>" name="Name" class="Text" /><input type="hidden" name="Id" value="<?php echo $row['TypeID'] ?>" /></p>            
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Change" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</form>
</div>