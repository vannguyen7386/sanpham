<?php 
function checkPage($page){
	$title="";
	if($page=='ProductMan')
		$title = "Quản lý sản phẩm";
	elseif($page=='Default')
		$title = "Trang chủ Admin";	
	elseif($page=='ProducerMan')
		$title="Quản lý nhà sản xuất";
	elseif($page=='NewsMan')
		$title="Quản lý tin tức";
	elseif($page=='MemberMan')
		$title="Quản lý thành viên";	
	elseif($page=='SuggestMan')
		$title="Quản lý ý kiến";
	elseif($page=='BillMan')
		$title="Quản lý đơn hàng";
	elseif($page=='EditProduct')
		$title="Thay đổi thông tin sản phẩm";
	elseif($page=='EditNews')
		$title="Thay đổi tin tức";	
	elseif($page=='ProductTypeMan')
		$title="Quản lý loại sản phẩm";
	elseif($page=='DetailProduct')
		$title="Chi tiết sản phẩm";
	elseif($page=='DetailMember')
		$title="Hồ sơ thành viên";	
	elseif($page=='DetailNews')
		$title="Bản tin chi tiết";
	elseif($page=='AddProduct')
		$title="Thêm sản phẩm";	
	elseif($page=='AddNews')
		$title="Thêm tin tức";		
	elseif($page=='AdvMan')
		$title="Quản lý quảng cáo";	
	elseif($page=='AdmDocument')
		$title="Hồ sơ Admin";	
	elseif($page=="OrderMan")
		$title="Quản lý đơn hàng";	
	elseif($page=='Change')
		$title ="Đổi mật khẩu-Email";
	elseif($page=='Search')
		$title = "Kết quả tìm kiếm";
	elseif($page=='Guide')
		$title = "Hướng dẫn sử dụng";										
	return $title;			
}
?>
