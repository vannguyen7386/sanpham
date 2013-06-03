
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
#News_wrap{
	width:520px;
	overflow:hidden;
	border:1px solid #333333;
	-moz-border-radius:5px;
	margin:15px auto;
	}
#News_wrap h3{
	color:#FFFFFF;
	margin-top:0;
	line-height:30px;
	background:url(Images/menu_bg.jpg) 0 -5px;
}	
#News_wrap .displayPic{
	width:130px;
	border-right:1px solid #999999;
	overflow:hidden;
	margin-bottom:15px;
	margin-left:10px;
	float:left;
	margin-top:10px;
}
#News_wrap table{
	float:right;
}
.back{
	text-align:right;
	margin:15px ;
	clear:both;
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
<?php 
	if(isset($_REQUEST['MaTT'])){
		$f_query = mysql_query("SELECT * FROM tintuc,loaitt
					WHERE tintuc.MaLTT = loaitt.MaLTT and MaTT = '".$_REQUEST['MaTT']."'");			
		$rows = mysql_fetch_array($f_query);
		if(!$rows){
			header("location:index.php?page=NewsMan&err=Không tồn tại bản tin này");
		}else{
		
?>
<div id="wrap">
<div class="title">Thay đổi tin tức</div>
<div id="News_wrap">
	<h3 align="center"><?php echo $rows['Tieude'] ?></h3>
<div class="displayPic">

  <img name="" src="../Image/News/<?php echo $rows['Picture'] ?>" width="128" height="84" alt=""  />
 <br /><br />
  <?php 
	  	$query_pic = mysql_query("SELECT DISTINCT(TenAnh) FROM picture WHERE MaTT='".$rows['MaTT']."'");
		$count=1;
		while($result = mysql_fetch_array($query_pic)){
	?>
		<div style="margin-bottom:10px;">
	<a href="#" onclick="return false"><img src="../Image/News/<?php echo $result['TenAnh'] ?>" width="128" onclick="window.open('upload_form.php?MaAnh=<?php echo $result['MaAnh'] ?>','','width=500,height=200')" /></a>
		<p align="center">Ảnh <?php echo $count ?> </p>
		</div>	
	<?php		
		$count++;
		}
	  ?>
	 
    </div>
  <form action="Update/UpdateNews.php" method="post" enctype="multipart/form-data" name="Edit_news">	
  <table width="373" border="0">
    <tr>
      <td  height="35">Mã tin tức : </td>
      <td><input name="NewsID" type="text" size="40" readonly="readonly" value="<?php echo $rows['MaTT'] ?>" /></td>
    </tr>
    <tr>
      <td height="33">Tiêu đề: </td>
      <td><input name="NewsHeading" type="text" size="40" value="<?php echo $rows['Tieude'] ?>" /></td>
    </tr>
    <tr>
      <td height="76">Tóm tắt: </td>
      <td><textarea name="NewsSummary" cols="30" rows="4" ><?php echo $rows['Tomtat'] ?></textarea></td>
    </tr>
    <tr>
      <td height="75">Nội dung: </td>
      <td><textarea name="NewsContent" cols="30" rows="4"><?php echo $rows['Noidung'] ?></textarea></td>
    </tr>
	<tr>
      <td height="33">Bản quyền </td>
      <td><input name="Copyright" type="text" size="40" value="<?php echo $rows['Copyright'] ?>" /></td>
    </tr>
    <tr>
      <td height="33">Loại tin: </td>
      <td><select name="NewsType" id="NewsType">
	  		<option>[Chọn loại tin]</option>
			<?php 
				$query = mysql_query("SELECT TenLTT FROM loaitt");
				while($result = mysql_fetch_array($query)){
			?>
			<option value="<?php 
				echo $result['TenLTT'] ?>"
				<?php 
					if($result['TenLTT'] == $rows['TenLTT']){ echo "selected='selected'";}?> />
				<?php echo  $result['TenLTT']?>
			</option>
			<?php 
				}
			?>
      </select>
      </td>
    </tr>
	<tr>
      <td height="33">(Thêm loại tin): </td>
      <td><input name="newTypeofNews" type="text" size="40" /></td>
    </tr>
    <tr>
      <td height="33">Ảnh tiêu đề:</td>
      <td><input name="file" type="file" size="29" /></td>
    </tr>
    <tr>
      <td height="52" colspan="2" align="center" valign="bottom"><input type="submit" name="Submit" value="Thay đổi thông tin" />
      </tr>
	
  </table>
 </form>
 <div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay về</a></div>
</div>

</div>
<?php 
	}
}	
?>
