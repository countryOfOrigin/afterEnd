<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Goods extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('goods_model');
		}
		public function get_goods(){
			$arr=[];
			for ($i=0; $i < 8; $i++) { 
				$result=$this->goods_model->get_goods($i);
				array_push($arr,$result);
			}
			echo json_encode($arr);
		}
	}

?>