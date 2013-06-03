<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các item này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelBotMenu.php" method="post">
                    <table width="600" cellpadding="0" cellspacing="0" align="center" >
                    <tr class="first">
                        <td align="center" width="30">STT</td>
                        <td align="center" width="100">Navi Name</td>
                        <td align="center" width="180">Link</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                 $i=0;
                    foreach($rowsBot as $rowBot){ 
                        $i++;
                        ?>

                    <tr class="second">
                        <td align="center" valign="middle"><b><?php echo $i;?></b></td>
                        <td valign="middle" align="center"><a  href="EditBotMenu.php?Id=<?php echo $rowBot['ID']?>" class="red"><?php echo $rowBot['FieldName']?></a></td>
                        <td valign="middle"><a href="EditBotMenu.php?Id=<?php echo $rowBot['ID']?>" style="margin-left: 100px;" class="black"><?php echo $rowBot['FieldLink']?></a></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelBotMenu.php?Id=<?php echo $rowBot['ID']?>" onclick="return confirm('Bạn có chắc muốn xóa item này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $rowBot['ID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll" style="margin-right: 210px;"/></p></div>
                <div class="Add_Del" style="margin-right: 200px;"><a href="AddMenuBot.php" class="Add">Thêm Item Bot</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa Item Bot</a></div>
                
       