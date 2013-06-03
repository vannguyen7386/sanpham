
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.order_cart_title {
	background-color:#1172E1;
	font-family:Arial,Helvetica,sans-serif;
	font-size:12px;
	font-weight:bold;
	color:#FFFFFF;
	text-align:center;
}

.back {
	color:lightgreen !important;
	text-decoration:none;
	font-size:14px;
}
.back:hover{
	text-decoration:underline;
}
</style>
<div id="wrap">
	<div class="top">
		Giỏ hàng
	</div>
	<?php
	require_once("basket.php");
	$pro_id =NULL;
	$action=NULL;
	$flag=true;
	if(isset($_REQUEST['id']) and !empty($_REQUEST['id'])){
		$query = "SELECT COUNT(MaSP) FROM sanpham WHERE MaSP='".$_REQUEST['id']."'";
		if(check_exist($query))	
			$pro_id=$_REQUEST["id"];
		else{
			echo"<p style='margin-top:20px';font-size:14px;>Không tồn tại mã sản phẩm này</p>";
			$flag=false;
		}	
	}
	$card=new basket($_SESSION["CartId"],$_SESSION["CartQty"]);
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action'])){
			$action=$_REQUEST["action"];	
		if($action=="add" and $flag == true){
			$card->addItem($pro_id);
		}	
		elseif($action=="del" and $flag == true)
			$card->delItem($pro_id);
		elseif($action=="delall"){
			$card->delAll();
		}	
		elseif($action=="renew"){
			if(!empty($_REQUEST['txtid']) and !empty($_REQUEST['txtqty'])){
				$qty = $_REQUEST['txtqty'];
				$id = $_REQUEST['txtid'];
				$length = count($qty);
				for($i=0;$i<$length;$i++){
					$qty[$i]=(is_numeric($qty[$i]))?$qty[$i]:0;
					$qty[$i] = floor(abs($qty[$i]));
					if($qty[$i]==0){
						unset($qty[$i]);
						unset($id[$i]);
					}
				}
				$pro_id=@implode(',', $id);
				$pro_qty=@implode(',',$qty);
				$card->reNew($pro_id,$pro_qty);
			}else{
				header('location:index.php?page=Shopcart');	
			}		
		}else{
			header('location:index.php?page=Product');
		}
	}	
	$_SESSION["CartId"] = $card->id;
	$_SESSION["CartQty"] = $card->qty;
	if($_SESSION['CartId']==","){
		$_SESSION["CartId"] = NULL;
		$_SESSION["CartQty"] = NULL;	
	}
		
?>
<?php
	if(isset($_SESSION['CartId']) and isset($_SESSION['CartQty'])){ 
?>
	<h3 style="color:#FFFFFF;font-size:15px;text-align:center">Danh sách các sản phẩm đã chọn</h3>
 <form name="frmshopping" method="post" action="index.php?page=Shopcart&action=renew">	
	<table width="711" height="80" align="center">
	<tr>
		<td width="63" class="order_cart_title">STT</td>
		<td width="245" class="order_cart_title">Tên sản phẩm</td>
		<td width="65" class="order_cart_title">Số lượng</td>
		<td width="132" class="order_cart_title">Đơn giá</td>
		<td width="133" class="order_cart_title">Thành tiền</td>
		<td width="45" class="order_cart_title">Xóa</td>
	</tr>
	<?php
  	$arr_id=explode(",",$_SESSION["CartId"]);
	$arr_qty=explode(",",$_SESSION["CartQty"]);
	$price = 0;
	$Gia = 0;
  for($i=0;$i<count($arr_id)-1;$i++)
  {
  ?>
  <tr bgcolor="#FFFFFF">
    <td align="center"><?php echo ($i+1);?></td>
	<?php 
		$query = "SELECT * FROM sanpham WHERE MaSP='".$arr_id[$i]."'";
		$sql = mysql_query($query);
		$rows = mysql_fetch_array($sql);
	?>
    <td><?php echo $rows['TenSP'];?></td>
    <td align="center"><input type="text" name="txtqty[]" size=5 value="<?php echo $arr_qty[$i];?>"><input name="txtid[]" type="hidden" size=5 value="<?php echo $arr_id[$i];?>"></td>
    <td align="right"><?php if($rows['isSale']==1){
								$Gia = $rows['Gia'] - $rows['GiaKM']*$rows['Gia'];
								echo "$".number_format($Gia,'2',',','.');
							}else{
								$Gia = $rows['Gia'];
								echo "$".number_format($Gia,'2',',','.');
							}?></td>
    <td align="right"><?php echo "$".number_format(($arr_qty[$i]*$Gia),'2',',','.'); ?></td>
    <td align="center"><a href="index.php?page=Shopcart&action=del&id=<?php echo $arr_id[$i];?>" onClick="return confirm('Bạn có muốn xóa không?')">Xóa</a></td>
  </tr>
  <?php
  	$price += $arr_qty[$i]*$Gia;
  	}
  ?>
  <tr style="color:#FFFFFF">
    <td height="29" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td colspan="2" align="right"><div align="left"><b>Tổng tiền:</b> <?php echo "$".number_format($price,'2',',','.');?> </div></td>
    </tr>
  </table>
  <p align="center" style="margin-top:20px">
<input type="button" value="Mua tiếp" onClick="window.location='index.php?page=Product'">
<input type="button" value="Tính lại" onClick="frmshopping.action='index.php?page=Shopcart&action=renew'; frmshopping.submit()">
<input type="button" value="Xóa giỏ hàng" onClick="if(!confirm('Bạn có muốn xóa giỏ hàng không?')) {return false;} else{ frmshopping.action='index.php?page=Shopcart&action=delall';frmshopping.submit();}">
<input type="button" value="Mua hàng" onClick="frmshopping.action='index.php?page=BuyCart';frmshopping.submit();"></p>
</form>
<p>&nbsp;</p>
  <?php 
  }else{
  	echo"<p style='margin-top:20px'>Giỏ hàng của bạn hiện tại không có sản phẩm nào.</p>

	<p>Giỏ hàng phục vụ cho bạn trong việc mua bán trên mạng, nó chứa đựng những thứ mà bạn chọn và muốn mua.</p>

	<p>Bỏ vài thứ vào giỏ hàng của bạn, bắt đầu bằng việc tìm kiếm hoặc thăm quan các chủ đề sản phẩm của chúng tôi, khi một sản phẩm mà bạn thấy vùa ý, hãy nhấn vào nút 'Mua hàng'.</p> ";
	echo"<a href='index.php?page=Product' class='back'>Quay lại trang sản phẩm</a>";
  }
  ?>
</div>
