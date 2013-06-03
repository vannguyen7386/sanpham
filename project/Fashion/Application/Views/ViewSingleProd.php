
<div class="DetailProd">
						<a href="#?w=500" rel="popup1" class="poplight"><img src="<?php echo $row['ProdImage']?>" width="200" class="MainImg" onclick="setSrc(this.src)" /></a>
						<div class="InfoProd">
                        <?php 
                        $check = true;
                        if(isset($_SESSION['CartId'])){
                            for($i=0;$i<count($arr_id)-1;$i++){
                                if($arr_id[$i] == $row['ProdID']){
                                    if($arr_qty[$i] == $row['Inventory']){
                                        $check = false;
                                        break;
                                    }
                                }
                            }
                        }
                        $star ="";
                        $rank = $row['Mark'];
                        if($rank==0)
                            $rank = 1;
                        for($i=0;$i<5;$i++){
                            if($i<$rank){
                                $star = "<img src='Image/Star.png' width='20' class='star' />";
                            }else{
                                $star = "<img src='Image/Star2.png' width='20' class='star' />";
                            }
                            echo $star;
                        }
                        $price = number_format($row['ProdPrice'],0,',','.');
                        ?>
						
							<p><a href="Danh gia.php?Id=<?php echo $row['ProdID']?>">(Đánh giá của bạn)</a></p>
							<p><i>Mã SP:</i><span class="content"><b><?php echo $row['ProdID']?></b></span></p>
                            <p><i>Tên sản phẩm:</i><span class="content" style="font-size:14px;"><b><?php echo $row['ProdName'];?></b></span></p>
							<p><i>Tình trạng:</i>
                            <?php
                                if($row['Inventory'] == 0)
                                    echo "<span class='content' style='color:red'>Hết</span>";
                                else
                                    echo "<span class='content' style='color:green'>Còn: <b>".$row['Inventory']."</b> sản phẩm</span>";
                            ?>
                            </p>
							<p><i>Giá bán:</i><span class="content" style="color: red;"><b><?php echo $price;?> VND</b></span></p>
							<p><i>Màu sắc / Style:</i><span class="content"><?php echo $row['ProdColor']?></span></p>
							<p><i>Chất liệu:</i><span class="content"><?php echo $row['Material']?></span></p>
							<p><i>Kích cỡ:</i><span class="content"><?php echo $row['ProdSize']?></span></p>
							<p class="detail"><?php echo $row['Description']?></p>
                            
                            
                    </div>
                     <?php 
    if($row['Inventory'] == 0)
        echo "<a href='Chi tiet san pham.php?err=Mặt hàng này không còn trong kho' class='Order'>Đặt hàng</a>";
    else{
        if($check)
            echo "<a href='Application/Controllers/CartProcess.php?action=add&id=".$row['ProdID']."' class='Order'>Đặt hàng</a>";
        else
            echo "<a href='Gio hang.php?err=Mã sản phẩm <b>".$row['ProdID']."</b> không còn đủ trong kho' class='Order'>Đặt hàng</a>";
    }
    ?>
                    <div class="Reviews">
                            <p style="margin-bottom:10px ;"><b>Đánh giá sản phẩm (<span class="red"><?php echo $CountReview[0]; ?></span>)</b></p>
                            
                            <?php 
                            foreach($rowReviews as $rowReview){
                                echo "<div class='ReviewInfo'>";
                                if(isset($_SESSION['Admin'])){
                                    echo "<div class='EditProcess'><a href='Application/Controllers/DeleteReview.php?id=".$rowReview['ID']."' class='Delete'></a><a href='?ProdID={$ID}&id=".$rowReview['ID']."' class='Edit'></a></div>";
                                }
                                echo "<p class='Name'>".$rowReview['Name']."<span class='Date'>(".$rowReview['date_add'].")</span></p>";
                                echo "<p class='Email'>".$rowReview['Email']."</p>";
                                if(isset($_REQUEST['id']) and $_REQUEST['id'] == $rowReview['ID']){
                                    $id = $disp->sqlQuote($_REQUEST['id']);
                                    echo"<form action='Application/Controllers/EditReview.php' method='post' >";
                                    echo"<p><textarea name='Content' class='Text' rows='6' cols='70'>{$rowReview['Content']}</textarea></p>";
                                    echo"<p><input type='hidden' value='{$rowReview['ID']}' name='ID' /></p>"; 
                                    echo"<p><input type='submit' value='Submit' class='button'/></p>";   
                                    echo"</form>";    
                                }else{
                                    echo "<p class='Content'>".$rowReview['Content']."</p>";
                                }
                                echo "</div>";
                            }  
                            ?>
                            <div id="Pagging">
                            <?php
                        	if($pageNum > 1){	
                                if($current > 1){
                                    if($list > 0){
                                        echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=0&pageNum=$pageNum'>Trang đầu</a>";
                                        echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=$prev&pageNum=$pageNum'>Quay lại</a>";
                                        echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=".($list*$div-1)*$display."&pageNum=$pageNum'><<</a>";
                                    }else{
                                        echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=$prev&pageNum=$pageNum'>Quay lại</a>";
                                    }	
                            	}
                                for($i=($list*$div)+1; $i<=$pageNum;$i++){
                            	   if($current != $i){
                            	       if($i <= $div*($list+1)){
                            	           echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
                            	       }else{
                            	           	echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=".($display*($i-1))."&pageNum=$pageNum'>>></a>";
                        					break;
                            	       }
                            	   }else{
                        				echo "<span>".$i."</span>";
                        	       }	     
                            	}
                                if($current <$pageNum){
                                    echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=$next&pageNum=$pageNum'>Tiếp</a>";
                                    if($pageNum > $div and $list < floor($pageNum/$div))
                        	           echo"<a href='Chi tiet san pham.php?ProdID=".$row['ProdID']."&start=".($display)*($pageNum-1)."&pageNum=$pageNum'>Trang cuối</a>";
                                }
                            }else{
                                echo "<span>1</span>";    
                            }	 



                            ?>
                            
                            </div>
                    </div>
   
    <div id="popup1" class="popup_block">
	<img id="popupImage" src="" width="400"/>
    </div>
</div>