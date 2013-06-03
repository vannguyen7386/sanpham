<?php session_start();ob_start();
    include'../../Include/Connect.inc.php';
    $conn = new Conection();
    $conn->Connected();
    include'../Models/DisplayAll.php';
    include'../Models/BasketModel.php';
	$Prod = new DisplayAll();
	$pro_id =NULL;
	$action=NULL;
	$flag=true;
    $str = "";
	if(isset($_REQUEST['id']) and !empty($_REQUEST['id'])){
		$query = "SELECT COUNT(ProdID) FROM fas_product WHERE ProdID='".$Prod->sqlQuote($_REQUEST['id'])."'";
		if($Prod->checkExist($query))	
			$pro_id=$_REQUEST["id"];
		else{
			$flag=false;
		}	
	}
	$card=new basket($_SESSION["CartId"],$_SESSION["CartQty"]);
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action'])){
			$action=$_REQUEST["action"];	
		if($action=="add" and $flag == true){
			$card->addItem($pro_id);
		}	
		elseif($action=="del" and $flag == true)
			$card->delItem($pro_id);
		elseif($action=="delall"){
			$card->delAll();
		}	
		elseif($action=="renew"){
            $arr_qty = explode(",",$_SESSION["CartQty"]);
			if(!empty($_POST['txtid']) and !empty($_POST['txtqty'])){
				$qty = $_POST['txtqty'];
				$id = $_POST['txtid'];
				$length = count($qty);
				for($i=0;$i<$length;$i++){
					$qty[$i]=(is_numeric($qty[$i]))?$qty[$i]:0;
					$qty[$i] = floor(abs($qty[$i]));
					if($qty[$i]==0){
						unset($qty[$i]);
						unset($id[$i]);
					}
                    $sql = "SELECT Inventory FROM fas_product WHERE ProdID = '".$Prod->sqlQuote($id[$i])."'";
                    $rowQty = $Prod->displaySingle($sql);
                    if($rowQty[0]<$qty[$i]){
                        $str .="Mã hàng <b>".$id[$i]."</b>: Số lượng trong kho không đủ<br>";
                        $qty[$i] = $arr_qty[$i];    
                    }
				}
				$pro_id=@implode(',', $id);
				$pro_qty=@implode(',',$qty);
				$card->reNew($pro_id,$pro_qty);
			}else{
				header('location:../../Gio hang.php');	
			}	
		}else{
			header('location:../../San pham.php');
		}
	}	
	$_SESSION["CartId"] = $card->id;
	$_SESSION["CartQty"] = $card->qty;
	if($_SESSION['CartId']==","){
		$_SESSION["CartId"] = NULL;
		$_SESSION["CartQty"] = NULL;	
	}
    if(!empty($str)){
        header("location:../../Gio hang.php?err=$str");	    
    }else	
	    header('location:../../Gio hang.php');
?>