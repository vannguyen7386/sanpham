
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	if(isset($_REQUEST['page'])){
		$page=$_REQUEST['page'];
		if($page == 'login')			
			include('Login.php');
		elseif($page == 'Default')
			include('Default.php');
		elseif($page == 'signup')
			include('Dangky.php');
		elseif($page == 'Search_simple')
			include('Search.php');
		elseif($page == 'Product')
			include('Product.php');
		elseif($page=='News')
			include('News.php');
		elseif($page=='Shopcart')
			include('Shopingcart.php');	
		elseif($page=='BuyCart')
			include('BuyCart.php');	
		elseif($page=='DiOrder')
			include('DisplayOrder.php');
		elseif($page=='Contact')
			include('Contact.php');	
		elseif($page=='MemDoc')
			include('MemDoc.php');	
		elseif($page=='Change')
			include('Change.php');	
		elseif($page=='Sitemap')
			include('Sitemap.php');
		elseif($page=='Download')
			include('Download.php');
		elseif($page=='Gallery')
			include('Gallery.php');	
		elseif($page=='help')
			include('Help.php');	
		elseif($page=='Intro')
			include('intro.php');												
		else
			include('Error.php');									
	}else{
		include('Default.php');
	}
?>	
