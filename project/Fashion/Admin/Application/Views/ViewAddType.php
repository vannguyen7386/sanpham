<div>
<form name="FormEdit" action="Application/Controllers/AddType.php" method="post">
    <p>CateName: <select name="Cate" class="Select">
                <?php 
                    foreach($rows as $row){
                        echo"<option value='{$row['CateID']}'>{$row['CateName']}</option>";
                    }
                ?>
                </select></p>
    <p>TypeName: <input type="text" value="" name="Name" class="Text" /></p>
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Add" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</form>
</div>