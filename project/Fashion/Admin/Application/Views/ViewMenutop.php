<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các item này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelNavi.php" method="post">
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
                    foreach($rowsNavi as $rowNavi){ 
                        $i++;
                        ?>
                    
                    <tr class="second">
                        <td align="center" valign="middle"><b><?php echo $i;?></b></td>
                        <td valign="middle" align="center"><a  href="EditNavi.php?Id=<?php echo $rowNavi['TopID']?>" class="red"><?php echo $rowNavi['FieldName']?></a></td>
                        <td valign="middle"><a href="EditNavi.php?Id=<?php echo $rowNavi['TopID']?>" style="margin-left: 100px;" class="black"><?php echo $rowNavi['FieldLink']?></a></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelNavi.php?Id=<?php echo $rowNavi['TopID']?>" onclick="return confirm('Bạn có chắc muốn xóa item này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $rowNavi['TopID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll" style="margin-right: 210px;"/></p></div>
                <div class="Add_Del" style="margin-right: 200px;"><a href="AddNavi.php" class="Add">Thêm Item Navi</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa Item Navi</a></div>
                
       