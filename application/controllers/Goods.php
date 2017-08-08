<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Goods extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('goods_model');
		}
		public function get_goods(){
			$arr=[];
			for ($i=1; $i < 9; $i++) { 
				$result=$this->goods_model->get_goods($i,4,null);
				array_push($arr,$result);
			}
			echo json_encode($arr);
		}
		public function paging(){
			$cls=$this->input->get('cls');
			$count=$this->input->get('count');
			$page=$this->input->get('page');
			echo "$cls";
			if($cls){
				$result=$this->goods_model->paging($cls,$count,($page-1)*$count);
				echo json_encode($result);
			}else{
				$result=$this->goods_model->paging_else($count,($page-1)*$count);
				echo json_encode($result);
			}
		}
	}

?>