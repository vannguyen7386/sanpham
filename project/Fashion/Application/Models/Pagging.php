<?php
	class Pagging{
        private $display;
        private $div; 
        private $start;
        private $pageNum;
        private $list;
        private $current;
        private $next;
        private $prev;
        
        public function Pagging($display,$div){
            $this->display = $display;
            $this->div = $div;
        }
        public function get_display(){
            return $this->display;
        }
        public function get_div(){
            return $this->div;
        }
        public function get_Page($query){
            if(isset($_REQUEST['pageNum']) and (int)$_REQUEST['pageNum']){
				$this->pageNum = $_REQUEST['pageNum'];//So trang
			}else{
				$result = mysql_query($query) or die("Could not connect DATABASE".mysql_error());
				$row = mysql_fetch_array($result,MYSQL_NUM);
				$record = $row[0];//So ban ghi trong DB
				if($record > $this->display){
					$this->pageNum = ceil($record/$this->display);
				}else{
					$this->pageNum = 1;
				}
			}  
            return $this->pageNum; 
        }   
        public function get_start(){
            $this->start = (isset($_REQUEST['start']) and (int)$_REQUEST['start'] >=0 )? $_REQUEST['start']:0;
            return $this->start;
        }
        public function get_list(){
       	    $this->list = floor($this->start/($this->display*$this->div));
            return $this->list;
        }
        public function get_current(){
            $this->current = ceil($this->start/$this->display)+1;
            return $this->current;
        }
        public function get_next(){
            $this->next =$this->start + $this->display;
            return $this->next;
        }
        public function get_prev(){
            $this->prev =$this->start - $this->display;
            return $this->prev;
        }
    }
?>