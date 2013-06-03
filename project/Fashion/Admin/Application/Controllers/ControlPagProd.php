<?php
    $next = $pagging->get_next();
	$prev =$pagging->get_prev();
	$current = $pagging->get_current();	
	$list = $pagging->get_list();
    $div = $pagging->get_div();	
    if($pageNum > 1){	
        if($current > 1){
            if($list > 0){
                echo"<a href='Product.php?".$string."start=0&pageNum=$pageNum'>Trang đầu</a>";
                echo"<a href='Product.php?".$string."start=$prev&pageNum=$pageNum'>Quay lại</a>";
                echo"<a href='Product.php?".$string."start=".($list*$div-1)*$display."&pageNum=$pageNum'><<</a>";
            }else{
                echo"<a href='Product.php?".$string."start=$prev&pageNum=$pageNum'>Quay lại</a>";
            }	
    	}
        for($i=($list*$div)+1; $i<=$pageNum;$i++){
    	   if($current != $i){
    	       if($i <= $div*($list+1)){
    	           echo"<a href='Product.php?".$string."start=".($display*($i-1))."&pageNum=$pageNum'>$i</a>";
    	       }else{
    	           	echo"<a href='Product.php?".$string."start=".($display*($i-1))."&pageNum=$pageNum'>>></a>";
					break;
    	       }
    	   }else{
				echo "<span>".$i."</span>";
	       }	     
    	}
        if($current <$pageNum){
            echo"<a href='Product.php?".$string."start=$next&pageNum=$pageNum'>Tiếp</a>";
            if($pageNum > $div and $list < floor($pageNum/$div))
	           echo"<a href='Product.php?".$string."start=".($display)*($pageNum-1)."&pageNum=$pageNum'>Trang cuối</a>";
        }
    }else{
        echo "<span>1</span>";    
    }	 
?>