
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#Product{
		width:560px;
		overflow:hidden;
		border:1px solid #333333;
		-moz-border-radius:5px;
		margin:15px auto;
	}
	#Product h3{
		color:#FFFFFF;
		margin-top:0;
		line-height:30px;
		background:url(Images/menu_bg.jpg) 0 -5px;
	}
	#Product input{
		margin-right:15px;
	}
	.bold{
		font-weight:bold;
	}
	.back{
		text-align:right;
		margin:15px;
	}
	.back a{
		color:#0000FF;
		font-size:14px;
		text-decoration:none;
	}
	.back a:hover,active{
		text-decoration:underline;
	}
</style>
<script language="javascript">
$(document).ready(function(){
		if(document.FormEdit.Sale.checked == true){
			$(document).ready(function(){
				$('#SaleIndex').show();
			})
		}else{
			$(document).ready(function(){
				$('#SaleIndex').hide();
			})
		}
	});
function checkSale(){
	if(document.FormEdit.Sale.checked == true){
		$(document).ready(function(){
			$('#SaleIndex').show();
		})
	}else{
		$(document).ready(function(){
			$('#SaleIndex').hide();
		});
	}
}

</script>
<?php 
	if(isset($_REQUEST['MaSP'])){
		$f_query = mysql_query("SELECT * FROM sanpham,loaisp,nhacc 
					WHERE sanpham.MaLSP = loaisp.MaLSP and sanpham.MaNCC = nhacc.MaNCC and MaSP = '".$_REQUEST['MaSP']."'");			
		$rows = mysql_fetch_array($f_query);
		if(!$rows){
			header("location:index.php?page=ProductMan&err=Không tồn tại sản phẩm này");
		}else{
?>
<div class="title">Sửa thông tin sản phẩm</div>
	<div id = Product>
		<form action="Update/UpdateProduct.php" method="post" enctype="multipart/form-data" name="FormEdit">
		<h3 align="center"><?php echo $rows['TenSP'] ?></h3>
		<table width="555" border="0" align="center">
          <tr>
            <td width="165" rowspan="14" valign="top"><div align="center"><img src="../Image/Product/<?php echo $rows['Picture'] ?>" alt="" width="165" height="104" align="middle" /></div></td>
            <td width="86" height="31" class="bold">Mã sản phẩm: </td>
            <td width="290"><input name="ProductID" type="text" size="40" readonly="readonly"  value="<?php echo $rows['MaSP'] ?>" /></td>
          </tr>
          <tr>
            <td height="36" class="bold">Tên sản phẩm: </td>
            <td><input name="ProductName" type="text" size="40"  value="<?php echo $rows['TenSP'] ?>" /></td>
          </tr>
          <tr>
            <td class="bold">Loại sản phẩm:</td>
            <td><select name="ProductType">
                <?php 
				$query = mysql_query("SELECT TenLSP FROM loaisp");
				while($fields = mysql_fetch_array($query)){
					if($fields['TenLSP']==$rows['TenLSP']){
						echo"<option value = '".$fields['TenLSP']."' selected='selected' style='width:100px;'>".$fields['TenLSP']."</option>";
					}else{
						echo"<option value = '".$fields['TenLSP']."' style='width:100px;'>".$fields['TenLSP']."</option>";
					}
				}	
			?>
              </select>            </td>
          </tr>
          <tr>
            <td height="30" class="bold">Giá:</td>
            <td><input name="ProductPrice" type="text" value="<?php echo $rows['Gia'] ?>" size="40" /></td>
          </tr>
          <tr>
            <td height="30" class="bold">Nhà sản xuất:</td>
            <td><select name="Producer">
                <?php 
				$query = mysql_query("SELECT TenNCC FROM nhacc");
				while($fields = mysql_fetch_array($query)){
					if($fields['TenNCC']==$rows['TenNCC']){
						echo"<option value = '".$fields['TenNCC']."' selected='selected' style='width:100px;'>".$fields['TenNCC']."</option>";
					}else{
						echo"<option value = '".$fields['TenNCC']."' style='width:100px;'>".$fields['TenNCC']."</option>";
					}
				}	
			?>
            </select></td>
          </tr>
          <tr>
            <td height="31" class="bold">Trạng thái:</td>
            <td>Còn hàng
                <input type="radio" name="ProductState" value="1" <?php if($rows['Trangthai']==1){?> checked="checked"<?php }?> />
              Hết hàng
              <input type="radio" name="ProductState" value="0"<?php if($rows['Trangthai']==0){?> checked="checked"<?php }?> /></td>
          </tr>
          <tr>
            <td height="31" class="bold">Màu sắc:</td>
            <td><input name="ProductColor" type="text" value="<?php echo $rows['Mausac'] ?>" size="40" /></td>
          </tr>
          <tr>
            <td class="bold">Sản phẩm mới:</td>
            <td><input type="checkbox" name="New" value="1" <?php if($rows['isNew']==1){echo"checked='checked'";}?> />
                <span class="bold">Bán chạy:</span>
                <input type="checkbox" name="BestBuy" value="1" <?php if($rows['isBestBuy']==1){echo"checked='checked'";}?> />
                <span class="bold">Sản phẩm Vip:</span>
                <input type="checkbox" name="VIP" value="1" <?php if($rows['isVip']==1){echo"checked='checked'";}?> />            </td>
          </tr>
		  <tr>
            <td><span class="bold">Sản phẩm KM:</span> </td>
		    <td><input name="Sale" type="checkbox" value="1" <?php if($rows['isSale']==1){echo"checked='checked'";}?> onchange="checkSale()"/><?php if($rows['GiaKM'] != 0){
						echo "<b>Mức khuyến mãi:</b><span style='color:green'> ".($rows['GiaKM']*100)."%</span>";}?>            </td>
	      </tr>
		  <tr id="SaleIndex">
            <td class="bold">Chọn mức KM:</td>
            <td><select name="SaleIndex" >
			<option value="<?php echo $rows['GiaKM'] ?>"><?php echo ($rows['GiaKM']*100)."%"; ?></option>
				<?php 
					for($i=0.00;$i<1.01;$i +=0.01){
						echo"<option value='".$i."' style='width:30px;'>".($i*100)."%</option>";
					}
				?>
			</select>			   </td>
          </tr>
          <tr>
            <td class="bold">Mô tả: </td>
            <td><textarea name="Detail" cols="30" rows="5"><?php echo $rows['Mota'] ?></textarea></td>
          </tr>
          <tr>
            <td height="36" class="bold">Ngày nhập: </td>
            <td>Ngày
              <select name="Day">
                  <?php 
			 	for($i=1;$i<=31;$i++){
					$query = mysql_query("SELECT DAYOFMONTH(Ngaynhap) FROM sanpham WHERE MaSP = '".$_REQUEST['MaSP']."'");
					$result = mysql_fetch_array($query);
					if($i == $result[0]){
						echo"<option value='$i' selected='selected' style='width:30px;'>$i</option>";
					}else{
						echo"<option value='$i' style='width:30px;'>$i</option>";
					}		
				}
			 ?>
                </select>
              Tháng
              <select name="Month">
                <?php 
			 	for($i=1;$i<=12;$i++){
					$query = mysql_query("SELECT MONTH(Ngaynhap) FROM sanpham WHERE MaSP = '".$_REQUEST['MaSP']."'");
					$result = mysql_fetch_array($query);
					if($i == $result[0]){
						echo"<option value='$i' selected='selected' style='width:30px;'>$i</option>";
					}else{
						echo"<option value='$i' style='width:30px;'>$i</option>";
					}		
				}
			 ?>
              </select>
              Năm
              <select name="Year">
                <?php 
			 	for($i= Date("Y");$i>=1990;$i--){
					$query = mysql_query("SELECT YEAR(Ngaynhap) FROM sanpham WHERE MaSP = '".$_REQUEST['MaSP']."'");
					$result = mysql_fetch_array($query);
					if($i == $result[0]){
						echo"<option value='$i' selected='selected'  style='width:30px;'>$i</option>";
					}else{
						echo"<option value='$i'  style='width:30px;'>$i</option>";
					}		
				}
			 ?>
              </select></td>
          </tr>
          <tr>
            <td height="32" class="bold">Ảnh:</td>
            <td><input name="file" type="file" size="29" /></td>
          </tr>
          <tr>
            <td height="32" colspan="2" class="bold"><input type="submit" name="Submit" value="Submit" style="margin-left:88px" /></td>
          </tr>
        </table>
		</form>	
		<div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay ve</a></div>
	</div><!--end#Product-->
	
<?php				
		}				
	}
?>