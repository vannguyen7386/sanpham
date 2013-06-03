<?php
/*
	Code: Shopping Card
	Author: Chungld Faculty
	Version: 1.0
	Date: 09/2008
*/
	class basket{
		var $id,$qty;//khai báo hai biến thành viên mã hàng và số lượng
		////////Phương thức khởi tạo////////
		public function basket($id,$quantity){
			$this->id=$id;
			$this->qty=$quantity;
		}
		///////phương thức thêm một phần tử vào giỏ////////
		public function addItem($id){
			if(isset($this->id) and  isset($this->qty)){
				$str_id=explode(",",$this->id);
				$str_qty=explode(",",$this->qty);
				$flag=0;
				for($i=0;$i<count($str_id);$i++)
					if($str_id[$i]==$id)
					{
						$flag=1;
						$str_qty[$i]+=1;
						break;	
					}
				if($flag==1){
					$this->id=join($str_id,",");
					$this->qty=join($str_qty,",");
				}
				else{
					$this->id.=$id.",";
					$this->qty.="1,";
				}
			}else{
				$this->id.=$id.",";
				$this->qty.="1,";
			}
			
		}
		///////phương thức xóa một phần tử trong giỏ hàng////////
		public function delItem($id){
			$str_id=explode(",",$this->id);
			$str_qty=explode(",",$this->qty);
			$tempid="";
			$tempqty="";
			for($i=0;$i<count($str_id)-1;$i++)
			if($str_id[$i]!=$id)
			{
				$tempid.=$str_id[$i].",";	
				$tempqty.=$str_qty[$i].",";
			}
			$this->id=$tempid;
			$this->qty=$tempqty;
			if($tempid==""){
				$this->id=NULL;
				$this->qty=NULL;
			}
		}
		//////////////Phương thức xóa tất cả phần tử/////////////
		public function delAll(){
			$this->id=NULL;
			$this->qty=NULL;
		}
		///////////Phương thức tính lại khi khách nhập số lượng mua/////////////
		public function reNew($id,$qty){
			$this->id=$id.",";
			$this->qty=$qty.",";
		}
	}
?>