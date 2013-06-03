
<?php
    echo "<ul>";
	foreach($rowsMainProd as $rowMP)
    {   
        $check = true;
        if(isset($_SESSION['CartId'])){
            for($i=0;$i<count($arr_id)-1;$i++){
                if($arr_id[$i] == $rowMP['ProdID']){
                    if($arr_qty[$i] == $rowMP['Inventory']){
                        $check = false;
                        break;
                    }
                }
            }
        }
        $price = number_format($rowMP['ProdPrice'],0,',','.');
        $star = "";
        $rank = $rowMP['Mark'];
        if($rank == NULL || $rank == 0)
            $rank = 1;
        
  echo "<li>
                <p style='margin:-10px 0 20px -20px;'>Mã: <b>".$rowMP['ProdID']."</b></p>
                <p style='margin:-10px 0 20px -20px;font-size:14px'>{$rowMP['ProdName']}<p>
                ";
                  for($i=0;$i<5;$i++){
                    if($i<$rank){
                        $star = "<img src='Image/Star.png' width='20' class='star' />";
                    }else{
                        $star = "<img src='Image/Star2.png' width='20' class='star' />";
                    }
                    echo $star;
                  }
                  
    echo          "
                <a href='#?w=500' rel='popup1' class='poplight'><img src = '".$rowMP['ProdImage']."' class='ProductImg' width='160' onclick='setSrc(this.src)' /></a>
                 <p>Giá: <b><span class='red'>".$price."</span></b></p>
                  <p class = 'button'><a href = 'Chi tiet san pham.php?ProdID=".$rowMP['ProdID']."'><img src = 'Image/Detail.png' onmouseover = 'this.src=\"Image/Detail_hover.png\"' onmouseout='this.src = \"Image/Detail.png\"' /></a>";
   
   if($rowMP['Inventory'] != 0){
        if($check)
            echo "<a href ='Application/Controllers/CartProcess.php?action=add&id=".$rowMP['ProdID']."'>";
        else
            echo "<a href ='Gio hang.php?err=Mã sản phẩm <b>".$rowMP['ProdID']."</b> không còn đủ trong kho'>";     
   }
   else
        echo "<a href ='#?err=Sản phẩm này không còn trong kho'>";
    
   echo "<img src = 'Image/Order.png' onmouseover = 'this.src=\"Image/Order_hover.png\"' onmouseout='this.src = \"Image/Order.png\"' /></a>
                  </p>
              </li>";
              
    }
    echo"</ul>";
?>
<div id="popup1" class="popup_block">
	<img id="popupImage" src="" width="400"/>
</div>
