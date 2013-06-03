
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	.guide p{
		line-height:20px;
	}
</style>
<?php 
	if(!isset($_SESSION['Quyen']) || $_SESSION['Quyen'] != '1'){ 
		header('location:../index.php');
	}	
 ?>
<div class="title">Hướng dẫn sử dụng trang Admin</div>
<div class="guide">
<p>Giao diện trang chủ admin là trang quản lí sản phẩm</p>
<p>Trong bảng có liêt kê vài thông số của sản phẩm và các chức năng:</p>
<ul>
	<li>+Hiển thị mã sản phẩm</li>
	<li>+Hiển thị tên sản phẩm</li>
	<li>+Hiển thị giá sản phẩm</li>
	<li>+Hiển thị trạng thái sản phẩm <img src="Images/ok.gif" width="21" height="23">: Còn hàng, <img src="Images/thunderbird-delete.gif" width="21" height="21">: Hết hàng</li>
	<li>+Các chức năng sửa, xóa và liệt kê chi tiết sản phẩm</li>
	<li>+Chọn mục hiển thị sản phẩm theo tên, mã sản phẩm, chỉ hiển thị sản phẩm mới, sản phẩm khuyến mãi, còn hàng, hết hàng trong ô lựa chọn phía trên bên phải</li>
</ul>
<p>Muốn thêm sản phẩm, Click vào nút "thêm sản phẩm"
<a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Thêm sản phẩm</strong><span class="bt_green_r"></span></a>
 ở dưới cùng bên phải, xuất hiện 1 form yêu cầu bạn điền các thông số sản phẩm</p><br /><br />
<p>Muốn xóa nhiều sản phẩm 1 lúc, tich vào nút check bên trái của bảng các sản phẩm cần xóa, sau đó click "xóa các sản phẩm"<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Xóa các sản phẩm</strong><span class="bt_red_r"></span></a>  bên cạnh nút "thêm sản phẩm". </p><br /><Br />
<p><b>Chức năng tìm kiếm</b></p>
<p>+Tìm kiếm theo tên sản phẩm: Nhập tên sản phẩm vào ô "search keyword"</p>
<p>+Tìm kiếm theo mã sản phẩm: Nhập mã sản phẩm vào ô "search keyword"</p>
<p>+Tìm kiếm theo tiêu đề tin tức: Nhập tiêu đề vào ô "search keyword"</p>
<p>+Tìm kiếm theo mã tin tức: Nhập mã tin vào ô "search keyword"</p>
<p>+Tìm kiếm theo tên đăng nhập thành viên: Nhập tên đăng nhập vào ô "search keyword"</p>
<p>+Tìm kiếm mã hóa đơn: Nhập mã hóa đơn vào ô "search keyword"</p>
<p style="font-size:14px">Quản lý các loại khác tương tự</p>
</div>