<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('user_model');
		}
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
		// public function get_user(){


		// 	$result=$this->user_model->get_user($uid);
	 }



?>