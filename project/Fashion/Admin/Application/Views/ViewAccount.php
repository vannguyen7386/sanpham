<?php
    echo "<div class='Login'>";
    echo "<h2>Change Pass</h2>";
    echo "<form action='Application/Controllers/ChangePass.php' method='post'>";
    echo "<p>Old Pass: <input type='password' name='oldpass' class='Text' /><input type='hidden' name='id' value='{$row['ID']}' /></p>";
    echo "<p>New Pass: <input type='password' name='newpass' class='Text' /><input type='hidden' name='Type' value='{$Type}' /></p>";
    echo "<p><input type='submit' name='submit' class='TextSubmit' value='Submit' /></p>";
    echo "</form>";  
    echo "</div>";   
    echo "<div class='Login'>";
    echo "<h2>Change Name</h2>";
    echo "<form action='Application/Controllers/ChangeName.php' method='post'>";
    echo "<p>Old Name: <span class='red'>{$row['FieldName']}</span></p>";
    echo "<p>New Name: <input type='text' name='newname' class='Text' /></p>";
    echo "<p><input type='submit' name='submit' class='TextSubmit' value='Submit' /><input type='hidden' name='id' value='{$row['ID']}' /><input type='hidden' name='Type' value='{$Type}' /></p>";
    echo "</form>";  
    echo "</div>";               	
?>