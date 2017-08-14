<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
		}
		// 注册
		public function insert_user(){
			$uname=$this->input->post('name');
			$num=$this->input->post('tel');
			$psw=$this->input->post('psw');
			
			// $time=now();
			$result=$this->user_model->check_num($num);
			if($result){
				echo "6";
			}else{
				$result=$this->user_model->insert_user($uname,$num,$psw);
				if($result){
					echo "7";
				}else{
					echo "8";
				}
			}
		}
		// 判断登录
		public function login_user(){
			$num=$this->input->post('tel');
			$psw=$this->input->post('psw');
			$result=$this->user_model->login_user($num,$psw);
			if($result){
				$result=json_encode($result);
				echo $result;
			}else{
				echo "3";
			}
		}
		// 给用户id 返回用户信息
		public function get_user(){
			$uid=$this->input->get('uid');
			$result=$this->user_model->get_user($uid);
			echo json_encode($result);
		}
		// 给用户id 返回地址信息
		public function get_address(){
			$uid=$this->input->get('uid');
			$result=$this->user_model->get_address($uid);
			echo json_encode($result);
		}
		// 给地址id 返回地址信息
		public function get_address_by_aid(){
			$aid=$this->input->get('aid');
			$result=$this->user_model->get_address_by_aid($aid);
		}
		// 给地址id 删除地址信息
		public function delete_address(){
			$aid=$this->input->get('aid');
			$query=$this->user_model->delete_address($aid);
			if($query){
				echo "1";
			}
		}
	 }



?>