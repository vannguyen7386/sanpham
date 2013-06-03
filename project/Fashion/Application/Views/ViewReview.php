<script>
function showStars(str,id)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","Application/Controllers/ControlMark.php?q="+str+"&id="+id,true);
xmlhttp.send();
}
function hover(n){
    for(var i=0;i<=n;i++){
        document.getElementById("image"+i).src='Image/Star.png';
    }      
}
function out(n){
    for(var i=0;i<=n;i++){
        document.getElementById("image"+i).src='Image/Star3.png';
    }      
}

function FormReviewSubmit(){
     if(checkFormReview())
        document.FormReview.submit();
    return;
}
 function checkFormReview(){
	a= document.FormReview.Name.value;
	if(document.FormReview.Name.value == "")
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Bạn không được để trống họ tên</font>";
		return false;
	}
	if(a.length <=2)
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Tên phải nhiều hơn 2 ký tự </font>";
		return false;
	}
	
	email = document.FormReview.Email.value;
   re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.FormReview.Email.value== "")
	{
		document.getElementById("errEmail").innerHTML= "<font color='red'>Bạn không được để trống email</font>";
		return false;
	}
   if (!re.test(email))
   {
      document.getElementById("errEmail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
	
	if(document.FormReview.Content.value== "")
	{
		document.getElementById("errContent").innerHTML= "<font color='red'>Bạn không được để trống nội dung</font>";
		return false;
	}
    return true;
}

</script>
<div class="ReviewCustome">
    <p><b>Chọn mức đánh giá của bạn với sản phẩm này</b></p>
    <div id="txtHint">
    <?php 
        if($session_mark->checkReview($IdSe,$ID)){
            for($i=0;$i<5;$i++){
                $count = $i+1;
                echo "<a href='javaScript:showStars({$count},\"$ID\")'><img src='Image/Star3.png' width='25' id='image".$i."' onmouseover='hover(".$i.")' onmouseout='out(".$i.")' onclick='submitForm(".($i+1).")' /></a>"; 
            } 
        }else{
            echo "<p>Bạn đã cho điểm sản phẩm này</p>";
             for($i=0;$i<$row[0];$i++){
                
                echo "<img src='Image/Star.png' width='25' />"; 
            } 
        }  
    ?>
    </div>
    <?php 
        if(isset($_REQUEST['err'])){
            echo "<p class='red' align='center'>".$_REQUEST['err']."</p>";
        }
    ?>
    <p style="margin:10px 0 5px;font-weight:bold">Mời bạn cho đánh giá sản phẩm:</p>
    <form method="post" action="Application/Controllers/AddReview.php" name="FormReview">
        <p>Họ tên: <input type="text" name="Name" class="Text" onfocus="document.getElementById('errName').innerHTML=''"  /><span class="red">(*)</span></p>
        <div id="errName"></div>
        <p>Email: <input type="text" name="Email" class="Text" onfocus="document.getElementById('errEmail').innerHTML=''"/><span class="red">(*)</span></p>
        <div id="errEmail"></div>
        <input type="hidden" name="ProdID" value="<?php echo $ID?>" /> 
        <p>Nội dung: <span class="red">(*)</span></p>
        <div id="errContent"></div>
        <p><textarea name="Content" class="Text" rows="6" cols="48" onfocus="document.getElementById('errContent').innerHTML=''" style="margin-bottom: 15px;"></textarea></p>
    </form>  
    <a class="button" href="javaScript:FormReviewSubmit()">Nhập đánh giá</a>
    
         
</div>