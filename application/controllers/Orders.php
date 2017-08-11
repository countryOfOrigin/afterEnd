<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Orders extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('orders_model');
		}
		// 给用户id 返回订单信息
		public function get_orders(){
			$uid=$this->input->post('uid');
			$state=$this->input->post('state');
			if($state){
				$result=$this->orders_model->get_state($uid,$state);
			}else{
				$result=$this->orders_model->get_all($uid);
			}
			echo json_encode($result);
		}
	}


?>