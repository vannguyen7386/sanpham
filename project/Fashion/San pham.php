<?php session_start();ob_start();
	include ('Include/Header.inc.php');
    include ('Include/Sidebar.inc.php');
?>
<script type="text/javascript">
function showProd(str){
    if(str==""){
        return;
    }
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("ProdDis").innerHTML=xmlhttp.responseText;
        }
    }
    <?php 
    $link =null; 
    if(isset($_REQUEST['TypeID'])){
        $TypeID = mysql_real_escape_string($_REQUEST['TypeID']);
        $link = "Application/Controllers/getProd.php?TypeID=". $TypeID."&q=";
    }elseif(isset($_REQUEST['CateID'])){
        $link = "Application/Controllers/getProd.php?CateID=".$_REQUEST['CateID']."&q=";
    }else{
        $link = "Application/Controllers/getProd.php?q=";
    }
    ?>
    xmlhttp.open("GET","<?php echo $link ?>"+str,true);
    xmlhttp.send();
}
</script>		
			<div id="Main_Content">
				<div class="MenuFirst">
                    <?php 
                    if(isset($_REQUEST['TypeID']) or isset($_REQUEST['CateID'])){
                        echo "<h2>$linked</h2>";
                    }else{
                        echo"<h2>Sản phẩm</h2>";
                    }
                    ?>
                    
                    <form>
                    <p class="Display">Hiển thị: <select name="Prod" class="Select" onchange="showProd(this.value)">
										<option value="">[Chọn hiển thị ]</option>
                                        <option value="Date">Ngày nhập</option>
                                        <option value="DescPrice">Giá giảm dần</option>
                                        <option value="AscPrice">Giá tăng dần</option>
                                        <option value="Mark">Điểm đánh giá</option>
									 </select>	
		              </p>
                    </form>
                    <div id="ProdDis">
                        <?php 
                        if(isset($_REQUEST['TypeID'])){
                            include'Application/Controllers/ProdByTypeID.php';        
                        }elseif(isset($_REQUEST['CateID'])){
                            include'Application/Controllers/ProdByCateID.php';
                        }else{
					        include'Application/Controllers/AllProdControl.php';
                        }?>  
                       <div id="Pagging">   
                        <?php  
                            include'Application/Controllers/ControlPagging.php'
                        ?>    
                        </div>
                    </div>
                    <div style="clear: both;"></div>
				</div>
                
			</div><!--end #Main_Content-->
			
		</div><!--end #Content-->
				
<?php
    include('Include/Footer.inc.php');	
?>
