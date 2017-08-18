<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Comment extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('comment_model');
		}
		// 给用户id 返回评论信息
		public function get_comment(){
			$gid=$this->input->get('gid');
			$result=$this->comment_model->get_comment($gid);
			if($result){
				echo json_encode($result);	
			}else{
				echo "0";
			}
		}
	}


?>