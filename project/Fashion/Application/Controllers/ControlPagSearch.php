<?php
    $next = $pagging->get_next();
	$prev =$pagging->get_prev();
	$current = $pagging->get_current();	
	$list = $pagging->get_list();
    $div = $pagging->get_div();	
	if($pageNum > 1){	
        if($current > 1){
            if($list > 0){
                echo"<a href='Tim kiem.php?start=0&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'>Trang đầu</a>";
                echo"<a href='Tim kiem.php?start=$prev&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'>Quay lại</a>";
                echo"<a href='Tim kiem.php?start=".($list*$div-1)*$display."&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'><<</a>";
            }else{
                echo"<a href='Tim kiem.php?start=$prev&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'>Quay lại</a>";
            }	
    	}
        for($i=($list*$div)+1; $i<=$pageNum;$i++){
    	   if($current != $i){
    	       if($i <= $div*($list+1)){
    	           echo"<a href='Tim kiem.php?start=".($display*($i-1))."&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'>$i</a>";
    	       }else{
    	           	echo"<a href='Tim kiem.php?start=".($display*($i-1))."&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}'>>></a>";
					break;
    	       }
    	   }else{
				echo "<span>".$i."</span>";
	       }	     
    	}
        if($current <$pageNum){
            echo"<a href='Tim kiem.php?start=$next&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}&Id={$TypeID}&Name={$ProdName}'>Tiếp</a>";
            if($pageNum > $div and $list < floor($pageNum/$div))
	           echo"<a href='Tim kiem.php?start=".($display)*($pageNum-1)."&pageNum=$pageNum&Id={$TypeID}&Name={$ProdName}&Id={$TypeID}&Name={$ProdName}'>Trang cuối</a>";
        }
    }else{
        echo "<span>1</span>";    
    }	 
?>