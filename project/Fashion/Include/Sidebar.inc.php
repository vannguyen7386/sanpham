<div id="TopMenu">
<?php 
    if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){
?>
    <p class="TopLink"><a href="index.php" class="Home">Trang chu</a></p>
<?php 
    }else{
        echo"<p class='TopLink'><a href='index.php' class='Home'>Trang chu</a> - <a href='".basename($_SERVER['SCRIPT_NAME'])."'>".$title."</a>";
    }
?>  
<form name="FormSearch" method="post" action="Tim kiem.php">
		<p class="Search">Tìm kiếm: <select class="Select" name="SelectValue">
										<option value="None">[Mục cần tìm]</option>
                                        <option value="All"
                                        <?php 
                                        if(isset($_POST['SelectValue']) and $_POST['SelectValue']=="All"){echo"selected='selected'";}
                                        if(isset($_REQUEST['Id']) and $_REQUEST['Id'] == "All"){echo"selected='selected'";}
                                        ?>
                                        >Tất cả</option>
                                        <?php
                                        include'Application/Controllers/ControlOption.php';
                                        
                                        ?>
									</select>
									<input type="text" value="" name="Value" class="Search_value" />
		</p>
</form>
		<a href="javaScript:submitSearch()"><img src="Image/Search_Icon.png" class="Search_icon" width="15" height="18" /></a>
		
	</div>
	<!--end #TopMenu-->
	
	<div id="Container">
	
		<div id="Sidebar">
		  <?php include'Application/Controllers/SidebarItemControl.php';?>
		</div><!--end #Sidebar-->
<div id="Content">     