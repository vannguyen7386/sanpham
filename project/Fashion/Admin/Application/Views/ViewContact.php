<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các thông tin này')){
            document.FormDel.submit();
        }    
    }   
   
</script> 
<div>        
                <form name="FormDel" action="Application/Controllers/DelContact.php" method="post">
                    <table width="960" cellpadding="0" cellspacing="0" >
                    <tr class="first">
                        <td width="35" align="center">STT</td>
                        <td align="center" width="120">Tên KH</td>
                        <td align="center" width="120">Email</td>
                        <td align="center" width="80">Phone</td>
                        <td align="center" width="180">Tiêu đề</td>
                        <td align="center" width="180">Nội dung</td>
                        <td align="center" width="90">Ngày gửi</td>
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
                        <td valign="middle"><span class="red" style="margin-left: 5px;"><b><?php echo $row['Name']?></b></span></td>
                        <td valign="middle"><span style="margin-left: 5px;" class="black"><?php echo $row['Email']?></span></td>
                        <td valign="middle" ><span style="margin-left: 5px;" class="red"><?php echo $row['Phone']?></span></td>
                        <td valign="middle"><b style="margin-left: 5px;"><?php echo $row['Header']?></b></td>
                        <td><span style="margin-left: 5px;"><?php echo $row['Content']?></span></td>
                        <td valign="middle" align="center"><?php echo $row['DateSend']?></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelContact.php?Id=<?php echo $row['ID']?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['ID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll"/></p></div>
                <div class="Add_Del"><a href="javaScript:submitFormDel()" class="Delete" >Xóa thông tin</a></div>
    
</div>  