<div class="FormContact">
<?php 
    if(isset($_REQUEST['err'])){
        $err = $_REQUEST['err'];
        echo "<p style='color:red;line-height:20px' align='center'>$err</p>";
    }
    if(isset($_REQUEST['success'])){
        echo "<p style='color:green;line-height:20px' align='center'> Cám ơn quý khách đã đặt mua sản phẩm của chúng tôi <br> Sản phẩm của bạn sẽ được nhanh chóng chuyển đến trong thời gian sớm nhất.</p>";
    }else{
        
?>
<p style="margin-bottom: -25px;font-weight: bold;">Sản phẩm của bạn</p>
<table width="490" align="center" class="Cart" cellpadding="0" cellspacing="0">
        <tr class="first">
            <td width="35" align="center">STT</td>
            <td align="center">Mã SP</td>
            <td width="60" align="center">Số lượng</td>
            <td width="95" align="center">Đơn Giá</td>
            <td width="95" align="center">Thành tiền</td>
            <td width="70" align="center">Image</td>
        </tr>
        
        <?php
        $arr_id=explode(",",$_SESSION["CartId"]);
        $arr_qty = explode(",",$_SESSION["CartQty"]);
        $price = 0;
       	$Gia = 0;
        for($i=0;$i<count($arr_id)-1;$i++)
        {
            
        ?>
        <tr>
            <td align="center" valign="middle"><?php echo ($i+1) ?></td>
            <?php 
            $sql = "SELECT * FROM fas_product WHERE ProdID = '".$arr_id[$i]."'";
            $row = $payment->displaySingle($sql);
            $Gia = $row['ProdPrice'];
            ?>
            <td valign="middle" style="padding-left: 10px;"><b><?php echo $row['ProdID']?></b></td>
            <td align="center" valign="middle"><?php echo $arr_qty[$i]?></td>
            <td valign="middle" style="padding-left: 5px; color:red"><?php echo number_format($Gia,'0',',','.');?></td>
            <td valign="middle" style="padding-left: 5px; color:red"><?php  echo number_format($arr_qty[$i]*$Gia,'0',',','.');?></td>
            <td align="center"><a href="javaScript:void();" class="display"><img src="<?php echo $row['ProdImage']?>" width="60"/><img src="<?php echo $row['ProdImage']?>" width="250" id="LargeImg"/></a></td>
        </tr>
        <?php
        $price += $Gia*$arr_qty[$i];
        }
        ?>
        
        <tr>
            <td height="20"></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" style="padding-left: 5px;">Tổng tiền: <span style="padding-left: 10px; font-weight:bold;color:red;"><?php echo number_format($price,'0',',','.') ?></span></td>
        </tr>
    </table>
<p style="margin-top: 15px;"><b>Thông tin giao dịch:</b></p>
<form action="Application/Controllers/ProcessingPayment.php" method="post" name="PaymentForm" >
<p>Họ tên quý khách: <input type="text" name="Name" value="" class="Text" onfocus="document.getElementById('errName').innerHTML=''" /><span class="red">(*)</span></p>
<div id="errName"></div>
<p>Địa chỉ Email: <input type="text" name="Email" value="" class="Text" onfocus="document.getElementById('errEmail').innerHTML=''" /><span class="red">(*)</span></p>
<div id="errEmail"></div>
<p>Điện thoại: <input type="text" name="Phone" value="" class="Text" onfocus="document.getElementById('errPhone').innerHTML=''" /><span class="red">(*)</span></p>   
<div id="errPhone"></div>
<p>Địa chỉ giao hàng: <input type="text" name="Address" value="" class="Text" onfocus="document.getElementById('errAddress').innerHTML=''" /><span class="red">(*)</span></p>
<div id="errAddress"></div>     
<p>Thông tin thêm:</p>
<div id="errContent"></div>
<p><textarea name="Content" class="Text" rows="7" cols="54"></textarea></p>

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

<a href="javaScript:PaymentFormSubmit()" class="button">Gửi thông tin</a>
<a href="javaScript:PaymentFormReset()" class="button">Hủy</a>
</form>
<?php }?>
</div>