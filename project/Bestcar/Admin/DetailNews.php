
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#DetailNews{
		width:520px;
		overflow:hidden;
		border:1px solid #333333;
		-moz-border-radius:5px;
		margin:15px auto;
	}
	#DetailNews h3{
		margin-top:0;
		color:#FFFFFF;
		background:url(Images/menu_bg.jpg) 0 -5px;
		line-height:30px;
	}
	#DetailNews .bold{
		font-weight:bold;
		text-align:justify;
		line-height:20px;
	}
	#DetailNews .Copyright{
		text-align:right;
		line-height:20px;
		margin-top:25px;
	}
	#DetailNews .Copyright a{
		font-weight:bold;
		font-size:14px;
		color:#000000;
		text-decoration:none;
	}
	#DetailNews .Copyright a:hover,active{
		text-decoration:underline;
	}
	.back{
		text-align:right;
		margin:15px;
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
	.display{
		width:480px;
		overflow:hidden;
		padding:15px;
	}
</style>
<?php 
if(isset($_REQUEST['MaTT'])){
	$f_query = "SELECT *,DATE_FORMAT(Ngaytao,'%d/%m/%Y') AS ngay_tao FROM tintuc,loaitt 
				WHERE tintuc.MaLTT = loaitt.MaLTT and MaTT = '".$_REQUEST['MaTT']."'";	
	$result = mysql_query($f_query);
	$rows = mysql_fetch_array($result);
	if($rows){
				
?>
<div class="title">Bản tin chi tiết</div>
<div id="DetailNews">
  <h3 align="center"><?php echo $rows['Tieude'] ?></h3>
  <div class="display">
  	<img src="../Image/News/<?php echo $rows['Picture'] ?>" width="240" height="160" style="float:right;margin-left:5px" />
  	<p class="bold">Mã tin: <span><?php echo $rows['MaTT'] ?></span></p>
	<p class="bold">Tiêu đề: <span><?php echo $rows['Tieude'] ?></span></p>
	<p class="bold">Loại tin: <span><?php echo $rows['TenLTT'] ?></span></p>
	<p class="bold">Ngày tạo: <span><?php echo $rows['ngay_tao'] ?></span></p>			
	<p class="bold">Tóm tắt: <span><?php echo $rows['Tomtat'] ?></span></p>	
	<p class="bold">Nội dung: <span><?php echo $rows['Noidung'] ?></span></p>
	<p align="center"><?php 
	  	$query_pic = mysql_query("SELECT DISTINCT(TenAnh) FROM picture WHERE MaTT='".$rows['MaTT']."'");
		while($result = mysql_fetch_array($query_pic)){
	?>
		<img src="../Image/News/<?php echo $result['TenAnh'] ?>" width="356" /><br />		
	<?php		
		}
	  ?></p>
	 <div class="Copyright"><p>(Tác giả / Nguồn)</p><a href="http://<?php echo $rows['Copyright']  ?>"><?php echo $rows['Copyright'] ?> </a></div> 	
  </div>
  <?php
	}else{
		header("location:index.php?pag=NewsMan&err=Không tồn tại bản tin này");
	}
}
?>
  <div class="back"><a href="JavaScript:window.history.go(-1);"><< Quay về</a></div>
</div>
