
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.noidung{
	clear:both;
	width:500px;
	margin:20px auto;
	text-align:justify;
}
</style>
<div id="Wrap">
<script language="javascript">
function submitForm(){
	if(confirm("Bạn có chắc muốn xóa Ý kiến này?"))
		document.FormSugMan.submit();
}
</script>
<form action="Delete/DelSug.php" method="post" name="FormSugMan">
<div class="title">Quản lý Ý kiến</div>
<?php 
	$sug_qr = mysql_query("SELECT COUNT(*) FROM ykien");
	$Res = mysql_fetch_array($sug_qr);
	if($Res[0]<=0){
		echo"<p align='center' style='font-size:14px;'>Không có ý kiến</p>";
	}else{
		if(isset($_REQUEST['err'])){
			echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
		}
		if(isset($_REQUEST['success'])){
			echo"<div align='center' style='color:green;font-size:14px'>".$_REQUEST['success']."</div>";
		}
?>
<table width="654" height="78" border="1">
  <tr class="background">
    <td width="40" height="33">Check</td>
    <td width="44">MãYK</td>
    <td width="114"><div align="center">Tên khách hàng </div></td>
    <td width="141"><div align="center">Email</div></td>
    <td width="60"><div align="center">Ngày gửi </div></td>
    <td width="126"><div align="center">Địa chỉ </div></td>
    <td width="38"><div align="center">Xóa</div></td>
    <td width="39">Chi tiết </td>
  </tr>
  <?php 
		$display = 12;
		if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
			$pageNum = $_REQUEST['pageNum'];
		}else{
			$f_query = "SELECT COUNT(MaYK) FROM ykien";
			$result = mysql_query($f_query) or die("Khong the ket noi du lieu");
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$record = $row[0];
			if($record < $display){
				$pageNum = 1;
			}else{
				$pageNum = ceil($record/$display);
			}
		}
		$start = (isset($_REQUEST['start']) and (int)$_REQUEST['start'] >=0)?$_REQUEST['start']:0;
  ?>
  <?php 
		$query = mysql_query("SELECT *,DATE_FORMAT(Ngaygui,'%d/%m/%Y') as Ngay_gui FROM ykien ORDER BY MaYK ASC LIMIT $start,$display");
		while($rows = mysql_fetch_array($query)){
  ?>
  <tr>
    <td height="28"><div align="center">
      <input type="checkbox" name="checkSug[]" value="<?php echo $rows['MaYK']?>">
    </div></td>
    <td align="center"><?php echo $rows['MaYK']?></td>
    <td><?php echo $rows['TenKH']?></td>
    <td><?php echo $rows['Email'] ?></td>
    <td><?php echo $rows['Ngay_gui'] ?></td>
    <td><?php echo $rows['Diachi']?></td>
    <td><div align="center"><a href="Delete/DelSug.php?MaYK=<?php echo $rows['MaYK']?>" onclick="return confirm('Bạn có chắc muốn xóa ý kiến này?')"><img src="../Image/DeleteRed.png" width="20" height="20"></a></div></td>
    <td><div align="center"><a href="index.php?page=SuggestMan&MaYK=<?php echo $rows['MaYK']?>"><img src="Images/RouteDetailIcon.gif" width="35" height="15"></a></div></td>
  </tr>
 <?php 
		 }
 ?>  
</table>
<div class="pageNum">
<?php
		if($pageNum > 1){
			$prev = $start-$display;
			$next = $start+$display;
			$current = ceil($start/$display)+1;	
				if($current > 1){//Hien thi Preview neu khong phai trang 1
					echo"<a href='index.php?page=SuggestMan&start=$prev&pageNum=$pageNum'>Preview</a>";
				}		
				//Hien thi so trang
				for($i=1;$i<=$pageNum;$i++){
					if($current==$i){
						echo "<span>".$i."</span>";
					}else{
						echo"<a href='index.php?page=SuggestMan&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
					}
				}
				//Hien thi Next neu ko phai trang cuoi
				if($current < $pageNum){
					echo"<a href='index.php?page=NewsMan&start=$next&pageNum=$pageNum'>Next</a>";
				}
		}
?>	
</div>
 <a href="JavaScript:submitForm()" class="bt_red" style="margin-right:20px;"><span class="bt_red_lft"></span><strong>Xóa các Ý kiến</strong><span class="bt_red_r"></span></a> 
</form>
	<?php 
	if (isset($_REQUEST['MaYK'])){
		$query = mysql_query("SELECT Noidung FROM ykien WHERE MaYK =".$_REQUEST['MaYK']);
		$result = mysql_fetch_array($query);
		if($result){
			echo"<div class='noidung'><b>Nội dung:</b><br>".nl2br($result['Noidung'])."</div>";
		}
	}
} 
?>
</div><!--end#Wrap-->


