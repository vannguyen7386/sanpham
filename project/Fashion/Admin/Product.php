<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
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
            document.getElementById("TxtHint").innerHTML=xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("GET","Application/Controllers/getProd.php?q="+str,true);
    xmlhttp.send();
}

</script>
	<div id="Container">
    <h2 class="Welcome">Product</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}
                if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu">
        <a><?php if(!isset($_REQUEST['SearchValue'])){?></a>
            <div class="Display">
                <form name="FormSelect">
                    <select name="Select" class="Select" onchange="showProd(this.value)">
                        <option value="">[Chọn hiển thị]</option>
                        <option value="DescPrice">Giá giảm</option>
                        <option value="AscPrice">Giá tăng</option>
                        <option value="OKStatus">Còn hàng</option>
                        <option value="NoStatus">Hết hàng</option>
                        <option value="Mark">Điểm đánh giá</option>
                        </select>
                </form>
                     
            </div>
            <?php }else{
                echo "<div style='height:40px;'></div>";
            }?>
            <div class="Search">
                <form action="Product.php" method="post" name="MyForm">
                    <p><input type="text" name="SearchValue" value="Nhập mã sản phẩm" 
                    onfocus="if(this.value=='Nhập mã sản phẩm'){this.value='';}" 
                    onblur="if(this.value==''){this.value='Nhập mã sản phẩm';}" class="Text"/><input type="submit" value="Search" class="BtnSubmit" /></p>
                </form>
                
            </div>
            <div id="TxtHint">
                <?php include'Application/Controllers/ControlProduct.php'?>
                <div id="Pagging">
                    <?php include'Application/Controllers/ControlPagProd.php'?>
                </div>
             </div>
        </div>
        <?php 
            }else{
                include'Login.php';
            }        
        ?>
        
	</div><!--end #Container-->
<?php
	include'Include/Footer.inc.php';
?>