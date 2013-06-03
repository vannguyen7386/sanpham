
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	if(isset($_REQUEST['page'])){
		$page=$_REQUEST['page'];
		if($page == 'ProductMan')
			include('ProductManagement.php');
		elseif($page == 'Default')
			include('ProductManagement.php');
		elseif($page == 'ProducerMan')
			include('ProducerManagement.php');	
		elseif($page == 'NewsMan')
			include('NewsManagement.php');
		elseif($page == 'MemberMan')
			include('MemberManagement.php');	
		elseif($page == 'SuggestMan')
			include('SuggestManagement.php');	
		elseif($page == 'AdmDocument')
			include('AdmDocument.php');
		elseif($page == 'EditProduct')
			include('EditProduct.php');	
		elseif($page=='ProductTypeMan')
			include('ProductTypeMan.php');
		elseif($page=='DetailProduct')
			include('DetailProduct.php');
		elseif($page =='DetailNews')
			include('DetailNews.php');	
		elseif($page =='AddProduct')
			include('AddProduct.php');	
		elseif($page =='AddNews')
			include('AddNews.php');	
		elseif($page =='EditNews')	
			include('EditNews.php');
		elseif($page =='DetailMember')
			include('DetailMember.php');
		elseif($page =='OrderMan')
			include('OrderMan.php');
		elseif($page=='DetailOrder')
			include('DetailOrder.php');	
		elseif($page=='Change')
			include('Change.php');	
		elseif($page=='Guide')
			include('GuideAdm.php');
		elseif($page=='Search')
			include('Search_value.php');				
		else
			include('../Error.php');													
	}else{
		include('ProductManagement.php');
	}
	
?>
