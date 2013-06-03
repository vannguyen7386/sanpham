
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm sản phẩm</title>
<style>
	#Product{
		margin:15px auto;
		width:460px;
		border:1px solid #333333;
		font-size:12px;
		-moz-border-radius:5px;
	}
	#Product h3{
		background:url(Images/menu_bg.jpg) 0 -5px;
		color:#FFFFFF;
		line-height:30px;
		margin-top:0;
	}
	#Product input{
		margin-right:15px;
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
<div class="title">Thêm sản phẩm mới</div>
	<div id = Product>
		<h3 align="center">Thêm sản phẩm</h3>
		<?php if(isset($_REQUEST['err'])){
			echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
		}?>
		<form action="Update/UpdateNewProduct.php" method="post" enctype="multipart/form-data" name="FormEdit">
		<table width="391" height="521" border="0" align="center">
		<script>
			var x = document.FormEdit;
			function ResetId(){
				if(x.ProductID.value=="Mã sản phẩm")
					x.ProductID.value="";
			}
			
			function getId(){
				if(x.ProductID.value=="")
					x.ProductID.value="Mã sản phẩm";
			}
		</script>
		<tr>
			<td width="88">Mã sản phẩm: </td>
		  <td width="293"><input name="ProductID" type="text" size="40" value="Mã sản phẩm" onfocus="ResetId()" onblur="getId()" ></td>
		</tr>
		<script>
			var x = document.FormEdit;
			function ResetName(){
				if(x.ProductName.value=="Tên sản phẩm")
					x.ProductName.value="";
			}
			
			function getName(){
				if(x.ProductName.value=="")
					x.ProductName.value="Tên sản phẩm";
			}
		</script>
		<tr>
		  <td height="40">Tên sản phẩm: </td>
		  <td><input name="ProductName" type="text" size="40"  value="Tên sản phẩm" onfocus="ResetName()" onblur="getName()" ></td>
		</tr>
		<tr>
		  <td>Loại sản phẩm:</td>
		  <td><select name="ProductType">
		  <?php 
		  	$query = mysql_query("SELECT * FROM loaisp ");
			while($rows=mysql_fetch_array($query)){
			?>	
			<option value="<?php echo $rows['MaLSP'] ?>" style="width:100px"><?php echo $rows['TenLSP'] ?></option>
		<?php
			}
		 ?>
		    </select> </td>
		</tr>
		<script>
			var x = document.FormEdit;
			function ResetPrice(){
				if(x.ProductPrice.value=="000000")
					x.ProductPrice.value="";
			}
			
			function getPrice(){
				if(x.ProductPrice.value=="")
					x.ProductPrice.value="000000";
			}
		</script>
		<tr>
		  <td height="32">Giá:</td>
		  <td><input name="ProductPrice" type="text" value="000000" size="40" onfocus="ResetPrice()" onblur="getPrice()" ></td>
		</tr>    
		<tr>
		  <td>Nhà sản xuất:</td>
		  <td><select name="Producer">
		 <?php 
		  	$query = mysql_query("SELECT MaNCC,TenNCC FROM nhacc ");
			while($rows=mysql_fetch_array($query)){
		?>	
			<option value="<?php echo $rows['MaNCC'] ?>" style="width:100px;"><?php echo $rows['TenNCC'] ?></option>
		<?php
			}
		 ?>
		    </select></td>
		  </tr>
		<tr>
		  <td>Trạng thái:</td>
		  <td>Còn hàng<input type="radio" name="ProductState" value="1"  checked="checked"> Hết hàng<input type="radio" name="ProductState" value="0"></td>
		  </tr>
		  
		 <script>
			var x = document.FormEdit;
			function ResetColor(){
				if(x.ProductColor.value=="Màu sắc")
					x.ProductColor.value="";
			}
			
			function getColor(){
				if(x.ProductColor.value=="")
					x.ProductColor.value="Màu sắc";
			}
		</script>
		 <tr>
		  <td>Màu sắc:</td>
		  <td><input name="ProductColor" type="text" value="Màu sắc" size="40" onfocus="ResetColor()" onblur="getColor()" ></td>
		</tr>   
		<tr>
		  <td>Sản phẩm mới:</td>
		  <td><input type="checkbox" name="New" value="1" >
	      Bán chạy:
	      <input type="checkbox" name="BestBuy" value="1" >
	      Sản phẩm Vip: 
	      <input type="checkbox" name="VIP" value="1" ></td>
		</tr>
		<tr>
		  <td>Sản phẩm KM: </td>
		  <td><input type="checkbox" name="Sale" value="1" onchange="checkSale()"/></td>
		</tr>
		<tr id="SaleIndex">
            <td class="bold">Chọn mức KM:</td>
            <td><select name="SaleIndex" >
				<?php 
					for($i=0.00;$i<1.01;$i +=0.01){
						echo"<option value='".$i."' style='width:30px;'>".($i*100)."%</option>";
					}
				?>
			</select>			   </td>
          </tr>
		 <tr>
		 
		 <script>
			var x = document.FormEdit;
			function ResetDetail(){
				if(x.Detail.value=="Mô tả")
					x.Detail.value="";
			}
			
			function getDetail(){
				if(x.Detail.value=="")
					x.Detail.value="Mô tả";
			}
		</script>
		  <td>Mô tả: </td>
		  <td><textarea name="Detail" cols="30" rows="5" onfocus="ResetDetail()" onblur="getDetail()" >Mô tả</textarea></td>
		 </tr>
		 <tr>
		   <td>Ngày nhập: </td>
		   <td>Ngày
		     <select name="Day">
			 <?php 
			 	for($i=1;$i<=31;$i++){
					echo"<option value='$i' style='width:30px;'>$i</option>";	
				}
			 ?>
	         </select>
	        Tháng 
	        <select name="Month">
			<?php 
			 	for($i=1;$i<=12;$i++){
					echo"<option value='$i' style='width:30px;'>$i</option>";	
				}
			 ?>
             </select>
           Năm
           <select name="Year">
		   <?php 
			 	for($i=Date("Y");$i>=2000;$i--){
					echo"<option value='$i' style='width:30px; '>$i</option>";	
				}
			 ?>
           </select></td>
	      </tr>
		  <tr>
		  <td>Ảnh:</td>
		  <td><input name="file" type="file" size="29" /></td>
		  </tr>   
		 <tr>
		   <td colspan="2"><div align="center">
		     <input type="submit" name="Submit" value="Submit" />
		     </div></td>
	      </tr>
		</table>
		</form>	
		<div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay ve</a></div>
	</div><!--end#Product-->

	