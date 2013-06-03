
<div class="Login">

<h2>Login</h2>
<form action="Application/Controllers/ControlLogin.php" name="Login" method="post">
    <?php if(isset($_REQUEST['err'])){
    echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";   
}?>
    <p>Username: <input type="text" name="Name" class="Text" /></p> 
    <p>Password: <input type="password" name="Pass" class="Text"/></p>
    <p><input type="submit" name="submit" value="Submit" class="TextSubmit" /></p>
</form>
</div>