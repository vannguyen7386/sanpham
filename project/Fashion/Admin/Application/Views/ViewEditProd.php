<div class="Edit">
<h2><?php echo $row['ProdName']?></h2>
<form name="FormEdit" action="Application/Controllers/UpdateProduct.php" method="post" enctype="multipart/form-data">
    <p>Mã sản phẩm: <input type="text" value="<?php echo $row['ProdID']?>" readonly="readonly" name="Id" class="Text" /></p>
    <p>Tên sản phẩm: <input type="text" value="<?php echo $row['ProdName']?>" name="Name" class="Text" /></p>
    <p>Màu sắc/Kiểu dáng:<input type="text" value="<?php echo $row['ProdColor']?>" name="Color" class="Text" /></p>
    <p>Giá: <input type="text" value="<?php echo $row['ProdPrice'];?>" name="Price" class="Text" /></p>
    <p>Số lượng: <select class="Select" name="Inventory">
                <?php 
                for($i=0;$i<=50;$i++){
                    if($row['Inventory'] == $i)
                        echo"<option value='$i' selected='selected'>$i</option>";
                    else
                         echo"<option value='$i' >$i</option>";
                }
                ?>
                </select></p>
    <p>Nhà cung cấp: <input type="text" value="<?php echo $row['ProcName']?>" name="Producer" class="Text" /></p>
    <p>Category: <select class="Select" name="Category" onchange="showType(this.value)">
                    <?php 
                        foreach($rowsCate as $rowCate){
                            if($CateId == $rowCate['CateID']){
                                echo "<option value='{$rowCate['CateID']}' selected='selected'>{$rowCate['CateName']}</option>";
                            }else{
                                 echo "<option value='{$rowCate['CateID']}'>{$rowCate['CateName']}</option>";
                            }        
                        }    
                    ?>
                </select></p>
                
    <p id="Type">Loại sản phẩm: <select class="Select" name="Type">
                                    <?php 
                                        foreach($rowsType as $rowType){
                                            if($TypeID == $rowType['TypeID']){
                                                echo "<option value='{$rowType['TypeID']}' selected='selected'>{$rowType['TypeName']}</option>";
                                            }else{
                                                 echo "<option value='{$rowType['TypeID']}'>{$rowType['TypeName']}</option>";
                                            }            
                                        }
                                    
                                    
                                    ?>
                                </select></p>
    <p>Mới nhất: <span>YES<input type="radio" name="Newest" <?php if($row['Newest']=='1')echo"checked='checked'"; ?> value="1"/> NO<input type="radio" name="Newest" value="0" <?php if($row['Newest']=='0')echo"checked='checked'"; ?> /></span></p>
    <p>Sản phẩm chính: <span>YES<input type="radio" name="Main" <?php if($row['MainProd']=='1')echo"checked='checked'"; ?> value="1"/> NO<input type="radio" name="Main" value="0" <?php if($row['MainProd']=='0')echo"checked='checked'"; ?>/></span></p>
    <p>Điểm đánh giá: <span><?php echo $row['Mark']?><img src="Image/Star.png" /></span></p>
    <p>Ngày nhập: <span><?php echo $row['date'];?></span></p>
    <p>Chất liệu: <input type="text" name="Material" value="<?php echo $row['Material']?>" class="Text" /></p>
    <p>Size: <input type="text" name="Size" value="<?php echo $row['ProdSize']?>" class="Text" /></p>
    <p>Mô tả:</p>
    <p><textarea name="Description" class="Text" rows="8"><?php echo $row['Description']?></textarea></p>
    <p style="margin-bottom: 25px;">Hình ảnh: <input type="file" name="file" class="Text" size="40" /></p>
    <p style="margin: 5px 0 0 140px;"><input type="submit" name="submit" value="Edit" class="BtnSubmit" /><input type="reset" name="reset" value="reset" class="BtnSubmit" /></p>
</div>
</form>