<h3>Khách hàng</h3>
                    <table width="960" cellpadding="0" cellspacing="0" >
                    <tr class="first">
                        <td align="center" width="100">Họ tên KH</td>
                        <td align="center" width="100">Email</td>
                        <td align="center" width="70">Phone</td>
                        <td align="center" width="180">Địa chỉ</td>
                        <td align="center" width="180">Thông tin thêm</td>
                        <td align="center" width="70">Ngày đặt</td>
                        <td align="center" width="70">Ngày giao</td>
                        <td align="center" width="40">Duyệt</td>
                    </tr>
                    
                    
                    <tr class="second">
                        <td valign="middle"><span class="red" style="margin-left: 5px;"><b><?php echo $row['Name']?></b></span></td>
                        <td valign="middle"><span style="margin-left: 5px;" class="black"><?php echo $row['Email']?></a></td>
                        <td valign="middle" ><span style="margin-left: 5px;" class="red"><?php echo $row['Phone']?></span></td>
                        <td valign="middle"><span style="margin-left: 5px;"><?php echo $row['Address']?></span></td>
                        <td valign="middle"><span style="margin-left: 5px;"><?php echo $row['ExtraInfo']?></span></td>
                        <td align="center" valign="middle"><b><?php echo $row['DateOrder']?></b></td>
                        <td align="center" valign="middle"><span ><?php echo $row['DateDelivery']?></span></td>
                        <td valign="middle" align="center"><?php echo $row['Status'] ?></td>
                    </tr>
                    
                    </table>

<h3>Chi tiết hóa đơn</h3>      
    <table width="960" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;;">
    <tr class="first">
        <td align="center" width="40">STT</td>
        <td align="center" width="120">Mã sản phẩm</td>
        <td align="center" width="120">Tên sản phẩm</td>
        <td align="center" width="140">Hình ảnh</td>
        <td align="center" width="60">Số lượng</td>
        <td align="center" width="90">Đơn Giá</td>
        <td align="center" width="90">Thành tiền</td>
    </tr>
    <?php
    $i=0; 
    $sumAll=0;
    foreach($rowsDetail as $rowDetail){
        $price = number_format($rowDetail['Price'],0,',','.');
        $sum = $rowDetail['Price']*$rowDetail['Quantity'];
        $i++;
        echo"<tr class='second'>";
        echo"<td valign='middle' align='center'><b>{$i}</b></td>";
        echo"<td valign='middle'><b class='red' style='margin-left:50px'>{$rowDetail['ProdID']}</b></td>";  
        $rowProd = $Prod->getProdById($rowDetail['ProdID']);
        echo"<td valign='middle'><span style='margin-left:50px'>{$rowProd['ProdName']}</span></td>";
        echo"<td align='center'><img src='../{$rowProd['ProdImage']}' /></td>";
        echo"<td valign='middle' align='center'><b>{$rowDetail['Quantity']}</b></td>";
        echo"<td valign='middle'><b class='red' style='margin-left:40px'>{$price} </b></td>"; 
        echo"<td valign='middle'><b class='red' style='margin-left:40px'>".number_format($sum,0,',','.')."</b></td>";       
        echo"</tr>";
        $sumAll += $sum;
    }
    $sumAll = number_format($sumAll,0,',','.');
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><span style="margin-left: 40px;"><b>Tổng tiền:</b></span></td>
        <td><span class="red" style="margin-left: 40px;font-weight: bold;"><?php echo $sumAll?></span></td>
    </tr>    
    
    </table>
    <div class="Add_Del" style="margin: 20px 0; float: none; text-align: center;">
    <a href="Application/Controllers/UpdateOrder.php?Id=<?php echo $row['BillID']?>" 
    class="Add" <?php if($row['Status' == '1']){echo "style='display:none'";}?>>Duyệt đơn hàng</a></div>
    
    
    
    
    