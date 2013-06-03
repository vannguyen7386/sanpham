
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<li class="Product">
<h3><?php 
		echo "<span>".$rows['TenSP']."</span>";
		if($rows['isVip']==1){
			echo"<img src='Image/Vip_icon_small.gif' />";	
		}if($rows['isNew']==1){
			echo" <img src='Image/new_icon.gif' width='23' height='22'>";
		}if($rows['isVip']==0 and $rows['isNew']==0)
			echo" <img src='Image/None.gif' width='23' height='22'>";						
?>
</h3>
<a href="Image/Product/<?php echo $rows['Picture']?>"><img src="Image/Product/<?php echo $rows['Picture']?>" class="car" width="176" height="112" title="<?php echo $rows['TenSP']?>" /></a>
<div class="info">
	Loại xe: <?php echo $rows['TenLSP'];?><br />
	Hãng xe: <?php echo $rows['TenNCC']; ?><br />
	Giá: 
	<?php if($rows['isSale']==1){
		$Gia = $rows['Gia'] - $rows['GiaKM']*$rows['Gia'];
		echo "<span style='color:red;text-decoration:line-through'>$".number_format($rows['Gia'],2,',','.')."</span><br>";
		echo "<span style='color:lightgreen;'>$".number_format($Gia,2,',','.')." (-".($rows['GiaKM']*100)."%)</span>";									
	}else{
		echo "<span style='color:red'>$".number_format($rows['Gia'],2,',','.')."</span><br>";
	}							
	?><br />
	Màu sắc: <?php echo $rows['Mausac']?><br />
	Trạng thái: 
<?php 
	if($rows['Trangthai']==1){
		echo "<span style='color:lightgreen'>Còn hàng</span>";
	}else{
		echo"<span style='color:red'>Hết hàng</span>";
	}
		?> <br />
	<a href="#" class="detail"><img src="Image/nevi_detail_button.gif" width="53" height="17" /></a>
	<a href="index.php?page=Shopcart&action=add&id=<?php echo $rows['MaSP'] ?>" class="cast"><img src="Image/Cast2.gif" width="47" height="17" /></a></div>
<div class="hide">
		<?php echo $rows['Mota'];?>
<div align="right"><a href="#" class="ReadLess" style="color:lightgreen;font-size:14px">Thu gọn</a></div>
	</div>
</li>