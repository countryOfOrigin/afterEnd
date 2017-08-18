<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('comment_model');
		}
		// 给商品id 返回评论信息
		public function get_comment(){
			$gid=$this->input->get('gid');
			$result=$this->comment_model->get_comment($gid);
			if($result){
				echo json_encode($result);	
			}else{
				echo "0";
			}
		}
		// 给用户id和商品id 判断用户是否收藏
		public function check_collection(){
			$gid=$this->input->get('gid');
			$uid=$this->input->get('uid');
			$result=$this->comment_model->check_collection($gid,$uid);
			if($result){
				echo "1";
			}else{
				echo "0";
			}
		}
		// 添加收藏
		public function add_collection(){
			$gid=$this->input->get('gid');
			$uid=$this->input->get('uid');
			$now=date("Y-m-d");
			$query=$this->comment_model->add_collection($gid,$uid,$now);
			if($query){
				echo "1";
			}else{
				echo "0";
			}
		}
		// 取消收藏
		public function remove_collection(){
			$gid=$this->input->get('gid');
			$uid=$this->input->get('uid');
			$query=$this->comment_model->remove_collection($gid,$uid);
			if($query){
				echo "1";
			}else{
				echo "0";
			}
		}
	}


?>