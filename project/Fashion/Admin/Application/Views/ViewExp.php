<script language="javascript">
    function submitFormDel(){
        if(confirm('Bạn có muốn xóa các bản tin này')){
            document.FormDel.submit();
        }    
    }   
   
</script>         
                <form name="FormDel" action="Application/Controllers/DelExp.php" method="post">
                    <table width="960" cellpadding="0" cellspacing="0" >
                    <tr class="first">
                        <td width="35" align="center">STT</td>
                        <td align="center" width="110">Tiêu đề</td>
                        <td align="center" width="150">Tóm tắt</td>
                        <td align="center" width="150">Nội dung</td>
                        <td align="center" width="60">Ngày đăng</td>
                        <td align="center" width="90">Slide</td>
                        <td align="center" width="145">Hình ảnh</td>
                        <td align="center" width="40">Xóa</td>
                        <td align="center" width="35">Check</td>
                    </tr>
                    
                    <?php 
                    $i = $start;
                    foreach($rows as $row){ 
                        $i++;
                        $Content = substr($row['InfoContent'],0,200)."...";
                        $Summary = substr($row['InfoSummary'],0,200)."...";
                        ?>
                        
                    <tr class="second">
                        <td valign="middle" align="center"><b><?php echo $i ?></b></td>
                        <td valign="middle"><a href="EditExp.php?Id=<?php echo $row['InfoID']?>" class="red" style="margin-left: 5px;"><b><?php echo $row['InfoHead']?></b></a></td>
                        <td valign="middle"><a href="EditExp.php?Id=<?php echo $row['InfoID']?>" style="margin-left: 5px;" class="black"><?php echo $Summary?></a></td>
                        <td valign="middle" ><span style="margin-left: 5px;"><?php echo $Content?></span></td>
                        <td align="center" valign="middle"><b><?php echo $row['Date']?></b></td>
                        <td align="center" valign="middle"><span class="star"><?php echo $row['Slide']?></span></td>
                        <td valign="middle" align="center"><a href="EditExp.php?Id=<?php echo $row['InfoID']?>"><img src="../<?php echo $row['InfoImage'] ?>" width="140" /></a></td>
                        <td valign="middle" align="center"><a href="Application/Controllers/DelExp.php?Id=<?php echo $row['InfoID']?>" onclick="return confirm('Bạn có chắc muốn xóa bản tin này')"><img src="../Image/DeleteRed.png" /></a></td>
                        <td valign="middle" align="center"><input type="checkbox" name="check[]" value="<?php echo $row['InfoID']?>" class="Checked" /></td>
                    </tr>
                    <?php }?>
                    </table>
                </form>
                <div class="CheckAll"><p><input type="button" value="Check All" name="Check" onclick="CheckAll()" class="CheckAll"/></p></div>
                <div class="Add_Del"><a href="AddExp.php" class="Add">Thêm bản tin</a><a href="javaScript:submitFormDel()" class="Delete" >Xóa bản tin</a></div>
                
       