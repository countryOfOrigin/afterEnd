<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Search extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('search_model');
		}
		// 返回热门搜索数据
		public function hot_search(){
			$result=$this->search_model->hot_search();
			// echo "<pre>";
			// var_dump($result);	
			// echo "</pre>";
			echo json_encode($result);
		}
		// 添加关键词/改变搜索量
		// public function insert_search(){

		// }
		// 模糊搜索
		public function fuzzy_search(){
			$ipt=$this->input->post('$ipt');
			// $ipt=$this->input->get('ipt');
			$check=$this->search_model->check_search($ipt);
			if($check){
				$times=$check->times;
				$times++;
				$this->search_model->update_search($ipt,$times);
			}else{
				$this->search_model->insert_search($ipt,1);
			}
			$result=$this->search_model->fuzzy_search($ipt);
			if($result){
				echo json_encode($result);
			}else{
				echo "0";
			}
		}
	}
?>