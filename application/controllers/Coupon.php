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
			$check=$this->coupon_model->check($uid,$cid);
			if($check){
				echo "0";
			}else{
				$query=$this->coupon_model->add_coupon($uid,$cid);
				if ($query) {
					echo "1";
				}
			}
		}
		// 所有优惠券信息
		public function get_coupon(){
			$now=date("Y-m-d");
			$result=$this->coupon_model->get_coupon($now);
			// if($result){
				// foreach ($result as $key=>$val) {
				// 	if ($val->deadline<date("Y-m-d")){
				// 		unset($result[$key]);
				// 	}
				// }
				// echo json_encode($result);
			// }
			if($result){
				echo json_encode($result);
			}else{
				echo "0";
			}
		}
		// 给用户id 返回代金券信息
		public function get_owncoupon(){
			$uid=$this->input->get('uid');
			$now=date("Y-m-d");
			$result=$this->coupon_model->get_owncoupon($uid,$now);
			// if($result){
			// 	foreach ($result as $key=>$val) {
			// 		if ($val->deadline<date("Y-m-d")){
			// 			unset($result[$key]);
			// 		}
			// 	}
			// 	foreach()
			// 	// echo json_encode($result);
			// }
			if($result){
				echo json_encode($result);
			}else{
				echo "0";
			}
		}
	}
?>