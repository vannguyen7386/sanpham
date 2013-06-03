
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
function checkPage($page){
	$title="";
	if($page=='Default')
		$title = "**BESTCAR**";
	elseif($page=='login')
		$title="Đăng nhập";
	elseif($page=='signup')
		$title="Đăng kí thành viên";
	elseif($page=='Search_simple')
		$title="Kết quả tìm kiếm";	
	elseif($page=='Product')
		$title="Sản phẩm";
	elseif($page=='News')
		$title="Tin tức";
	elseif($page=='Shopcart')
		$title="Giỏ hàng của bạn";	
	elseif($page=='BuyCart')
		$title="Thanh toán";
	elseif($page=='DiOrder')
		$title="Đơn hàng của bạn";	
	elseif($page=='Contact')
		$title = "Liên hệ-Ý kiến";
	elseif($page=='MemDoc')
		$title = "Hồ sơ thành viên";	
	elseif($page=='Change')
		$title="Thay đổi email-mật khẩu";
	elseif($page=='Sitemap')
		$title="SiteMap";	
	elseif($page=='Download')
		$title="Thư viện tài liệu";	
	elseif($page=='help')
		$title ="Trợ giúp";	
	elseif($page=='Gallery')
		$title ="Thư viện hình ảnh";	
	elseif($page=='Intro')	
		$title = "Giới thiệu công ty";								
	return $title;			
}
?>
