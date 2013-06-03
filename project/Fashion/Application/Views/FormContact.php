<div class="FormContact">
<?php 
    if(isset($_REQUEST['err'])){
        $err = $_REQUEST['err'];
        echo "<p style='color:red;line-height:20px' align='center'>$err</p>";
    }
    if(isset($_REQUEST['success'])){
        $success = $_REQUEST['success'];
        echo "<p style='color:green;line-height:20px' align='center'> $success</p>";
    }
        
?>
<p><b>Form liên hệ:</b></p>
<form action="Application/Controllers/ProcessingContact.php" method="post" name="ContactForm" >
<p>Tiêu đề: <input type="text" name="Heading" value="" class="Text" onfocus="document.getElementById('errHeading').innerHTML=''" /><span class="red">(*)</span></p>
<div id="errHeading"></div>
<p>Họ tên quý khách: <input type="text" name="Name" value="" class="Text" onfocus="document.getElementById('errName').innerHTML=''" /><span class="red">(*)</span></p>
<div id="errName"></div>
<p>Địa chỉ Email: <input type="text" name="Email" value="" class="Text"  onfocus="document.getElementById('errEmail').innerHTML=''"/><span class="red">(*)</span></p>
<div id="errEmail"></div>
<p>Điện thoại: <input type="text" name="Phone" value="" class="Text" /></p>        
<p>Nội dung:<span class="red">(*)</span></p>
<div id="errContent"></div>
<p><textarea name="Content" class="Text" rows="7" cols="54" onfocus="document.getElementById('errContent').innerHTML=''"></textarea></p>

<div class="Captcha">
<p>Nhập mã bảo vệ:</p>
<?php
require_once('recaptcha-php-1.11/recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Lf4UsASAAAAAHe7KKs4WgdABu5n-WJbW3nOLSFM ";
$privatekey = "6Lf4UsASAAAAAOB4yNQYAOHBgmhppljHIat51Ii_ ";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if(isset($_REQUEST['error']))
    echo "<span style='color:red'>".$_REQUEST['error']."<span>";
echo recaptcha_get_html($publickey, $error);
?> 
</div>

<a href="javaScript:ContactFormSubmit()" class="button">Gửi thông tin</a>
<a href="javaScript:ContactFormReset()" class="button">Hủy</a>
</form>
</div>