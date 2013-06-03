<?php
	foreach($rowsOption as $rowOption){
        if((isset($_POST['SelectValue']) and $_POST['SelectValue'] == $rowOption['TypeID'] )or (isset($_REQUEST['Id']) and $_REQUEST['Id'] == $rowOption['TypeID'] ))
            echo "<option value='{$rowOption['TypeID']}' selected='selected'>{$rowOption['TypeName']}</option>";
        else
            echo "<option value='{$rowOption['TypeID']}' >{$rowOption['TypeName']}</option>";

            
	}
?>