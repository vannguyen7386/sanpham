<script type="text/javascript">
function CheckID(Id){
    if(Id=="")
        return;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("CheckId").innerHTML=xmlhttp.responseText;
        }
    }
    
    xmlhttp.open("GET","Application/Controllers/CheckId.php?q="+Id,true);
    xmlhttp.send();
} 
    
</script>
<?php 
    $flag = true;
?>
<div class="Edit">
<h2>Thêm sản phẩm</h2>
<form name="FormEdit" action="Application/Controllers/AddProduct.php" method="post" enctype="multipart/form-data">
    <p>Mã sản phẩm: <input type="text" value=""  name="Id" class="Text" onblur ="CheckID(this.value)" />
        </p>
     <div id="CheckId"></div>   
    <p>Tên sản phẩm: <input type="text" value="" name="Name" class="Text" /></p>
    <p>Màu sắc/Kiểu dáng:<input type="text" value="" name="Color" class="Text" /></p>
    <p>Giá: <input type="text" value="" name="Price" class="Text" /></p>
    <p>Số lượng: <select class="Select" name="Inventory">
                <?php 
                for($i=0;$i<=50;$i++){
                    echo"<option value='$i' >$i</option>";
                }
                ?>
                </select></p>
    <p>Nhà cung cấp: <input type="text" value="" name="Producer" class="Text" /></p>
    <p>Category: <select class="Select" name="Category" onchange="showType(this.value)">
                    <?php 
                        foreach($rowsCate as $rowCate){
                            echo "<option value='{$rowCate['CateID']}'>{$rowCate['CateName']}</option>";        
                        }    
                    ?>
                </select></p>
                
    <p id="Type">Loại sản phẩm: <select class="Select" name="Type">
                                    <?php
                                        foreach($rowsType as $rowType){
                                            echo "<option value='{$rowType['TypeID']}'>{$rowType['TypeName']}</option>";     
                                        }
	
                                    ?>                    
                                </select></p>
    <p>Mới nhất: <span>YES<input type="radio" name="Newest" value="1" checked="checked"/> NO<input type="radio" name="Newest" value="0" /></span></p>
    <p>Sản phẩm chính: <span>YES<input type="radio" name="Main" checked="checked" value="1"/> NO<input type="radio" name="Main" value="0" /></span></p>
    <p>Chất liệu: <input type="text" name="Material" value="" class="Text" /></p>
    <p>Size: <input type="text" name="Size" value="" class="Text" /></p>
    <p>Mô tả:</p>
    <p><textarea name="Description" class="Text" rows="8"></textarea></p>
    <p style="margin-bottom: 25px;">Hình ảnh: <input type="file" name="file" class="Text" size="40" /></p>
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Add" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</div>
</form>