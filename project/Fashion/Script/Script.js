function submitSearch(){
    document.FormSearch.submit();
    return;
}
 function submitForm(){
    document.formCast.action="Thanh toan.php";
    document.formCast.submit();
    
 }
 function Renew(){
    document.formCast.action="Application/Controllers/CartProcess.php?action=renew";
    document.formCast.submit();
    return;
 }
 function DelAll(){
	if(confirm("Bạn có chắc muốn xóa giỏ hàng?")){
        document.formCast.action="Application/Controllers/CartProcess.php?action=delall";
        document.formCast.submit(); 
    } 
    return;
 }
 function ContactFormSubmit(){
    if(checkForm())
        document.ContactForm.submit();
    return;
 }
 function ContactFormReset(){
    document.ContactForm.reset();
    return;
 }
 
 function checkForm(){
	a= document.ContactForm.Name.value;
    if(document.ContactForm.Heading.value == "")
	{
		document.getElementById("errHeading").innerHTML= "<font color='red'>Bạn không được để trống tiêu đề</font>";
		return false;
	}
	if(document.ContactForm.Name.value == "")
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Bạn không được để trống họ tên</font>";
		return false;
	}
	if(a.length <=2)
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Tên phải nhiều hơn 2 ký tự </font>";
		return false;
	}
	
	email = document.ContactForm.Email.value;
   re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.ContactForm.Email.value== "")
	{
		document.getElementById("errEmail").innerHTML= "<font color='red'>Bạn không được để trống email</font>";
		return false;
	}
   if (!re.test(email))
   {
      document.getElementById("errEmail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
	
	reMobile= /^[0]{1}\d{1,3}\s?\d{7,9}$/;
	phone= document.ContactForm.Phone.value;
	if(document.ContactForm.Phone.value != "" && reMobile.test(phone)== false)
	{
		document.getElementById("errPhone").innerHTML= "<font color='red'>Số điện thoại phải theo dạng:<br />[Mã vùng] [Số điện thoại] hoặc [09x\/01xx] [xxxxxxx]</font>";
		return false;
	}
	
	if(document.ContactForm.Content.value== "")
	{
		document.getElementById("errContent").innerHTML= "<font color='red'>Bạn không được để trống nội dung</font>";
		return false;
	}
    return true;
}



function PaymentFormSubmit(){
    if(checkFormPayment())
        document.PaymentForm.submit();
    return;
 }
 function PaymentFormReset(){
    document.PaymentForm.reset();
    return;
 }
 
 function checkFormPayment(){
	a= document.PaymentForm.Name.value;
	if(document.PaymentForm.Name.value == "")
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Bạn không được để trống họ tên</font>";
		return false;
	}
	if(a.length <=2)
	{
		document.getElementById("errName").innerHTML= "<font color='red'>Tên phải nhiều hơn 2 ký tự </font>";
		return false;
	}
	
	email = document.PaymentForm.Email.value;
   re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(document.PaymentForm.Email.value== "")
	{
		document.getElementById("errEmail").innerHTML= "<font color='red'>Bạn không được để trống email</font>";
		return false;
	}
   if (!re.test(email))
   {
      document.getElementById("errEmail").innerHTML= "<font color='red'>Sai địa chỉ email </font>";
   	  return false;
    }
	
	reMobile= /^[0]{1}\d{1,3}\s?\d{7,9}$/;
	phone= document.PaymentForm.Phone.value;
    if(document.PaymentForm.Phone.value == ""){
       document.getElementById("errPhone").innerHTML= "<font color='red'>Bạn không được để trống số điện thoại</font>";
	   return false; 
    }
	if(reMobile.test(phone)== false)
	{
		document.getElementById("errPhone").innerHTML= "<font color='red'>Số điện thoại phải theo dạng:<br />[Mã vùng] [Số điện thoại] hoặc [09x\/01xx] [xxxxxxx]</font>";
		return false;
	}
	if(document.PaymentForm.Address.value == "")
	{
		document.getElementById("errAddress").innerHTML= "<font color='red'>Bạn không được để trống địa chỉ</font>";
		return false;
	}

    return true;
}