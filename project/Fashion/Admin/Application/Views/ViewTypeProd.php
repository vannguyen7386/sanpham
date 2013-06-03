<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các type này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelType.php" method="post">
                    <table width="600" cellpadding="0" cellspacing="0" align="center" >
                    <tr class="first">
                        <td align="center" width="30">STT</td>
                        <td align="center" width="40">Mã Type</td>
                        <td align="center" width="150">Tên Type</td>
                        <td align="center" width="150">Tên Cate</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                    $i=0;
                    foreach($rows as $row){ 
                        $i++;
                        $sqlCate = "SELECT CateName FROM fas_cate_prod WHERE CateID={$row['CateID']}";
                        $rowCate = $Prod->displaySingle($sqlCate);
                        $CateName = $rowCate[0];
                        ?>
                    
                    <tr class="second">
                        <td align="center" valign="middle"><b><?php echo $i;?></b></td>
                        <td valign="middle" align="center"><span class="red"><b><?php echo $row['TypeID']?></b></span></td>
                        <td valign="middle"><a href="ChangeType.php?Id=<?php echo $row['TypeID']?>" style="margin-left: 70px;" class="black"><?php echo $row['TypeName']?></a></td>
                        <td valign="middle"><span style="margin-left: 70px;"><?php echo $CateName ?></span></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelType.php?Id=<?php echo $row['TypeID']?>" onclick="return confirm('Bạn có chắc muốn xóa type này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['TypeID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll" style="margin-right: 50px;"/></p></div>
                <div class="Add_Del"><a href="AddType.php" class="Add">Thêm Type Prod</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa Type Prod</a></div>
                
       