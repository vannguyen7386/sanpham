<div class="Login">
<h2>Yahoo Manage</h2>

<form name="FormEdit" action="Application/Controllers/UpdateYahoo.php" method="post">
<?php
    $i=0;
    foreach($rows as $row){
    $i++;
?>
    <p>Yahoo Name <?php echo $i;?>: <input type="text" name="YahooName<?php echo $i;?>" value="<?php echo $row['YahooName']?>" class="Text"/></p>
    <p>Name <?php echo $i;?>: <input type="text" name="Name<?php echo $i;?>" value="<?php echo $row['Name']?>" class="Text"/></p>
    <p>Phone <?php echo $i;?>: <input type="text" name="Phone<?php echo $i;?>" value="<?php echo $row['Phone']?>" class="Text"/></p><br />
    
<?php 
    }
?>
<p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Change" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</form>
</div>