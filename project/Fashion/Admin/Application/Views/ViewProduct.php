<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các sản phẩm này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelProd.php" method="post">
                    <table width="960" cellpadding="0" cellspacing="0" >
                    <tr class="first">
                        <td width="35" align="center">STT</td>
                        <td align="center" width="110">Mã SP</td>
                        <td align="center" width="110">Tên SP</td>
                        <td align="center" width="110">Giá</td>
                        <td align="center" width="90">Tồn kho</td>
                        <td align="center" width="90">Điểm đánh giá</td>
                        <td align="center" width="170">Hình ảnh</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                    $i = $start;
                    foreach($rows as $row){ 
                        $i++;
                        $price = number_format($row['ProdPrice'],0,',','.');
                        $status = "";
                        if($row['Inventory'] == 0){
                            $status = "<span class='red'>Hết hàng</span>";
                        }else{
                            $status = $row['Inventory'];
                        }
                        ?>
                    
                    <tr class="second">
                        <td valign="middle" align="center"><b><?php echo $i ?></b></td>
                        <td valign="middle"><a href="EditProd.php?Id=<?php echo $row['ProdID']?>" class="red" style="margin-left: 20px;"><b><?php echo $row['ProdID']?></b></a></td>
                        <td valign="middle"><a href="EditProd.php?Id=<?php echo $row['ProdID']?>" style="margin-left: 20px;" class="black"><?php echo $row['ProdName']?></a></td>
                        <td valign="middle" ><span style="margin-left: 20px;" class="red"><?php echo $price?> VND</span></td>
                        <td align="center" valign="middle"><b><?php echo $status?></b></td>
                        <td align="center" valign="middle"><span class="star"><?php echo $row['Mark']?></span></td>
                        <td valign="middle" align="center"><a href="EditProd.php?Id=<?php echo $row['ProdID']?>"><img src="../<?php echo $row['ProdImage'] ?>" width="140" /></a></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelProd.php?Id=<?php echo $row['ProdID']?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['ProdID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll"/></p></div>
                <div class="Add_Del"><a href="AddProd.php" class="Add">Thêm sản phẩm</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa sản phẩm</a></div>
                
       