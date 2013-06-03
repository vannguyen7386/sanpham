<div>
<form name="FormEdit" action="Application/Controllers/AddNavi.php" method="post">
    <p>Navi Name: <input type="text" value="" name="Name" class="Text" /></p>    
    <p>Link: <select name="Link" class="Select">
                    <?php
                    foreach($rowsLink as $rowLink){
                        echo "<option value='{$rowLink['Link']}'>{$rowLink['Link']}</option>";
                    }
                    ?>
                </select></p>
            
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Add" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</form>
</div>