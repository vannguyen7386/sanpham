<?php
	if(isset($_SESSION['CartId'])){
        if(isset($_REQUEST['err']))
            echo "<p style='text-align:center; color:red'>".$_REQUEST['err']."</p>";
 ?>
    <form method="post" name="formCast" action="Application/Controllers/CartProcess.php?action=renew">
    <table width="510" align="center" class="Cart" cellpadding="0" cellspacing="0">
        <tr class="first">
            <td width="35" align="center">STT</td>
            <td align="center">Mã SP</td>
            <td width="60" align="center">Số lượng</td>
            <td width="95" align="center">Đơn Giá</td>
            <td width="95" align="center">Thành tiền</td>
            <td width="70" align="center">Image</td>
            <td width="45" align="center">Xóa</td>
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
            $row = $Prod->displaySingle($sql);
            $Gia = $row['ProdPrice'];
            ?>
            <td valign="middle" style="padding-left: 10px;"><b><?php echo $row['ProdID']?></b></td>
            <td align="center" valign="middle"><input type="text" value="<?php echo $arr_qty[$i]?>" name="txtqty[]" size="5" class="text" style="text-align: center;" /><input name="txtid[]" type="hidden" size="5" value="<?php echo $arr_id[$i];?>" /></td>
            <td valign="middle" style="padding-left: 5px; color:red"><?php echo number_format($Gia,'0',',','.');?></td>
            <td valign="middle" style="padding-left: 5px; color:red"><?php  echo number_format($arr_qty[$i]*$Gia,'0',',','.');?></td>
            <td align="center"><a href="javaScript:void();" class="display"><img src="<?php echo $row['ProdImage']?>" width="60"/><img src="<?php echo $row['ProdImage']?>" width="250" id="LargeImg"/></a></td>
            <td valign="middle" align="center"><a href="Application/Controllers/CartProcess.php?action=del&id=<?php echo $row['ProdID'] ?>" onClick="return confirm('Bạn có muốn xóa không?')" class="Del"></a></td>
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
            <td></td>
        </tr>
    </table>
    <p align="center">
        <a href="San pham.php" class="button">Mua tiếp</a>
        <a href="javaScript:Renew()" class="button">Tính lại</a>
        <a href="javaScript:DelAll()" class="button">Xóa giỏ hàng</a>
        <a href="javaScript:submitForm()" class="button">Thanh toán</a>
    </p>
    </form>
 <?php
	}else{
	   echo"<div style='margin:20px;'>";
	   echo"<p style='margin-top:20px'>Giỏ hàng của bạn hiện tại không có sản phẩm nào.</p>";
	   echo"<a href='San pham.php' style='color:blue'>Quay về trang sản phẩm</a> ";
	   echo"</div>";   
	}
?>