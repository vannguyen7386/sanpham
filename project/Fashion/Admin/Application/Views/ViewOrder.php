<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các hóa đơn này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelOrder.php" method="post">
                    <table width="960" cellpadding="0" cellspacing="0" >
                    <tr class="first">
                        <td width="35" align="center">STT</td>
                        <td align="center" width="90">Họ tên KH</td>
                        <td align="center" width="90">Email</td>
                        <td align="center" width="70">Phone</td>
                        <td align="center" width="180">Địa chỉ</td>
                        <td align="center" width="70">Ngày đặt</td>
                        <td align="center" width="70">Ngày giao</td>
                        <td align="center" width="40">Duyệt</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                    $i = $start;
                    foreach($rows as $row){ 
                        $i++;
                        ?>
                    
                    <tr class="second">
                        <td valign="middle" align="center"><b><?php echo $i ?></b></td>
                        <td valign="middle"><a href="OrderDetail.php?Id=<?php echo $row['BillID']?>" class="red" style="margin-left: 5px;"><b><?php echo $row['Name']?></b></a></td>
                        <td valign="middle"><a href="OrderDetail.php?Id=<?php echo $row['BillID']?>" style="margin-left: 5px;" class="black"><?php echo $row['Email']?></a></td>
                        <td valign="middle" ><span style="margin-left: 5px;" class="red"><?php echo $row['Phone']?></span></td>
                        <td valign="middle"><span style="margin-left: 5px;"><?php echo $row['Address']?></span></td>
                        <td align="center" valign="middle"><b><?php echo $row['DateOrder']?></b></td>
                        <td align="center" valign="middle"><span ><?php echo $row['DateDelivery']?></span></td>
                        <td valign="middle" align="center"><?php echo $row['Status'] ?></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelOrder.php?Id=<?php echo $row['BillID']?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['BillID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll"/></p></div>
                <div class="Add_Del"><a href="Application/Controllers/Storage.php" class="Add">Lưu kho hóa đơn</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa đơn hàng</a></div>
                
       