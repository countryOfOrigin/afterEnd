<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Coupon extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('coupon_model');
		}
		// 添加优惠券
		public function add_coupon(){
			$uid=$this->input->get('uid');
			$cid=$this->input->get('cid');
			$query=$this->coupon_model->add_coupon($uid,$cid);
			if ($query) {
				echo "1";
			}
		}
		// 所有优惠券信息
		public function get_coupon(){
			$result=$this->coupon_model->get_coupon();
			// echo "<pre>";
			// var_dump($result);
			// echo "</pre>";
			echo json_encode($result);
		}
	}



?>