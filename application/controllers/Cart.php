<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cart extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('cart_model');
		}
		// 添加购物车
		public function insert_cart(){
			$uid=$this->input->get('uid');
			$gid=$this->input->get('gid');
			$count=$this->input->get('count');
			$check=$this->cart_model->check_cart($uid,$gid);
			if($check){
				$count=$count+$check->count;
				$query=$this->cart_model->update_cart($uid,$gid,$count);
			}else{
				$query=$this->cart_model->insert_cart($uid,$gid,$count);
			}
			if($query){
				echo "1";
			}else{
				echo "0";
			}
		}
		// 给uid获取购物车信息
		public function get_cart(){
			$uid=$this->input->get('uid');
			$result=$this->cart_model->get_cart($uid);
			// echo "<pre>";
			// var_dump($result);
			// echo "</pre>";
			echo json_encode($result);
		}
		// 删除购物车
		public function delete_cart(){
			$uid=$this->input->get('uid');
			$sid=$this->input->get('sid');
			$this->cart_model->delete_cart($sid);
			$result=$this->cart_model->get_cart($uid);
			echo json_encode($result);
		}
		// 给购物车id 商品数量 修改购物车
		public function update_cart(){
			$sid=$this->input->get('sid');
			$count=$this->input->get('count');
			$query=$this->cart_model->update_by_sid($sid,$count);
			if($query){
				echo "1";
			}
		}
	}



?>