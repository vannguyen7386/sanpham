
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm bản tin</title>
<style>
	#Wrap_news{
		margin:15px auto;
		width:460px;
		border:1px solid #333333;
		font-size:12px;
		-moz-border-radius:5px;
	}
	#Wrap_news h3{
		background:url(Images/menu_bg.jpg) 0 -5px;
		color:#FFFFFF;
		line-height:30px;
		margin-top:0;
	}
	#Wrap_news input{
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
<div class="title">Thêm bản tin mới</div>
	<div id = Wrap_news>
		<h3 align="center">Thêm bản tin</h3>
		<?php if(isset($_REQUEST['err'])){
			echo"<div align='center' style='color:#FF0000;font-size:14px'>".$_REQUEST['err']."</div>";
		}?>
		
		<table width="407" border="0" align="center">
		<form action="index.php?page=AddNews" method="post" name="AddPic">
		<tr>
			<td width="134">Chọn số ảnh tin: </td>
		  <td width="263"><select name="PicCat" onchange="AddPic.submit()" >
		  					<option>[Chọn số ảnh]</option>
							<?php 
								for($i=1;$i<=100;$i++){
									if(isset($_POST['PicCat']) and $i==$_POST['PicCat']){
										echo"<option value='".$i."' selected='selected'>".$i."</option>";
									}else{
										echo"<option value='".$i."'>".$i."</option>";
									}
								
								}
							?>
		  </select>
		  </td>
		</tr>
		
		</form>
		<form action="Update/AddNews_process.php" method="post" enctype="multipart/form-data" name="FormNews">
		<script>
			var x = document.FormNews;
			function reset_NewsID(){
				if(x.NewsID.value == 'Mã tin tức'){
					x.NewsID.value = '';
				}
			
			}
			function get_NewsID(){
				if(x.NewsID.value == ''){
					x.NewsID.value = 'Mã tin tức';
				}
			}
		</script>
		<tr>
			<td width="134">Mã tin tức: </td>
		  <td width="263"><input name="NewsID" type="text" size="40" value="Mã tin tức" onfocus="reset_NewsID()" onblur="get_NewsID()" ></td>
		</tr>
		<script>
			var x = document.FormNews;
			function reset_NewsHeading(){	
				if(x.NewsHeading.value == 'Tiêu đề'){
					x.NewsHeading.value = '';
				}
			}
			function get_NewsHeading(){	
				if(x.NewsHeading.value == ''){
					x.NewsHeading.value = 'Tiêu đề';
				}
			
			}
		</script>
		<tr>
		  <td>Tiêu đề: </td>
		  <td><input name="NewsHeading" type="text" id="NewsHeading"   value="Tiêu đề" size="40" onfocus="reset_NewsHeading()" onblur="get_NewsHeading()" ></td>
		</tr>
		<tr>
		  <td>Loại tin</td>
		  <td><select name="NewsType" id="NewsType">
	  		<option>[Chọn loại tin]</option>
			<?php 
				$query = mysql_query("SELECT TenLTT FROM loaitt");
				while($result = mysql_fetch_array($query)){
			?>
			<option value="<?php 
				echo $result['TenLTT'] ?>"/>
				<?php echo  $result['TenLTT']?>
			</option>
			<?php 
				}
			?>
      </select>
      </td>
		</tr>
		<tr>
		  <td>(Thêm loại tin mới): </td>
		  <td><input name="newTypeOfNews" type="text" id="newTypeOfNews" size="40" /></td>
		</tr>
		<script>
			var x = document.FormNews;
			function reset_NewsSummary(){
				if(x.NewsSummary.value == 'Tóm tắt'){
					x.NewsSummary.value = '';
				}
			}
			function get_NewsSummary(){
				if(x.NewsSummary.value == ''){
					x.NewsSummary.value = 'Tóm tắt';
				}
			}
		</script>  
		<tr>
		  <td>Tóm tắt </td>
		  <td><textarea name="NewsSummary" cols="30" rows="4" id="NewsSummary" onfocus="reset_NewsSummary()" onblur="get_NewsSummary()" >Tóm tắt</textarea></td>
		</tr>
		<script>
			var x = document.FormNews;
			function reset_NewsContent(){
				if(x.NewsContent.value == 'Nội dung'){
					x.NewsContent.value = '';
				}
			}
			function get_NewsContent(){
				if(x.NewsContent.value == ''){
					x.NewsContent.value = 'Nội dung';
				}
			}
		</script>      
		<tr>
		  <td>Nội dung::</td>
		  <td><textarea name="NewsContent" cols="30" rows="4" id="NewsContent" onfocus="reset_NewsContent()" onblur="get_NewsContent()">Nội dung</textarea></td>
		</tr>
		<script>
			var x = document.FormNews;
			function reset_Copyright(){
				if(x.Copyright.value == 'Copyright'){
					x.Copyright.value = '';
				}
			}
			function get_Copyright(){
				if(x.Copyright.value == ''){
					x.Copyright.value = 'Copyright';
				}
			}
		</script>      
		<tr>
		  <td>Bản quyền: </td>
		  <td><input name="Copyright" type="text"  value="Copyright" size="40" onfocus="reset_Copyright()" onblur="get_Copyright()" ></td>
		</tr>
		<tr>
		  <td>Ảnh tựa đề: </td>
		  <td><input name="file" type="file" size="29" /></td>
		</tr> 
		<?php 
			if(isset($_POST['PicCat']) and !empty($_POST['PicCat'])){
				echo"<tr>
		  			<td>Ảnh tin tức: </td>
		  			<td><input type='text' value='".$_POST['PicCat']."' readonly='readonly' size='1' name='numPic' /> </td>
				</tr>";
				$numPic = $_POST['PicCat'];
				for($i=1;$i<=$numPic;$i++){
		?>						
			<tr>
		  		<td>Ảnh tin <?php echo $i ?>: </td>
		  		<td><input name="fileCat<?php echo $i ?>" type="file" size="29" /></td>
			</tr> 	
		<?php		
				}
			}
		?>
		 <tr>
		   <td colspan="2"><div align="center">
		     <input type="submit" name="Submit" value="Submit" />
		     </div></td>
	      </tr>
		  </form>	
		</table>
		
		<div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay về</a></div>
	</div><!--end#Wrap_news-->

	