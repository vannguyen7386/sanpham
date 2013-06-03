<?php   session_start();ob_start();
        include'Include/Header.inc.php';
        include'Include/Connect.inc.php';
        $conn = new Conection();
        $conn->Connected();
	
?>	
<script type="text/javascript">
function showBill(str){
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
    
    xmlhttp.open("GET","Application/Controllers/getBill.php?q="+str,true);
    xmlhttp.send();
}

</script>
	<div id="Container">
    <h2 class="Welcome">Bill Manage</h2>
        <?php if(isset($_REQUEST['success'])){echo "<p align='center' style='color:green'>{$_REQUEST['success']}</p>";}
                if(isset($_REQUEST['err'])){echo "<p align='center' class='red'>{$_REQUEST['err']}</p>";}
        ?>
		
        <?php if(isset($_SESSION['Admin'])){?>
        <div class="Menu">
            <div id="Intro">
                <h3>Thông tin giao dịch</h3>
                <?php include'Application/Controllers/ControlIntroPayment.php'?></div>
            <div>
            <h2>Dạnh sách hóa đơn</h2>
            <div class="Display">
                <form name="FormSelect">
                    <select name="Select" class="Select" onchange="showBill(this.value)">
                        <option value="">[Chọn hiển thị]</option>
                        <option value="Date">Ngày đặt</option>
                        <option value="OKStatus">Duyệt</option>
                        <option value="NoStatus">Chưa duyệt</option>
                    </select>
                </form>
                     
            </div>
            <div id="TxtHint">
                <?php include'Application/Controllers/ControlOrder.php'?>
                <div id="Pagging">
                    <?php include'Application/Controllers/ControlPagOrder.php'?>
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