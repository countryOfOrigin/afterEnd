<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Cart extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('cart_model');
		}
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
	}



?>