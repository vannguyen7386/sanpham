<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các cate này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelCate.php" method="post">
                    <table width="600" cellpadding="0" cellspacing="0" align="center" >
                    <tr class="first">
                        <td align="center" width="30">STT</td>
                        <td align="center" width="40">Mã Category</td>
                        <td align="center" width="210">Tên Category</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                 $i=0;
                    foreach($rows as $row){ 
                        $i++;
                        ?>
                    
                    <tr class="second">
                        <td align="center" valign="middle"><b><?php echo $i;?></b></td>
                        <td valign="middle" align="center"><span class="red"><b><?php echo $row['CateID']?></b></span></td>
                        <td valign="middle"><a href="ChangeCate.php?Id=<?php echo $row['CateID']?>" style="margin-left: 100px;" class="black"><?php echo $row['CateName']?></a></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelCate.php?Id=<?php echo $row['CateID']?>" onclick="return confirm('Bạn có chắc muốn xóa cate này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['CateID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll" style="margin-right: 50px;"/></p></div>
                <div class="Add_Del"><a href="AddCate.php" class="Add">Thêm Category</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa Category</a></div>
                
       